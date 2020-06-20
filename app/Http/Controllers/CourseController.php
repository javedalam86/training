<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\Pages;
use App\Models\Courses;
use App\Models\CourseQuize;
use App\Models\CourseSections;
use App\Models\CourseQuizeSections;
use App\Imports\UsersImport;





class CourseController extends Controller
{

  var $recordPerPage =10;
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function courselist()
  {
    $Courses = Courses::where('is_deleted', '=', '0')->orderBy('id', 'ASC' )->get();
    return view('course.list', compact('Courses'));
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function candidatecourses()
  {
    $Courses = Courses::where('is_deleted', '=', '0')->orderBy('id', 'ASC' )->get();
    return view('candidatecourses', compact('Courses'));
  }


  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function coursedetail(Request $request, $id)
  {
    $CourseData = courses::where('is_deleted', '=', '0')->where('id', '=', $id)->get()->toArray();
    $Course =  $CourseData[0]; 
	$CourseId = $id;
	$sectionsData = CourseSections::where('is_deleted', '=', '0')->where('course_id', '=', $id)->get()->toArray();
	$CourseQuize = CourseQuize::where('is_deleted', '=', '0')->where('course_id', '=', $id)->get()->toArray();
	
	
	
    return view('course.detail', compact('Course','sectionsData','CourseId','CourseQuize'));
  }

  function ajaxcourselist(Request $request){
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
    $questiosData = Courses::select('*');
    if(@isset($data['query']['coursegeneralSearch'])){
      $searchKey =$data['query']['coursegeneralSearch'];
      $questiosData = $questiosData->where(function($q) use ($searchKey){
        $q->where('name', 'LIKE', '%' . $searchKey . '%')
        ->orWhere('description', 'LIKE', '%' . $searchKey . '%')
        ->orWhere('cost', 'LIKE', '%' . $searchKey . '%')
        ->orWhere('course_type', 'LIKE', '%' . $searchKey . '%');
      });
    }
    $sortfield ='id';
    if(@isset($data['sort']['field']) ){
      if(in_array($data['sort']['field'], array('course','id','cost','course_type','description'))){
        $sortfield =$data['sort']['field'];
      }else{
        $sortfield  = 'id';
      }
    }
    $sortorder ='ASC';
    if(@isset($data['sort']['sort'])){
      $sortorder =$data['sort']['sort'];
    }
    if($page ==1){ $offset = 0; }else{ $offset = $this->recordPerPage*($page-1); }
    $questiosData->where('is_deleted', '=', '0');
    $questiosData->offset($offset);
    $questiosData->limit($this->recordPerPage);
    $questiosData->orderBy($sortfield, $sortorder);
    $questiosData =	$questiosData->get()->toArray();
    $userCount = Courses::select('*');
    if(@isset($data['query']['coursegeneralSearch'])){
      $searchKey =$data['query']['coursegeneralSearch'];
      $userCount = $userCount->where(function($q) use ($searchKey){
        $q->where('name', 'LIKE', '%' . $searchKey . '%');
        $q->orWhere('description', 'LIKE', '%' . $searchKey . '%');
        $q->orWhere('cost', 'LIKE', '%' . $searchKey . '%');
        $q->orWhere('course_type', 'LIKE', '%' . $searchKey . '%');
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
  public function courseadd(Request $request)
  {
    $data = $request->all();
    $validator = Validator::make($request->all(), [
      'name'=> 'required|min:5|max:256',
      'cost'=> 'required',
      'start_date'=> 'required|date',
      'end_date'=> 'required|date|after_or_equal:start_date',
    ]);

    if ($validator->fails()) {
      return response(array("status"=>"fail", "code"=>400,'message' => $validator->errors(),"data" => $data));
    }else{
      $input['name'] =$data['name'];
      $input['description'] =$data['description'];
      $input['cost'] =$data['cost'];
      $input['course_type'] =$data['course_type'];
      $input['start_date'] =$data['start_date'];
      $input['end_date'] =$data['end_date'];
      $course = Courses::create($input);
      return response(array("status"=>"success", "code"=>200,"data" => $data));
    }
  }
  
  
  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return \App\User
  */
  public function createcoursesection(Request $request)
  {
    $data = $request->all();
    $validator = Validator::make($request->all(), [
      'coursesectionname'=> 'required|min:5|max:256',     
    ]);
    if ($validator->fails()) {
      return response(array("status"=>"fail", "code"=>400,'message' => $validator->errors(),"data" => $data));
    }else{
      $input['section_name'] =$data['coursesectionname'];
      $input['course_id'] =$data['CourseId'];
    
      $course = CourseSections::create($input);
      return response(array("status"=>"success", "code"=>200,"data" => $data));
    }
  }
  
  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return \App\User
  */
  public function createcoursequiz(Request $request)
  {
    $data = $request->all();
    $validator = Validator::make($request->all(), [
      'quize_name'=> 'required|min:5|max:256',    
      'quize_desc'=> 'required|min:5|max:256',     
    ]);
	
	
	
    if ($validator->fails()) {
      return response(array("status"=>"fail", "code"=>400,'message' => $validator->errors(),"data" => $data));
    }else{
      $inputQuiz['quize_name'] =$data['quize_name'];
      $inputQuiz['quize_desc'] =$data['quize_desc'];	
	$inputQuiz['course_id'] =$data['CourseId'];	  
		
	  $course = CourseQuize::create($inputQuiz);
	 $course->id;
	$i=0;	
	  foreach($data['sub_question'] as $questionsObj ){
		  
      $inputQuizSection['sub_questions'] =$data['sub_question'][$i];
      $inputQuizSection['questions'] =$data['obj_question'][$i];
      $inputQuizSection['section_id'] =$data['section'][$i];
      $inputQuizSection['course_id'] =$data['CourseId'];
      $inputQuizSection['course_quize_id'] = $course->id;
      $CourseQuizeSections = CourseQuizeSections::create($inputQuizSection);
	  $i++;
	  }
	  
      return response(array("status"=>"success", "code"=>200,"data" => $data));
    }
  }  
  
  
  /**
  * Create a new user instance after a valid registration.
  *
  * @param  array  $data
  * @return \App\User
  */
  public function updatecoursequiz(Request $request)
  {
    $data = $request->all();
    $validator = Validator::make($request->all(), [
      'quize_name'=> 'required|min:5|max:256',    
      'quize_desc'=> 'required|min:5|max:256',     
    ]);	
	
    if ($validator->fails()) {
      return response(array("status"=>"fail", "code"=>400,'message' => $validator->errors(),"data" => $data));
    }else{
		$edit_quiz_id=$data['edit_quiz_id'];
		$CourseQuize = CourseQuize::find($edit_quiz_id);
        $CourseQuize->quize_name    =$data['quize_name'];
        $CourseQuize->quize_desc    =$data['quize_desc'];
        $CourseQuize->save();		
		$i=0;	
	  foreach($data['sub_question'] as $questionsObj ){
		   $section_id =$data['section'][$i];
		    $quizDataTDB['sub_questions'] =$data['sub_question'][$i];
			$quizDataTDB['questions'] =$data['obj_question'][$i];
			\DB::table('course_quize_sections')->where('course_quize_id', $edit_quiz_id)->where('section_id', $section_id)->update($quizDataTDB);	
  
	  $i++;
	  }	  
      return response(array("status"=>"success", "code"=>200,"data" => $data));
    }
  }


   /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editcourse(Request $request)
    {
		$data = $request->all();
		$validator = Validator::make($request->all(), [
				'courseId' => 'required',
				'name' => 'required|min:5|max:256',
				'cost'=> 'required',

			]);
		if ($validator->fails()) {
			return response(array("status"=>"fail", "code"=>400,'message' => $validator->errors(),"data" => $data));
		}else{
			$id = $data['courseId'];

        $Course = Courses::find($id);
        $Course->name 				=  $request->get('name');
        $Course->cost 				=  $request->get('cost');
        $Course->course_type 		=  $request->get('course_type');
        $Course->description 		=  $request->get('description');

        $Course->save();
      return response(array("status"=>"success", "code"=>200,"data" => $Course));
    }}








public function parseImport(Request $request)
{	$data = $request->all();
    $file     = request()->file('file');
	$path = $file->getPathname();
	$CSVdata = array_map('str_getcsv', file($path));
	$alreadyExistingQuestion = array();
	$duplicateCourses =0;
	$optionLength =0;
	$header_added = $data['header_added'];
	if($header_added =='true'){
		array_shift($CSVdata);
	}

	foreach($CSVdata as $CSVRow){
			$course = $CSVRow['0'];
			$correctOption =$CSVRow['5'];
			if(strlen($correctOption)>1){
				$optionLength =1;
			}
		$QuestionRecord = Courses::where('is_deleted', '=', '0')->where('course', '=', $course)->get()->toArray();
		if(count($QuestionRecord)>=1){
			$alreadyExistingQuestion[]= $course;
			$duplicateCourses =1;
		}
	}
	if($duplicateCourses ==1){
		return response(array("status"=>"fail", "type"=>'duplicate', "code"=>200,"data" => $alreadyExistingQuestion));
	}elseif($optionLength ==1){
		return response(array("status"=>"fail", "type"=>'answerlength', "code"=>200,"data" => $alreadyExistingQuestion));
	}else{

		foreach($CSVdata as $CSVRow){
			$input = array();
			$input['course'] =$CSVRow['0'];
			$input['option_a'] =$CSVRow['1'];
			$input['option_b'] =$CSVRow['2'];
			$input['option_c'] =$CSVRow['3'];
			$input['option_d'] =$CSVRow['4'];
			$input['correct_option'] =$CSVRow['5'];
			$course = Courses::create($input);
		}
		return response(array("status"=>"success", "code"=>200,"data" => $course));
	}
}





public function deletecourse(Request $request)
{	$data = $request->all();
	$id = $data['courseIdDelete'];
	$Question = Courses::find($id);
    $Question->is_deleted 		=  1;
    $Question->save();
    return response(array("status"=>"success", "code"=>200,"data" => $Question));
}



public function deletesection(Request $request)
{	$data = $request->all();
	$id = $data['sectionIdDelete'];
	$Question = CourseSections::find($id);
    $Question->is_deleted 		=  1;
    $Question->save();
    return response(array("status"=>"success", "code"=>200,"data" => $Question));
}




public function updatesection(Request $request)
{	$data = $request->all();
	$id = $data['sectionIdUpdate'];
	$sectionName = $data['sectionNameUpdate'];
	$Question = CourseSections::find($id);
    $Question->section_name 		=  $sectionName;
    $Question->save();
    return response(array("status"=>"success", "code"=>200,"data" => $Question));
}






}