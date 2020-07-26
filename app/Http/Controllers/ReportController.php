<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\Order;
use App\Models\Courses;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Verified;
use Carbon\Carbon;

class ReportController extends Controller
{

  var $recordPerPage =10;

  function reportlist(){
    $courses = Courses::where('is_deleted', '=', 0)->get();
    $candidates = User::where('user_type', '=', 'candidate')->get();
    return view('report.list',[
      'courses' => $courses,
      'candidates' => $candidates
    ]);
  }

  function ajaxreportlist(Request $request){
    $data = $request->all();
    $page =$data['pagination']['page'];
    $per_page = $data['pagination']['perpage'];
    if($per_page ==''){
      $per_page =10;
    }

    $method='GET';
    $searchArray['per_page']=$per_page;
    $searchArray['page']  =$page;

    //$pageNo = 1;
    $questiosData = Order::select('*');
    if(@isset($data['query']['reportgeneralSearch'])){
      //courseId+'||'+candidateId+'||'+startDate+'||'+endDate;
      $search = explode('||', $data['query']['reportgeneralSearch']);
      $courseId = $search[0];
      $candidateId = $search[1];
      $startDate = $search[2];
      $endDate = $search[3];
      if(!empty($startDate) && !empty($endDate)) {
        $startDate = Carbon::parse($startDate." 00:00:00")->format('Y-m-d H:i:s');
        $endDate = Carbon::parse($endDate." 23:59:59")->format('Y-m-d H:i:s');
        $questiosData->where('added_date', '>=', $startDate);
        $questiosData->where('added_date', '<=', $endDate);
      } else if(!empty($startDate)) {
         $startDate = Carbon::parse($startDate." 00:00:00")->format('Y-m-d H:i:s');
         $questiosData->where('added_date', '>=', $startDate);
      } else if(!empty($endDate)) {
        $endDate = Carbon::parse($endDate." 23:59:59")->format('Y-m-d H:i:s');
        $questiosData->where('added_date', '<=', $endDate);
      }

      if(!empty($courseId)) {
        $questiosData->where('course_id', '=', $courseId);
      }

      if(!empty($candidateId)) {
        $questiosData->where('candidate_id', '=', $candidateId);
      }
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
    $questiosData = $questiosData->get();
    $results = [];
    if(!$questiosData->isEmpty()) {
      foreach ($questiosData as $order) {
        $course = $order->course()->first();
        $candidate = $order->candidate()->first();
        $results[] = [
          "course_id" => $course->name,
          "candidate_id" => $candidate->name,
          "price" => $order->price,
          "payment_status" => $order->payment_status,
          "payment_date" => $order->payment_date,
          "added_date" => $order->added_date,
        ];
      }
    }

    $userCount = Order::select('*');
    if(@isset($data['query']['reportgeneralSearch'])){
     /* $searchKey =$data['query']['manualgeneralSearch'];
      $userCount = $userCount->where(function($q) use ($searchKey){
        $q->where('manual_title', 'LIKE', '%' . $searchKey . '%');
      });*/
      $search = explode('||', $data['query']['reportgeneralSearch']);
      $courseId = $search[0];
      $candidateId = $search[1];
      $startDate = $search[2];
      $endDate = $search[3];
      if(!empty($startDate) && !empty($endDate)) {
        $startDate = Carbon::parse($startDate." 23:59:59")->format('Y-m-d H:i:s');
        $endDate = Carbon::parse($endDate." 23:59:59")->format('Y-m-d H:i:s');
        $questiosData->where('added_date', '>=', $startDate);
        $questiosData->where('added_date', '<=', $endDate);
      } else if(!empty($startDate)) {
         $startDate = Carbon::parse($startDate." 23:59:59")->format('Y-m-d H:i:s');
         $questiosData->where('added_date', '>=', $startDate);
      } else if(!empty($endDate)) {
        $endDate = Carbon::parse($endDate." 23:59:59")->format('Y-m-d H:i:s');
        $questiosData->where('added_date', '<=', $endDate);
      }

      if(!empty($courseId)) {
        $questiosData->where('course_id', '=', $courseId);
      }

      if(!empty($candidateId)) {
        $questiosData->where('candidate_id', '=', $candidateId);
      }
    }
    $userCount->where('is_deleted', '=', '0');
    $userCount =$userCount->get();
    $totalRecord =$userCount->count();

    $resultDataTable['data'] = $results;
    $resultDataTable['meta']['page'] = $page;
    $resultDataTable['meta']['pages'] = ceil($totalRecord/$per_page);
    $resultDataTable['meta']['perpage'] = $per_page;
    $resultDataTable['meta']['total'] = $totalRecord;
    return json_encode($resultDataTable);
  }

}