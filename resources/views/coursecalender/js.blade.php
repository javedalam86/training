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

  /*function reloadCalender(mode)
  {
    $('#calendar').fullCalendar( 'removeEvents');
    $('#calendar').fullCalendar( 'addEventSource', calender_data_url);
    $('#calendar').fullCalendar( 'rerenderEvents' );
  }*/

  function openLoginModel() {
    $('#userLoginModal').modal({
      show: 'true'
    });
  }

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
          alert('redirect to buy page soon...')
       } else {
          var msg = "";
          $.each(jd.error, function( key, value ){
           msg +=value+', ';
          });

          if(jd.type_error =='2'){
            msg += ' Click here to <a href="javascript:void(0)" onclick="openLoginModel()">Login </a>';
          }
          $('#edit_event_alert').show().html('<div class="alert '+jd.type+'"><a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+msg+'</div>');
          }
    });
  }
 });




$('body').on('click', '#submitLoginForm', function(){

  var loginForm = $("#Login");
  var formData = loginForm.serialize();
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $( '#email-errorlogin' ).html( "" );
  $( '#password-errorlogin' ).html( "" );

  $.ajax({
    url:'./loginuserfrm',
    type:'POST',
    data:formData,
    success:function(data) {
      if(data.status=='fail') {  //alert('in if');
        if(data.errors.email){
          $( '#email-errorlogin' ).html( data.errors.email[0] );
        }
        if(data.errors.password){
          $( '#password-errorlogin' ).html( data.errors.password[0] );
        }

      }else if(data.status=='credentials') {  //alert('in if');
        if(data.message){
          $( '#email-errorlogin' ).html( data.message);
        }
      }
      if(data.status=='success') {
        $("#loginsuccess-msg").show()
        $('#loginsuccess-msg').html( data.message);
        setInterval(function(){  $('#loginsuccess-msg').show();
          $('#userLoginModal').modal('hide');
          var urlRoute ="{{route('course-calender')}}";
          window.location.href = urlRoute;
        }, 3000);
      }
    },
  });
});
</script>