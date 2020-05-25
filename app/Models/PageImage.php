<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageImage extends Model
{
    protected $table = 'cmspage_images';
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['cmspage_id','url','title', 'type', 'created_at', 'updated_at','deleted_at'];

    public function cmspage()
    {
        return $this->belongsTo('App\Models\Pages','cmspage_id','id');
    }
}
