@extends('layouts.admin')
@section('content')
@php $scriptVer =  Config::get('constants.SCRIPT_VERSION'); @endphp

@php
  if(!$pageImages->isEmpty()) {
    $imageTitle1 = $pageImages[0]->title;
    $imageTitle2 = $pageImages[1]->title;
    $imageUrl1 = $pageImages[0]->url;
    $imageUrl2 = $pageImages[1]->url;
  } else {
    $imageTitle1 = "";
    $imageTitle2 = "";
    $imageUrl1 = "";
    $imageUrl2 = "";
  }
@endphp

<!-- end::Head -->
<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
   <!-- begin:: Page -->
  @include('layouts.adminmobileheader')
  <div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
       @include('layouts.sidebar')
    </div>
    <!-- end:: Aside -->
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
      @include('layouts.adminheader')
      <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
        <div class="kt-subheader  kt-grid__item" id="kt_subheader">
          <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
              <h3 class="kt-subheader__title"><i class="kt-font-brand flaticon-users-1"></i> &nbsp; Update Page: {{ $page->pagetitle }}</h3>
            </div>
          </div>
        </div>
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
          <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__body">
              <div class="kt-userdatatable" id="kt_table_1">
                <div class="row">
                  <div class="col-sm-8 offset-sm-1">
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                      <br />
                    @endif
                    <form method="post" action="{{ route('pages.update', $page->id) }}" enctype="multipart/form-data">
                      @method('PATCH')
                      @csrf
                      <div class="form-group">
                        <label for="pagetitle">Page Title:</label>
                        <input type="text" class="form-control" name="pagetitle" value="{{ $page->pagetitle ?? '' }}" />
                      </div>

                      <div class="form-group">
                        <label for="pagetitle">Image 1:</label>
                        <input type="file" class="form-control" name="serviceImage1" />
                      </div>
                      @if(!empty($imageUrl1))
                        <div class="col-md-4 col-md-offset-3">
                          <img id="serviceImage1Preview" src="{{url('/')}}/pageimages/service/{{ $imageUrl1 }}" style="max-width: 200px;">
                      </div>
                      @endif

                       <div class="form-group">
                        <label for="pagetitle">Image Title 1:</label>
                        <input type="text" class="form-control" name="imageTitle1" value="{{ $imageTitle1 ?? '' }}" />
                      </div>

                       <div class="form-group">
                        <label for="pagetitle">Image 2:</label>
                        <input type="file" class="form-control" name="serviceImage2" />
                      </div>
                      @if(!empty($imageUrl2))
                      <div class="col-md-4 col-md-offset-3">
                          <img id="serviceImage2Preview" src="{{url('/')}}/pageimages/service/{{ $imageUrl2 }}" style="max-width: 200px;">
                      </div>
                       @endif
                       <div class="form-group">
                        <label for="pagetitle">Image Title 2:</label>
                        <input type="text" class="form-control" name="imageTitle2" value="{{ $imageTitle2 ?? '' }}" />
                      </div>

                      <div class="form-group">
                        <label for="last_name">Page Content:</label>
                	     <textarea name="pagecontent" class="summernote" rows="18">{{ $page->pagecontent ?? '' }}</textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Update</button>
                      <a href="/pages" class="btn btn-default">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- end:: Content -->
      </div>
      <!-- begin:: Footer -->
      @include('layouts.adminfooter')
      <!-- end:: Footer -->
    </div>
  </div>
   <!-- end:: Page -->
  @include('layouts.adminotherpanels')
   <!-- begin::Global Config(global config for global JS sciprts) -->
  <script>
    var KTAppOptions = {
      "colors": {
        "state": {
          "brand": "#2c77f4",
          "light": "#ffffff",
          "dark": "#282a3c",
          "primary": "#5867dd",
          "success": "#34bfa3",
          "info": "#36a3f7",
          "warning": "#ffb822",
          "danger": "#fd3995"
        },
        "base": {
          "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
          "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
        }
      }
    };
  </script>
   <!-- end::Global Config -->
   <!--begin::Global Theme Bundle(used by all pages) -->
   <script src="{{ asset('assetsadmin/plugins/global/plugins.bundle.js?v='.$scriptVer) }}" type="text/javascript"></script>

   <script src="{{ asset('assetsadmin/js/scripts.bundle.js?v='.$scriptVer) }}" type="text/javascript"></script>

  <script src="{{ asset('assetsadmin/js/pages/crud/forms/widgets/summernote.js?v='.$scriptVer) }}" type="text/javascript"></script>


  <script>
  $('.summernote').summernote({
    height: 300,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,             // set maximum height of editor
    focus: true                  // set focus to editable area after initializing summernote
  });
  </script>

</body>
<!-- end::Body -->
@endsection