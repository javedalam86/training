<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateCourses extends Model
{
	protected $table = 'candidate_courses';
	public $timestamps = false;
   
    /**
    * The attributes that are mass assignable.
    * 
    * @var array   
    */
    protected $fillable = ['candidate_id','course_id','is_deleted'];
}
