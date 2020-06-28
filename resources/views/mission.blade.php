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
			{!!$page['pagecontent'] !!}					
			
           
				
				
				
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