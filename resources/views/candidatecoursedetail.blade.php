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
							Course
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
							Course Documents<span  style="display:none"  id="spinnerid" class="kt-spinner kt-spinner--sm kt-spinner--brand"></span>

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
									<a href="javascript:void(0)" onclick="openpdffile('<?php echo $BookDataObj['bookpath'];?>')" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="View">
									<i class="flaticon-eye"></i>
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
                  if(!$cqResult){
                    continue;
                  }
                  $quizeResult = $CourseQuizeDataObj->quizeResults()->orderBy('attempt_date','DESC')->get()->groupBy('attempt_date');
                  //$latest = current($quizeResult);
                  $latest = $quizeResult;
                  if($latest->isEmpty()){
                    continue;
                  }
                  $totalMarks = 0;
                @endphp
                @if(!$latest->isEmpty())
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
                      $passStatus = 'FAIL';
                      if($totalMarks >= 60){
                        $passStatus = 'PASS';
                      }
                    @endphp
                    <tr>
                      <td>{{$CourseQuizeDataObj['quize_name']}}</td>
                      <td>{{$objs[0]->attempt_date}}</td>
                      <td><b>{{ ($cqResult->is_evaluated == 1) ? number_format($totalMarks, 2) : '--'}}</b></td>
                      <td><b>{{ ($cqResult->is_evaluated == 1) ? $passStatus : 'Pending'}}</b> <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-sm" onclick=showevaluationmodal({{$obj->candidate_quize_id}})><i class="flaticon2-search"></i></a></td>
                    </tr>
                    @php
                      //break;
                      $totalMarks = 0;
                    @endphp
                  @endforeach
                @endif
              @endforeach

              @if(!$isQuizeReport)
                <tr><td colspan="4" align="center">No Quiz report available</td> </tr>
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

   <!--begin::Add Modal-->
  <div class="modal fade" id="candidate_result_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Quiz answers:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
        </div>

          <div class="modal-body" style="height: 350px; overflow-y: auto;">
            <div id='quizquestionList'> </div>
          </div>
          <div class="modal-footer"></div>
      </div>
    </div>
  </div>
  <!--end::Modal-->


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

		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/blitzer/jquery-ui.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.489/pdf.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.489/pdf.worker.js"></script>

  <script src="{{ asset('assetsadmin/js/easyPDF.js?v='.$scriptVer) }}" type="text/javascript"></script>

  <script type="text/javascript">
  setTimeout(function() {
    $('#ajaxmessagediv').fadeOut('fast');
  }, 1200);

	  var ROOT_PATH = '{{$ROOT_PATH}}';
	  var file64content = '';
	  var filetitle = '';
  function openpdffile(filePath){
	   $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name=_token]').attr('content')
            }
        });
	   $("#spinnerid").show();
	   $.ajax({
            type: "POST",
            url: ROOT_PATH+"/getfilecontent",
            data: {     "filePath": filePath         },
			//contentType: false, // The content type used when sending data to the server.
         //   cache: false, // To unable request pages to be cached
          //  processData: false,
                success: function(msg) {
				var status = msg.status;
				if(status =='success'){

                       file64content= msg.data.base64;
                       filetitle= msg.data.title;

					   easyPDF(file64content, filetitle);
				}else{



				}	  $("#spinnerid").hide();
                }
            });


	 /*
	  filetitle ='dddddd';


	  base = 'JVBERi0xLjcKCjEgMCBvYmogICUgZW50cnkgcG9pbnQKPDwKICAvVHlwZSAvQ2F0YWxvZwog' +
    'IC9QYWdlcyAyIDAgUgo+PgplbmRvYmoKCjIgMCBvYmoKPDwKICAvVHlwZSAvUGFnZXMKICAv' +
    'TWVkaWFCb3ggWyAwIDAgMjAwIDIwMCBdCiAgL0NvdW50IDEKICAvS2lkcyBbIDMgMCBSIF0K' +
    'Pj4KZW5kb2JqCgozIDAgb2JqCjw8CiAgL1R5cGUgL1BhZ2UKICAvUGFyZW50IDIgMCBSCiAg' +
    'L1Jlc291cmNlcyA8PAogICAgL0ZvbnQgPDwKICAgICAgL0YxIDQgMCBSIAogICAgPj4KICA+' +
    'PgogIC9Db250ZW50cyA1IDAgUgo+PgplbmRvYmoKCjQgMCBvYmoKPDwKICAvVHlwZSAvRm9u' +
    'dAogIC9TdWJ0eXBlIC9UeXBlMQogIC9CYXNlRm9udCAvVGltZXMtUm9tYW4KPj4KZW5kb2Jq' +
    'Cgo1IDAgb2JqICAlIHBhZ2UgY29udGVudAo8PAogIC9MZW5ndGggNDQKPj4Kc3RyZWFtCkJU' +
    'CjcwIDUwIFRECi9GMSAxMiBUZgooSGVsbG8sIHdvcmxkISkgVGoKRVQKZW5kc3RyZWFtCmVu' +
    'ZG9iagoKeHJlZgowIDYKMDAwMDAwMDAwMCA2NTUzNSBmIAowMDAwMDAwMDEwIDAwMDAwIG4g' +
    'CjAwMDAwMDAwNzkgMDAwMDAgbiAKMDAwMDAwMDE3MyAwMDAwMCBuIAowMDAwMDAwMzAxIDAw' +
    'MDAwIG4gCjAwMDAwMDAzODAgMDAwMDAgbiAKdHJhaWxlcgo8PAogIC9TaXplIDYKICAvUm9v' +
    'dCAxIDAgUgo+PgpzdGFydHhyZWYKNDkyCiUlRU9G';

    easyPDF(file64content, filetitle) */
  }





function showevaluationmodal(candidate_quiz_id){
	$('#candidate_result_Modal').modal('toggle');

    $.ajax({
        url: ROOT_PATH+"/ajaxquizeanswers",
       data: {
          "_token": "{{ csrf_token() }}",
          "candidate_quiz_id": candidate_quiz_id,
        },
		   dataType: 'json',
        success: function(result) {
            // get the ajax response data  resultData
			var QuestionListHTML='';
           // var QuestionList = res.resultData; alert(QuestionList);alert(res.resultData);alert(res.status);
		   var Qcount =1;
			$.each( result.resultData, function( key, value) {
			QuestionListHTML+='<div class="form-group row">\
                      <div class="col-lg-10">\
                          <label class="col-form-label kt-font-bolder">Question&nbsp;'+Qcount+' :&nbsp;</label><label>'+value.question+'</label>\
                      </div>\
					  <div class="col-lg-1">\
                         <label  class="col-form-label kt-font-bolder"><input type="hidden" name="quizresultId[]"  value="'+value.quize_result_id+'"><input type="text" name="marks[]"  readonly style="width:65px;" class="form-control" value="'+value.marks+'"></label>\
                      </div>\
					  <div class="col-lg-12">\
						<label>Answer&nbsp;:&nbsp;</label><label>'+value.selected_option+'</label>\
                      </div>\
                    </div>';
					Qcount++;
				});
          $('#quizquestionList').html(QuestionListHTML);

            // show modal
            //$('#myModal').modal('show');

        },
        error:function(request, status, error) {
            console.log("ajax call went wrong:" + request.responseText);
        }
    });
    }




  </script>





</body>
<!-- end::Body -->
@endsection
