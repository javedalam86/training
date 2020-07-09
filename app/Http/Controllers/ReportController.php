<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Config;
use App\Models\Reports;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Verified;

class ReportController extends Controller 
{
    
var $recordPerPage =10;

	function reportlist(){
	
		return view('listreport');
		
	}
	
	
	
function ajaxreportlist(Request $request){
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
		
}