<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseQuize extends Model
{
  protected $table = 'course_quize';
  public $timestamps = false;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = ['quize_name','quize_desc','course_id','start_date','end_date','course_quize_status'];

   /**
     * Get the comments for the blog post.
     */
    public function quizeResults()
    {
        return $this->hasMany('App\Models\QuizeResult','quize_id','id');
    }

}

