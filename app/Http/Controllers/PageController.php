<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\PageImage;
use Illuminate\Validation\ValidationException;

class PageController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $pages = Pages::where('is_deleted', '=', '0')->orderBy('id', 'ASC' )->get();
    return view('page.index', compact('pages'));
  }


  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit(Request $request, $id)
  {
    $page = Pages::find($id);

    if(!$page) {
      throw ValidationException::withMessages(['ID' => 'Invalid Page ID']);
    }
    //TRAINING
    if($id == 1) {
      $pageImages = $page->pageImages()->where('type','=','image')->first();
      return view('page.trainingEdit', compact('page','pageImages'));
    } elseif ($id == 2) {
      //SERVICES
      $pageImages = $page->pageImages()->where('type','=','image')->get();
      return view('page.serviceEdit', compact('page','pageImages'));
    } elseif ($id == 3) {
      //ABOUT US
      $pageImages = $page->pageImages()->where('type','=','image')->get();
      return view('page.aboutusEdit', compact('page','pageImages'));
    } elseif ($id == 4) {
      //CONTACT US
      return view('page.contactEdit', compact('page'));
    } elseif ($id == 5) {
      //Home Page Header
      return view('page.headerEdit', compact('page'));
    }
    return view('page.edit', compact('page'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    $data =$request->all();
    $requiredFields = [
      'pagetitle'=>'required',
      'pagecontent'=>'required'
    ];


    //TRAINING
    if($id == 1) {
      $requiredFields['traningImage'] = 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
    } elseif ($id == 2) {
      //SERVICES
      $requiredFields['serviceImage1'] = 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
      $requiredFields['serviceImage2'] = 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
    } elseif ($id == 3) {
      //ABOUT US
      $requiredFields['aboutUsImage1'] = 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
      $requiredFields['aboutUsImage3'] = 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
      $requiredFields['aboutUsImage2'] = 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
    }

    $request->validate($requiredFields);

    $page = Pages::find($id);
    if(!$page) {
      throw ValidationException::withMessages(['ID' => 'Invalid Page ID']);
    }

    //TRAINING
    if($id == 1) {
      $pageImages = $page->pageImages()->where('type','=','image')->first();
      if ($request->hasfile('traningImage') ) {
        $traningImage = $request->traningImage->getClientOriginalName();
        $traningImage = pathinfo($traningImage,PATHINFO_FILENAME);
        $traningImage = trim($traningImage).time().'.'.$request->traningImage->getClientOriginalExtension();
        $request->traningImage->move(public_path('pageimages')."/"."training", $traningImage);
        if(!$pageImages) {
          $insertImg = [
            'cmspage_id' => $page->id,
            'url' => $traningImage,
            'type' => 'image',
            'title' => $data['imageTitle']
          ];
          PageImage::create($insertImg);
        } else {
          \File::delete('pageimages/training/'.$pageImages->url);
          $pageImages->url = $traningImage;
          $pageImages->save();
        }
      }

      if(!empty($data['imageTitle']) && $pageImages){
        $pageImages->title = $data['imageTitle'];
        $pageImages->save();
      }

    } elseif ($id == 2) {
      //SERVICES
      $pageImages = $page->pageImages()->where('type','=','image')->orderBy('id', 'asc' )->get();

      if ($request->hasfile('serviceImage1') ) {
        $serviceImage1 = $request->serviceImage1->getClientOriginalName();
        $serviceImage1 = pathinfo($serviceImage1,PATHINFO_FILENAME);
        $serviceImage1 = trim($serviceImage1).time().'.'.$request->serviceImage1->getClientOriginalExtension();
        $request->serviceImage1->move(public_path('pageimages')."/"."service", $serviceImage1);

        if($pageImages->isEmpty()) {
          $insertImg = [
            'cmspage_id' => $page->id,
            'url' => $serviceImage1,
            'type' => 'image',
            'title' => $data['imageTitle1']
          ];
          PageImage::create($insertImg);
        } else {
          \File::delete('pageimages/service/'.$pageImages[0]->url);
          $pageImages[0]->url = $serviceImage1;
          $pageImages[0]->save();
        }

      }

      if ($request->hasfile('serviceImage2') ) {
        $serviceImage2 = $request->serviceImage2->getClientOriginalName();
        $serviceImage2 = pathinfo($serviceImage2,PATHINFO_FILENAME);
        $serviceImage2 = trim($serviceImage2).time().'.'.$request->serviceImage2->getClientOriginalExtension();
        $request->serviceImage2->move(public_path('pageimages')."/"."service", $serviceImage2);
        if($pageImages->isEmpty()) {
          $insertImg = [
            'cmspage_id' => $page->id,
            'url' => $serviceImage2,
            'type' => 'image',
            'title' => $data['imageTitle2']
          ];
          PageImage::create($insertImg);
        } else {
          \File::delete('pageimages/service/'.$pageImages[1]->url);
          $pageImages[1]->url = $serviceImage2;
          $pageImages[1]->save();
        }
      }

      if(!empty($data['imageTitle1']) && isset($pageImages[0])){
        $pageImages[0]->title = $data['imageTitle1'];
        $pageImages[0]->save();
      }

      if(!empty($data['imageTitle2']) && isset($pageImages[1])){
        $pageImages[1]->title = $data['imageTitle2'];
        $pageImages[1]->save();
      }

    } elseif ($id == 3) {
      //ABOUT US
       $pageImages = $page->pageImages()->where('type','=','image')->orderBy('id', 'asc' )->get();

       if ($request->hasfile('aboutUsImage1') ) {
        $aboutUsImage1 = $request->aboutUsImage1->getClientOriginalName();
        $aboutUsImage1 = pathinfo($aboutUsImage1,PATHINFO_FILENAME);
        $aboutUsImage1 = trim($aboutUsImage1).time().'.'.$request->aboutUsImage1->getClientOriginalExtension();
        $request->aboutUsImage1->move(public_path('pageimages')."/"."aboutus", $aboutUsImage1);

        if($pageImages->isEmpty()) {
          $insertImg = [
            'cmspage_id' => $page->id,
            'url' => $aboutUsImage1,
            'type' => 'image',
            'title' => $data['imageTitle1']
          ];
          PageImage::create($insertImg);
        } else {
          \File::delete('pageimages/aboutus/'.$pageImages[0]->url);
          $pageImages[0]->url = $aboutUsImage1;
          $pageImages[0]->save();
        }

      }

      if ($request->hasfile('aboutUsImage2') ) {

        $aboutUsImage2 = $request->aboutUsImage2->getClientOriginalName();
        $aboutUsImage2 = pathinfo($aboutUsImage2,PATHINFO_FILENAME);
        $aboutUsImage2 = trim($aboutUsImage2).time().'.'.$request->aboutUsImage2->getClientOriginalExtension();
        $request->aboutUsImage2->move(public_path('pageimages')."/"."aboutus", $aboutUsImage2);

        if($pageImages->isEmpty()) {
          $insertImg = [
            'cmspage_id' => $page->id,
            'url' => $aboutUsImage2,
            'type' => 'image',
            'title' => $data['imageTitle2']
          ];
          PageImage::create($insertImg);
        } else {
          \File::delete('pageimages/aboutus/'.$pageImages[1]->url);
          $pageImages[1]->url = $aboutUsImage2;
          $pageImages[1]->save();
        }
      }

      if ($request->hasfile('aboutUsImage3') ) {
        $aboutUsImage3 = $request->aboutUsImage3->getClientOriginalName();
        $aboutUsImage3 = pathinfo($aboutUsImage3,PATHINFO_FILENAME);
        $aboutUsImage3 = trim($aboutUsImage3).time().'.'.$request->aboutUsImage3->getClientOriginalExtension();
        $request->aboutUsImage3->move(public_path('pageimages')."/"."aboutus", $aboutUsImage3);
        if($pageImages->isEmpty()) {
          $insertImg = [
            'cmspage_id' => $page->id,
            'url' => $aboutUsImage3,
            'type' => 'image',
            'title' => $data['imageTitle3']
          ];
          PageImage::create($insertImg);
        } else {
          \File::delete('pageimages/aboutus/'.$pageImages[2]->url);
          $pageImages[2]->url = $aboutUsImage3;
          $pageImages[2]->save();
        }
      }

      if(!empty($data['imageTitle1']) && isset($pageImages[0])){
        $pageImages[0]->title = $data['imageTitle1'];
        $pageImages[0]->save();
      }

      if(!empty($data['imageTitle2']) && isset($pageImages[1])){
        $pageImages[1]->title = $data['imageTitle2'];
        $pageImages[1]->save();
      }

      if(!empty($data['imageTitle3']) && isset($pageImages[2])){
        $pageImages[2]->title = $data['imageTitle3'];
        $pageImages[2]->save();
      }
    } elseif($id == 5) {

      if((int)$data['header_display_type'] === 0) {
        $pageImages = $page->pageImages()->where('type','=','image')->first();
        if ($request->hasfile('headerImage')) {
          $headerImage = $request->headerImage->getClientOriginalName();
          $headerImage = pathinfo($headerImage,PATHINFO_FILENAME);
          $headerImage = trim($headerImage).time().'.'.$request->headerImage->getClientOriginalExtension();
          $request->headerImage->move(public_path('pageimages')."/"."header", $headerImage);
          if(!$pageImages) {
            $insertImg = [
              'cmspage_id' => $page->id,
              'url' => $headerImage,
              'type' => 'image',
              'title' => $data['imageTitle']
            ];
            PageImage::create($insertImg);
          } else {
            \File::delete('pageimages/header/'.$pageImages->url);
            $pageImages->url = $headerImage;
            $pageImages->save();
          }
        }
      }

      if((int)$data['header_display_type'] === 1) {
        $pageImages = $page->pageImages()->where('type','=','video')->first();
         if(!$pageImages) {
            $insertImg = [
              'cmspage_id' => $page->id,
              'url' =>  $data['url'],
              'type' => 'video',
              'title' => $data['imageTitle']
            ];
            PageImage::create($insertImg);
          } else {
            $pageImages->url = $data['url'];
            $pageImages->save();
          }
      }

      if(!empty($data['imageTitle']) && $pageImages){
        $pageImages->title = $data['imageTitle'];
        $pageImages->save();
      }

      $page->header_display_type =  $request->get('header_display_type');
    }

    $page->pagetitle =  $request->get('pagetitle');
    $page->pagecontent =  $request->get('pagecontent');
    $page->save();
    return redirect('/pages')->with('success', 'page updated!');
  }
  
  
  
  
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