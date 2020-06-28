  <!-- begin::Global Config(global config for global JS sciprts) -->
<script nonce="{{ csrf_token() }}">
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
<!--end::Global Theme Bundle -->
<!--begin::Page Vendors(used by this page)
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script> -->
<!--end::Page Vendors -->
<!--begin::Page Scripts(used by this page)
<script src="{{ asset('assets/js/pages/crud/datatables/data-sources/ajax-server-side1.js') }}" type="text/javascript"></script>-->

<script src="{{ asset('assetsadmin/js/pages/crud/metronic-datatable/base/audit.js?v='.$scriptVer) }}" type="text/javascript"></script>


<script src="{{ asset('assetsadmin/js/pages/crud/forms/widgets/summernote.js?v='.$scriptVer) }}" type="text/javascript"></script>


<script nonce="{{ csrf_token() }}">
  $('.summernote').summernote({
    height: 300, // set editor height
    minHeight: null,  // set minimum height of editor
    maxHeight: null,  // set maximum height of editor
    focus: true // set focus to editable area after initializing summernote
  });

  var skipDetailAjaxCall = false;

  function veiwAuditDetails(auditId) {
    if(skipDetailAjaxCall == true){
      return;
    }
    skipDetailAjaxCall = true;

    $('.viewLoader-'+auditId).show();

    var container = $("#auditview_Modal");
    $('#description',container).val('');
    $("#audit_title",container).val('');


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var viewUrl = "{{ url('/') }}/auditdetail/"+auditId;
    $.ajax({
      type:'GET',
      url:viewUrl,
      success:function(response){
        skipDetailAjaxCall = false;
        $('.viewLoader-'+auditId).hide();
        var desc = response.audit_text;
        if(desc != null) {
          desc = desc.replace("<p>", "");
          desc = desc.replace("</p>", "");
        } else {
          desc = '';
        }

        $('#description',container).val(desc);
        $("#audit_title",container).val(response.audit_title);
        $("#auditview_Modal").modal('show');

      },
      error: function (response, status, error) {
        $('.viewLoader-'+auditId).hide();
        skipDetailAjaxCall = false;
      }
    });
  }

  var skipAddMultiAjaxCall = false;
  $('#auditadd').on('submit', function(e) {
    e.preventDefault();
    if(skipAddMultiAjaxCall == true){
      return;
    }
    skipAddMultiAjaxCall = true;

    var form_data = $("form#auditadd").serialize();

    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    });

    $.ajax({
      type: "POST",
      url: './createaudit',
      data: form_data,
      cache: false, // To unable request pages to be cached
      processData: false,
      success: function(msg) {
        skipAddMultiAjaxCall = false;
        var status = msg.status;
        if(status =='success'){
          $('#auditadd_Modal').modal('toggle');
          $('.kt-auditdatatable').KTDatatable().load();
          $('#ajaxmessagediv').show();
          $('#ajaxmessagediv').html('<div class="alert alert-success alert-dismissible">  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  <strong>Success!</strong>  Added Successfully.</div>');
          setTimeout(function() {  $('#ajaxmessagediv').fadeOut('fast');}, 3000);
        } else {
          errorString='';
          $.each( msg.message, function( key, value) {
            for(var l=0;l<value.length; l++){
              errorString +=  value[l] +'<br/>' ;
            }
          });
          $("#addauditmessage").html("<strong>Error!</strong> "+errorString);
          $("#addauditmessage").slideDown(function() {
            setTimeout(function() {
              $("#addauditmessage").slideUp();
            }, 3000);
          });
        }
      },
      error: function (response, status, error) {
        skipAddMultiAjaxCall = false;
        $("#addauditmessage").html("<strong>Error!</strong> Something went wrong");
        $("#addauditmessage").slideDown(function() {
          setTimeout(function() {
            $("#addauditmessage").slideUp();
          }, 3000);
        });
      }
    });
  });

