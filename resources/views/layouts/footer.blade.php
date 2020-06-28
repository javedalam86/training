
      <footer>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-4">
            <div class="footer-logo">
             <!-- <img src="img/logo_footer.jpg"> <p></p> -->  <h3>U2 Marine Services Ltd.</h3>
             <p>Email Us: info@u2marineservices.com</p>
             <p>Telephone: +44 74620 40500</p>
            </div>
          </div>
            <div class="col-sm-4">
            <div class="footer-logo">
             <!-- <img src="img/logo_footer.jpg"> <p></p> -->
             <h3>Services</h3><!--
             <p><a href="asset.html">Asset Management</a></p>
             <p><a href="AUDITSANDINSPECTIONS.html">Audits and Inspections</a></p>
             <p><a href="LNGSpecific.html">LNG Specific</a></p>
             <p><a href="manuals.html">Manuals</a></p> -->
			  <p><a href="{{ route('audits-and-inspections')}}">Audits and Inspections</a></p>  
             <p><a href="{{ route('lng-specific')}}">LNG Specific</a></p>


            </div>
          </div>
            <div class="col-sm-4">
            <div class="footer-logo">
             <!-- <img src="img/logo_footer.jpg"> <p></p> -->
             <h3>About Us</h3>
            <p><a href="{{ route('core-values')}}">Core Values</a></p>
             <p><a href="{{ route('vision')}}">Vision</a></p>
             <p><a href="{{ route('mission')}}">Mission</a></p>
            </div>
          </div>
        </div>


      </div>
    </footer>
    <div class="footer2">
      <div class="copyright-box container-fluid">
                <p class="copyright">&copy; Copyright <strong> U2 MARINE SERVICES LTD. </strong>. All Rights Reserved</p>
              </div>
    </div>
  <!--/ Section Contact-footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript jsraries -->

  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <!-- <script src="lib/popper/popper.min.js"></script> -->
  @if(Route::current()->getName() != 'course-calendar')
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  @endif

  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/counterup/jquery.waypoints.min.js"></script>
  <script src="lib/counterup/jquery.counterup.js"></script>
   <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/typed/typed.min.js"></script>


  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
