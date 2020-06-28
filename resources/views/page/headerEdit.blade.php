@extends('layouts.admin')
@section('content')
@php $scriptVer =  Config::get('constants.SCRIPT_VERSION'); @endphp

@php
if($page->header_display_type=="0"){
  $pageImages = $page->pageImages()->where('type','=','image')->first();
} else {
  $pageImages = $page->pageImages()->where('type','=','video')->first();
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
                        <input type="text" class="form-control" name="pagetitle" value="{{ $page->pagetitle }}" />
                      </div>
                       <div class="form-group">
                        <label for="pagetitle">Display Type:</label>
                        <input type="radio" name="header_display_type" value="0" {{ ($page->header_display_type=="0")? "checked" : "" }} /> &nbsp;Image&nbsp;
                        <input type="radio" name="header_display_type" value="1" {{ ($page->header_display_type=="1")? "checked" : "" }}/> &nbsp;Video&nbsp;
                      </div>
                      <div class="form-group headerImgDiv" {{ ($page->header_display_type=="0")? "" : "style=display:none" }}>
                        <label for="pagetitle">Image:</label>
                        <input type="file" class="form-control" name="headerImage" />
                      </div>
                      <div class="form-group headerVidDiv" {{ ($page->header_display_type=="1")? "" : "style=display:none" }}>
                        @php $pageVideo = $page->pageImages()->where('type','=','video')->first(); @endphp
                        <label for="pagetitle">video URL:</label>
                        <input type="text" class="form-control" name="url"  value="{{ $pageVideo->url ?? '' }}" />
                      </div>
                      @if(!empty($pageImages->url))
                      @php $pageImage = $page->pageImages()->where('type','=','image')->first(); @endphp
                      <div class="col-md-4 col-md-offset-3 headerImgDiv" {{ ($page->header_display_type=="0")? "" : "style=display:none" }}>
                          <img id="traningImagePreview" src="{{url('/')}}/pageimages/header/{{ $pageImage->url }}" style="max-width: 200px;" />
                      </div>
                       @endif
                       <div class="form-group" style="padding-top: 10px">
                        <label for="pagetitle">Image/Video Title:</label>
                        <input type="text" class="form-control" name="imageTitle" value="{{ $pageImages->title ?? '' }}" />
                      </div>

                      <div class="form-group">
                        <label for="last_name">Page Content:</label>
                	     <textarea name="pagecontent" class="summernote" rows="18">{{ $page->pagecontent }}</textarea>
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

 $(document).ready(function () {
  $('input[type=radio][name=header_display_type]').change(function() {
    if (this.value == '1') {
      $(".headerImgDiv").hide();
      $(".headerVidDiv").show();
    }
    else {
      $(".headerVidDiv").hide();
      $(".headerImgDiv").show();
    }
  });
});

  </script>

</body>
<!-- end::Body -->
@endsection