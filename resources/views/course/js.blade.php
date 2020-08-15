<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
  var KTAppOptions = {
    "colors": {
      "state": {
        "brand": "#2c77f4",
        "light": "#ffffff",
        "dark": "#282a3c",
        "primary": "#5867dd",
        "success": "#34bfa3",
        "info": "#36a3f7",
        "warning": "#ffb822",
        "danger": "#fd3995"
      },
      "base": {
        "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
        "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
      }
    }
  };
</script>
  <!-- end::Global Config -->
  <!--begin::Global Theme Bundle(used by all pages) -->
  <script src="{{ asset('assetsadmin/plugins/global/plugins.bundle.js?v='.$scriptVer) }}" type="text/javascript"></script>
  <script src="{{ asset('assetsadmin/js/scripts.bundle.js?v='.$scriptVer) }}" type="text/javascript"></script>
  <script src="{{ asset('assetsadmin/js/pages/crud/metronic-datatable/base/courses.js?v='.$scriptVer) }}" type="text/javascript"></script>

  <script>



    function coursedetail(userId) {
      var urlRoute = 'coursedetail/' + courseId;
      window.location.href = urlRoute;
    }

    $('#courseadd').on('submit', function(e) {
      e.preventDefault();
      $("#addcoursemessage").hide();
      var name = $('#name').val();
      var description = $('#description').val();
      var course_type = $('#course_type').val();
      var cost = $('#cost').val();
      var color = $('#color').val();
      var start_date = $('#startDate').val();
      var end_date = $('#endDate').val();
      var parent_course = $('#parent_course').val();

      $.ajax({
        type: "POST",
        url: './createcourse',
        data: {
          "_token": "{{ csrf_token() }}",
          "name": name,
          "description": description,
          "cost": cost,
          "color": color,
          "course_type": course_type,
          "start_date": start_date,
          "end_date": end_date,
          "parent_course": parent_course,
        },
        success: function(msg) {
          var status = msg.status;
          if(status =='success'){
            $('#courseadd_Modal').modal('toggle');
            $('.kt-coursedatatable').KTDatatable().load();
            $('#ajaxmessagediv').show();
            $('#ajaxmessagediv').html('<div class="alert alert-success alert-dismissible">  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  <strong>Success!</strong> Add Successfully.</div>');
            setTimeout(function() {  $('#ajaxmessagediv').fadeOut('fast');}, 3000);
          }else{
            errorString='';
            $.each( msg.message, function( key, value) {
              for(var l=0;l<value.length; l++){
                errorString +=  value[l] +'<br/>' ;
              }
            });
            $("#addcoursemessage").show();
            $("#addcoursemessage").html("<strong>Error!</strong> "+errorString);
            $("#addcoursemessage").slideDown(function() {
              setTimeout(function() {
                $("#addcoursemessage").slideUp();
              }, 3000);
              //$("#addCompanyModal").trigger('reset');
            });
          }
        }
      });
    });

    $('#courseedit').on('submit', function(e) {
      e.preventDefault();
      var courseId = $('#courseId').val();
      var courseEdit = $('#courseEdit').val();
      var descriptionEdit = $('#descriptionEdit').val();
      var nameEdit = $('#nameEdit').val();
      var course_typeEdit = $('#course_typeEdit').val();
      var costEdit = $('#costEdit').val();
      var colorEdit = $('#colorEdit').val();
      var startdateEdit = $('#startDateEdit').val();
      var enddateEdit = $('#endDateEdit').val();
      var parent_course = $('#parent_courseEdit').val();
      $.ajax({
        type: "POST",
        url: './editcourse',
        data: {
          "_token": "{{ csrf_token() }}",
          "courseId": courseId,
          "name": courseEdit,
          "description": descriptionEdit,
          "name": nameEdit,
          "course_type": course_typeEdit,
          "cost": costEdit,
          "color": colorEdit,
          "start_date": startdateEdit,
          "end_date": enddateEdit,
          "parent_course": parent_course,
        },
        success: function(msg) {
          var status = msg.status;
          if(status =='success'){
            $('#courseedit_modal').modal('toggle');
            $('.kt-coursedatatable').KTDatatable().load();
            $('#ajaxmessagediv').show();
            $('#ajaxmessagediv').html('<div class="alert alert-success alert-dismissible">  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  <strong>Success!</strong> Edit Successfully.</div>');
            setTimeout(function() {  $('#ajaxmessagediv').fadeOut('fast');}, 3000);
          }else{
            errorString='';
            $.each( msg.message, function( key, value) {
              for(var l=0;l<value.length; l++){
                errorString +=  value[l] +'<br/>' ;
              }
            });
            $("#editcoursemessage").html("<strong>Error!</strong> "+errorString);
            $("#editcoursemessage").slideDown(function() {
              setTimeout(function() {
                $("#editcoursemessage").slideUp();
              }, 3000);
            });
          }
        }
      });
    });

    $('#courseedit_modal').on('show.bs.modal', function(e) {
      //Fixed edit datepicker clear all fields data
      if($('#courseedit_modal').hasClass('show')) {
        return false;
      }
      $("#editcoursemessage").hide();
      var courseId = $(e.relatedTarget).data('id');
      var courseEdit = $(e.relatedTarget).data('name');
      var descriptionEdit = $(e.relatedTarget).data('description');
      var nameEdit = $(e.relatedTarget).data('name');
      var course_typeEdit = $(e.relatedTarget).data('course_type');

      var parent_courseEdit = $(e.relatedTarget).data('parent_course');

      var costEdit = $(e.relatedTarget).data('cost');
      var startdateEdit = $(e.relatedTarget).data('start_date');
      var enddateEdit = $(e.relatedTarget).data('end_date');
      $("#courseId").val(courseId);
      $("#courseEdit").val(courseEdit);
      $("#nameEdit").val(nameEdit);
      $("#descriptionEdit").val(descriptionEdit);
      $("#course_typeEdit").val(course_typeEdit);
      $("#parent_courseEdit").val(parent_courseEdit);

      $("#costEdit").val(costEdit);
      $('#startDateEdit').val(startdateEdit);
      $('#endDateEdit').val(enddateEdit);
    });

    $('#deleteModal').on('show.bs.modal', function(e) {
      $("#courseIdDelete").val($(e.relatedTarget).data('id'));
    });

    $('#coursedelete').on('submit', function(e) {
      e.preventDefault();
      var courseIdDelete = $('#courseIdDelete').val();
      $.ajax({
        type: "POST",
        url: './deletecourse',
        data: {
          "_token": "{{ csrf_token() }}",
          "courseIdDelete": courseIdDelete
        },
        success: function(msg) {
          if (msg.status == 'fail') {
            alert(JSON.stringify(msg.status, null, 1));
          } else {
            $('#deleteModal').modal('toggle');
            $('.kt-coursedatatable').KTDatatable().load();
            $('#ajaxmessagediv').show();
            $('#ajaxmessagediv').html('<div class="alert alert-success alert-dismissible">  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  <strong>Success!</strong> Delete Successfully.</div>');
            setTimeout(function() {  $('#ajaxmessagediv').fadeOut('fast');}, 3000);
          }
        }
      });
    });

    $( document ).ready(function() {
      $('#startDate').datepicker({
        format: 'yyyy-mm-dd'
      });
      $('#endDate').datepicker({
        format: 'yyyy-mm-dd'
      });

      $('#startDateEdit').datepicker({
        format: 'yyyy-mm-dd'
      });
      $('#endDateEdit').datepicker({
        format: 'yyyy-mm-dd'
      });
    });
</script>