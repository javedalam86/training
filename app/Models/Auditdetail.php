<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auditdetail extends Model
{
	protected $table = 'audit_detail';
	public $timestamps = false;
   
    /**
    * The attributes that are mass assignable.  
    * 
    * @var array   
    */
    protected $fillable = ['audit_id','details','auditdetaildate','is_deleted','added_date','last_modified_date'];
}


