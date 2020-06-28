<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
	protected $table = 'audit';
	public $timestamps = false;
   
    /**
    * The attributes that are mass assignable.  
    * 
    * @var array   
    */
    protected $fillable = ['audit_title','audit_text','auditdate','is_deleted','added_date','last_modified_date'];
}

