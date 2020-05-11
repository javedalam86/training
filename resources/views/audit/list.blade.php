@extends('layouts.admin')
@section('content')
@php $scriptVer =  Config::get('constants.SCRIPT_VERSION'); @endphp
<!-- end::Head -->
<!-- begin::Body -->
<meta name="_token" content="{{ csrf_token() }}" />
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
  <!-- begin:: Page -->
  <!-- begin:: Header Mobile -->
  @include('layouts.adminmobileheader')
<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
      @include('layouts.sidebar')
    <!-- end:: Aside -->
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
      @include('layouts.adminheader')
<!-- end:: Header -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
            <!-- begin:: Content Head -->
            <div class="kt-subheader  kt-grid__item" id="kt_subheader">
                <div class="kt-container  kt-container--fluid ">
                    <div class="kt-subheader__main">
                        <h3 class="kt-subheader__title"><i class="kt-font-brand flaticon-layer"></i> &nbsp; Manage Audit</h3>
                        <!--	<span class="kt-subheader__separator kt-subheader__separator--v"></span>	-->

                        <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                          <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
                          <span class="kt-input-icon__icon kt-input-icon__icon--right">
                            <span><i class="flaticon2-search-1"></i></span>
                          </span>
                        </div>
                    </div>
                    <div class="kt-subheader__toolbar">
                      <div class="kt-subheader__wrapper">
                        <button type="button" class="btn btn-brand btn-icon-sm" data-toggle="modal" data-target="#auditadd_Modal"><i class="flaticon2-plus"></i> Add Audit</button>
                      </div>
                    </div>
                </div>
            </div>
            <!-- end:: Content Head -->
                <!-- begin:: Content -->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                <div id='ajaxmessagediv'></div>
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__body">
                    <!--begin: Search Form -->
                        <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                            <div class="row align-items-center">
                                <div class="col-xl-8 order-2 order-xl-1">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                            <div class="kt-input-icon kt-input-icon--left">
                                                <input type="text" class="form-control" placeholder="Search..." id="auditgeneralSearch">
                                                <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                                  <span><i class="la la-search"></i></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 order-1 order-xl-2 kt-align-right">
                                    <a href="#" class="btn btn-default kt-hidden">
                                        <i class="la la-cart-plus"></i> New Order
                                    </a>
                                    <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg d-xl-none"></div>
                                </div>
                            </div>
                        </div>
                        <!--end: Search Form -->
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit">
                        <!--begin: Datatable -->
                        <div class="kt-auditdatatable" id="kt_table_1"></div>
                        <!--end: Datatable -->
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
 @include('audit.modals')
 @include('audit.js')
   </body>
<!-- end::Body -->
@endsection