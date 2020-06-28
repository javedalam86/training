  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll logo" href="#page-top"><img src="img/logo.png"></a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault" style="padding: 0.5rem 1rem;">
	 <?php   $routeName = Route::currentRouteName(); 	?>			
	  
        <ul class="navbar-nav">
       
			<li class="nav-item">
            <a class="nav-link js-scroll active" href="{{ url('/') }}">Home</a>
          </li>
		   <li class="nav-item">
            <a class="nav-link js-scroll" href="#{{ url('/#training') }}">Training</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll" href="{{ url('/#service') }}">Services</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll" href="{{ url('/#aboutid') }}">About US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="{{ url('/#contact') }}">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="{{ url('/#policyid') }}">Policy</a>
          </li>
		@if (Auth::check())
			<li class="nav-item">
				<a class="nav-link js-scroll" href="{{ route('dashboard') }}">Dashboard</a>
			</li>
		@endif
		  
		  
<!--
          <li class="nav-item">
            <a class="nav-link js-scroll" href="{{ route('qms')}}">QMS</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="{{route('course-calendar')}}">Course</a>
          </li>
 -->
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

