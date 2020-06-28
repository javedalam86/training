<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\PageImage;
use Illuminate\Validation\ValidationException;

class CmsPageController extends Controller
{
  
	
  public function auditsandinspections(Request $request)
  {
	$id =6;
    $pageContentData = Pages::find($id)->toarray();
	return view('auditsandinspections', ['page' => $pageContentData]);
  }
  
  public function lngspecific(Request $request)
  {
	$id =7;
    $pageContentData = Pages::find($id)->toarray();
	return view('lngspecific', ['page' => $pageContentData]);
  }
  public function corevalues(Request $request)
  {
	$id =8;
    $pageContentData = Pages::find($id)->toarray();
	return view('corevalues', ['page' => $pageContentData]);
  }
  public function vision(Request $request)
  {
	$id =9;
    $pageContentData = Pages::find($id)->toarray();
	return view('vision', ['page' => $pageContentData]);
  }
  public function mission(Request $request)
  {
	$id =10;
    $pageContentData = Pages::find($id)->toarray();
	return view('mission', ['page' => $pageContentData]);
  }
  
  
}
