@extends('layouts.admin')
@section('content')
@php $scriptVer =  Config::get('constants.SCRIPT_VERSION'); @endphp
@php $ROOT_PATH =  Config::get('constants.ROOT_PATH'); @endphp
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
                <h3 class="kt-subheader__title"><i class="kt-font-brand flaticon2-list"></i> &nbsp; Course Details</h3>
                <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                	<input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
                	<span class="kt-input-icon__icon kt-input-icon__icon--right">
                		<span><i class="flaticon2-search-1"></i></span>
                	</span>
                </div>
              </div>
              <div class="kt-subheader__toolbar">
                <div class="kt-subheader__wrapper">
                  <button type="button" class="btn btn-brand btn-icon-sm" ><a href="{{ URL::previous() }}" style="color:white;"> <i class="flaticon2-plus"></i> Go Back</a></button>
                </div>
              </div>
            </div>
          </div>


          <!-- begin:: Content -->
          <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


		  <!--
            <div id='ajaxmessagediv'></div>
            <div class="kt-portlet kt-portlet--mobile">
              <div class="kt-portlet__body">

                <div class="kt-portlet__body">
                  <div class="form-group form-group-xs row">

                    <label class="col-2 col-form-label">Course Name:</label>
                    <div class="col-8">
                      <span class="form-control-plaintext kt-font-bolder">{{$Course['name']}}	</span>
                    </div>
                  </div>
                  <div class="form-group form-group-xs row">

                    <label class="col-2 col-form-label">Description:</label>
                    <div class="col-8">
                      <span class="form-control-plaintext kt-font-bolder">{{$Course['description']}}</span>
                    </div>
                  </div>
                  <div class="form-group form-group-xs row">

                    <label class="col-2 col-form-label">Course Type:</label>
                    <div class="col-8">
                      <span class="form-control-plaintext kt-font-bolder">{{$Course['course_type']}}</span>
                    </div>
                  </div>
                  <div class="form-group form-group-xs row">

                    <label class="col-2 col-form-label">Price:</label>
                    <div class="col-8">
                      <span class="form-control-plaintext kt-font-bolder">{{$Course['cost']}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			-->

       @if ($message = Session::get('success'))
          <div class="col-md-12">
            <div class="alert alert-success in">
              <div class="col-md-11">
                <i class="fa fa-check faa-pulse animated"></i>
                <strong>Success: </strong>
                {{ $message }}
              </div>
               <div class="col-md-1">
                <button type="button" class="close pull-right" data-dismiss="alert">&times;</button>
               </div>
            </div>
          </div>
       @endif

      @if ($message = Session::get('error'))
        <div class="col-md-12">
          <div class="alert alert alert-danger in">
            <div class="col-md-11">
              <i class="fa fa-exclamation-circle faa-pulse animated"></i>
             <strong>Error: </strong>
             {{ $message }}
            </div>
             <div class="col-md-1">
              <button type="button" class="close pull-right" data-dismiss="alert">&times;</button>
             </div>
          </div>
        </div>
      @endif


			<div class="kt-portlet kt-portlet--mobile">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							Course Details
						</h3>
					</div>
				</div>
				<div class="kt-portlet__body">
					<div class="form-group form-group-xs row">
                        <label class="col-2 col-form-label kt-font-bolder">Course Name:</label>
						<div class="col-8">
							<span class="form-control-plaintext ">{{$Course['name']}}	</span>
						</div>
					</div>
					<div class="form-group form-group-xs row">
                        <label class="col-2 col-form-label kt-font-bolder">Description:</label>
						<div class="col-8">
							<span class="form-control-plaintext ">{{$Course['description']}}</span>
						</div>
					</div>
					<div class="form-group form-group-xs row">
                        <label class="col-2 col-form-label kt-font-bolder">Course Type:</label>
						<div class="col-8">
							<span class="form-control-plaintext ">{{$Course['course_type']}}</span>
						</div>
					</div>
					<div class="form-group form-group-xs row">
						<label class="col-2 col-form-label kt-font-bolder">Price:</label>
						<div class="col-8">
						  <span class="form-control-plaintext ">{{$Course['cost']}}</span>
						</div>
					</div>
				</div>
			</div>


			<div class="kt-portlet kt-portlet--mobile">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							Course Documents
						</h3>
					</div>
				</div>
				<div class="kt-portlet__body">
					<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
						<thead>
							<tr>
								<th>Document Name</th>
								<th>Description</th>
								<th>Download</th>

							</tr>
						</thead>
						<tbody>
							@foreach ($BookData as $BookDataObj)
							<?php  $bookpath = $ROOT_PATH.'/file-download/'.$BookDataObj['bookpath']; ?>
							<tr>
								<td>{{$BookDataObj['cname']}}</td>
								<td> {{$BookDataObj['description']}}</td>
								<td>
									<a href="<?php echo  $bookpath;?>" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Download">
									<i class="flaticon-download"></i>
									</a>
								</td>

							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>





@if(!$CourseQuizeData->isEmpty())
			<div class="kt-portlet kt-portlet--mobile">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							Course Quiz
						</h3>
					</div>
				</div>
				<div class="kt-portlet__body">
					<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
						<thead>
							<tr>
								<th>Quiz Name</th> <!--
								<th>Quiz Date</th> -->
								<th></th>


							</tr>
						</thead>
						<tbody>
							@foreach ($CourseQuizeData as $CourseQuizeDataObj)
								<?php $quizeLink = $ROOT_PATH.'/quiz/'.$CourseQuizeDataObj->id ?>
                @php
                  $cqResult = $CourseQuizeDataObj->candidateQuize() ->where('candidate_id','=',Auth::user()->id)
                  ->where('is_deleted','=',0)
                  ->first();

                  if($cqResult) {
                    if((int)$cqResult->quiz_re_enabled === 1){
                      continue;
                    }
                  }
                @endphp
							<tr>
								<td>{{$CourseQuizeDataObj->quize_name}}</td> <!--
								<td>{{$CourseQuizeDataObj->start_date}}</td>  -->
								<td> <a href="{{ $quizeLink }}"><button type="reset" id="startQuizBtn" class="btn btn-success"> Quiz</button></a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
    @endif

    @if(!$CourseQuizeData->isEmpty())
      <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head">
          <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
              Course Quiz Report
            </h3>
          </div>
        </div>
        <div class="kt-portlet__body">
          <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
            <thead>
              <tr>
                <th>Quiz Name</th>
                <th>Quiz Attempt Date</th>
                <th>Total % </th>
                <th>Status </th>
              </tr>
            </thead>
            <tbody>
              @php
                $isQuizeReport = false;
              @endphp
              @foreach ($CourseQuizeData as $CourseQuizeDataObj)
                @php

                  $cqResult = $CourseQuizeDataObj->candidateQuize() ->where('candidate_id','=',Auth::user()->id)
                  ->where('is_deleted','=',0)
                  ->first();

                  $quizeResult = $CourseQuizeDataObj->quizeResults()->orderBy('attempt_date','DESC')->get()->groupBy('attempt_date');
                  $latest = current($quizeResult);
                  if(empty($latest)){
                    continue;
                  }
                  $totalMarks = 0;
                @endphp
                @if(!empty($latest))
                  @foreach ($latest as $objs)
                    @php
                    $isQuizeReport = true;;
                    $totalQues = count($objs);
                    @endphp
                    @foreach ($objs as $obj)
                      @php
                      //echo "<pre>";print_r($obj);
                      if(!empty($obj->marks)) {
                        $totalMarks = $totalMarks + (int)$obj->marks;
                      }
                      @endphp
                    @endforeach
                    @php
                      $totalMarks = ($totalMarks / ($totalQues*10)) *100;
                    @endphp
                    <tr>
                      <td>{{$CourseQuizeDataObj['quize_name']}}</td>
                      <td>{{$objs[0]->attempt_date}}</td>
                      <td><b>{{ ($cqResult->is_evaluated == 1) ? number_format($totalMarks, 2) : '--'}}</b></td>
                      <td><b>{{$cqResult->quiz_result}}</b></td>
                    </tr>
                    @php
                      break;
                    @endphp
                  @endforeach
                @endif
              @endforeach

              @if(!$isQuizeReport)
                <tr><td colspan="4" align="center">No Quize report available</td> </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    @endif


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
  <script src="{{ asset('assetsadmin/js/pages/dashboard.js?v='.$scriptVer) }}" type="text/javascript"></script>
  <script src="{{ asset('assetsadmin/js/pages/custom/user/profile.js?v='.$scriptVer) }}" type="text/javascript"></script>
  <script type="text/javascript">
  setTimeout(function() {
    $('#ajaxmessagediv').fadeOut('fast');
  }, 1200);
  </script>
</body>
<!-- end::Body -->
@endsection
