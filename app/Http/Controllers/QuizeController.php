<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Config;
use App\Models\Pages; 
use App\Models\Books; 
use App\Models\Courses;
use App\Models\Questions;
use App\Models\CourseQuizeSections;
use App\Models\CourseQuize;



class QuizeController extends Controller
{
	
	 
    public function quize(Request $request,$id)
    {
        $Questions = Questions::where('is_deleted', '=', '0')->orderBy('id', 'ASC' )->get()->toArray();
        return view('onlinequize', ['Questions' => $Questions,'QuizeId' => $id] );
    }	
	 
    public function ajaxgetquizequestion(Request $request){
		$data = $request->all();
		$QuizeId = $data['QuizeId'];
		$CourseQuizeSections = CourseQuizeSections::where('course_quize_id', '=',$QuizeId)->orderBy('id', 'ASC' )->get()->toArray();
		//print_r($CourseQuizeSections);
		
		
	$CourseQuize = CourseQuize::where('id', '=',$QuizeId)->orderBy('id', 'ASC' )->get()->toArray();
	
	$course_id = $CourseQuize[0]['course_id'];
	//print_r($CourseQuize);
		$resultsQuestion = array();
		foreach($CourseQuizeSections as  $CourseQuizeSectionsObject){
			$section_id 	= $CourseQuizeSectionsObject['section_id'];
            $questionsCount 	= $CourseQuizeSectionsObject['questions'];
            $question_type 	= $CourseQuizeSectionsObject['question_type'];
			
			//$Questions = Questions::where('is_deleted', '=', '0')->orderBy('id', 'ASC' )->get()->toArray();
			$Questions = Questions::where('course_id', '=',$course_id)->where('section_id', '=', $section_id)->limit($questionsCount)->orderBy('id', 'ASC' )->get()->toArray();

			$resultsQuestion = (array_merge($resultsQuestion,$Questions));
			
			
			
		}
		
		
        $Questions = Questions::where('is_deleted', '=', '0')->orderBy('id', 'ASC' )->get()->toArray();
      	return response()->json(array('status' => 'success', 'data'=>$resultsQuestion));
    }	
	
}