<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseSections extends Model
{
	protected $table = 'course_sections';
	public $timestamps = false;
   
    /**
    * The attributes that are mass assignable.
    * 
    * @var array   
    */
    protected $fillable = ['course_id','section_name','is_deleted'];
}
