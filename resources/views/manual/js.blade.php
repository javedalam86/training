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

<script src="{{ asset('assetsadmin/js/pages/crud/metronic-datatable/base/manual.js?v='.$scriptVer) }}" type="text/javascript"></script>


<script src="{{ asset('assetsadmin/js/pages/crud/forms/widgets/summernote.js?v='.$scriptVer) }}" type="text/javascript"></script>


<script nonce="{{ csrf_token() }}">
  $('.summernote').summernote({
    height: 300, // set editor height
    minHeight: null,  // set minimum height of editor
    maxHeight: null,  // set maximum height of editor
    focus: true // set focus to editable area after initializing summernote
  });

  var skipDetailAjaxCall = false;

  function veiwManualDetails(manualId) {
    if(skipDetailAjaxCall == true){
      return;
    }
    skipDetailAjaxCall = true;

    $('.viewLoader-'+manualId).show();

    var container = $("#manualview_Modal");
    $('#description',container).val('');
    $("#manual_title",container).val('');
    $("#section_order",container).val('');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var viewUrl = "{{ url('/') }}/manualdetail/"+manualId;
    $.ajax({
      type:'GET',
      url:viewUrl,
      success:function(response){
        skipDetailAjaxCall = false;
        $('.viewLoader-'+manualId).hide();
        var desc = response.manual_text;
        if(desc != null) {
          desc = desc.replace("<p>", "");
          desc = desc.replace("</p>", "");
        } else {
          desc = '';
        }

        $('#description',container).val(desc);
        $("#manual_title",container).val(response.manual_title);
        $("#section_order",container).val(response.section_order);
        $("#manualview_Modal").modal('show');

      },
      error: function (response, status, error) {
        $('.viewLoader-'+manualId).hide();
        skipDetailAjaxCall = false;
      }
    });
  }

  var skipAddMultiAjaxCall = false;
  $('#manualadd').on('submit', function(e) {
    e.preventDefault();
    if(skipAddMultiAjaxCall == true){
      return;
    }
    skipAddMultiAjaxCall = true;

    var form_data = $("form#manualadd").serialize();

    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    });

    $.ajax({
      type: "POST",
      url: './createmanual',
      data: form_data,
      cache: false, // To unable request pages to be cached
      processData: false,
      success: function(msg) {
        skipAddMultiAjaxCall = false;
        var status = msg.status;
        if(status =='success'){
          $('#manualadd_Modal').modal('toggle');
          $('.kt-manualdatatable').KTDatatable().load();
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
          $("#addmanualmessage").html("<strong>Error!</strong> "+errorString);
          $("#addmanualmessage").slideDown(function() {
            setTimeout(function() {
              $("#addmanualmessage").slideUp();
            }, 3000);
          });
        }
      },
      error: function (response, status, error) {
        skipAddMultiAjaxCall = false;
        $("#addmanualmessage").html("<strong>Error!</strong> Something went wrong");
        $("#addmanualmessage").slideDown(function() {
          setTimeout(function() {
            $("#addmanualmessage").slideUp();
          }, 3000);
        });
      }
    });
  });

//Edit Modal Open
var skipUpdateAjaxCall = false;
$('#manualedit').on('submit', function(e) {
  e.preventDefault();
  if(skipUpdateAjaxCall == true){
    return;
  }
  skipUpdateAjaxCall = true;
  var form_data = $("form#manualedit").serialize();
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name=_token]').attr('content')
    }
  });
//EDIT AJAX
  $.ajax({
    type: "POST",
    url: './editmanual',
    data: form_data,
    cache: false, // To unable request pages to be cached
    processData: false,
    success: function(msg) {
      skipUpdateAjaxCall = false;
      var status = msg.status;
      if(status =='success'){
        $('#manualedit_modal').modal('toggle');
        $('.kt-manualdatatable').KTDatatable().load();

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
        $("#editmanualmessage").html("<strong>Error!</strong> "+errorString);
        $("#editmanualmessage").slideDown(function() {
          setTimeout(function() {
            $("#editmanualmessage").slideUp();
          }, 3000);
        });
      }
    },
    error: function (response, status, error) {
      skipUpdateAjaxCall = false;
      $("#editmanualmessage").html("<strong>Error!</strong> Something went wrong");
      $("#editmanualmessage").slideDown(function() {
        setTimeout(function() {
          $("#editmanualmessage").slideUp();
        }, 3000);
      });
    }
  });
});



$('#deleteModal').on('show.bs.modal', function(e) {
  $("#manualIdDelete").val($(e.relatedTarget).data('id'));
});

$('#manualdelete').on('submit', function(e) {
  e.preventDefault();
  var manualIdDelete = $('#manualIdDelete').val();
  $.ajax({
    type: "POST",
    url: './deletemanual',
    data: {
      "_token": "{{ csrf_token() }}",
      "manualIdDelete": manualIdDelete
    },
    success: function(msg) {
      if (msg.status == 'fail') {
        alert(JSON.stringify(msg.status, null, 1));
      } else {
        $('#deleteModal').modal('toggle');
        $('.kt-manualdatatable').KTDatatable().load();
        $('#ajaxmessagediv').show();
        $('#ajaxmessagediv').html('<div class="alert alert-success alert-dismissible">  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  <strong>Success!</strong> Delete Successfully.</div>');
        setTimeout(function() {  $('#ajaxmessagediv').fadeOut('fast');}, 3000);
      }
    }
  });
});

//Edit Modal Open
var skipEditAjaxCall = false;
function editManualDetails(manualId) {
  if(skipEditAjaxCall == true){
    return;
  }
  skipEditAjaxCall = true;

  $('.viewLoader-'+manualId).show();
  $("#editmanualmessage").hide();

  var container = $("#manualedit_modal");
  $('#manual_textEdit').val("");
  $("#manualId",container).val('');
  $("#manual_titleEdit",container).val('');

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  var viewUrl = "{{ url('/') }}/manualdetail/"+manualId;
  $.ajax({
    type:'GET',
    url:viewUrl,
    success:function(response){
      skipEditAjaxCall = false;
      $('.viewLoader-'+manualId).hide();
      var desc = response.manual_text;
      if(desc != null) {
      } else {
        desc = ' ';
      }

      $('#manual_textEdit').summernote('reset');
      $('#manual_textEdit').summernote('editor.pasteHTML', desc);
      $("#manualId",container).val(response.id);
      $("#manual_titleEdit",container).val(response.manual_title);
      $("#section_order",container).val(response.section_order);
      $("#manualedit_modal").modal('show');

    },
    error: function (response, status, error) {
      $('.viewLoader-'+manualId).hide();
      skipEditAjaxCall = false;
    }
  });
}
</script>