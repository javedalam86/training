<!-- begin:: Aside -->
				<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

					<!-- begin:: Aside -->
					<div class="kt-aside__brand kt-grid__item  " id="kt_aside_brand">
						<div class="kt-aside__brand-logo">
							<a href="index.html">
								<img alt="Logo" STYLE="width:100px" src="{{ asset('assetsadmin/media/logos/u2-marine-logo-1.png') }}" />
							</a>
						</div>
					</div>

					<!-- end:: Aside -->

					<!-- begin:: Aside Menu -->
					<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
						<div id="kt_aside_menu" class="kt-aside-menu  kt-aside-menu--dropdown " data-ktmenu-vertical="1" data-ktmenu-dropdown="1" data-ktmenu-scroll="1">
							<ul class="kt-menu__nav ">
							<?php  $routeName = Route::currentRouteName();							
							//echo Config::get('constants.mytestconst');
							$userType= Auth::user()->user_type;
							if(strtoupper($userType) == 'ADMIN'){
							?>
					
							<li class="kt-menu__item <?php if($routeName =='userslist'){ echo 'kt-menu__item--active'; } ?> "  aria-haspopup="true">
								<a href="{{ route('userslist') }}"  class="kt-menu__link ">
									<i class="kt-menu__link-icon flaticon-users-1"></i>
									<span class="kt-menu__link-text">Candidate</span></a>										
							</li>
							<!--
							<li class="kt-menu__item <?php if($routeName =='manuallist'){ echo 'kt-menu__item--active'; } ?> "  aria-haspopup="true">
								<a href="{{ route('manuallist') }}"  class="kt-menu__link ">
									<i class="kt-menu__link-icon flaticon-users-1"></i>
									<span class="kt-menu__link-text">Manual</span></a>										
							</li>
							
							
							<li class="kt-menu__item <?php if($routeName =='auditlist'){ echo 'kt-menu__item--active'; } ?> "  aria-haspopup="true">
								<a href="{{ route('auditlist') }}"  class="kt-menu__link ">
									<i class="kt-menu__link-icon flaticon-users-1"></i>
									<span class="kt-menu__link-text">Audit</span></a>										
							</li>
							
						-->
							
							<li class="kt-menu__item <?php if($routeName =='companylist'){ echo 'kt-menu__item--active'; } ?> " aria-haspopup="true">
								<a href="{{ route('companylist') }}"  class="kt-menu__link ">
									<i class="kt-menu__link-icon flaticon2-group"></i>
									<span class="kt-menu__link-text">Company</span></a>										
							</li>
							
							<li class="kt-menu__item <?php if($routeName =='trainerlist'){ echo 'kt-menu__item--active'; } ?> " aria-haspopup="true">
								<a href="{{ route('trainerlist') }}"  class="kt-menu__link ">
									<i class="kt-menu__link-icon flaticon-presentation-1"></i>
									<span class="kt-menu__link-text">Trainer</span></a>										
							</li>
							
										
							<li class="kt-menu__item <?php if($routeName =='courselist'){ echo 'kt-menu__item--active'; } ?> " aria-haspopup="true">
								<a href="{{ route('courselist') }}"  class="kt-menu__link ">
									<i class="kt-menu__link-icon flaticon2-list"></i>
									<span class="kt-menu__link-text">Courses</span></a>										
							</li>
											
											
							<li class="kt-menu__item <?php if($routeName =='policylist'){ echo 'kt-menu__item--active'; } ?> " aria-haspopup="true">
								<a href="{{ route('policylist') }}"  class="kt-menu__link ">
									<i class="kt-menu__link-icon flaticon2-list"></i>
									<span class="kt-menu__link-text">Policy</span></a>										
							</li>
							
						
							
							<li class="kt-menu__item <?php if($routeName =='booklist'){ echo 'kt-menu__item--active'; } ?> " aria-haspopup="true">
								<a href="{{ route('booklist') }}"  class="kt-menu__link ">
									<i class="kt-menu__link-icon flaticon-layer"></i>
									<span class="kt-menu__link-text">Library</span></a>										
							</li>
							<!--
							<li class="kt-menu__item <?php if($routeName =='couponlist'){ echo 'kt-menu__item--active'; } ?> " aria-haspopup="true">
								<a href="{{ route('couponlist') }}"  class="kt-menu__link ">
									<i class="kt-menu__link-icon flaticon-add-label-button"></i>
									<span class="kt-menu__link-text">Coupons</span></a>										
							</li>
							-->
							<li class="kt-menu__item <?php if($routeName =='questionlist'){ echo 'kt-menu__item--active'; } ?> " aria-haspopup="true">
								<a href="{{ route('questionlist') }}"  class="kt-menu__link ">
									<i class="kt-menu__link-icon flaticon-questions-circular-button"></i>
									<span class="kt-menu__link-text">Questions</span></a>										
							</li>
							
							<li class="kt-menu__item <?php if($routeName =='pages.index'){ echo 'kt-menu__item--active'; } ?> " aria-haspopup="true">
								<a href="{{ route('pages.index') }}"  class="kt-menu__link ">
									<i class="kt-menu__link-icon flaticon-doc"></i>
									<span class="kt-menu__link-text">Pages</span></a>										
							</li>
							
							
							<li class="kt-menu__item <?php if($routeName =='quizresult'){ echo 'kt-menu__item--active'; } ?> " aria-haspopup="true">
								<a href="{{ route('quizresult') }}"  class="kt-menu__link ">
									<i class="kt-menu__link-icon flaticon-doc"></i>
									<span class="kt-menu__link-text">Quiz Result</span></a>										
							</li>
							
							
							<li class="kt-menu__item <?php if($routeName =='reportlist'){ echo 'kt-menu__item--active'; } ?> " aria-haspopup="true">
								<a href="{{ route('reportlist') }}"  class="kt-menu__link ">
									<i class="kt-menu__link-icon flaticon-doc"></i>
									<span class="kt-menu__link-text">Report</span></a>										
							</li>
							
							<li class="kt-menu__item <?php if($routeName =='sitesetting'){ echo 'kt-menu__item--active'; } ?> " aria-haspopup="true">
								<a href="{{ route('sitesetting') }}"  class="kt-menu__link ">
									<i class="kt-menu__link-icon flaticon-doc"></i>
									<span class="kt-menu__link-text">Setting</span></a>										
							</li>
							
							<?php }elseif(strtoupper($userType) == 'CANDIDATE'){ ?>
								<li class="kt-menu__item <?php if($routeName =='candidatecourses'){ echo 'kt-menu__item--active'; } ?> " aria-haspopup="true">
								<a href="{{ route('course-calendar') }}"  target="_blank" class="kt-menu__link ">
									<i class="kt-menu__link-icon flaticon2-list"></i>
									<span class="kt-menu__link-text"> Courses</span></a>										
							</li>

							

							<li class="kt-menu__item <?php if($routeName =='candidatecourselist'){ echo 'kt-menu__item--active'; } ?> " aria-haspopup="true">
								<a href="{{ route('candidatecourselist') }}"  class="kt-menu__link ">
									<i class="kt-menu__link-icon flaticon2-list"></i>
									<span class="kt-menu__link-text">My Courses</span></a>										
							</li>
							
							<?php }elseif(strtoupper($userType) == 'COMPANY'){ ?>
								<li class="kt-menu__item <?php if($routeName =='myuserslist'){ echo 'kt-menu__item--active'; } ?> " aria-haspopup="true">
								<a href="{{ route('myuserslist') }}"  class="kt-menu__link ">
									<i class="kt-menu__link-icon flaticon-users-1"></i>
									<span class="kt-menu__link-text">Candidate</span></a>										
							</li>
							<?php }elseif(strtoupper($userType) == 'TRAINER'){ ?>
							
							<?php } ?>
							</ul>
						</div>
					</div>

					<!-- end:: Aside Menu -->
				</div>