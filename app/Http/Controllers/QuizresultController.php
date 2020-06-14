<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\Models\Pages;
use App\Models\Books;
use App\Models\Courses;
use App\Models\Questions;
use App\Models\CourseQuize;
use App\Models\CourseQuizeSections;
use App\Models\Setting;
use App\Models\CandidateQuize;
use App\Models\QuizeResult;

 use Redirect;

class QuizresultController extends Controller
{   var $recordPerPage =20;
    public function quizresult(Request $request)
    {
        //$CandidateQuize = CandidateQuize::where('is_deleted', '=',0)->orderBy('id', 'ASC' )->get()->toArray();
	    $CandidateQuize =   \DB::table('candidate_quizes')
		->select('*')
		->join('users','candidate_quizes.candidate_id','=','users.id')
		->join('course_quize','candidate_quizes.quiz_id','=','course_quize.id')
		//->where(['something' => 'something', 'otherThing' => 'otherThing'])
		->get()->toArray();
        return view('quizresult.list', compact('CandidateQuize'));
    }






  public function ajaxquizeresultlist(Request $request)
    {      
		$data = $request->all();
		$page =$data['pagination']['page'];
		$per_page = $data['pagination']['perpage'];
		if($per_page ==''){
		  $per_page =10;
		}
		$searchArray['per_page']=$per_page;
		$searchArray['page']	=$page;
		
        //$CandidateQuize = CandidateQuize::where('is_deleted', '=',0)->orderBy('id', 'ASC' )->get()->toArray();
	    $CandidateQuize =   \DB::table('candidate_quizes')
		->select('candidate_quizes.id as candidate_quiz_id','users.name as username','users.email as email','candidate_id', 'quiz_id',  'is_evaluated',  'attempt_counter','quiz_re_enabled', 'quiz_result', 'candidate_id', 'courses.name as course_name', 'course_type','quize_name')
		->join('users','candidate_quizes.candidate_id','=','users.id')
		->join('course_quize','candidate_quizes.quiz_id','=','course_quize.id')
		->join('courses','course_quize.course_id','=','courses.id');
		//->where(['something' => 'something', 'otherThing' => 'otherThing'])   offset sortfield
		//->get()->toArray();
		
		
		$sortfield ='candidate_quizes.id';
		if(@isset($data['sort']['field']) ){
		  if(in_array($data['sort']['field'], array('course','id','cost','course_type','description'))){
			$sortfield =$data['sort']['field'];
		  }else{
			$sortfield  = 'candidate_quizes.id';
		  }
		}
		$sortorder ='ASC';
		if(@isset($data['sort']['sort'])){
		  $sortorder =$data['sort']['sort'];
		}
	
		if($page ==1){ $offset = 0; }else{ $offset = $this->recordPerPage*($page-1); }
        $CandidateQuize->offset($offset);
		$CandidateQuize->limit($this->recordPerPage);
		$CandidateQuize->orderBy($sortfield, $sortorder);
		$CandidateQuize =	$CandidateQuize->get()->toArray();
		 
		 
		 
		 
		 
		$allCandidateQuize =   \DB::table('candidate_quizes')
		->select('*')
		->join('users','candidate_quizes.candidate_id','=','users.id')
		->join('course_quize','candidate_quizes.quiz_id','=','course_quize.id');
		$totalRecord =$allCandidateQuize->count();
		$resultDataTable['data'] = $CandidateQuize;
		$resultDataTable['meta']['page'] = $page;
		$resultDataTable['meta']['pages'] = ceil($totalRecord/$per_page);
		$resultDataTable['meta']['perpage'] = $per_page;
		$resultDataTable['meta']['total'] = $totalRecord;
		return json_encode($resultDataTable);
    }



  public function ajaxquizeanswers(Request $request)
    {      
		$data = $request->all();
		$candidate_quiz_id = $data['candidate_quiz_id'];
		$CandidateQuize = CandidateQuize::where('is_deleted', '=',0)->where('id', '=',$candidate_quiz_id)->orderBy('id', 'ASC' )->get()->toArray();
		//print_r($CandidateQuize);
		$candidate_id	=$CandidateQuize[0]['candidate_id'];
		$quiz_id		=$CandidateQuize[0]['quiz_id'];
		$attempt_counter=$CandidateQuize[0]['attempt_counter'];
            
		//$quizeResult = QuizeResult::where('candidate_quize_id', '=',$candidate_quiz_id)->where('quiz_attempt_counter', '=',$attempt_counter)->get()->toArray();
		
		$quizeResult =   \DB::table('quize_result')
		->select('quize_result.id as quize_result_id','quize_result.quize_id','quize_result.candidate_quize_id','quize_result.section_id','question_id','selected_option','quize_result.question_type','marks','quiz_attempt_counter','question')
		->join('questions','quize_result.question_id','=','questions.id')
		->where(['candidate_quize_id' =>$candidate_quiz_id, 'quiz_attempt_counter' => $attempt_counter]);
		$quizeResult = $quizeResult->get()->toArray();
		$resultData['resultData'] =$quizeResult;
		$resultData['status'] ='success';
		
		return json_encode($resultData);
    }




  public function ajaxquizmarksupdate(Request $request)
    {      
		$data = $request->all();
		$quizresultId = $data['quizresultId'];
		$marks = $data['marks'];
		$counter =0;
		$candidateMarks= 0;
		foreach($quizresultId as $quizresult){
			$Qmarkes = $marks[$counter];
			$QuizeResult = QuizeResult::where('id', '=',$quizresult)
				->first();
			$QuizeResult->marks =$Qmarkes;
			$QuizeResult->save();		
			$counter++;
			$candidate_quize_id = $QuizeResult->candidate_quize_id; 
			$candidateMarks+=$Qmarkes;
		}		
		$totalMarks = 10*$counter;
		$candidatePercent =  ($candidateMarks/$totalMarks)*100;
		if($candidatePercent >=60){ $quiz_result = 'PASS'; }else{  $quiz_result = 'FAIL'; }
		$CandidateQuize = CandidateQuize::where('id', '=',$candidate_quize_id)
		->first();
		$CandidateQuize->is_evaluated =1;
		$CandidateQuize->quiz_result =$quiz_result;  
		if($quiz_result =='PASS'){
			$CandidateQuize->quiz_re_enabled =1;  
		}else{
			//$CandidateQuize->quiz_re_enabled =$quiz_result;  
		}
		$CandidateQuize->save();
		$resultData['status'] ='success';		
		return json_encode($resultData);
    }






  public function ajaxreenablequizbtn(Request $request)
    {      
		$data = $request->all();
		$candidate_quiz_id = $data['candidate_quiz_id'];	 
		$CandidateQuize = CandidateQuize::where('id', '=',$candidate_quiz_id)
		->first();
		$CandidateQuize->quiz_re_enabled =0;	
		$CandidateQuize->save();
		$resultData['status'] ='success';		
		return json_encode($resultData);
    }























}