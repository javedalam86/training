@extends('layouts.admin') 
@section('content')
@php $scriptVer =  Config::get('constants.SCRIPT_VERSION'); @endphp
<!-- end::Head -->
            <!-- begin::Body -->
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >
       
    	<!-- begin:: Page -->
	 
<!-- begin:: Header Mobile -->
@include('layouts.adminmobileheader')

<!-- end:: Header Mobile -->
	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
			<!-- begin:: Aside -->
			 @include('layouts.sidebar')

		</div>
<!-- end:: Aside -->	

			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
				<!-- begin:: Header -->
				@include('layouts.adminheader')

		<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
											<!-- begin:: Content Head -->
<!-- <div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            
            <h3 class="kt-subheader__title">
                                    New Contact                           
            </h3>

            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total">
                                            Enter contact details and submit                                    </span>
                
                            </div>

                    </div>        
        <div class="kt-subheader__toolbar">

                            <a href="/metronic/preview/demo3/#.html" class="btn btn-default btn-bold">
                    
                    Back                </a>
            
                                                <div class="btn-group">
                        <button type="button" class="btn btn-brand btn-bold">
                                                        
                            Submit                        </button>
                        <button type="button" class="btn btn-brand btn-bold dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="kt-nav">
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-writing"></i>
                                        <span class="kt-nav__link-text">Save &amp; continue</span>
                                    </a>
                                </li>                            
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-medical-records"></i>
                                        <span class="kt-nav__link-text">Save &amp; add new</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-hourglass-1"></i>
                                        <span class="kt-nav__link-text">Save &amp; exit</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                                        
                    </div>
    </div>
</div>-->
<!-- end:: Content Head -->					
					<!-- begin:: Content -->
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="kt-portlet">
	<div class="kt-portlet__body kt-portlet__body--fit">
		<div class="kt-grid  kt-wizard-v1 kt-wizard-v1--white" id="kt_contacts_add" data-ktwizard-state="step-first">
			<!-- <div class="kt-grid__item">
				<!--begin: Form Wizard Nav -->
				<!-- <div class="kt-wizard-v1__nav">
					<div class="kt-wizard-v1__nav-items">
                        <!--doc: Replace A tag with SPAN tag to disable the step link click -->
						<!-- <div class="kt-wizard-v1__nav-item"  data-ktwizard-type="step" data-ktwizard-state="current">
							<div class="kt-wizard-v1__nav-body">
								<div class="kt-wizard-v1__nav-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--xl">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg>								</div>
								<div class="kt-wizard-v1__nav-label">
									1. Personal Information
								</div>
							</div>
                        </div>
						<div class="kt-wizard-v1__nav-item"  data-ktwizard-type="step">
							<div class="kt-wizard-v1__nav-body">
								<div class="kt-wizard-v1__nav-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--xl">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.98630124,11 4.48466491,11.0516454 4,11.1500272 L4,7 C4,5.8954305 4.8954305,5 6,5 L20,5 C21.1045695,5 22,5.8954305 22,7 L22,16 C22,17.1045695 21.1045695,18 20,18 L12.9835977,18 Z M19.1444251,6.83964668 L13,10.1481833 L6.85557487,6.83964668 C6.4908718,6.6432681 6.03602525,6.77972206 5.83964668,7.14442513 C5.6432681,7.5091282 5.77972206,7.96397475 6.14442513,8.16035332 L12.6444251,11.6603533 C12.8664074,11.7798822 13.1335926,11.7798822 13.3555749,11.6603533 L19.8555749,8.16035332 C20.2202779,7.96397475 20.3567319,7.5091282 20.1603533,7.14442513 C19.9639747,6.77972206 19.5091282,6.6432681 19.1444251,6.83964668 Z" fill="#000000"/>
    </g>
</svg>								</div>
								<div class="kt-wizard-v1__nav-label">
									2. Account Settings
								</div>
							</div>
						</div>
						<div class="kt-wizard-v1__nav-item"  data-ktwizard-type="step">
							<div class="kt-wizard-v1__nav-body">
								<div class="kt-wizard-v1__nav-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--xl">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" opacity="0.3" x="2" y="2" width="10" height="12" rx="2"/>
        <path d="M4,6 L20,6 C21.1045695,6 22,6.8954305 22,8 L22,20 C22,21.1045695 21.1045695,22 20,22 L4,22 C2.8954305,22 2,21.1045695 2,20 L2,8 C2,6.8954305 2.8954305,6 4,6 Z M18,16 C19.1045695,16 20,15.1045695 20,14 C20,12.8954305 19.1045695,12 18,12 C16.8954305,12 16,12.8954305 16,14 C16,15.1045695 16.8954305,16 18,16 Z" fill="#000000"/>
    </g>
</svg>								</div>
								<div class="kt-wizard-v1__nav-label">
									3. Address Details
								</div>
							</div>
						</div>
						<div class="kt-wizard-v1__nav-item" data-ktwizard-type="step">
							<div class="kt-wizard-v1__nav-body">
								<div class="kt-wizard-v1__nav-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--xl">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000"/>
        <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"/>
    </g>
