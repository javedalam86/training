<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{	
	
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {	$todayDate =  date("Y-m-dTH:i:s");
		$datetime=date(DATE_ISO8601, strtotime($todayDate));
		$userType= strtoupper( $request->user()->user_type);	
		$param= $request->route('id');

		if(strtoupper($role) !=$userType){  
		return response(array("httpStatus"=>403, "dateTime"=>$datetime, "status"=>"fail", "message"=>"This user does not have permission"),403);
		}
		else{
			return $next($request);
		}
		
    }
}
