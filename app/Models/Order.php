<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $table = 'orders';
  public $timestamps = false;

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'course_id',
    'candidate_id',
    'payment_method',
    'payment_status',
    'payment_type',
    'price',
    'transaction_id',
    'payment_date',
    'added_date'
  ];
}