</svg>								</div>
								<div class="kt-wizard-v1__nav-label">
									4. Review and Submit
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end: Form Wizard Nav -->
			<!-- </div>-->
			<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v1__wrapper">
				<!--begin: Form Wizard Form-->
                <form class="kt-form" id="kt_contacts_add_form">
                    <!--begin: Form Wizard Step 1-->
                    <div class="kt-wizard-v1__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                        <div class="kt-heading kt-heading--md">User's Profile Details:</div>
                        <div class="kt-section kt-section--first">
                            <div class="kt-wizard-v1__form">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="kt-avatar kt-avatar--outline" id="kt_contacts_add_avatar">
                                                        <div class="kt-avatar__holder" style="background-image: url(/metronic/themes/metronic/theme/default/demo3/dist/assets/media/users/300_10.jpg)"></div>
                                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                            <i class="fa fa-pen"></i>
                                                            <input type="file" name="kt_contacts_add_avatar">
                                                        </label>
                                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                            <i class="fa fa-times"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input class="form-control" type="text" value="Anna">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input class="form-control" type="text" value="Krox">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Company Name</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input class="form-control" type="text" value="Loop Inc.">
                                                    <span class="form-text text-muted">If you want your invoices addressed to a company. Leave blank to use your full name.</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                        <input type="text" class="form-control" value="+45678967456" placeholder="Phone" aria-describedby="basic-addon1">
                                                    </div>
                                                    <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                        <input type="text" class="form-control" value="anna.krox@loop.com" placeholder="Email" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-last row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Company Site</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Username" value="loop">
                                                        <div class="input-group-append"><span class="input-group-text">.com</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end: Form Wizard Step 1-->

                    <!--begin: Form Wizard Step 2-->
                     <!--<div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                        <div class="kt-section kt-section--first">
                            <div class="kt-wizard-v1__form">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="kt-section__body">
                                            <div class="form-group row">
                                                <div class="col-lg-9 col-xl-6">
                                                    <h3 class="kt-section__title kt-section__title-md">User's Account Details</h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <input class="form-control" type="text" value="Anna">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                        <input type="text" class="form-control" value="nick.watson@loop.com" placeholder="Email" aria-describedby="basic-addon1">
                                                    </div>
                                                    <span class="form-text text-muted">Email will not be publicly displayed. <a href="#" class="kt-link">Learn more</a>.</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Language</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <select class="form-control">
                                                        <option>Select Language...</option>
                                                        <option value="id">Bahasa Indonesia - Indonesian</option>
                                                        <option value="msa">Bahasa Melayu - Malay</option>
                                                        <option value="ca">Català - Catalan</option>
                                                        <option value="cs">Čeština - Czech</option>
                                                        <option value="da">Dansk - Danish</option>
                                                        <option value="de">Deutsch - German</option>
                                                        <option value="en" selected="">English</option>
                                                        <option value="en-gb">English UK - British English</option>
                                                        <option value="es">Español - Spanish</option>
                                                        <option value="eu">Euskara - Basque (beta)</option>
                                                        <option value="fil">Filipino</option>
                                                        <option value="fr">Français - French</option>
                                                        <option value="ga">Gaeilge - Irish (beta)</option>
                                                        <option value="gl">Galego - Galician (beta)</option>
                                                        <option value="hr">Hrvatski - Croatian</option>
                                                        <option value="it">Italiano - Italian</option>
                                                        <option value="hu">Magyar - Hungarian</option>
                                                        <option value="nl">Nederlands - Dutch</option>
                                                        <option value="no">Norsk - Norwegian</option>
                                                        <option value="pl">Polski - Polish</option>
                                                        <option value="pt">Português - Portuguese</option>
                                                        <option value="ro">Română - Romanian</option>
                                                        <option value="sk">Slovenčina - Slovak</option>
                                                        <option value="fi">Suomi - Finnish</option>
                                                        <option value="sv">Svenska - Swedish</option>
                                                        <option value="vi">Tiếng Việt - Vietnamese</option>
                                                        <option value="tr">Türkçe - Turkish</option>
                                                        <option value="el">Ελληνικά - Greek</option>
                                                        <option value="bg">Български език - Bulgarian</option>
                                                        <option value="ru">Русский - Russian</option>
                                                        <option value="sr">Српски - Serbian</option>
                                                        <option value="uk">Українська мова - Ukrainian</option>
                                                        <option value="he">עִבְרִית - Hebrew</option>
                                                        <option value="ur">اردو - Urdu (beta)</option>
                                                        <option value="ar">العربية - Arabic</option>
                                                        <option value="fa">فارسی - Persian</option>
                                                        <option value="mr">मराठी - Marathi</option>
                                                        <option value="hi">हिन्दी - Hindi</option>
                                                        <option value="bn">বাংলা - Bangla</option>
                                                        <option value="gu">ગુજરાતી - Gujarati</option>
                                                        <option value="ta">தமிழ் - Tamil</option>
                                                        <option value="kn">ಕನ್ನಡ - Kannada</option>
                                                        <option value="th">ภาษาไทย - Thai</option>
                                                        <option value="ko">한국어 - Korean</option>
                                                        <option value="ja">日本語 - Japanese</option>
                                                        <option value="zh-cn">简体中文 - Simplified Chinese</option>
                                                        <option value="zh-tw">繁體中文 - Traditional Chinese</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Time Zone</label>
                                                <div class="col-lg-9 col-xl-9">
                                                    <select class="form-control">
                                                        <option data-offset="-39600" value="International Date Line West">(GMT-11:00) International Date Line West</option>
                                                        <option data-offset="-39600" value="Midway Island">(GMT-11:00) Midway Island</option>
                                                        <option data-offset="-39600" value="Samoa">(GMT-11:00) Samoa</option>
                                                        <option data-offset="-36000" value="Hawaii">(GMT-10:00) Hawaii</option>
                                                        <option data-offset="-28800" value="Alaska">(GMT-08:00) Alaska</option>
                                                        <option data-offset="-25200" value="Pacific Time (US &amp; Canada)">(GMT-07:00) Pacific Time (US &amp; Canada)</option>
                                                        <option data-offset="-25200" value="Tijuana">(GMT-07:00) Tijuana</option>
                                                        <option data-offset="-25200" value="Arizona">(GMT-07:00) Arizona</option>
                                                        <option data-offset="-21600" value="Mountain Time (US &amp; Canada)">(GMT-06:00) Mountain Time (US &amp; Canada)</option>
                                                        <option data-offset="-21600" value="Chihuahua">(GMT-06:00) Chihuahua</option>
                                                        <option data-offset="-21600" value="Mazatlan">(GMT-06:00) Mazatlan</option>
                                                        <option data-offset="-21600" value="Saskatchewan">(GMT-06:00) Saskatchewan</option>
                                                        <option data-offset="-21600" value="Central America">(GMT-06:00) Central America</option>
                                                        <option data-offset="-18000" value="Central Time (US &amp; Canada)">(GMT-05:00) Central Time (US &amp; Canada)</option>
                                                        <option data-offset="-18000" value="Guadalajara">(GMT-05:00) Guadalajara</option>
                                                        <option data-offset="-18000" value="Mexico City">(GMT-05:00) Mexico City</option>
                                                        <option data-offset="-18000" value="Monterrey">(GMT-05:00) Monterrey</option>
                                                        <option data-offset="-18000" value="Bogota">(GMT-05:00) Bogota</option>
                                                        <option data-offset="-18000" value="Lima">(GMT-05:00) Lima</option>
                                                        <option data-offset="-18000" value="Quito">(GMT-05:00) Quito</option>
                                                        <option data-offset="-14400" value="Eastern Time (US &amp; Canada)">(GMT-04:00) Eastern Time (US &amp; Canada)</option>
                                                        <option data-offset="-14400" value="Indiana (East)">(GMT-04:00) Indiana (East)</option>
                                                        <option data-offset="-14400" value="Caracas">(GMT-04:00) Caracas</option>
                                                        <option data-offset="-14400" value="La Paz">(GMT-04:00) La Paz</option>
                                                        <option data-offset="-14400" value="Georgetown">(GMT-04:00) Georgetown</option>
                                                        <option data-offset="-10800" value="Atlantic Time (Canada)">(GMT-03:00) Atlantic Time (Canada)</option>
                                                        <option data-offset="-10800" value="Santiago">(GMT-03:00) Santiago</option>
                                                        <option data-offset="-10800" value="Brasilia">(GMT-03:00) Brasilia</option>
                                                        <option data-offset="-10800" value="Buenos Aires">(GMT-03:00) Buenos Aires</option>
                                                        <option data-offset="-9000" value="Newfoundland">(GMT-02:30) Newfoundland</option>
                                                        <option data-offset="-7200" value="Greenland">(GMT-02:00) Greenland</option>
                                                        <option data-offset="-7200" value="Mid-Atlantic">(GMT-02:00) Mid-Atlantic</option>
                                                        <option data-offset="-3600" value="Cape Verde Is.">(GMT-01:00) Cape Verde Is.</option>
                                                        <option data-offset="0" value="Azores">(GMT) Azores</option>
                                                        <option data-offset="0" value="Monrovia">(GMT) Monrovia</option>
                                                        <option data-offset="0" value="UTC">(GMT) UTC</option>
                                                        <option data-offset="3600" value="Dublin">(GMT+01:00) Dublin</option>
                                                        <option data-offset="3600" value="Edinburgh">(GMT+01:00) Edinburgh</option>
                                                        <option data-offset="3600" value="Lisbon">(GMT+01:00) Lisbon</option>
                                                        <option data-offset="3600" value="London">(GMT+01:00) London</option>
                                                        <option data-offset="3600" value="Casablanca">(GMT+01:00) Casablanca</option>
                                                        <option data-offset="3600" value="West Central Africa">(GMT+01:00) West Central Africa</option>
                                                        <option data-offset="7200" value="Belgrade">(GMT+02:00) Belgrade</option>
                                                        <option data-offset="7200" value="Bratislava">(GMT+02:00) Bratislava</option>
                                                        <option data-offset="7200" value="Budapest">(GMT+02:00) Budapest</option>
                                                        <option data-offset="7200" value="Ljubljana">(GMT+02:00) Ljubljana</option>
                                                        <option data-offset="7200" value="Prague">(GMT+02:00) Prague</option>
                                                        <option data-offset="7200" value="Sarajevo">(GMT+02:00) Sarajevo</option>
                                                        <option data-offset="7200" value="Skopje">(GMT+02:00) Skopje</option>
                                                        <option data-offset="7200" value="Warsaw">(GMT+02:00) Warsaw</option>
                                                        <option data-offset="7200" value="Zagreb">(GMT+02:00) Zagreb</option>
                                                        <option data-offset="7200" value="Brussels">(GMT+02:00) Brussels</option>
                                                        <option data-offset="7200" value="Copenhagen">(GMT+02:00) Copenhagen</option>
                                                        <option data-offset="7200" value="Madrid">(GMT+02:00) Madrid</option>
                                                        <option data-offset="7200" value="Paris">(GMT+02:00) Paris</option>
                                                        <option data-offset="7200" value="Amsterdam">(GMT+02:00) Amsterdam</option>
                                                        <option data-offset="7200" value="Berlin">(GMT+02:00) Berlin</option>
                                                        <option data-offset="7200" value="Bern">(GMT+02:00) Bern</option>
                                                        <option data-offset="7200" value="Rome">(GMT+02:00) Rome</option>
                                                        <option data-offset="7200" value="Stockholm">(GMT+02:00) Stockholm</option>
                                                        <option data-offset="7200" value="Vienna">(GMT+02:00) Vienna</option>
                                                        <option data-offset="7200" value="Cairo">(GMT+02:00) Cairo</option>
                                                        <option data-offset="7200" value="Harare">(GMT+02:00) Harare</option>
                                                        <option data-offset="7200" value="Pretoria">(GMT+02:00) Pretoria</option>
                                                        <option data-offset="10800" value="Bucharest">(GMT+03:00) Bucharest</option>
                                                        <option data-offset="10800" value="Helsinki">(GMT+03:00) Helsinki</option>
                                                        <option data-offset="10800" value="Kiev">(GMT+03:00) Kiev</option>
                                                        <option data-offset="10800" value="Kyiv">(GMT+03:00) Kyiv</option>
                                                        <option data-offset="10800" value="Riga">(GMT+03:00) Riga</option>
                                                        <option data-offset="10800" value="Sofia">(GMT+03:00) Sofia</option>
                                                        <option data-offset="10800" value="Tallinn">(GMT+03:00) Tallinn</option>
                                                        <option data-offset="10800" value="Vilnius">(GMT+03:00) Vilnius</option>
                                                        <option data-offset="10800" value="Athens">(GMT+03:00) Athens</option>
                                                        <option data-offset="10800" value="Istanbul">(GMT+03:00) Istanbul</option>
                                                        <option data-offset="10800" value="Minsk">(GMT+03:00) Minsk</option>
                                                        <option data-offset="10800" value="Jerusalem">(GMT+03:00) Jerusalem</option>
                                                        <option data-offset="10800" value="Moscow">(GMT+03:00) Moscow</option>
                                                        <option data-offset="10800" value="St. Petersburg">(GMT+03:00) St. Petersburg</option>
                                                        <option data-offset="10800" value="Volgograd">(GMT+03:00) Volgograd</option>
                                                        <option data-offset="10800" value="Kuwait">(GMT+03:00) Kuwait</option>
                                                        <option data-offset="10800" value="Riyadh">(GMT+03:00) Riyadh</option>
                                                        <option data-offset="10800" value="Nairobi">(GMT+03:00) Nairobi</option>
                                                        <option data-offset="10800" value="Baghdad">(GMT+03:00) Baghdad</option>
                                                        <option data-offset="14400" value="Abu Dhabi">(GMT+04:00) Abu Dhabi</option>
                                                        <option data-offset="14400" value="Muscat">(GMT+04:00) Muscat</option>
                                                        <option data-offset="14400" value="Baku">(GMT+04:00) Baku</option>
                                                        <option data-offset="14400" value="Tbilisi">(GMT+04:00) Tbilisi</option>
                                                        <option data-offset="14400" value="Yerevan">(GMT+04:00) Yerevan</option>
                                                        <option data-offset="16200" value="Tehran">(GMT+04:30) Tehran</option>
                                                        <option data-offset="16200" value="Kabul">(GMT+04:30) Kabul</option>
                                                        <option data-offset="18000" value="Ekaterinburg">(GMT+05:00) Ekaterinburg</option>
                                                        <option data-offset="18000" value="Islamabad">(GMT+05:00) Islamabad</option>
                                                        <option data-offset="18000" value="Karachi">(GMT+05:00) Karachi</option>
                                                        <option data-offset="18000" value="Tashkent">(GMT+05:00) Tashkent</option>
                                                        <option data-offset="19800" value="Chennai">(GMT+05:30) Chennai</option>
                                                        <option data-offset="19800" value="Kolkata">(GMT+05:30) Kolkata</option>
                                                        <option data-offset="19800" value="Mumbai">(GMT+05:30) Mumbai</option>
                                                        <option data-offset="19800" value="New Delhi">(GMT+05:30) New Delhi</option>
                                                        <option data-offset="19800" value="Sri Jayawardenepura">(GMT+05:30) Sri Jayawardenepura</option>
                                                        <option data-offset="20700" value="Kathmandu">(GMT+05:45) Kathmandu</option>
                                                        <option data-offset="21600" value="Astana">(GMT+06:00) Astana</option>
                                                        <option data-offset="21600" value="Dhaka">(GMT+06:00) Dhaka</option>
                                                        <option data-offset="21600" value="Almaty">(GMT+06:00) Almaty</option>
                                                        <option data-offset="21600" value="Urumqi">(GMT+06:00) Urumqi</option>
                                                        <option data-offset="23400" value="Rangoon">(GMT+06:30) Rangoon</option>
                                                        <option data-offset="25200" value="Novosibirsk">(GMT+07:00) Novosibirsk</option>
                                                        <option data-offset="25200" value="Bangkok">(GMT+07:00) Bangkok</option>
                                                        <option data-offset="25200" value="Hanoi">(GMT+07:00) Hanoi</option>
                                                        <option data-offset="25200" value="Jakarta">(GMT+07:00) Jakarta</option>
                                                        <option data-offset="25200" value="Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                                                        <option data-offset="28800" value="Beijing">(GMT+08:00) Beijing</option>
                                                        <option data-offset="28800" value="Chongqing">(GMT+08:00) Chongqing</option>
                                                        <option data-offset="28800" value="Hong Kong">(GMT+08:00) Hong Kong</option>
                                                        <option data-offset="28800" value="Kuala Lumpur">(GMT+08:00) Kuala Lumpur</option>
                                                        <option data-offset="28800" value="Singapore">(GMT+08:00) Singapore</option>
                                                        <option data-offset="28800" value="Taipei">(GMT+08:00) Taipei</option>
                                                        <option data-offset="28800" value="Perth">(GMT+08:00) Perth</option>
                                                        <option data-offset="28800" value="Irkutsk">(GMT+08:00) Irkutsk</option>
                                                        <option data-offset="28800" value="Ulaan Bataar">(GMT+08:00) Ulaan Bataar</option>
                                                        <option data-offset="32400" value="Seoul">(GMT+09:00) Seoul</option>
                                                        <option data-offset="32400" value="Osaka">(GMT+09:00) Osaka</option>
                                                        <option data-offset="32400" value="Sapporo">(GMT+09:00) Sapporo</option>
                                                        <option data-offset="32400" value="Tokyo">(GMT+09:00) Tokyo</option>
                                                        <option data-offset="32400" value="Yakutsk">(GMT+09:00) Yakutsk</option>
                                                        <option data-offset="34200" value="Darwin">(GMT+09:30) Darwin</option>
                                                        <option data-offset="34200" value="Adelaide">(GMT+09:30) Adelaide</option>
                                                        <option data-offset="36000" value="Canberra">(GMT+10:00) Canberra</option>
                                                        <option data-offset="36000" value="Melbourne">(GMT+10:00) Melbourne</option>
                                                        <option data-offset="36000" value="Sydney">(GMT+10:00) Sydney</option>
                                                        <option data-offset="36000" value="Brisbane">(GMT+10:00) Brisbane</option>
                                                        <option data-offset="36000" value="Hobart">(GMT+10:00) Hobart</option>
                                                        <option data-offset="36000" value="Vladivostok">(GMT+10:00) Vladivostok</option>
                                                        <option data-offset="36000" value="Guam">(GMT+10:00) Guam</option>
                                                        <option data-offset="36000" value="Port Moresby">(GMT+10:00) Port Moresby</option>
                                                        <option data-offset="36000" value="Solomon Is.">(GMT+10:00) Solomon Is.</option>
                                                        <option data-offset="39600" value="Magadan">(GMT+11:00) Magadan</option>
                                                        <option data-offset="39600" value="New Caledonia">(GMT+11:00) New Caledonia</option>
                                                        <option data-offset="43200" value="Fiji">(GMT+12:00) Fiji</option>
                                                        <option data-offset="43200" value="Kamchatka">(GMT+12:00) Kamchatka</option>
                                                        <option data-offset="43200" value="Marshall Is.">(GMT+12:00) Marshall Is.</option>
                                                        <option data-offset="43200" value="Auckland">(GMT+12:00) Auckland</option>
                                                        <option data-offset="43200" value="Wellington">(GMT+12:00) Wellington</option>
                                                        <option data-offset="46800" value="Nuku'alofa">(GMT+13:00) Nuku'alofa</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-last row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Communication</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="kt-checkbox-inline">
                                                        <label class="kt-checkbox">
                                                            <input type="checkbox" checked=""> Email
                                                            <span></span>
                                                        </label>
                                                        <label class="kt-checkbox">
                                                            <input type="checkbox" checked=""> SMS
                                                            <span></span>
                                                        </label>
                                                        <label class="kt-checkbox">
                                                            <input type="checkbox"> Phone
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>

                                            <div class="form-group row">
                                                <div class="col-lg-9 col-xl-6">
                                                    <h3 class="kt-section__title kt-section__title-md">User's Account Settings</h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Login verification</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <button type="button" class="btn btn-label-brand btn-bold btn-sm kt-margin-t-5 kt-margin-b-5">Setup login verification</button>
                                                    <span class="form-text text-muted">
                                                        After you log in, you will be asked for additional information to confirm your identity and protect your account from being compromised.
                                                        <a href="#" class="kt-link">Learn more</a>.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Password reset verification</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="kt-checkbox-single">
                                                        <label class="kt-checkbox">
                                                            <input type="checkbox"> Require personal information to reset your password.
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <span class="form-text text-muted">
                                                        For extra security, this requires you to confirm your email or phone number when you reset your password.
                                                        <a href="#" class="kt-link">Learn more</a>.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row kt-margin-t-10 kt-margin-b-10">
                                                <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <button type="button" class="btn btn-label-danger btn-bold btn-sm kt-margin-t-5 kt-margin-b-5">Deactivate your account ?</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <!--end: Form Wizard Step 2-->

                    <!--begin: Form Wizard Step 3-->
                    <!--<div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                        <div class="kt-heading kt-heading--md">Setup Your Address</div>
                        <div class="kt-form__section kt-form__section--first">
                            <div class="kt-wizard-v1__form">
                                <div class="form-group">
                                    <label>Address Line 1</label>
                                    <input type="text" class="form-control" name="address1" placeholder="Address Line 1" value="Address Line 1">
                                    <span class="form-text text-muted">Please enter your Address.</span>
                                </div>
                                <div class="form-group">
                                    <label>Address Line 2</label>
                                    <input type="text" class="form-control" name="address2" placeholder="Address Line 2" value="Address Line 2">
                                    <span class="form-text text-muted">Please enter your Address.</span>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>Postcode</label>
                                            <input type="text" class="form-control" name="postcode" placeholder="Postcode" value="2000">
                                            <span class="form-text text-muted">Please enter your Postcode.</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="state" placeholder="City" value="London">
                                            <span class="form-text text-muted">Please enter your City.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>State</label>
                                            <input type="text" class="form-control" name="state" placeholder="State" value="VIC">
                                            <span class="form-text text-muted">Please enter your Postcode.</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                        <label>Country:</label>
                                        <select name="country" class="form-control">
                                            <option value="">Select</option>
                                            <option value="AF">Afghanistan</option>
                                            <option value="AX">Åland Islands</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU" selected="">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia, Plurinational State of</option>
                                            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="BN">Brunei Darussalam</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos (Keeling) Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo</option>
                                            <option value="CD">Congo, the Democratic Republic of the</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">Côte d'Ivoire</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CW">Curaçao</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands (Malvinas)</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GG">Guernsey</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard Island and McDonald Islands</option>
                                            <option value="VA">Holy See (Vatican City State)</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran, Islamic Republic of</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IM">Isle of Man</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JE">Jersey</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KP">Korea, Democratic People's Republic of</option>
                                            <option value="KR">Korea, Republic of</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Lao People's Democratic Republic</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macao</option>
                                            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia, Federated States of</option>
                                            <option value="MD">Moldova, Republic of</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PS">Palestinian Territory, Occupied</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">Réunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russian Federation</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="BL">Saint Barthélemy</option>
                                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="MF">Saint Martin (French part)</option>
                                            <option value="PM">Saint Pierre and Miquelon</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">Sao Tome and Principe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="RS">Serbia</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SX">Sint Maarten (Dutch part)</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                                            <option value="SS">South Sudan</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syrian Arab Republic</option>
                                            <option value="TW">Taiwan, Province of China</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania, United Republic of</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="US">United States</option>
                                            <option value="UM">United States Minor Outlying Islands</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VE">Venezuela, Bolivarian Republic of</option>
                                            <option value="VN">Viet Nam</option>
                                            <option value="VG">Virgin Islands, British</option>
                                            <option value="VI">Virgin Islands, U.S.</option>
                                            <option value="WF">Wallis and Futuna</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <!--end: Form Wizard Step 3-->

                    <!--begin: Form Wizard Step 4-->
                      <!--<div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
                        <div class="kt-heading kt-heading--md">Review your Details and Submit</div>
                        <div class="kt-form__section kt-form__section--first">
                            <div class="kt-wizard-v1__review">
                                <div class="kt-wizard-v1__review-item">
                                    <div class="kt-wizard-v1__review-title">
                                        Your Account Details
                                    </div>
                                    <div class="kt-wizard-v1__review-content">
                                        John Wick
                                        <br/> Phone: +61412345678
                                        <br/> Email: johnwick@reeves.com
                                    </div>
                                </div>
                                <div class="kt-wizard-v1__review-item">
                                    <div class="kt-wizard-v1__review-title">
                                        Your Address Details
                                    </div>
                                    <div class="kt-wizard-v1__review-content">
                                        Address Line 1
                                        <br/> Address Line 2
                                        <br/> Melbourne 3000, VIC, Australia
                                    </div>
                                </div>
                                <div class="kt-wizard-v1__review-item">
                                    <div class="kt-wizard-v1__review-title">
                                        Payment Details
                                    </div>
                                    <div class="kt-wizard-v1__review-content">
                                        Card Number: xxxx xxxx xxxx 1111
                                        <br/> Card Name: John Wick
                                        <br/> Card Expiry: 01/21
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <!--end: Form Wizard Step 4-->

                    <!--begin: Form Actions -->
                    <div class="kt-form__actions">
                        <div class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                            Previous
                        </div>
                        <div class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit">
                            Submit
                        </div>
                        <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                            Next Step
                        </div>
                    </div>
                    <!--end: Form Actions -->
                </form>
                <!--end: Form Wizard Form-->
			</div>
		</div>
	</div>
