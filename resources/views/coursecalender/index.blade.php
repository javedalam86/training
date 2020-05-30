@extends('coursecalender.layouts')
@section('content')
        <div class="panel panel-primary">
          <div class="panel-body">
              <div id="alert_tmeassage_area"></div>
            <div id='calendar'>
            </div>
          </div>
        </div>


        <!--     Edit Event  -->
        <div class="modal fade" id="edit_event_modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" >
            <div class="modal-content admin-form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Course Details</h4>
              </div>
              <div class="modal-body">
                <div id="edit_event_alert"></div>
                <form id="edit_event_frm" action=""  method="post" enctype="multipart/form-data"  >
                     {{ csrf_field() }}

                  <div class="row">
                    <div class="col-lg-12 col-xs-12">
                      <div class="form-group">
                        <label class="col-lg-4 col-xs-4">Event Title</label>
                        <div class="col-lg-8 col-xs-8" id="edit_event_title"></div>
                      </div>
                      <input type="hidden" id="edit_event_id" value="" name="id" />
                    </div>
                  </div>

                   <div class="row">
                    <div class="col-lg-12 col-xs-12">
                      <div class="form-group">
                        <label class="col-lg-4 col-xs-4">Price</label>
                        <div class="col-lg-8 col-xs-8" id="edit_price"></div>
                      </div>
                      <input type="hidden" id="edit_event_id" value="" name="id" />
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12 col-xs-12">
                      <div class="form-group">
                        <label class="col-lg-4 col-xs-4">Start Date</label>
                        <div class="col-lg-8 col-xs-8" id="edit_event_start_date"></div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12 col-xs-12">
                      <div class="form-group">
                        <label class="col-lg-4 col-xs-4">End Date</label>
                        <div class="col-lg-8 col-xs-8" id="edit_event_end_date"></div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12 col-xs-12">
                      <div class="form-group">
                        <label class="col-lg-4 col-xs-4">Event Description</label>
                        <div class="col-lg-8 col-xs-8" id="edit_event_description"></div>
                      </div>
                    </div>
                  </div>
                  <!-- end section row -->
                </form>
              </div>
              <div class="modal-footer">
                 <button type="button" id="edit_event_btn"  class="btn btn-primary">Buy</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('content_script')

<script>
 var loader='<img class="loader" src="<?php echo asset('vendor/event/image/ajax-loader.gif')?>"/>';
 var calender_data_url = "{{route('get-all-calender')}}";

  $( document ).ready(function() {
     $(function() {
      $('#calendar').fullCalendar({
         height: 800,
        header: {
            left: 'month,agendaWeek,agendaDay custom1',
            center: 'title',
            right: 'custom2 prevYear,prev,next,nextYear'
          },
          footer: {
            left: 'custom1,custom2',
            center: '',
            right: 'prev,next'
          },
          events: window.calender_data_url,
          axisFormat: 'h:mm',
          timeFormat: 'hh:mm A',
          editable: false,
          droppable: false,
          eventTextColor:"#FFF",
          eventColor:"#337AB7",
          selectable: true,
          selectHelper: true,
          eventLimit: 4,
          eventDurationEditable: false,
          eventClick: function (event, jsEvent, view) {
            edit_event(event.events_id);
          }
        });
      });
  });

/*
  function reloadCalender(mode)
  {
    $('#calendar').fullCalendar( 'removeEvents');
    $('#calendar').fullCalendar( 'addEventSource', calender_data_url);
     $('#calendar').fullCalendar( 'rerenderEvents' );
  }





  $('.date_pick').datetimepicker({
    format: 'DD/MM/YYYY',
    pickTime: false

  });

  $('.time_pick').datetimepicker({
    pickDate: false
  });






$("#create_event_btn").click(function(){
     var set_start_time=$('#set_start_time_data').val();
       if(set_start_time=='Yes'){
         $('#event_start_time').attr('required', 'required');
     }else{
         $('#event_start_time').removeAttr('required');
     }




     var set_end_date=$('#set_end_date_data').val();
     if(set_end_date=='Yes'){
         $('#event_end_date').attr('required', 'required');
     }else{
         $('#event_end_date').removeAttr('required');
     }



      var set_end_time=$('#set_end_time_data').val();
       if(set_end_time=='Yes'){
         $('#event_end_time').attr('required', 'required');
     }else{
         $('#event_end_time').removeAttr('required');
     }

*/

  function edit_event(event_id){

    $('#edit_event_modal').modal({
      show: 'true'
    });
    $('#edit_event_frm').parsley().reset();
    $("#edit_event_frm")[0].reset();

    $('#edit_event_alert').html(loader);

    var view_html='';
    var single_event_url = "{{url('course-by-id/')}}/"+event_id;
    $.get(single_event_url, function (r) {
        var edata = r;
        if(edata.id>0){
          $('#edit_event_alert').html('');
          $('#edit_event_id').val(edata.id);
          $('#edit_event_title').html(edata.name);
          $('#edit_price').html(edata.cost);
          $('#edit_event_start_date').html(edata.start_date);
          $('#edit_event_end_date').html(edata.end_date);
          $('#edit_event_description').html(edata.description);
        }
    });
  }







$("#edit_event_btn").click(function(){

  if($('#edit_event_frm').parsley().validate()==true ){
    $('#edit_event_alert').show().html(loader);
    var action = "{{url('buy-course/')}}/" + $('#edit_event_id').val();

    $.get(action, function (feedback) {
       var jd = $.parseJSON(feedback);
       $('#edit_event_alert').html('');
       if(jd.type=='alert-success'){
          alert('redirect to buy page')
       } else {
          var msg ='';
          $.each(jd.error, function( key, value ){
           msg +=value+'</br>';
          });
          $('#edit_event_alert').show().html('<div class="alert '+jd.type+'"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+msg+'</div>');
          }
    });
  }
 });
</script>

@endsection