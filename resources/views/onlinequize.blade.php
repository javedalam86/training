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
									<h3 class="kt-subheader__title"><i class="kt-font-brand flaticon-layer"></i> &nbsp; Quize:</h3> 
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
										 <button type="button" class="btn btn-brand btn-icon-sm" ><a href="{{ URL::previous() }}" style="color:white;"> <i class="flaticon2-plus"></i> Go Back</a>                                       
                                    </button>									
									</div>
								</div>
							</div>
						</div>

						<!-- end:: Content Head -->


						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
							<div class="row">
								<div class="col-lg-12">
									<div class="kt-portlet portlet-fit full-height-content full-height-content-scrollable bordered">
										<div class="col-lg-12 kt-portlet__head">
											<div class="col-lg-12 kt-portlet__head-label">								
												<div class=" col-lg-12 kt-align-center">
													<button type="reset" id="startQuizBtn" class="btn-lg btn-danger">Start Quize</button>
												</div>
											</div>
										</div>
										<div class="kt-section__info"> <ul>
											 <li>Other Quize instructions willl come here.</li>
											 <li>Other Quize instructions willl come here.</li>
											 <li>Other Quize instructions willl come here.</li>
											 <li>Other Quize instructions willl come here.</li>
										  </ul>
										</div>									
									</div>	
									
								</div>
							</div>	
									
						
						
							<div class="row" >
								<div class="col-lg-12" id="quizeQuestionContainer" style="display:none">		
									<!--begin::Portlet-->
									<div class="kt-portlet portlet-fit full-height-content full-height-content-scrollable bordered">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title" id="questionInfo">
													Question No 1 of 10:
												</h3>
											</div>
										</div>

										<!--begin::Form
										<form class="kt-form kt-form--label-right">-->
											<div class="kt-portlet__body" id="quizeQuestionsDiv">
											
												
											</div>
											
											
											
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<div class="row">
														<div class="col-lg-6">
														
															<button type="button" onclick="showPreviousQuestion()" class="btn btn-secondary">Privious Question</button>
																<button type="button" onclick="showNextQuestion()" class="btn btn-primary">Next Question</button>
														</div>
														<div class="col-lg-6 kt-align-right">
															<button type="reset" class="btn btn-danger">Submit Quize</button>
														</div>
													</div>
												</div>
											</div>
										<!--</form>

										end::Form-->
									</div>

									<!--end::Portlet-->
								</div>												
							</div>
                </div>
   <!-- end:: Content -->





               <!-- begin:: Content 
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
				<div id='ajaxmessagediv'></div>
                    <div class="kt-portlet kt-portlet--mobile">
                       
                        <div class="kt-portlet__body">                         
                    	<div class="kt-portlet__body">						
						Quize will come here..					
												
						</div>											
												
                            
                        </div>
												
                    </div>
                </div>
-->
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

var currentQuestionId =0;
var totalQuestions=0;
	$('body').on('click',"#startQuizBtn",function(){	
 currentQuestionId =0;
 totalQuestions=0;	
		/*$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});	*/	
		var courseId = 31;
		$.ajax({
			type: "POST",
			url: "./ajaxgetquizequestion",
			 data: {
                    "_token": "{{ csrf_token() }}", courseId:courseId},
			success: function(msg){		
				if(msg.status=='fail'){
					/*$.each( msg.casedata.errors, function( key, value) {
						for(var l=0;l<value.length; l++){
							var fieldErrorId =  'error_'+editloanid+'_'+key;
							
							fieldErrorId = fieldErrorId.replace('.','');							
							$("#"+fieldErrorId).text(value);						
						}
					});
						*/  
				}else{
				
					var questionsList = '';	
					$.each( msg.data, function( key, value) { totalQuestions++;
					var question_id = "question_"+key;			
					var option_name = "option_"+(key+1);			
					questionsList +='<div id='+question_id+' class="questionsList" style="display:none">\
										<div class="form-group row">\
											<div class="col-lg-12">\
												<label>'+value.question+'</label>\
											</div>\
										</div>\
										<div class="form-group row">\
											<div class="col-lg-6">\
												<div class="kt-radio-inline">\
													<label class="kt-radio kt-radio--solid">\
														<input type="radio" name="'+option_name+'"  class="quetsionoptions"  value="1">'+value.option_a+'<span></span>\
													</label>\
												</div>\
											</div>\
											<div class="col-lg-6">\
												<div class="kt-radio-inline">\
													<label class="kt-radio kt-radio--solid">\
														<input type="radio" name="'+option_name+'"  class="quetsionoptions" value="2">'+value.option_b+'<span></span>\
													</label>\
												</div>\
											</div>\
										</div>\
										<div class="form-group row">\
											<div class="col-lg-6">\
												<div class="kt-radio-inline">\
													<label class="kt-radio kt-radio--solid">\
														<input type="radio" name="'+option_name+'" class="quetsionoptions" value="3">'+value.option_c+'<span></span>\
													</label>\
												</div>\
											</div>\
											<div class="col-lg-6">\
												<div class="kt-radio-inline">\
													<label class="kt-radio kt-radio--solid">\
														<input type="radio" name="'+option_name+'" class="quetsionoptions"  value="4">'+value.option_d+'<span></span>\
													</label>\
												</div>\
											</div>\
										</div>\
									</div>';
					
					}); 
$("#quizeQuestionsDiv").html(questionsList);
$("#question_0").show();
$("#quizeQuestionContainer").show();
setquestioninfo();

					/*
					removeblur(editloanid);
				caseDataObject.casedata = msg.casedata.data;
				loadLoanstable();	
				
				
				alert("Success..")				
				setLoanCalcData(editloanid); toReloadTheLoanViewDivContent(editloanid);  */
				} 
				//$("#edit-loan-spinner_"+editloanid).hide();
			}
		}); 		
	});
function showNextQuestion(){  

if(currentQuestionId >=(totalQuestions-1)){ return true; }
		currentQuestionId++; 
	$(".questionsList").hide();
	$("#question_"+currentQuestionId).show();	
	setquestioninfo();
}
function showPreviousQuestion(){
	if(currentQuestionId ==0){ return true; }
	currentQuestionId--;	
	$(".questionsList").hide();
	$("#question_"+currentQuestionId).show();
	setquestioninfo();	
}
function setquestioninfo(){
	var QuestionInfoHTML ='Question No '+(currentQuestionId+1)+' of '+totalQuestions+':';
	
	$("#questionInfo").html(QuestionInfoHTML);
}

$(document).on("change", '.quetsionoptions', function(event){
	
   // var ElementId 		= $(this).attr("id"); 
	var ElementName 	= $(this).attr("name");
	var Elementvalue 	= $(this).attr("value");
	alert(ElementName+'---'+Elementvalue);
});
</script>

    <!--end::Global Theme Bundle -->
    <!--begin::Page Vendors(used by this page)
   <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script> -->
    <!--end::Page Vendors -->
    <!--begin::Page Scripts(used by this page) 
   <script src="{{ asset('assets/js/pages/crud/datatables/data-sources/ajax-server-side1.js') }}" type="text/javascript"></script>-->


   
   </body>
<!-- end::Body -->
@endsection