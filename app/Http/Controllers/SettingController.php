<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\Pages;
use App\Models\Books;
use App\Models\Courses;
use App\Models\Questions;
use App\Models\CourseQuize;
use App\Models\CourseQuizeSections;
use App\Models\Setting;
 use Redirect;

class SettingController extends Controller
{
    public function sitesetting(Request $request)
    {
       $SiteSetting = Setting::where('is_deleted', '=',0)->orderBy('id', 'ASC' )->get()->toArray();
        return view('sitesetting', ['SiteSetting' => $SiteSetting] );
    }

    public function updateSiteSettings(Request $request){
    }


}