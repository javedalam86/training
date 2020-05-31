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



class QuizeController extends Controller
{
	
	 
    public function quize()
    {
        $Questions = Questions::where('is_deleted', '=', '0')->orderBy('id', 'ASC' )->get()->toArray();
        return view('onlinequize', ['Questions' => $Questions] );
    }	
	 
    public function ajaxgetquizequestion(Request $request){
		$data = $request->all();
		
        $Questions = Questions::where('is_deleted', '=', '0')->orderBy('id', 'ASC' )->get()->toArray();
      	return response()->json(array('status' => 'success', 'data'=>$Questions));
    }	
	
}