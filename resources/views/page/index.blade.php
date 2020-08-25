@extends('layouts.admin')
@section('content')
@php $scriptVer =  Config::get('constants.SCRIPT_VERSION'); @endphp
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
              <h3 class="kt-subheader__title"><i class="kt-font-brand flaticon-users-1"></i> &nbsp; Manage Pages</h3>
            </div>
          </div>
        </div>
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
          <div id='ajaxmessagediv'></div>
           @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
          <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__body">
              <div class="kt-userdatatable" id="kt_table_1">
                <div class="row">
                  <div class="col-sm-12">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <td>ID</td>
                          <td>Page Title</td>
                         
                          <td colspan = 2>Actions</td>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($pages as $page)
                          <tr>
                            <td>{{$page->id}}</td>
                            <td>{{$page->pagetitle}}</td>
                         
                            <td>
                              <a href="{{ route('pages.edit',$page->id)}}" class="btn btn-primary">Edit</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
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
</div>
<!-- end:: Page -->
@include('layouts.adminotherpanels')
<!-- begin::Global Config(global config for global JS sciprts) -->

<!-- end::Global Config -->
<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{ asset('assetsadmin/plugins/global/plugins.bundle.js?v='.$scriptVer) }}" type="text/javascript"></script>
<script src="{{ asset('assetsadmin/js/scripts.bundle.js?v='.$scriptVer) }}" type="text/javascript"></script>
<script type="text/javascript">
  //$(function() {
    @if ($message = Session::get('success'))
      $('#ajaxmessagediv').show();
        $('#ajaxmessagediv').html('<div class="alert alert-success alert-dismissible">  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  <strong>Success!</strong> {{ $message }} </div>');
        setTimeout(function() {  $('#ajaxmessagediv').fadeOut('fast');}, 3000);
    @endif
  //});

</script>

</body>

@endsection