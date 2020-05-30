<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use Illuminate\Support\Facades\Auth;

class CourseCalenderController extends Controller
{
    public function index()
    {
      return view('coursecalender.index');
    }

    public function getAllCourse(){
        $all_event = Courses::all()->toArray();
        $event_data=array();
        foreach ($all_event as $key => $event_val) {
          $event_data[$key]['title'] =$event_val['name'];
          $event_data[$key]['start'] =$event_val['start_date'];
          $event_data[$key]['end']  =$event_val['end_date'];

          $event_data[$key]['start_formate'] =implode("/", array_reverse(explode("-", $event_val['start_date'])));
          $event_data[$key]['end_formate']  =implode("/", array_reverse(explode("-", $event_val['end_date'])));
          $event_data[$key]['events_id'] = $event_val['id'];
          $event_data[$key]['event_description'] =$event_val['description'];
          $event_data[$key]['created_at'] =date('d/m/Y', strtotime($event_val['start_date']));
        }
        echo json_encode($event_data);
    }

    public function courseDetail(Request $request, $courseId)
    {
      return Courses::where('is_deleted', '=', '0')->where('id', '=', $courseId)->first();
    }

    public function buyCourse(Request $request, $courseId) {
      $feed_back=array();
      $course = Courses::where('is_deleted', '=', '0')->where('id', '=', $courseId)->first();
      //if(\Auth::check()){
      if(!$course){
          $feed_back['type']='alert-danger';
          $feed_back['error']= 'Invalid Course';
          return json_encode($feed_back);
      }

      if(!Auth::check()){
        $feed_back['type']='alert-danger';
        $feed_back['error']= 'Please login first to buy cours';
         return json_encode($feed_back);
      }

       $feed_back['type']='alert-success';
       $feed_back['message']='Record successfully updated';
       $feed_back['error']=array();

       return json_encode($feed_back);
    }
}