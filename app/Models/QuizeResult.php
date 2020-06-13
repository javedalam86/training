<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizeResult extends Model
{
  protected $table = 'quize_result';
  public $timestamps = false;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = ['quize_id','candidate_quize_id', 'section_id','question_id','selected_option','question_type','marks','attempt_date','quiz_attempt_counter'];

  /**
     * Get the post that owns the comment.
     */
    public function courseQuize()
    {
        return $this->belongsTo('App\Models\CourseQuize','quize_id','id');
    }
}