</div>
	</div>
<!-- end:: Content -->				</div>				
				
				<!-- begin:: Footer -->
				  @include('layouts.adminfooter')

<!-- end:: Footer -->			</div>
		</div>
	</div>
	
<!-- end:: Page -->

            <!-- begin::Quick Panel -->
<!--<div id="kt_quick_panel" class="kt-quick-panel">
    <a href="#" class="kt-quick-panel__close" id="kt_quick_panel_close_btn"><i class="flaticon2-delete"></i></a>

    <div class="kt-quick-panel__nav">
        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_tab_notifications" role="tab">Notifications</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_logs" role="tab">Audit Logs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_settings" role="tab">Settings</a>
            </li>
        </ul>
    </div>

    <div class="kt-quick-panel__content">
        <div class="tab-content">
            <div class="tab-pane fade show kt-scroll active" id="kt_quick_panel_tab_notifications" role="tabpanel">
                <div class="kt-notification">
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-line-chart kt-font-success"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                New order has been received
                            </div>
                            <div class="kt-notification__item-time">
                                2 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-box-1 kt-font-brand"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                New customer is registered
                            </div>
                            <div class="kt-notification__item-time">
                                3 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-chart2 kt-font-danger"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                Application has been approved
                            </div>
                            <div class="kt-notification__item-time">
                                3 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-image-file kt-font-warning"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                New file has been uploaded
                            </div>
                            <div class="kt-notification__item-time">
                                5 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-drop kt-font-info"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                New user feedback received
                            </div>
                            <div class="kt-notification__item-time">
                                8 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-pie-chart-2 kt-font-success"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                System reboot has been successfully completed
                            </div>
                            <div class="kt-notification__item-time">
                                12 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-favourite kt-font-danger"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                New order has been placed
                            </div>
                            <div class="kt-notification__item-time">
                                15 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item kt-notification__item--read">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-safe kt-font-primary"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                Company meeting canceled
                            </div>
                            <div class="kt-notification__item-time">
                                19 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-psd kt-font-success"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                New report has been received
                            </div>
                            <div class="kt-notification__item-time">
                                23 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon-download-1 kt-font-danger"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                Finance report has been generated
                            </div>
                            <div class="kt-notification__item-time">
                                25 hrs ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon-security kt-font-warning"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                New customer comment recieved
                            </div>
                            <div class="kt-notification__item-time">
                                2 days ago
                            </div>
                        </div>
                    </a>
                    <a href="#" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-pie-chart kt-font-warning"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title">
                                New customer is registered
                            </div>
                            <div class="kt-notification__item-time">
                                3 days ago
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="tab-pane fade kt-scroll" id="kt_quick_panel_tab_logs" role="tabpanel">
                <div class="kt-notification-v2">
                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon">
                            <i class="flaticon-bell kt-font-brand"></i>
                        </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title">
                                5 new user generated report
                            </div>
                            <div class="kt-notification-v2__item-desc">
                                Reports based on sales
                            </div>
                        </div>
                    </a>

                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon">
                            <i class="flaticon2-box kt-font-danger"></i>
                        </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title">
                                2 new items submited
                            </div>
                            <div class="kt-notification-v2__item-desc">
                                by Grog John
                            </div>
                        </div>
                    </a>

                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon">
                            <i class="flaticon-psd kt-font-brand"></i>
                        </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title">
                                79 PSD files generated
                            </div>
                            <div class="kt-notification-v2__item-desc">
                                Reports based on sales
                            </div>
                        </div>
                    </a>

                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon">
                            <i class="flaticon2-supermarket kt-font-warning"></i>
                        </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title">
                                $2900 worth producucts sold
                            </div>
                            <div class="kt-notification-v2__item-desc">
                                Total 234 items
                            </div>
                        </div>
                    </a>

                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon">
                            <i class="flaticon-paper-plane-1 kt-font-success"></i>
                        </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title">
                                4.5h-avarage response time
                            </div>
                            <div class="kt-notification-v2__item-desc">
                                Fostest is Barry
                            </div>
                        </div>
                    </a>

                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon">
                            <i class="flaticon2-information kt-font-danger"></i>
                        </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title">
                                Database server is down
                            </div>
                            <div class="kt-notification-v2__item-desc">
                                10 mins ago
                            </div>
                        </div>
                    </a>

                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon">
                            <i class="flaticon2-mail-1 kt-font-brand"></i>
                        </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title">
                                System report has been generated
                            </div>
                            <div class="kt-notification-v2__item-desc">
                                Fostest is Barry
                            </div>
                        </div>
                    </a>

                    <a href="#" class="kt-notification-v2__item">
                        <div class="kt-notification-v2__item-icon">
                            <i class="flaticon2-hangouts-logo kt-font-warning"></i>
                        </div>
                        <div class="kt-notification-v2__itek-wrapper">
                            <div class="kt-notification-v2__item-title">
                                4.5h-avarage response time
                            </div>
                            <div class="kt-notification-v2__item-desc">
                                Fostest is Barry
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="tab-pane kt-quick-panel__content-padding-x fade kt-scroll" id="kt_quick_panel_tab_settings" role="tabpanel">
                <form class="kt-form">
                    <div class="kt-heading kt-heading--sm kt-heading--space-sm">Customer Care</div>

                    <div class="form-group form-group-xs row">
                        <label class="col-8 col-form-label">Enable Notifications:</label>
                        <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--success kt-switch--sm">
								<label>
									<input type="checkbox" checked="checked" name="quick_panel_notifications_1">
									<span></span>
                            </label>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-group-xs row">
                        <label class="col-8 col-form-label">Enable Case Tracking:</label>
                        <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--success kt-switch--sm">
								<label>
									<input type="checkbox"  name="quick_panel_notifications_2">
									<span></span>
                            </label>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-group-last form-group-xs row">
                        <label class="col-8 col-form-label">Support Portal:</label>
                        <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--success kt-switch--sm">
								<label>
									<input type="checkbox" checked="checked" name="quick_panel_notifications_2">
									<span></span>
                            </label>
                            </span>
                        </div>
                    </div>

                    <div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>

                    <div class="kt-heading kt-heading--sm kt-heading--space-sm">Reports</div>

                    <div class="form-group form-group-xs row">
                        <label class="col-8 col-form-label">Generate Reports:</label>
                        <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--sm kt-switch--danger">
								<label>
									<input type="checkbox" checked="checked" name="quick_panel_notifications_3">
									<span></span>
                            </label>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-group-xs row">
                        <label class="col-8 col-form-label">Enable Report Export:</label>
                        <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--sm kt-switch--danger">
								<label>
									<input type="checkbox"  name="quick_panel_notifications_3">
									<span></span>
                            </label>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-group-last form-group-xs row">
                        <label class="col-8 col-form-label">Allow Data Collection:</label>
                        <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--sm kt-switch--danger">
								<label>
									<input type="checkbox" checked="checked" name="quick_panel_notifications_4">
									<span></span>
                            </label>
                            </span>
                        </div>
                    </div>

                    <div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>

                    <div class="kt-heading kt-heading--sm kt-heading--space-sm">Memebers</div>

                    <div class="form-group form-group-xs row">
                        <label class="col-8 col-form-label">Enable Member singup:</label>
                        <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--sm kt-switch--brand">
								<label>
									<input type="checkbox" checked="checked" name="quick_panel_notifications_5">
									<span></span>
                            </label>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-group-xs row">
                        <label class="col-8 col-form-label">Allow User Feedbacks:</label>
                        <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--sm kt-switch--brand">
								<label>
									<input type="checkbox"  name="quick_panel_notifications_5">
									<span></span>
                            </label>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-group-last form-group-xs row">
                        <label class="col-8 col-form-label">Enable Customer Portal:</label>
                        <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--sm kt-switch--brand">
								<label>
									<input type="checkbox" checked="checked" name="quick_panel_notifications_6">
									<span></span>
                            </label>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>-->
