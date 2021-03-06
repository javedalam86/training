<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
  protected $table = 'cmspages';
  public $timestamps = false;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = ['pagekey','pagecontent','pagetitle','metaTitle','metaDesc','metaKeywords','canonical','robots','is_deleted','header_display_type'];

  public function pageImages()
  {
      return $this->hasMany('App\Models\PageImage','cmspage_id', 'id');
  }
}
