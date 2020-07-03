<?php
namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Config;
use App\Models\CandidateCourses;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Verified;

class UserController extends Controller
{
    
var $recordPerPage =10;

	function index(){
		
		return view('listuser');
		
	}
	
	
	
function ajaxuserslist(Request $request){
		$data = $request->all();
		$page =$data['pagination']['page'];	
		$per_page = $data['pagination']['perpage'];	
		if($per_page ==''){
		$per_page =10; }		
		$method='GET';
		$searchArray['per_page']=$per_page;
		$searchArray['page']	=$page;
		
	
		$usersData = User::select('users.id','users.name','users.last_name','users.photo_path','users.phone','users.email','users.email_verified_at','users.created_at','users.user_type','users.parent_company','u2.name as companyName');			
		if(@isset($data['query']['usergeneralSearch'])){
			$searchKey =$data['query']['usergeneralSearch'];	
			$usersData = $usersData->where(function($q) use ($searchKey){
				$q->where('name', 'LIKE', '%' . $searchKey . '%')
				->orWhere('email', 'LIKE', '%' . $searchKey . '%');
		});
		}	
		
		$usersData = $usersData->leftJoin('users as u2', function ($join) {
            $join->on('u2.id', '=', 'users.parent_company');
         });
		$sortfield ='users.id';
		if(@isset($data['sort']['field']) ){
			if(in_array($data['sort']['field'], array('users.name','users.email','users.id'))){
			$sortfield =$data['sort']['field'];
			}else{$sortfield  = 'users.id'; }
		}
		$sortorder ='ASC';
		if(@isset($data['sort']['sort'])){
			$sortorder =$data['sort']['sort'];
		}
		if($page ==1){ $offset = 0; }else{ $offset = $this->recordPerPage*($page-1); }
		$usersData->where('users.is_deleted', '=', '0');
		$usersData->where('users.user_type', '=', 'candidate');

		$usersData->offset($offset);
        $usersData->limit($this->recordPerPage);
		$usersData->orderBy($sortfield, $sortorder);
		$usersData =	$usersData->get()->toArray();
		
	
		$userCount = User::select('*');
		if(@isset($data['query']['generalSearch'])){
			$searchKey =$data['query']['generalSearch'];	
			$userCount = $userCount->where(function($q) use ($searchKey){
				$q->where('name', 'LIKE', '%' . $searchKey . '%')
				->orWhere('email', 'LIKE', '%' . $searchKey . '%');
		});
		}
		$userCount->where('is_deleted', '=', '0');
		$userCount->where('user_type', '=', 'candidate');

		$userCount =$userCount->get();			
		$totalRecord =$userCount->count();	
		
		$resultDataTable['data'] = $usersData;	
		$resultDataTable['meta']['page'] = $page;
		$resultDataTable['meta']['pages'] = ceil($totalRecord/$per_page);
		$resultDataTable['meta']['perpage'] = $per_page;
		$resultDataTable['meta']['total'] = $totalRecord;
			return json_encode($resultDataTable);
}
		
	 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function candidatedetail(Request $request, $id)
    {
      
        $CandidateData = User::where('is_deleted', '=', '0')->where('id', '=', $id)->get()->toArray();
		$Candidate =  $CandidateData[0];

		if($Candidate['parent_company']>=1){
			$CompanyData = User::where('is_deleted', '=', '0')->where('id', '=', $Candidate['parent_company'])->get()->toArray();
		
			$Candidate['companyName'] = $CompanyData[0]['name'];
		}else{
			$Candidate['companyName'] = 'N/A';
		}
		
		$CandidateCourseData = CandidateCourses::select('courses.id as id','courses.name as cname','courses.description as description');

		$CandidateCourseData->leftJoin('courses', function ($join) {
            $join->on('courses.id', '=', 'candidate_courses.course_id');
		});
		$CandidateCourseData->where('candidate_courses.candidate_id', '=', $id);
		$CandidateCourseData =	$CandidateCourseData->get()->toArray();
	    return view('candidatedetail', compact('Candidate','CandidateCourseData'));
    }
		
		
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_type' => 'candidate',
            'password' => Hash::make($data['password']),
        ]);
    } 
	/**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function createuser(Request $request)
    {		$data = $request->all();
			$validator = Validator::make($request->all(), [ 
				'userName' => 'required|min:5|max:20', 
				'userEmail' => 'required|email|unique:users,email,0,id,is_deleted,0',
			]);		
		if ($validator->fails()) { 
				//return response()->json(['error'=>$validator->errors()], 400);    
				return response(array("status"=>"fail", "code"=>400,'message' => $validator->errors(),"data" => $data));
			}else{
				$input['password'] = bcrypt('pass123'); 
				$input['name'] =$data['userName'];
				$input['email'] =$data['userEmail'];
				$input['user_type'] ='candidate';
				$user = User::create($input);
		
				return response(array("status"=>"success", "code"=>400,"data" => $data));
			}	
       
    }
	
	/**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function edituser(Request $request)
    {		$data = $request->all();
			$userId = $data['userId'];
			$validator = Validator::make($request->all(), [ 
				'userId' => 'required', 
				'userNameEdit' => 'required|min:5', 
				'userEmailEdit' => 'required|email|unique:users,email,'.$userId.',id,is_deleted,0',
			]);	
	
		if ($validator->fails()) { 
				//return response()->json(['error'=>$validator->errors()], 400);    
				return response(array("status"=>"fail", "code"=>400,'message' => $validator->errors(),"data" => $data));
			}else{
				
					//	echo '<pre>'; print_r($data); die;	
				//$input['password'] = bcrypt('pass123'); 
				$input['name'] =$data['userNameEdit'];
				$input['email'] =$data['userEmailEdit'];
				if(isset($data['userPasswordEdit']) && $data['userPasswordEdit']!==''){
					$input['password'] = bcrypt($data['userPasswordEdit']); 
				}
				
				User::whereId($userId)->update($input);
				//$user = User::create($input);
		
				return response(array("status"=>"success", "code"=>400,"data" => $data));
			}	
       
    }	
	/**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function deleteuser(Request $request)
    {		$data = $request->all();
			$userId = $data['userIdDelete'];
			$validator = Validator::make($request->all(), [ 
				'userIdDelete' => 'required'
			]);	
	
		if ($validator->fails()) { 
				//return response()->json(['error'=>$validator->errors()], 400);    
				return response(array("status"=>"fail", "code"=>400,'message' => $validator->errors(),"data" => $data));
			}else{
				
					//	echo '<pre>'; print_r($data); die;	
				//$input['password'] = bcrypt('pass123'); 
				$input['is_deleted'] =1;
				
				
				User::whereId($userId)->update($input);
				//$user = User::create($input);
		
				return response(array("status"=>"success", "code"=>400,"data" => $data));
			}	
       
    }
	
	
	
	/**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function registeruser(Request $request)
    { 
	
	$data =$request->all();	
	
	 $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);			
		if ($validator->fails()){ 
			return response(array("httpStatus"=>200,  "status"=>"fail", "message"=>"Validation error12", 'errors' => $validator->errors()),200);
		}else{
			
			User::create([
            'name' => $data['name'],
            'email' => $data['email'],
			'user_type' => $data['candidatetype'],
            'password' => Hash::make($data['password']),
        ]);
			return response(array("httpStatus"=>200,  "status"=>"success", "message"=>"Register successfully.."),200);	
		}	     
    }
		
	/**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function loginuserfrm(Request $request)
    { 
	
	$data =$request->all();	
	
	 $validator = Validator::make($data, [
            
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);			
		if ($validator->fails()){ 
			return response(array("httpStatus"=>200,  "status"=>"fail", "message"=>"Validation error12", 'errors' => $validator->errors()),200);
		}else{
			
			$email = $data['email'];
			$password = $data['password'];
			 if (Auth::attempt(['email' => trim($email),
                    'password' => $password,
                        ], $request->has('remember'))) {

			$message ='Login sucessfully redirecting to dashboard';
           return response(array("httpStatus"=>200,  "status"=>"success", "message"=>$message),200);

			
			
        } else {
            $message = 'These credentials do not match our records.';

           return response(array("httpStatus"=>200,  "status"=>"credentials", "message"=>$message),200);
			
			
			
		}
			
			
			
			
			return response(array("httpStatus"=>200,  "status"=>"fail", "message"=>"Validation error12"),200);
			     
    }
	
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}