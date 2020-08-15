<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\CandidateCourses;
use Carbon\Carbon;

class CourseCalenderController extends Controller
{
    public function index()
    {
      return view('coursecalender.index');
    }

    public function getAllCourse(){
        $all_event = Courses::where('is_deleted','=',0)->get()->toArray();
        $event_data=array();
        foreach ($all_event as $key => $event_val) {
          $carbon_date = Carbon::parse($event_val['end_date']);
          $event_val['end_date'] = $carbon_date->addHours(23)->addMinutes(59);
          $event_data[$key]['title'] = $event_val['name'];
          $event_data[$key]['start'] = $event_val['start_date'];
          $event_data[$key]['end']  = $event_val['end_date'];
          $event_data[$key]['start_formate'] =implode("/", array_reverse(explode("-", $event_val['start_date'])));
          $event_data[$key]['end_formate']  =implode("/", array_reverse(explode("-", $event_val['end_date'])));
          $event_data[$key]['events_id'] = $event_val['id'];
          $event_data[$key]['event_description'] =$event_val['description'];
          $event_data[$key]['created_at'] =date('d/m/Y', strtotime($event_val['start_date']));
          if(!empty($event_val['color'])) {
            $event_data[$key]['color'] = $event_val['color'];
          }
        }
        echo json_encode($event_data);
    }

    public function courseDetail(Request $request, $courseId)
    {
      return Courses::where('is_deleted', '=', 0)->where('id', '=', $courseId)->first();
    }

    public function buyCourse(Request $request, $courseId) {
      $feed_back=array();
      $course = Courses::where('is_deleted', '=', 0)->where('id', '=', $courseId)->first();
      $current_date = Carbon::now();
      //if(\Auth::check()){
      if(!$course){
          $feed_back['type']='alert-danger';
          $feed_back['type_error']='1';
          $feed_back['error'][] = 'Invalid Course';
          return json_encode($feed_back);
          exit();
      }

      if($course->start_date < $current_date){
        $feed_back['type']='alert-danger';
        $feed_back['type_error']='1';
        $feed_back['error'][] = 'Course start date should be greater than or equal to today';
        return json_encode($feed_back);
        exit();
      }

      if(!Auth::check()){
        $feed_back['type']='alert-danger';
        $feed_back['type_error']='2';
        $feed_back['error'][]= 'Please login first to buy course';
         return json_encode($feed_back);
          exit();
      }

      $cc = [
        'course_id' => $courseId,
        'candidate_id' => Auth::user()->id
      ];

      $ccRes = CandidateCourses::create($cc);

      if(!$ccRes) {
          $feed_back['type']='alert-danger';
          $feed_back['type_error']='1';
          $feed_back['error'][] = 'Coorse booking failed';
          return json_encode($feed_back);
          exit();
      }

      $feed_back['type']='alert-success';
      $feed_back['message']='Record successfully updated';
      $feed_back['error']=array();

      $orders = [
        'course_id' => $courseId,
        'candidate_id' => Auth::user()->id,
        'payment_status' => 'pending',
        'payment_type' => 1,
        'price' => $course->cost,
        'added_date' => $current_date
      ];

      $orders = Order::create($orders);
      $feed_back['orders'] = $orders;

       return json_encode($feed_back);
        exit();
    }
}