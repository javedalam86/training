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
						if(row.is_evaluated == 1){
							return '<a href="javascript:;" onclick=userdetails('+row.candidate_quiz_id+')>Evaluation Done</a>';
						}else{
							return '<a href="javascript:;" onclick=showevaluationmodal('+row.candidate_quiz_id+')>Evaluate now</a>';
						}
					}					
				},{
					field: 'quiz_result',
					title: 'Result',
					template: function(row) { 
						if(row.quiz_result == 'PASS'){
							return '<a href="javascript:;" onclick=showcandidateresultmodal('+row.candidate_quiz_id+')>Pass</a>';
						}else if(row.quiz_result == 'Fail'){
							return '<a href="javascript:;" onclick=showcandidateresultmodal('+row.candidate_quiz_id+')>Fail</a>';
						}else{
							return '--';
						}
					}					
				},{
					field: 'Actions',
					title: 'Actions',
					sortable: false,
					width: 110,
					overflow: 'visible',
					autoHide: false,
					template: function(row) {
            var start_date = "";
            var end_date = ""
            if(row.start_date) {
              var res = row.start_date.split(" ");
              start_date = res[0]
            }

            if(row.end_date) {
              let res = row.end_date.split(" ");
              end_date = res[0]
            }

						return '\
						<a href="coursedetail/'+row.id+'"   class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="View details">\
							<i class="flaticon-eye"></i>\
						</a>\
						<a href="javascript:;" data-id='+row.id+'   data-name="'+row.name+'"   data-cost="'+row.cost+'"   data-course_type="'+row.course_type+'"   data-description="'+row.description+'"  data-start_date="'+start_date+'" data-end_date="'+end_date+'"data-toggle="modal" data-target="#courseedit_modal" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Edit details">\
							<i class="flaticon2-edit"></i>\
						</a>\
						<a href="javascript:;"  data-id='+row.id+'  data-toggle="modal" data-target="#deleteModal"  class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Delete">\
							<i class="flaticon2-trash"></i>\
						</a>\
					';
					},
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