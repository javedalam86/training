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
  <script src="{{ asset('assetsadmin/js/pages/crud/metronic-datatable/base/quizresultadminlist.js?v='.$scriptVer) }}" type="text/javascript"></script>

  <script>
var ROOT_PATH = '{{$ROOT_PATH}}';




$("#submitquizevaluation").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    $.ajax({
           type: "POST",
           url: ROOT_PATH+"/ajaxquizmarksupdate",
           data: $(e.target).serialize(), // serializes the form's elements.
           success: function(data)
           {   location.reload();
               //alert(data); // show response from the php script.
           }
     });
});

function reEnableQuizBtn(candidate_quiz_id){

    var form = $(this);
    $.ajax({
           type: "POST",
           url: ROOT_PATH+"/ajaxreenablequizbtn",
            data: {
			  "_token": "{{ csrf_token() }}",
			  "candidate_quiz_id": candidate_quiz_id,
			},
		   dataType: 'json',
           success: function(data)
           {    location.reload();
               //alert(data); // show response from the php script.
           }
     });
}

function downloadCetificate(candidate_quiz_id){

    $("#candidate_quiz_id").val(candidate_quiz_id);
    $("#downloadCertificate").submit();
    return false;
    /*var form = $(this);
    $.ajax({
           type: "POST",
           url: ROOT_PATH+"/ajaxhtmltopdfview",
            data: {
			  "_token": "{{ csrf_token() }}",
			  "candidate_quiz_id": candidate_quiz_id,
			},
		   dataType: 'json',
           success: function(data)
           {    location.reload();
               //alert(data); // show response from the php script.
           }
     });	*/
}






function showevaluationmodal(candidate_quiz_id){
	$('#quize_result_Modal').modal('toggle');
    $.ajax({
        url: ROOT_PATH+"/ajaxquizeanswers",
       data: {
          "_token": "{{ csrf_token() }}",
          "candidate_quiz_id": candidate_quiz_id,
        },
		   dataType: 'json',
        success: function(result) {
            // get the ajax response data  resultData
			var QuestionListHTML='';
           // var QuestionList = res.resultData; alert(QuestionList);alert(res.resultData);alert(res.status);
		   var Qcount =1;
			$.each( result.resultData, function( key, value) {
				QuestionListHTML+='<div class="form-group row">\
                      <div class="col-lg-10">\
                          <label class="col-form-label kt-font-bolder">Question&nbsp;'+Qcount+' :&nbsp;</label><label>'+value.question+'</label>\
                      </div>\
					  <div class="col-lg-1">\
                         <label  class="col-form-label kt-font-bolder"><input type="hidden" name="quizresultId[]"  value="'+value.quize_result_id+'"><input type="number" name="marks[]"  id="marks" style="width:65px;" class="form-control" value="'+value.marks+'"></label>\
                      </div>\
					  <div class="col-lg-12">\
						<label>Answer&nbsp;:&nbsp;</label><label>'+value.selected_option+'</label>\
                      </div>\
                    </div>';
					Qcount++;
				});
          $('#quizquestionList').html(QuestionListHTML);

            // show modal
            //$('#myModal').modal('show');

        },
        error:function(request, status, error) {
            console.log("ajax call went wrong:" + request.responseText);
        }
    });




}


























/*

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
      var start_date = $('#startDate').val();
      var end_date = $('#endDate').val();
      $.ajax({
        type: "POST",
        url: './createcourse',
        data: {
          "_token": "{{ csrf_token() }}",
          "name": name,
          "description": description,
          "cost": cost,
          "course_type": course_type,
          "start_date": start_date,
          "end_date": end_date,
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
      var startdateEdit = $('#startDateEdit').val();
      var enddateEdit = $('#endDateEdit').val();

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
          "start_date": startdateEdit,
          "end_date": enddateEdit,
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
      $("#editcoursemessage").hide();
      var courseId = $(e.relatedTarget).data('id');
      var courseEdit = $(e.relatedTarget).data('name');
      var descriptionEdit = $(e.relatedTarget).data('description');
      var nameEdit = $(e.relatedTarget).data('name');
      var course_typeEdit = $(e.relatedTarget).data('course_type');
      var costEdit = $(e.relatedTarget).data('cost');
      var startdateEdit = $(e.relatedTarget).data('start_date');
      var enddateEdit = $(e.relatedTarget).data('end_date');
      $("#courseId").val(courseId);
      $("#courseEdit").val(courseEdit);
      $("#nameEdit").val(nameEdit);
      $("#descriptionEdit").val(descriptionEdit);
      $("#course_typeEdit").val(course_typeEdit);
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
    }); */
</script>