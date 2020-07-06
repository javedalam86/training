@extends('layouts.admin') 
@section('content')
@php $scriptVer =  Config::get('constants.SCRIPT_VERSION'); @endphp
<!-- end::Head -->
<!-- begin::Body -->
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
									<h3 class="kt-subheader__title"><i class="kt-font-brand flaticon-users-1"></i> &nbsp; Candidate Details</h3> 
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
				<div id='ajaxmessagediv'></div>
                    <div class="kt-portlet kt-portlet--mobile">
                       
                        <div class="kt-portlet__body">

                            <!--begin: Search Form kt-portlet__body  -->
                    	<div class="kt-portlet__body">
												<div class="form-group form-group-xs row">
													<label class="col-2 col-form-label">First Name:</label>
													<div class="col-8">
														<span class="form-control-plaintext kt-font-bolder">{{$Candidate['name']}}	</span>
													</div>
												</div>
												<div class="form-group form-group-xs row">
													<label class="col-2 col-form-label">Date of Birth:</label>
													<div class="col-8">
														<span class="form-control-plaintext kt-font-bolder">{{$Candidate['dob']}}</span>
													</div>
												</div>												
												<?php	if($Candidate['photo_path'] ==''){
															$imageFullPath = '../userimage/default1.jpg';
														}else{
															$imageFullPath = '../userimage/'. $Candidate['photo_path']; 
														}
												?>
																		
												<div class="form-group form-group-xs row">
													<label class="col-2 col-form-label">Photo:</label>
													<div class="col-8">
													
													<div class="kt-avatar kt-avatar--outline" id="kt_user_avatar">
																		
															<div class="kt-avatar__holder" style="background-image: url(<?php echo $imageFullPath;?>);"></div>
													</div>
													</div>
												</div>
												<div class="form-group form-group-xs row">
													<label class="col-2 col-form-label">Phone:</label>
													<div class="col-8">
														<span class="form-control-plaintext kt-font-bolder">{{$Candidate['phone']}}</span>
													</div>
												</div>
												
												<div class="form-group form-group-xs row">
													<label class="col-2 col-form-label">Email:</label>
													<div class="col-8">
														<span class="form-control-plaintext kt-font-bolder">
															{{$Candidate['email']}}
														</span>
													</div>
												</div>
												<div class="form-group form-group-xs row">
													<label class="col-2 col-form-label">Company:</label>
													<div class="col-8">
														<span class="form-control-plaintext kt-font-bolder">{{$Candidate['companyName']}}</span>
													</div>
												</div>
											</div>
												
												
												
                            <!--end: Search Form -->
                        </div>
												
                    </div>
               
				
				
				
				
		<?php	if(!empty($CandidateCourseData)) { ?> 
      <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head">
          <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
              Course
            </h3>
          </div>
        </div>
        <div class="kt-portlet__body">
          <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
            <thead>
              <tr>
                <th>Quiz Name</th>
                <th>Quiz Attempt Date</th>
                
              </tr>
            </thead>
            <tbody>              
              @foreach ($CandidateCourseData as $CandidateCourseObj)              
                    <tr>
                      <td>{{$CandidateCourseObj['cname']}}</td> 
					  <td>{{$CandidateCourseObj['description']}}</td>
                    </tr>
              @endforeach              
            </tbody>
          </table>
        </div>
      </div>
		<?php } ?>
				
				
				
				
				
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
    <!--end::Global Theme Bundle -->
    <!--begin::Page Vendors(used by this page)
   <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script> -->
    <!--end::Page Vendors -->
    <!--begin::Page Scripts(used by this page) 
   <script src="{{ asset('assets/js/pages/crud/datatables/data-sources/ajax-server-side1.js') }}" type="text/javascript"></script>-->


   
   </body>
<!-- end::Body -->
@endsection