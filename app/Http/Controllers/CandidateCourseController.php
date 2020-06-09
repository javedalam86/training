<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\Pages;
//use App\Models\MyCourses;
use App\Models\CandidateCourses;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Courses;
use App\Models\Books;
use App\Models\CourseQuize;

class CandidateCourseController extends Controller
{

	var $recordPerPage =20;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function candidatecourselist()
    {
       // $pages = Pages::all();
        $Courses = CandidateCourses::where('is_deleted', '=', '0')->orderBy('id', 'ASC' )->get();

        return view('candidatecourselist', compact('Courses'));
    }

    public function candidatecoursedetail(Request $request, $id)
    {
        $CourseData = courses::where('is_deleted', '=', '0')->where('id', '=', $id)->get()->toArray();

        $Course =  $CourseData[0];

        $BookData = Books::select('course_books.id as id','course_books.name as cname','course_books.description','type','course_books.name','course_id','bookpath');
        $BookData->leftJoin('courses', function ($join) {
            $join->on('courses.id', '=', 'course_books.course_id');
        });
        $BookData->where('course_books.course_id', '=', $id);
        $BookData =	$BookData->get()->toArray();

        $CourseQuizeData = CourseQuize::where('course_quize_status', '=', '1')->where('course_id', '=', $id)->get();
        return view('candidatecoursedetail', compact('Course','BookData','CourseQuizeData'));
    }


	public function candidatetest(Request $request)
    {
        $MyCourseData = User::where('is_deleted', '=', '0')->get()->toArray();
		$MyCourse =  $MyCourseData[0];
        return view('candidatetest', compact('MyCourse'));
    }

	function ajaxcandidatecourselist(Request $request){
		$data = $request->all();
		$page =$data['pagination']['page'];
		$per_page = $data['pagination']['perpage'];
		if($per_page ==''){
		$per_page =10; }
		$method='GET';
		$searchArray['per_page']=$per_page;
		$searchArray['page']	=$page;
		$candidateId = Auth::user()->id;

		$CourseData = CandidateCourses::select('courses.id as id','courses.name as cname','courses.description as description');

		$CourseData->leftJoin('courses', function ($join) {
            $join->on('courses.id', '=', 'candidate_courses.course_id');
		});
		$CourseData->where('candidate_courses.candidate_id', '=', $candidateId);
		//$CourseRawData =	$CourseData->get()->toArray();

		//$candidateData =  CandidateCourses::where('is_deleted', '=', '0')->orderBy('id', 'ASC' )->get();
		//$candidateData =  CandidateCourses::where('is_deleted', '=', '0')->orderBy('id', 'ASC' )->get();

		if(@isset($data['query']['coursegeneralSearch'])){
			$searchKey =$data['query']['coursegeneralSearch'];
			$CourseData = $CourseData->where(function($q) use ($searchKey){
				$q->where('name', 'LIKE', '%' . $searchKey . '%');
		});
		}
		$sortfield ='id';
		if(@isset($data['sort']['field']) ){
			if(in_array($data['sort']['field'], array('course','id'))){
			$sortfield =$data['sort']['field'];
			}else{ $sortfield  = 'candidate_courses.id'; }
		}
		$sortorder ='ASC';
		if(@isset($data['sort']['sort'])){
			$sortorder =$data['sort']['sort'];
		}
		if($page ==1){ $offset = 0; }else{ $offset = $this->recordPerPage*($page-1); }
		$CourseData->where('candidate_courses.is_deleted', '=', '0');
		$CourseData->offset($offset);
        $CourseData->limit($this->recordPerPage);
		$CourseData->orderBy($sortfield, $sortorder);
		$CourseData =	$CourseData->get()->toArray();


		//$userCount = CandidateCourses::select('*');
		$AllCourseData = CandidateCourses::select('courses.id as id','courses.name as cname','courses.description as description');
		$AllCourseData->leftJoin('courses', function ($join) {
            $join->on('courses.id', '=', 'candidate_courses.course_id');
		});
		$AllCourseData->where('candidate_courses.candidate_id', '=', $candidateId);


		if(@isset($data['query']['coursegeneralSearch'])){
			$searchKey =$data['query']['coursegeneralSearch'];
			$AllCourseData = $AllCourseData->where(function($q) use ($searchKey){
				$q->where('name', 'LIKE', '%' . $searchKey . '%');
		});
		}
		$AllCourseData->where('candidate_courses.is_deleted', '=', '0');
		$AllCourseData =$AllCourseData->get();
		$totalRecord =$AllCourseData->count();

		$resultDataTable['data'] = $CourseData;
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
    public function mycourseadd(Request $request)
    {		$data = $request->all();
			$validator = Validator::make($request->all(), [
				'name'=> 'required|min:5',

			]);
		if ($validator->fails()) {
			return response(array("status"=>"fail", "code"=>400,'message' => $validator->errors(),"data" => $data));
		}else{
			$input['name'] =$data['name'];
			$input['description'] =$data['description'];

			$course = MyCourses::create($input);
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
    public function editmycourse(Request $request)
    {
		$data = $request->all();
		$validator = Validator::make($request->all(), [
				'courseId' => 'required',
				'name' => 'required|min:5',

			]);
		if ($validator->fails()) {
			return response(array("status"=>"fail", "code"=>400,'message' => $validator->errors(),"data" => $data));
		}else{
			$id = $data['courseId'];

        $Course = MyCourses::find($id);
        $Course->name 		=  $request->get('name');
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
		$QuestionRecord = MyCourses::where('is_deleted', '=', '0')->where('course', '=', $course)->get()->toArray();
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
			$course = MyCourses::create($input);
		}
		return response(array("status"=>"success", "code"=>200,"data" => $course));
	}
}





public function deletemycourse(Request $request)
{	$data = $request->all();
	$id = $data['courseIdDelete'];
	$Question = MyCourses::find($id);
    $Question->is_deleted 		=  1;
    $Question->save();
    return response(array("status"=>"success", "code"=>200,"data" => $Question));
}






}