<!-- end::Quick Panel -->
    
            <!-- begin::Sticky Toolbar -->
<!--<ul class="kt-sticky-toolbar" style="margin-top: 30px;">
	<li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--success" id="kt_demo_panel_toggle" data-toggle="kt-tooltip"  title="Check out more demos" data-placement="right">
		<a href="#" class=""><i class="flaticon2-drop"></i></a>
	</li>
	<li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--brand" data-toggle="kt-tooltip" title="Layout Builder" data-placement="left">
        		<a href="/metronic/preview/demo3/builder.html" ><i class="flaticon2-gear"></i></a>
	</li>
	<li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--warning" data-toggle="kt-tooltip" title="Documentation" data-placement="left">
		<a href="https://keenthemes.com/metronic/?page=docs" target="_blank"><i class="flaticon2-telegram-logo"></i></a>
	</li>

	<li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--danger" id="kt_sticky_toolbar_chat_toggler" data-toggle="kt-tooltip" title="Chat Example" data-placement="left">
		<a href="#" data-toggle="modal" data-target="#kt_chat_modal"><i class="flaticon2-chat-1"></i></a>
	</li>
</ul>
<!-- end::Sticky Toolbar -->
        <!-- begin::Demo Panel -->

<!--<div id="kt_demo_panel" class="kt-demo-panel">
	<div class="kt-demo-panel__head">
		<h3 class="kt-demo-panel__title">
			Select A Demo
			<!--<small>5</small>-->
		<!--</h3>
		<a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
	</div>
	<div class="kt-demo-panel__body">
        <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 1
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo1.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo1/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo1/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 2
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo2.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo2/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo2/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item kt-demo-panel__item--active">
                    <div class="kt-demo-panel__item-title">
                        Demo 3
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo3.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo3/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo3/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 4
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo4.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo4/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo4/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 5
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo5.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo5/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo5/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 6
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo6.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo6/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo6/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 7
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo7.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo7/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo7/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 8
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo8.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo8/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo8/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 9
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo9.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo9/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo9/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 10
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo10.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo10/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo10/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 11
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo11.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo11/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo11/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 12
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo12.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo12/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo12/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 13
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo13.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 14
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo14.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 15
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo15.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 16
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo16.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 17
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo17.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 18
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo18.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 19
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo19.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 20
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo20.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 21
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo21.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 22
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo22.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div>
		<a href="https://1.envato.market/EA4JP" target="_blank" class="kt-demo-panel__purchase btn btn-brand btn-elevate btn-bold btn-upper">
			Buy Metronic Now!
		</a>
	</div>
