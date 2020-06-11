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

 use Redirect;

class QuizresultController extends Controller
{
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




















    public function updatesetting(Request $request){
		$data = $request->all();      
        if(!empty($data)) {
			//print_r($data); die;
			$arrayUpdateFileds = array('STAT_WORKS_COMPLETED_TEXT', 'STAT_WORKS_COMPLETED_VAL', 'STAT_TOTAL_CLIENTS_TEXT', 'STAT_TOTAL_CLIENTS_VAL', 'STAT_YEARS_OF_EXPERIENCE_TEXT', 'STAT_YEARS_OF_EXPERIENCE_VAL');		
			
			foreach($data as $dataKey=>$dataValue){
				if (in_array($dataKey, $arrayUpdateFileds)){
					$Setting = Setting::where('setting_key', '=',$dataKey)
					  ->first();
					$Setting->setting_value =$dataValue;
					$Setting->save();
				} 
			}
        } else {
          \Session::flash('error', 'Invalid Request');
          return Redirect::back()->withInput();
        }

        \Session::flash('success', 'Setting updated Successfully');

        return redirect()->route('sitesetting');		
    }
}