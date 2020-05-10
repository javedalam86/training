<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\Pages;
use App\Models\Manual;
use App\Models\ModulePermission;
use Illuminate\Support\Facades\Auth;

class QmsController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function qms()
  {

    $tabPermission = [
      'manual'=>false,
      'internalAudit'=>false,
      'moC'=>false,
      'competencyList '=>false,
      'managementReviewMeeting '=>false,
      'form'=>false,
    ];

    $user = Auth::user();

    if($user) {

      $manuals = Manual::select('id','manual_text','manual_title','section_order')
      ->where('is_deleted', '=', '0')
      ->orderBy('section_order', 'ASC')
      ->get();

      $manualPermission = ModulePermission::select('id')
      ->where('user_id', '=', $user->id)
      ->where('module_id', '=', 1)
      ->first();

      if($manualPermission) {
        $tabPermission['manual'] = true;
      }

      return view('qms.index', [
        'tabPermission'=>$tabPermission,
        'manuals' => $manuals
      ]);

    } else {
      return view('qms.index', [
        'tabPermission'=>$tabPermission,'manuals' => []] );
    }
  }
}