</div>-->
<!-- end::Demo Panel -->
    
	<!-- begin::Demo Panel -->

<!-- <div id="kt_demo_panel" class="kt-demo-panel">
	<div class="kt-demo-panel__head">
		<h3 class="kt-demo-panel__title">
			Select A Demo
			<!--<small>5</small>-->
		<!-- </h3>
		<a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
	</div>
	<div class="kt-demo-panel__body">
        <div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 1
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo1.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo1/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo1/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 2
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo2.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo2/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo2/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item kt-demo-panel__item--active">
                    <div class="kt-demo-panel__item-title">
                        Demo 3
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo3.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo3/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo3/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 4
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo4.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo4/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo4/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 5
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo5.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo5/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo5/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 6
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo6.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo6/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo6/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 7
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo7.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo7/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo7/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 8
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo8.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo8/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo8/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 9
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo9.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo9/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo9/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 10
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo10.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo10/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo10/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 11
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo11.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo11/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo11/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 12
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo12.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="../../../../demo12/custom/apps/contacts/add-contact.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
                            <a href="../../../../demo12/rtl/custom/apps/contacts/add-contact.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 13
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo13.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 14
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo14.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 15
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo15.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 16
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo16.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 17
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo17.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 18
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo18.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 19
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo19.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 20
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo20.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 21
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo21.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div><div class="kt-demo-panel__item ">
                    <div class="kt-demo-panel__item-title">
                        Demo 22
                    </div>
                    <div class="kt-demo-panel__item-preview">
                        <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media//demos/preview/demo22.jpg" alt=""/>
                        <div class="kt-demo-panel__item-preview-overlay">
                            <a href="#" class="btn btn-brand btn-elevate disabled" >Coming soon</a>
                            
                        </div>
                    </div>                    
                </div>
		<a href="https://1.envato.market/EA4JP" target="_blank" class="kt-demo-panel__purchase btn btn-brand btn-elevate btn-bold btn-upper">
			Buy Metronic Now!
		</a>
	</div>
