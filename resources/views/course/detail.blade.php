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
              <div class="kt-subheader__toolbar"> <!--
                <div class="kt-subheader__wrapper">
                  <button type="button" class="btn btn-brand btn-icon-sm" ><a href="{{ URL::previous() }}" style="color:white;"> <i class="flaticon2-plus"></i> Go Back</a></button>
                </div> -->
              </div>
            </div>
          </div>
          <!-- begin:: Content -->
          <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            
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
					
					<div class="form-group form-group-xs row">
						<label class="col-2 col-form-label kt-font-bolder">Sections:&nbsp;&nbsp;<button type="button" class="btn btn-brand btn-icon-sm" data-toggle="modal" data-target="#coursesectionadd_Modal" style=" height: 32px;padding-top:0px;padding-bottom:0px;"> <i class="flaticon2-plus"></i> Add</button></label>
						<div class="col-8">
						  <span class="form-control-plaintext ">
						  <?php $strSections ='';?>
							@foreach ($sectionsData as $sectionsDataObj)
								<?php $strSections.= $sectionsDataObj['section_name'].'<br> ';  ?>	
							@endforeach			  
							<?php echo  trim($strSections,', ');		?>
						  </span>
						</div>
					</div>
				</div>
			</div>
			
			
			<div class="kt-portlet kt-portlet--mobile">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							Course Quiz&nbsp;&nbsp;<button type="button" class="btn btn-brand btn-icon-sm" data-toggle="modal" data-target="#quizadd_Modal" style=" height: 32px;padding-top:0px;padding-bottom:0px;"> <i class="flaticon2-plus"></i> Add Quiz</button>
						</h3>
					</div>
				</div>
				<div class="kt-portlet__body">
				
				
					@foreach ($CourseQuize as $CourseQuizeObj)
				
					<div class="form-group form-group-xs row">
                        <label class="col-2 col-form-label kt-font-bolder">Quiz Name:</label>
						<div class="col-8">
							<span class="form-control-plaintext ">{{$CourseQuizeObj['quize_name']}}	</span>
						</div>
					</div>
					
					@endforeach			  
					
				
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
  
  
   <!--begin::Add course section Modal-->
  <div class="modal fade" id="coursesectionadd_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Course Section</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
        </div>
        {{ Form::open(array('method'=>'post','url' => 'coursesectionadd', 'id'=>'coursesectionadd')) }}
          <div class="modal-body">
            <div  style="display:none" id='addcoursemessage'> </div>
             
              <div class="form-group">
                <label for="course" class="form-control-label">Course Section:</label>
                <input type="text" class="form-control" required='required'  name="coursesectionname" id="coursesectionname">
              </div>
				
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Course Section</button>
          </div>
          <div class="modal-footer"></div>
        </form>
      </div>
    </div>
  </div>
  <!--end::Modal Add Section-->
  
  
   <!--begin::Add quizadd_Modal section Modal-->
  <div class="modal fade" id="quizadd_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Course Quiz</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
        </div>
        {{ Form::open(array('method'=>'post','url' => 'coursequizadd', 'id'=>'coursequizadd')) }}
          <div class="modal-body">
            <div  style="display:none" id='addquizmessage'> </div>
			
               <div class="form-group">
                <label for="course" class="form-control-label">Quiz Name:</label>
                <input type="text" class="form-control" required='required'  name="quize_name" id="quize_name">
              </div>
              <div class="form-group">
                <label for="course" class="form-control-label">Quiz Description:</label>
                <textarea id="quize_desc" class="form-control" name="quize_desc" rows="4" cols="50"></textarea>
              </div> 		  
			  @foreach ($sectionsData as $sectionsDataObj)
								
			
				<div class="form-group row">
					<div class="col-lg-12">
					<label for="course" class="form-control-label kt-font-bolder">{{$sectionsDataObj['section_name']}}</label></div>
						<div class="col-lg-6">
							<label class="">Objective questions:</label>
							<input type="number" name="obj_question[]"  id="obj_question[]"  class="form-control" placeholder="Enter question number">
						</div>
						<div class="col-lg-6">
							<label class="">Subjective questions:</label>
							<input  type="number" name="sub_question[]"  id="sub_question[]" class="form-control" placeholder="Enter question number">
						</div>
						<input type="hidden" name="section[]" value="{{$sectionsDataObj['id']}}">
				</div>
			@endforeach		
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Course Quiz</button>
          </div>
          <div class="modal-footer"></div>
        </form>
      </div>
    </div>
  </div>
  <!--end::Modal Add Section-->
  
  
  
  
  
  
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
  
  var ROOT_PATH = '{{$ROOT_PATH}}';
  var CourseId = '{{$CourseId}}';
  
    $('#coursesectionadd').on('submit', function(e) {
      e.preventDefault();
      //$("#addcoursemessage").hide();
      var coursesectionname = $('#coursesectionname').val();
    
      $.ajax({
        type: "POST",
        url: ROOT_PATH+"/createcoursesection",
        data: {
          "_token": "{{ csrf_token() }}",
          "coursesectionname": coursesectionname,
          "CourseId": CourseId,
        },
        success: function(msg) {
          var status = msg.status;
          if(status =='success'){
           // $('#courseadd_Modal').modal('toggle');

            $('#addcoursemessage').show();
            $('#addcoursemessage').html('<div class="alert alert-success alert-dismissible">  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  <strong>Success!</strong> Add Successfully.</div>');
            setTimeout(function() {  $('#addcoursemessage').fadeOut('fast');}, 3000);
			
				window.location.reload();
          }else{
            errorString='';
            $.each( msg.message, function( key, value) {
              for(var l=0;l<value.length; l++){
                errorString +=  value[l] +'<br/>' ;
              }
            });
            $("#addcoursemessage").show();
            $("#addcoursemessage").html("<strong>Error!</strong> "+errorString);
            $("#addcoursemessage").slideDown(function() {
              setTimeout(function() {
                $("#addcoursemessage").slideUp();
              }, 3000);
              //$("#addCompanyModal").trigger('reset');
            });
          }
        }
      });
    });  
	
	
    $('#coursequizadd').on('submit', function(e) {
      e.preventDefault();
      //$("#addcoursemessage").hide();    quize_desc  sub_question obj_question  quize_name
     var quize_desc 	= $('#quize_desc').val();
     var sub_question	= $('#sub_question').val();
     var obj_question   = $('#obj_question').val();
     var quize_name     = $('#quize_name').val();
     var data = $(this).serializeArray();
	 
	  data.push({
		   name: "_token", // These blank empty brackets are imp!
            value: "{{ csrf_token() }}"
		  
		  
        }); data.push({
		   name: "CourseId", // These blank empty brackets are imp!
            value: CourseId
		  
		  
        });
	 
      $.ajax({
        type: "POST",
        url: ROOT_PATH+"/createcoursequiz",
         dataType: "json",
    data: data,
        success: function(msg) {
          var status = msg.status;
          if(status =='success'){
           // $('#courseadd_Modal').modal('toggle');

            $('#addquizmessage').show();
            $('#addquizmessage').html('<div class="alert alert-success alert-dismissible">  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  <strong>Success!</strong> Add Successfully.</div>');
            setTimeout(function() {  $('#addquizmessage').fadeOut('fast');}, 3000);
			
				//window.location.reload();
          }else{
            errorString='';
            $.each( msg.message, function( key, value) {
              for(var l=0;l<value.length; l++){
                errorString +=  value[l] +'<br/>' ;
              }
            });
            $("#addquizmessage").show();
            $("#addquizmessage").html("<strong>Error!</strong> "+errorString);
            $("#addquizmessage").slideDown(function() {
              setTimeout(function() {
                $("#addquizmessage").slideUp();
              }, 3000);
              //$("#addCompanyModal").trigger('reset');
            });
          }
        }
      });
    });

  
  </script>
  
  
  
  
  
</body>
<!-- end::Body -->
@endsection