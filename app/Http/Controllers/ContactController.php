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


class ContactController extends Controller
{
    //
     public function index()
    {
        return view('ajaxFormSubmit.contact_form');
    }       

    public function store(Request $request)
    {  
              
        $data = $request->all();
		
		$validator = Validator::make($request->all(), [
			    'contectname' => 'required|min:4|max:25',
			    'contectemail' => 'required|min:4|max:25',
    			
    		],[

    			'contectname.required' => ' The  name field is required.',
    			'contectname.min' => ' The  name must be at least 4 characters.',
    			'contectname.max' => ' The  name may not be greater than 25 characters.',
				'contectemail.required' => ' The email  field is required.',
    			'contectemail.min' => ' The email  must be at least 4 characters.',
    			'contectemail.max' => ' The email  may not be greater than 25 characters.',
    			

    		]);
   		//$validator->validate();
		if ($validator->fails()){ 
				return response(array("httpStatus"=>200, "status"=>"fail", "message"=>"Validation error", 'errors' => $validator->errors()),200);
			}
		
		
       // $result = Contact::insert($data);
	   //  code to send mail 
	   $result =1;
        if($result){ 
        	$arr = array('msg' => 'Contact Sent Successfully!', 'status' => 'success');
        }
        return Response()->json($arr);
    }
}