</div>-->
<!-- end::Demo Panel -->
	
	

<!--Begin:: Chat-->
<!--<div class="modal fade- modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="kt-chat">
                <div class="kt-portlet kt-portlet--last">
                    <div class="kt-portlet__head">
                        <div class="kt-chat__head ">
                            <div class="kt-chat__left">
                                <div class="kt-chat__label">
                                    <a href="#" class="kt-chat__title">Jason Muller</a>
                                    <span class="kt-chat__status">
                                        <span class="kt-badge kt-badge--dot kt-badge--success"></span> Active
                                    </span>
                                </div>
                            </div>
                            <div class="kt-chat__right">
                                <div class="dropdown dropdown-inline">
                                    <button type="button" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="flaticon-more-1"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-md">
                                        <!--begin::Nav-->
                                        <!--<ul class="kt-nav">
                                            <li class="kt-nav__head">
                                                Messaging
                                                <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
                                            </li>
                                            <li class="kt-nav__separator"></li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-group"></i>
                                                    <span class="kt-nav__link-text">New Group</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-open-text-book"></i>
                                                    <span class="kt-nav__link-text">Contacts</span>
                                                    <span class="kt-nav__link-badge">
                                                        <span class="kt-badge kt-badge--brand  kt-badge--rounded-">5</span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-bell-2"></i>
                                                    <span class="kt-nav__link-text">Calls</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-dashboard"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-protected"></i>
                                                    <span class="kt-nav__link-text">Help</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__separator"></li>
                                            <li class="kt-nav__foot">
                                                <a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
                                                <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                                            </li>
                                        </ul>
                                        <!--end::Nav-->
                                    <!--</div>
                                </div>

                                <button type="button" class="btn btn-clean btn-sm btn-icon" data-dismiss="modal">
                                    <i class="flaticon2-cross"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-scroll kt-scroll--pull" data-height="410" data-mobile-height="225">
                            <div class="kt-chat__messages kt-chat__messages--solid">
                                <div class="kt-chat__message kt-chat__message--success">
                                    <div class="kt-chat__user">
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media/users/100_12.jpg" alt="image">
                                        </span>
                                        <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                        <span class="kt-chat__datetime">2 Hours</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        How likely are you to recommend our company<br> to your friends and family?
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                        <a href="#" class="kt-chat__username">You</span></a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media/users/300_21.jpg" alt="image">
                                        </span>
                                    </div>
                                    <div class="kt-chat__text">
                                        Hey there, we’re just writing to let you know that you’ve<br> been subscribed to a repository on GitHub.
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--success">
                                    <div class="kt-chat__user">
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media/users/100_12.jpg" alt="image">
                                        </span>
                                        <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        Ok, Understood!
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">Just Now</span>
                                        <a href="#" class="kt-chat__username">You</span></a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media/users/300_21.jpg" alt="image">
                                        </span>
                                    </div>
                                    <div class="kt-chat__text">
                                        You’ll receive notifications for all issues, pull requests!
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--success">
                                    <div class="kt-chat__user">
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media/users/100_12.jpg" alt="image">
                                        </span>
                                        <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                        <span class="kt-chat__datetime">2 Hours</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        You were automatically <b class="kt-font-brand">subscribed</b> <br>because you’ve been given access to the repository
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                        <a href="#" class="kt-chat__username">You</span></a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media/users/300_21.jpg" alt="image">
                                        </span>
                                    </div>

                                    <div class="kt-chat__text">
                                        You can unwatch this repository immediately <br>by clicking here: <a href="#" class="kt-font-bold kt-link"></a>
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--success">
                                    <div class="kt-chat__user">
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media/users/100_12.jpg" alt="image">
                                        </span>
                                        <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        Discover what students who viewed Learn <br>Figma - UI/UX Design Essential Training also viewed
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">Just Now</span>
                                        <a href="#" class="kt-chat__username">You</span></a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="/metronic/themes/metronic/theme/default/demo3/dist/assets/media/users/300_21.jpg" alt="image">
                                        </span>
                                    </div>
                                    <div class="kt-chat__text">
                                        Most purchased Business courses during this sale!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-chat__input">
                            <div class="kt-chat__editor">
                                <textarea placeholder="Type here..." style="height: 50px"></textarea>
                            </div>
                            <div class="kt-chat__toolbar">
                                <div class="kt_chat__tools">
                                    <a href="#"><i class="flaticon2-link"></i></a>
                                    <a href="#"><i class="flaticon2-photograph"></i></a>
                                    <a href="#"><i class="flaticon2-photo-camera"></i></a>
                                </div>
                                <div class="kt_chat__actions">
                                    <button type="button" class="btn btn-brand btn-md  btn-font-sm btn-upper btn-bold kt-chat__reply">reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!--ENd:: Chat-->

        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {"colors":{"state":{"brand":"#2c77f4","light":"#ffffff","dark":"#282a3c","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
        </script>
        <!-- end::Global Config -->

    	<!--begin::Global Theme Bundle(used by all pages) -->
    	    	   <script src="{{ asset('assetsadmin/plugins/global/plugins.bundle.js?v='.$scriptVer) }}" type="text/javascript"></script>

    <script src="{{ asset('assetsadmin/js/scripts.bundle.js?v='.$scriptVer) }}" type="text/javascript"></script>
				<!--end::Global Theme Bundle -->

        
                    <!--begin::Page Scripts(used by this page) -->
                           <!-- <script src="/metronic/themes/metronic/theme/default/demo3/dist/assets/js/pages/custom/contacts/add-contact.js" type="text/javascript"></script>
                        <!--end::Page Scripts -->
            </body>
    @endsection
