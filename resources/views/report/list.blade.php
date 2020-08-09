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
                        <h3 class="kt-subheader__title"><i class="kt-font-brand flaticon-layer"></i> &nbsp; Manage Orders</h3>
                        <!--	<span class="kt-subheader__separator kt-subheader__separator--v"></span>	-->

                        <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                          <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
                          <span class="kt-input-icon__icon kt-input-icon__icon--right">
                            <span><i class="flaticon2-search-1"></i></span>
                          </span>
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
                                <div class="col-xl-12 order-2 order-xl-1">
                                  <form>
                                    <div class="row align-items-center">
                                         <div class="col-md-3 kt-form__group kt-form__group--inline" style="padding-right: 15px;">
                                            <div class="kt-form__label">
                                              <label>StartDate
                                              </label>
                                            </div>
                                            <div class="kt-form__control">
                                              <input type="text" class="form-control" placeholder="yyyy-mm-dd" id="startDate" autocomplete="off">
                                            </div>
                                          </div>
                                         <div class="col-md-3 kt-form__group kt-form__group--inline">
                                              <div class="kt-form__label">
                                                <label>EndDate
                                                </label>
                                              </div>
                                              <div class="kt-form__control">
                                                <input type="text" class="form-control" placeholder="yyyy-mm-dd" id="endDate" autocomplete="off">
                                              </div>
                                            </div>
                                        <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                                          <div class="kt-form__group kt-form__group--inline">
                                            <div class="kt-form__label">
                                              <label>Course
                                              </label>
                                            </div>
                                            <div class="kt-form__control">
                                              <select class="form-control bootstrap-select" id="kt_form_course">
                                                <option value="">All</option>
                                                  @if(!$courses->isEmpty())
                                                    @foreach ($courses as $course)
                                                      <option value="{{ $course->id}}">{{ $course->name}}</option>
                                                    @endforeach
                                                  @endif
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                                          <div class="kt-form__group kt-form__group--inline">
                                            <div class="kt-form__label">
                                              <label>Candidate</label>
                                            </div>
                                            <div class="kt-form__control">
                                              <select class="form-control bootstrap-select" id="kt_form_candidate">
                                                <option value="">All</option>
                                                  @if(!$candidates->isEmpty())
                                                    @foreach ($candidates as $candidate)
                                                      <option value="{{ $candidate->id}}">{{ $candidate->name}}</option>
                                                    @endforeach
                                                  @endif
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                                          <div class="kt-form__group kt-form__group--inline">
                                            <div class="kt-form__label">
                                              <input type="button" id="reportgeneralSearch" name="reportgeneralSearch" class="btn btn-brand"value="Search">
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                  </form>
                                  <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg d-xl-none" style="margin: 25px 0 0 0;"></div>
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
                        <div class="kt-reportdatatable" id="kt_table_1"></div>
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
 @include('report.js')
   </body>
<!-- end::Body -->
@endsection