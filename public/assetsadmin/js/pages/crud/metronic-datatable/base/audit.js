"use strict";
// Class definition

var KTDatatableRemoteAjaxManual = function() {
	// Private functions


	// basic demo
	var demo = function() {

		var datatable = $('.kt-auditdatatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: 'ajaxauditslist',
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
					title: 'ManualId',
					sortable: 'asc',
					width: 75,
					type: 'number',
					selector: false,
					textAlign: 'center',
					template: function(row) {
						return '<a href="javascript:;" onclick=userdetails('+row.id+')>'+row.id+'</a>';
					}
				},*/
				{
					field: 'audit_title',
					title: 'Title',
				},
        ,
				{
					field: 'Actions',
					title: 'Actions',
					sortable: false,
					width: 140,
					overflow: 'visible',
					autoHide: false,
					template: function(row) {
						return '\
						<a onclick="veiwManualDetails('+row.id+')" href="javascript:void(0);" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="View details">\
							<i class="flaticon-eye"></i>\
						</a>\
						<a href="javascript:void(0);" onclick="editManualDetails('+row.id+')" data-toggle="modal" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Edit details">\
							<i class="flaticon2-edit"></i>\
						</a>\
						<a href="javascript:;"  data-id='+row.id+'  data-toggle="modal" data-target="#deleteModal"  class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Delete">\
							<i class="flaticon2-trash"></i>\
						</a>\
             <a class="viewLoader-'+row.id+' spinner-border spinner-border-sm text-primary" style="display:none;" role="status">\
              <span class="sr-only">Loading...</span>\
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

	$('#auditgeneralSearch').on('keyup', function() {
		if(($(this).val().length)>=3 || $(this).val().length==0) {
			datatable.search($(this).val(), 'auditgeneralSearch');
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
	KTDatatableRemoteAjaxManual.init();



});