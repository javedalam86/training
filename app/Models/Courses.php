<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
  protected $table = 'courses';
  public $timestamps = false;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = ['name','description','cost','course_type','is_deleted','start_date','end_date','parent_id','color'];

  /**
  * Get the comments for the blog post.
  */
  public function order()
  {
    return $this->hasMany('App\Models\Order','course_id','id');
  }

}
