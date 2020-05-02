<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\Pages;
use App\Models\Manual;

class QmsController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function qms()
  {
    $manuals = Manual::select('id','manual_text','manual_title','section_order')
    ->where('is_deleted', '=', '0')
    ->orderBy('section_order', 'ASC')
    ->get();
    return view('qms.index', ['manuals' => $manuals] );
  }
}