//Edit Modal Open
var skipUpdateAjaxCall = false;
$('#auditedit').on('submit', function(e) {
  e.preventDefault();
  if(skipUpdateAjaxCall == true){
    return;
  }
  skipUpdateAjaxCall = true;
  var form_data = $("form#auditedit").serialize();
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name=_token]').attr('content')
    }
  });
//EDIT AJAX
  $.ajax({
    type: "POST",
    url: './editaudit',
    data: form_data,
    cache: false, // To unable request pages to be cached
    processData: false,
    success: function(msg) {
      skipUpdateAjaxCall = false;
      var status = msg.status;
      if(status =='success'){
        $('#auditedit_modal').modal('toggle');
        $('.kt-auditdatatable').KTDatatable().load();

        $('#ajaxmessagediv').show();
        $('#ajaxmessagediv').html('<div class="alert alert-success alert-dismissible">  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  <strong>Success!</strong> Edit Successfully.</div>');
        setTimeout(function() {  $('#ajaxmessagediv').fadeOut('fast');}, 3000);
      } else {
        errorString='';
        $.each( msg.message, function( key, value) {
          for(var l=0;l<value.length; l++){
            errorString +=  value[l] +'<br/>' ;
          }
        });
        $("#editauditmessage").html("<strong>Error!</strong> "+errorString);
        $("#editauditmessage").slideDown(function() {
          setTimeout(function() {
            $("#editauditmessage").slideUp();
          }, 3000);
        });
      }
    },
    error: function (response, status, error) {
      skipUpdateAjaxCall = false;
      $("#editauditmessage").html("<strong>Error!</strong> Something went wrong");
      $("#editauditmessage").slideDown(function() {
        setTimeout(function() {
          $("#editauditmessage").slideUp();
        }, 3000);
      });
    }
  });
});



$('#deleteModal').on('show.bs.modal', function(e) {
  $("#auditIdDelete").val($(e.relatedTarget).data('id'));
});

$('#auditdelete').on('submit', function(e) {
  e.preventDefault();
  var auditIdDelete = $('#auditIdDelete').val();
  $.ajax({
    type: "POST",
    url: './deleteaudit',
    data: {
      "_token": "{{ csrf_token() }}",
      "auditIdDelete": auditIdDelete
    },
    success: function(msg) {
      if (msg.status == 'fail') {
        alert(JSON.stringify(msg.status, null, 1));
      } else {
        $('#deleteModal').modal('toggle');
        $('.kt-auditdatatable').KTDatatable().load();
        $('#ajaxmessagediv').show();
        $('#ajaxmessagediv').html('<div class="alert alert-success alert-dismissible">  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  <strong>Success!</strong> Delete Successfully.</div>');
        setTimeout(function() {  $('#ajaxmessagediv').fadeOut('fast');}, 3000);
      }
    }
  });
});

//Edit Modal Open
var skipEditAjaxCall = false;
function editAuditDetails(auditId) {
  if(skipEditAjaxCall == true){
    return;
  }
  skipEditAjaxCall = true;

  $('.viewLoader-'+auditId).show();
  $("#editauditmessage").hide();

  var container = $("#auditedit_modal");
  $('#audit_textEdit').val("");
  $("#auditId",container).val('');
  $("#audit_titleEdit",container).val('');

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var viewUrl = "{{ url('/') }}/auditdetail/"+auditId;
  $.ajax({
    type:'GET',
    url:viewUrl,
    success:function(response){
      skipEditAjaxCall = false;
      $('.viewLoader-'+auditId).hide();
      var desc = response.audit_text;
      if(desc != null) {
      } else {
        desc = ' ';
      }

      $('#audit_textEdit').summernote('reset');
      $('#audit_textEdit').summernote('editor.pasteHTML', desc);
      $("#auditId",container).val(response.id);
      $("#audit_titleEdit",container).val(response.audit_title);
     
      $("#auditedit_modal").modal('show');

    },
    error: function (response, status, error) {
      $('.viewLoader-'+auditId).hide();
      skipEditAjaxCall = false;
    }
  });
}
</script>