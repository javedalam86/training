"use strict";
// Class definition

var KTDatatableRemoteAjaxCourse = function() {
	// Private functions


	// basic demo
	var demo = function() {

		var datatable = $('.kt-coursedatatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: 'ajaxquizeresultlist',
						method: 'GET',
						// sample custom headers
						headers: {'x-my-custokt-header': 'some value', 'x-test-header': 'the value'},
						map: function(raw) {
							// sample data mapping
							var dataSet = raw;
							if (typeof raw.data !== 'undefined') {
								dataSet = raw.data;
							}
							return dataSet;
						},
					},
				},
				pageSize: 10,
				serverPaging: true,
				serverFiltering: true,
				serverSorting: true,
			},

			// layout definition
			layout: {
				scroll: false,
				footer: false,
			},

			// column sorting
			sortable: true,

			pagination: true,

			search: {
				//input: $('#generalSearch'),
			},

			// columns definition
			columns: [
				/*{
					field: 'id',
					title: 'CourseId',
					sortable: 'asc',
					width: 75,
					type: 'number',
					selector: false,
					textAlign: 'center',
					template: function(row) { is_evaluated
						return '<a href="javascript:;" onclick=userdetails('+row.id+')>'+row.id+'</a>';
					}
				}, */
				{
					field: 'quize_name',
					title: 'Quiz',
				}, {
					field: 'course_name',
					title: 'Course',
				}, {
					field: 'username',
					title: 'Candidate',					
				},{
					field: 'is_evaluated',
					title: 'Evaluation',
					
					template: function(row) { 
						var showEnableQuizBtn ='';
						
						
						if(row.quiz_result == 'FAIL' && ( row.quiz_re_enabled!=0)){  showEnableQuizBtn = '<button type="button" class="btn btn-brand btn-icon-sm"  onclick=reEnableQuizBtn('+row.candidate_quiz_id+') style=" height: 32px;padding-top:0px;padding-bottom:0px;"> Re-Enable Quiz</button>';
						}
						
						if(row.is_evaluated == 1){
							//return '<a href="javascript:;" onclick=userdetails('+row.candidate_quiz_id+')>Evaluation Done</a>';
							return ' <a href="javascript:;" onclick=showevaluationmodal('+row.candidate_quiz_id+')>Evaluation Done</a>' +showEnableQuizBtn;
						}else{
							return '<a href="javascript:;" onclick=showevaluationmodal('+row.candidate_quiz_id+')>Evaluate now</a>';
						}
					}					
				},{
					field: 'quiz_result',
					title: 'Result',width: 50,
					template: function(row) { 
						if(row.quiz_result == 'PASS'){ 
							//return '<a href="javascript:;" onclick=showcandidateresultmodal('+row.candidate_quiz_id+')>Pass</a>';
							return 'PASS &nbsp'+'<a href="javascript:;" onclick=downloadCetificate('+row.candidate_quiz_id+')>Download</a>';
						}else if(row.quiz_result == 'FAIL'){ return 'FAIL';
							//return '<a href="javascript:;" onclick=showcandidateresultmodal('+row.candidate_quiz_id+')>Fail</a>';
						}else{
							return '--';
						}
					}					
				}],

		});
/*
    $('#kt_form_status').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'caseStatus');
    });

    $('#kt_form_type').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'caseStage');
    });

    $('#kt_form_status,#kt_form_type').selectpicker();*/

	$('#coursegeneralSearch').on('keyup', function() {
		if(($(this).val().length)>=3 || $(this).val().length==0) {
			datatable.search($(this).val(), 'coursegeneralSearch');
		}
	});


	};

	return {
		// public functions
		init: function() {
			demo();
		},
	};
}();

jQuery(document).ready(function() {
	KTDatatableRemoteAjaxCourse.init();



});