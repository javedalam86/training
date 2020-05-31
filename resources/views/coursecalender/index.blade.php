@extends('coursecalender.layouts')
@section('content')
<div class="panel panel-primary">
  <div class="panel-body">
      <div id="alert_tmeassage_area"></div>
    <div id='calendar'>
    </div>
  </div>
</div>

 @include('coursecalender.modals')
@endsection


@section('content_script')
@include('coursecalender.js')
@endsection