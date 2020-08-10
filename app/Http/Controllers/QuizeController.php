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
use App\Models\CourseQuize;
use App\Models\CourseQuizeSections;
use App\Models\QuizeResult;
use App\Models\CandidateQuize;
use Redirect;
use Auth;
use Carbon\Carbon;

class QuizeController extends Controller
{
    public function quize(Request $request,$id)
    {
       $CourseQuize = CourseQuize::where('id', '=',$id)->orderBy('id', 'ASC' );
       $candQuiz = $CourseQuize->first()->candidateQuize()->where('candidate_id','=',Auth::user()->id)->first();
       $isQuizStartBtnShow = false;
       if(!$candQuiz || ($candQuiz->quiz_re_enabled == 0)){
        $isQuizStartBtnShow = true;
       }
       $CourseQuize = $CourseQuize->get()->toArray();

        return view('onlinequize', ['CourseQuize' => $CourseQuize,'QuizeId' => $id, 'isQuizStartBtnShow' => $isQuizStartBtnShow] );
    }

    public function ajaxgetquizequestion(Request $request){
        $data = $request->all();
        $QuizeId = $data['QuizeId'];

        $CourseQuize = CourseQuize::where('id', '=',$QuizeId)->orderBy('id', 'ASC' )->get()->toArray();

        $course_id = $CourseQuize[0]['course_id'];

        //Checked if quize already submitted
        $courseQuize = CourseQuize::where('id', '=',$QuizeId)->first();
        $candQuiz = $courseQuize->candidateQuize()
        ->where('candidate_id','=',Auth::user()->id)
        ->where('quiz_re_enabled','=',1)
        ->first();
        if($candQuiz){
          \Session::flash('error', 'Quiz already attempted!');
          return response()->json(array('status' => 'fail', "courseId"=>$course_id,'message'=>'Quiz already attempted!'));
        }

        $CourseQuizeSections = CourseQuizeSections::where('course_quize_id', '=',$QuizeId)->orderBy('id', 'ASC' )->get()->toArray();
      // print_r($CourseQuizeSections);



        //print_r($CourseQuize);
        $resultsQuestion = array();
        foreach($CourseQuizeSections as  $CourseQuizeSectionsObject){
            $section_id 	= $CourseQuizeSectionsObject['section_id'];
            $questionsCount 	= $CourseQuizeSectionsObject['questions'];
            $subQuestionsCount 	= $CourseQuizeSectionsObject['sub_questions'];
            $question_type   = $CourseQuizeSectionsObject['question_type'];
              //$Questions = Questions::where('is_deleted', '=', '0')->orderBy('id', 'ASC' )->get()->toArray();
			  if($questionsCount >=1){
            $Questions = Questions::where('course_id', '=',$course_id)->where('section_id', '=', $section_id)->where('question_type', '=', '0')->limit($questionsCount)->inRandomOrder()->get()->toArray();
			 	$resultsQuestion = (array_merge($resultsQuestion,$Questions));
			 }
			  if($subQuestionsCount>=1){
			$QuestionsSub = Questions::where('course_id', '=',$course_id)->where('section_id', '=', $section_id)->where('question_type', '=', '1')->limit($subQuestionsCount)->inRandomOrder()->get()->toArray();

			$resultsQuestion = (array_merge($resultsQuestion,$QuestionsSub));
			  }
        }

        //Insert quize strat date
        $candQuizeCount = CandidateQuize::where('quiz_id', '=',$QuizeId)
          ->where('candidate_id', '=',Auth::user()->id)
          ->where('is_deleted', '=',0)
          ->count();

        if($candQuizeCount == 0) {
          $cq = [
            'candidate_id' => Auth::user()->id,
            'quiz_id' => $QuizeId,
            'attempt_counter' => 0,
            'start_date_time' =>Carbon::now()
          ];
          CandidateQuize::create($cq);
        }

        return response()->json(array('status' => 'success', 'data'=>$resultsQuestion));
    }

    public function submitQuize(Request $request){
        $data = $request->all();
        $quizeRec = [];
        if(!empty($data) && (int)$data['totalQuestions']>0) {
          //Checked if quize already submitted
          $courseQuize = CourseQuize::where('id', '=',$data['quize_id'])->first();
          $candQuiz = $courseQuize->candidateQuize()
          ->where('candidate_id','=',Auth::user()->id)
          ->where('quiz_re_enabled','=',1)
          ->first();
          if($candQuiz){
            \Session::flash('error', 'Quiz already attempted!');
            return redirect()->route('candidatecoursedetail',['id'=>$data['course_id']]);
            exit();
          }



          $candQuize = CandidateQuize::where('quiz_id', '=',$data['quize_id'])
          ->where('candidate_id', '=',Auth::user()->id)
          ->where('is_deleted', '=',0)
          ->first();
          $attemptCount = (int)$candQuize->attempt_counter + 1;
          $attemptDate = date('Y-m-d H:i:s');
          for ($i=1; $i <= (int)$data['totalQuestions']; $i++) {
            $insert = [
                'quize_id' => $data['quize_id'],
                'section_id' => $data['question_section_id_'.$i],
                'question_id' => $data['question_id_'.$i],
                'question_type' => $data['question_type_'.$i],
                'candidate_quize_id' => $candQuize->id,
                'quiz_attempt_counter' => $attemptCount
            ];
            if(isset($data['option_'.$i])) {
               $insert['selected_option'] = $data['option_'.$i];
            } else {
              $insert['selected_option'] = null;
            }
            $insert['attempt_date'] = $attemptDate;

            //Check answer is correct
            if($data['question_type_'.$i] == '0'){
              if(isset($data['option_'.$i]) && ($data['option_'.$i] == $data['correct_option_'.$i])){
                $insert['marks'] = 10;
              } else {
                 $insert['marks'] = 0;
              }
            } else {
               $insert['marks'] = null;
            }

            QuizeResult::create($insert);
          }

           //Insert quize strat date
          $candQuize->end_date_time = Carbon::now();
          $candQuize->attempt_counter = $attemptCount;
          $candQuize->is_evaluated = 0;
          $candQuize->quiz_re_enabled = 1;
          $candQuize->save();
          //Update Status
          /*$courseQuize = CourseQuize::where('id', '=',$data['quize_id'])->first();
          $courseQuize->course_quize_status = 2;
          $courseQuize->save();
          */

        } else {
          \Session::flash('error', 'Invalid Request');
          return Redirect::back()->withInput();
        }

        \Session::flash('success', 'Quiz completed Successfully');

        return redirect()->route('candidatecoursedetail',['id'=>$data['course_id']]);
    }



    public function toggleQuizStatus(Request $request){
        $data = $request->all();
        if(!empty($data)) {

          $courseQuize = CourseQuize::where('id', '=',$data['quizeId'])->first();
		  if($courseQuize->course_quize_status == 1){
			$courseQuize->course_quize_status =0;
		  }else{ 	$courseQuize->course_quize_status =1;}
          $courseQuize->save();

        } else {
           return response()->json(array('status' => 'fail', 'data'=>$courseQuize));
        }

         return response()->json(array('status' => 'success', 'data'=>$courseQuize));
    }


	public function quizdetaileditmodal(Request $request,$id)
    {
        $CourseQuize = CourseQuize::where('id', '=',$id)->orderBy('id', 'ASC' )->get()->toArray();
        $CourseQuizeSection = CourseQuizeSections::where('course_quize_id', '=',$id)->get()->toArray();
	    $resultDataTable['CourseQuize'] = $CourseQuize;
		$resultDataTable['CourseQuizeSection'] = $CourseQuizeSection;

        return json_encode($resultDataTable);
    }


}