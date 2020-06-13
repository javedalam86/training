<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateQuize extends Model
{
  protected $table = 'candidate_quizes';
  public $timestamps = false;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = ['candidate_id','quiz_id','start_date_time','end_date_time',' is_evaluated','attempt_counter','quiz_re_enabled','quiz_result','is_deleted'];

 /**
   * Get the post that owns the comment.
   */
  public function courseQuize()
  {
      return $this->belongsTo('App\Models\CourseQuize','quiz_id','id');
  }

}

