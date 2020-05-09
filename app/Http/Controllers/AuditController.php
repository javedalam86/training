<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\Pages;
use App\Models\Audit;
use App\Models\Courses;
use Carbon\Carbon;

class AuditController extends Controller
{
  var $recordPerPage =20;
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function auditlist()
  {
    return view('audit.list');
  }

  public function auditdetail(Request $request, $id)
  {
    return Audit::where('id', '=', $id)->first();
  }

  function ajaxauditlist(Request $request)
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
    $questiosData = Audit::select('id','audit_text','audit_title');
    if(@isset($data['query']['auditgeneralSearch'])){
      $searchKey =$data['query']['auditgeneralSearch'];
      $questiosData = $questiosData->where(function($q) use ($searchKey){
        $q->where('audit_title', 'LIKE', '%' . $searchKey . '%')
        ->orWhere('audit_text', 'LIKE', '%' . $searchKey . '%');
      });
    }

    $sortfield ='id';
    if(@isset($data['sort']['field']) ){
      if(in_array($data['sort']['field'], array('audit_text','id'))){
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

    $userCount = Audit::select('*');
    if(@isset($data['query']['auditgeneralSearch'])){
        $searchKey =$data['query']['auditgeneralSearch'];
        $userCount = $userCount->where(function($q) use ($searchKey){
            $q->where('audit_title', 'LIKE', '%' . $searchKey . '%');
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
  public function auditadd(Request $request)
  {
    $data = $request->all();
    $validator = Validator::make($data, [
      'audit_title'=> 'required|min:5',
      'audit_order'=> 'nullable|numeric'
    ]);

    if ($validator->fails()) {
      return response(array("status"=>"fail", "code"=>400,'message' => $validator->errors(),"data" => $data));
    }

    $now = Carbon::now();
    $data['added_date'] = $now;
    $data['last_modified_date'] = $now;

    $audit = Audit::create($data);
    if(!$audit) {
      return response(array("status"=>"fail", "code"=>400,'message' => "Audit creation failed","data" => $data));
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
  public function editaudit(Request $request)
  {
    $data = $request->all();
    $validator = Validator::make($data, [
      'auditId' => 'required',
      'audit_title' => 'required|min:5',
      'audit_text' => 'required',
    ]);

    if ($validator->fails()) {
      return response(array("status"=>"fail", "code"=>400,'message' => $validator->errors(),"data" => $data));
    } else {
      $now = Carbon::now();
      $id = $data['auditId'];
      $Audit = Audit::find($id);
      $Audit->audit_title = $data['audit_title'];
      $Audit->audit_text = $data['audit_text'];
      $Audit->last_modified_date = $now;
      $Audit->save();
      return response(array("status"=>"success", "code"=>200,"data" => $Audit));
    }
  }

  public function deleteaudit(Request $request)
  {
    $data = $request->all();
    $id = $data['auditIdDelete'];
    $Audit = Audit::find($id);
    $Audit->is_deleted = 1;
    $Audit->save();
    return response(array("status"=>"success", "code"=>200,"data" => $Audit));
  }
}