@extends('layouts.home')
@section('content')
<body id="page-top">
   @include('layouts.header')

<div class="space"></div>



  <!--/ Section Contact-Footer Star /-->
  <section  style=" padding-top: 30px;">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-mf">
            <div id="contact" class="box-shadow-full">
			<div class="row">
                <div class="col-md-6">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      Send Message Us
                    </h5>
                  </div>
                  <div>
					<form id="contact_us" method="post" action="javascript:void(0)">                   
					    <div class="alert alert-success d-none" id="msg_div">
							  <span id="res_message"></span>
						</div>
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="text" name="contectname" class="form-control" required="required" id="contectname" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                           <div class="validation contact_us_error" id="error_contectname"></div>

                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <input type="email" class="form-control" name="contectemail" id="contectemail" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validation contact_us_error"  id="error_contectemail"></div>
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                              <div class="validation contact_us_error"  id="error_subject"></div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validation contact_us_error"  id="error_message"></div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <button id="send_form" type="submit" class="button button-a button-big button-rouded">Send Message</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="title-box-2 pt-4 pt-md-0">
                    <h5 class="title-left">
                      Get in Touch
                    </h5>
                  </div>
                  <div class="more-info">
                    {!! $pages[3]->pagecontent ?? '' !!}
                  </div>
                  <div class="socials">
                    <ul>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-facebook"></i></span></a></li>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-instagram"></i></span></a></li>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-twitter"></i></span></a></li>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-pinterest"></i></span></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@include('layouts.footer')
<script>
//-----------------
$(document).ready(function(){	
});
//-----------------
</script>
</body>
@endsection