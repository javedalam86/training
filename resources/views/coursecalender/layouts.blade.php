<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Courses</title>
    <link href="img/fav.png" rel="icon" sizes="20x20">
    <link href="img/fav.png" rel="">
    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- jsraries CSS Files -->
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="{{ csrf_token() }}" crossorigin="anonymous">
    <link href="{{asset('vendor/event/css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/event/css/custom.css')}}" rel="stylesheet">
  </head>

  <body id="page-top">

    <nav class="navbar navbar-b navbar-trans navbar-expand-md " id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll logo" href="#page-top"><img src="img/logo.png"></a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault" style="padding: 0.5rem 1rem;">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll " href="./">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="./#training">Training</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll" href="./#service">Services</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll" href="./#aboutid">About US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="./#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="./#policyid">Policy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('qms')}}">QMS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('course-calender')}}">Course</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="space"></div>
  <div class="space"></div>

    <div class="jumbotron">
      <div class="container">
           @yield('content')
      </div>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src=" https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
  <script src="{{asset('vendor/event/js/bootstrap-datetimepicker.min.js')}}"></script>
  <script src="{{asset('vendor/event/js/parsley.js')}}"></script>

  @section('content_script')
  @show

 <footer>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4">
          <div class="footer-logo">
            <!-- <img src="img/logo_footer.jpg"> <p></p> -->
            <h3>U2 Marine Services Ltd.</h3>
            <p>Email Us: info@u2marineservices.com</p>
            <p>Telephone: +44 74620 40500</p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="footer-logo">
              <!-- <img src="img/logo_footer.jpg"> <p></p> -->
            <h3>Services</h3>
            <p><a href="asset.html">Asset Management</a></p>
            <p><a href="AUDITSANDINSPECTIONS.html">Audits and Inspections</a></p>
            <p><a href="LNGSpecific.html">LNG Specific</a></p>
            <p><a href="manuals.html">Manuals</a></p>
         </div>
        </div>
        <div class="col-sm-4">
          <div class="footer-logo">
            <!-- <img src="img/logo_footer.jpg"> <p></p> -->
            <h3>About Us</h3>
            <p><a href="">Core Values</a></p>
            <p><a href="">Vision</a></p>
            <p><a href="">Mission</a></p>
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
</body>
</html>
