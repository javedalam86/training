<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseQuizeSections extends Model
{
	protected $table = 'course_quize_sections';
	public $timestamps = false;
   
    /**
    * The attributes that are mass assignable.
    * 
    * @var array   
    */
    protected $fillable = ['course_quize_id','section_id','questions','sub_questions','question_type'];
}
