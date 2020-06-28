<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\Pages;
use App\Models\Manual;
use App\Models\Courses;
use Carbon\Carbon;

class ManualController extends Controller
{
  var $recordPerPage =20;
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function manuallist()
  {
    return view('manual.list');
  }

  public function manualdetail(Request $request, $id)
  {
    return Manual::where('id', '=', $id)->first();
  }

  function ajaxmanuallist(Request $request)
  {
    $data = $request->all();
    $page =$data['pagination']['page'];
    $per_page = $data['pagination']['perpage'];
    if($per_page ==''){
      $per_page =10;
    }

    $method='GET';
    $searchArray['per_page']=$per_page;
    $searchArray['page']	=$page;

    //$pageNo = 1;
    $questiosData = Manual::select('id','manual_text','manual_title','section_order');
    if(@isset($data['query']['manualgeneralSearch'])){
      $searchKey =$data['query']['manualgeneralSearch'];
      $questiosData = $questiosData->where(function($q) use ($searchKey){
        $q->where('manual_title', 'LIKE', '%' . $searchKey . '%')
        ->orWhere('manual_text', 'LIKE', '%' . $searchKey . '%');
      });
    }

    $sortfield ='id';
    if(@isset($data['sort']['field']) ){
      if(in_array($data['sort']['field'], array('manual_text','id'))){
          $sortfield =$data['sort']['field'];
      } else {
          $sortfield  = 'id';
      }
    }

    $sortorder ='DESC';
    if(@isset($data['sort']['sort'])){
        $sortorder =$data['sort']['sort'];
    }

    if($page ==1) {
        $offset = 0; }else{ $offset = $this->recordPerPage*($page-1);
    }

    $questiosData->where('is_deleted', '=', '0');
    $questiosData->offset($offset);
    $questiosData->limit($this->recordPerPage);
    $questiosData->orderBy($sortfield, $sortorder);
    $questiosData =	$questiosData->get()->toArray();

    $userCount = Manual::select('*');
    if(@isset($data['query']['manualgeneralSearch'])){
        $searchKey =$data['query']['manualgeneralSearch'];
        $userCount = $userCount->where(function($q) use ($searchKey){
            $q->where('manual_title', 'LIKE', '%' . $searchKey . '%');
        });
    }
    $userCount->where('is_deleted', '=', '0');
    $userCount =$userCount->get();
    $totalRecord =$userCount->count();

    $resultDataTable['data'] = $questiosData;
    $resultDataTable['meta']['page'] = $page;
    $resultDataTable['meta']['pages'] = ceil($totalRecord/$per_page);
    $resultDataTable['meta']['perpage'] = $per_page;
    $resultDataTable['meta']['total'] = $totalRecord;
    return json_encode($resultDataTable);
  }

  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return \App\User
  */
  public function manualadd(Request $request)
  {
    $data = $request->all();
    $validator = Validator::make($data, [
      'manual_title'=> 'required|min:5',
      'manual_order'=> 'nullable|numeric'
    ]);

    if ($validator->fails()) {
      return response(array("status"=>"fail", "code"=>400,'message' => $validator->errors(),"data" => $data));
    }

    $now = Carbon::now();
    $data['added_date'] = $now;
    $data['last_modified_date'] = $now;

    $manual = Manual::create($data);
    if(!$manual) {
      return response(array("status"=>"fail", "code"=>400,'message' => "Manual creation failed","data" => $data));
    }
    return response(array("status"=>"success", "code"=>200,"data" => $data));
  }


  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function editmanual(Request $request)
  {
    $data = $request->all();
    $validator = Validator::make($data, [
      'manualId' => 'required',
      'manual_title' => 'required|min:5',
      'section_order'=> 'nullable|numeric',
      'manual_text' => 'required',
    ]);

    if ($validator->fails()) {
      return response(array("status"=>"fail", "code"=>400,'message' => $validator->errors(),"data" => $data));
    } else {
      $now = Carbon::now();
      $id = $data['manualId'];
      $Manual = Manual::find($id);
      $Manual->manual_title = $data['manual_title'];
      $Manual->manual_text = $data['manual_text'];
      $Manual->section_order = $data['section_order'];
      $Manual->last_modified_date = $now;
      $Manual->save();
      return response(array("status"=>"success", "code"=>200,"data" => $Manual));
    }
  }

  public function deletemanual(Request $request)
  {
    $data = $request->all();
    $id = $data['manualIdDelete'];
    $Manual = Manual::find($id);
    $Manual->is_deleted = 1;
    $Manual->save();
    return response(array("status"=>"success", "code"=>200,"data" => $Manual));
  }
}