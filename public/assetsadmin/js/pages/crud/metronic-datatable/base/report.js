"use strict";
// Class definition

var KTDatatableRemoteAjaxManual = function() {
	// Private functions


	// basic demo
	var demo = function() {

		var datatable = $('.kt-reportdatatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: 'ajaxreportlist',
						method: 'GET',
						// sample custom headers
						headers: {'x-my-custokt-header': 'some value', 'x-test-header': 'the value'},
						map: function(raw) {
              $("#reportgeneralSearch").val('Search');
              $("#reportgeneralSearch").prop('disabled', false);
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
				{
					field: 'course_id',
          sortable: false,
					title: 'Course',
				},
        {
          field: 'candidate_id',
          sortable: false,
          title: 'Candidate',
        },
        {
          field: 'price',
          title: 'Price',
        },
        {
          field: 'payment_status',
          sortable: false,
          title: 'Payment Status',
        },
        {
          field: 'added_date',
          sortable: false,
          title: 'Order Date',
        },
        {
          field: 'payment_date',
          sortable: false,
          title: 'Payment Date',
          width:110
        },

				],
		});
/*
    $('#kt_form_status').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'caseStatus');
    });

    $('#kt_form_type').on('change', function() {
      datatable.search($(this).val().toLowerCase(), 'caseStage');
    });

    $('#kt_form_status,#kt_form_type').selectpicker();*/

  $('#reportgeneralSearch').on('click', function() {
      $("#reportgeneralSearch").val('Loading...');
      $("#reportgeneralSearch").prop('disabled', true);
      var startDate = $('#startDate').val();
      var endDate = $('#endDate').val();
      var courseId = $('#kt_form_course').val();
      var candidateId = $('#kt_form_candidate').val();
      var search = courseId+'||'+candidateId+'||'+startDate+'||'+endDate;
    //if(($(this).val().length)>=3 || $(this).val().length==0) {
      datatable.search(search, 'reportgeneralSearch');
    //}
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
  KTDatatableRemoteAjaxManual.init();
});