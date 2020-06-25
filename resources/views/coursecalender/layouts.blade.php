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
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">

      .navbar-brand {
        padding: 5px 5px;
      }
      ul.navbar-nav {
        float: right;
      }
    </style>
  </head>

  <body id="page-top">
    @include('layouts.header')
   <section  style=" padding-top: 30px;">
        <div class="container">
             @yield('content')
        </div>
    </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src=" https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
  <script src="{{asset('vendor/event/js/bootstrap-datetimepicker.min.js')}}"></script>
  <script src="{{asset('vendor/event/js/parsley.js')}}"></script>

  @section('content_script')
  @show

 @include('layouts.footer')
</body>
</html>
