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
									<h3 class="kt-subheader__title"><i class="kt-font-brand flaticon2-line-chart"></i> &nbsp; Dashboard</h3> 
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
                    <div class="kt-portlet kt-portlet--mobile">                        
                        <div class="kt-portlet__body">
						<div class="row">
						<?php  $routeName = Route::currentRouteName();							
							 $userType= Auth::user()->user_type;
							if(strtoupper($userType) == 'CANDIDATE'){
							?>			<div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
											<div class="kt-portlet kt-portlet--skin-solid kt-bg-danger">
											<div class="kt-portlet__head kt-portlet__head--noborder">
												<div class="kt-portlet__head-label">
													<span class="kt-portlet__head-icon">
														<i class="flaticon2-graphic"></i>
													</span>
													<h3 class="kt-portlet__head-title">
														My Courses
													</h3>
												</div>											
											</div>
											<div class="kt-portlet__body">
												Lorem Ipsum is simply dummy text of the printing and typesetting dummy text of the printing dummy text of the printing dummy text of the printing industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
											</div>
											</div>						
										</div>	
							<?php } 
								if(strtoupper($userType) == 'ADMIN'){
							?>			<div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
							<div class="kt-portlet kt-portlet--skin-solid kt-bg-danger">
										<div class="kt-portlet__head kt-portlet__head--noborder">
											<div class="kt-portlet__head-label">
												<span class="kt-portlet__head-icon">
													<i class="flaticon2-graphic"></i>
												</span>
												<h3 class="kt-portlet__head-title">
													Users
												</h3>
											</div>											
										</div>
										<div class="kt-portlet__body">
											Lorem Ipsum is simply dummy text of the printing and typesetting dummy text of the printing dummy text of the printing dummy text of the printing industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
										</div>
									</div>	</div>		<div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
									<div class="kt-portlet kt-portlet--skin-solid kt-bg-danger ">
										<div class="kt-portlet__head kt-portlet__head--noborder">
											<div class="kt-portlet__head-label">
												<span class="kt-portlet__head-icon">
													<i class="flaticon2-graphic"></i>
												</span>
												<h3 class="kt-portlet__head-title">
													Courses
												</h3>
											</div>											
										</div>
										<div class="kt-portlet__body">
											Lorem Ipsum is simply dummy text of the printing and typesetting dummy text of the printing dummy text of the printing dummy text of the printing industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
										</div>
									</div></div>	<div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
									<div class="kt-portlet kt-portlet--skin-solid kt-bg-danger ">
										<div class="kt-portlet__head kt-portlet__head--noborder">
											<div class="kt-portlet__head-label">
												<span class="kt-portlet__head-icon">
													<i class="flaticon2-graphic"></i>
												</span>
												<h3 class="kt-portlet__head-title">
													Companies
												</h3>
											</div>											
										</div>
										<div class="kt-portlet__body">
											Lorem Ipsum is simply dummy text of the printing and typesetting dummy text of the printing dummy text of the printing dummy text of the printing industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.
										</div>
									</div>						
						
							<?php } ?>
						
						
						
						
						
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

   

   
    <!-- end::Global Config -->
    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="{{ asset('assetsadmin/plugins/global/plugins.bundle.js?v='.$scriptVer) }}" type="text/javascript"></script>

    <script src="{{ asset('assetsadmin/js/scripts.bundle.js?v='.$scriptVer) }}" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->
    <!--begin::Page Vendors(used by this page)
   <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script> -->
    <!--end::Page Vendors -->
    <!--begin::Page Scripts(used by this page) 
   <script src="{{ asset('assets/js/pages/crud/datatables/data-sources/ajax-server-side1.js') }}" type="text/javascript"></script>-->


   </body>
<!-- end::Body -->
@endsection