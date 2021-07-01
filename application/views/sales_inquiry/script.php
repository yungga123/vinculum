<?php 
defined('BASEPATH') or die('Access Denied');
?>

<script>
		// Dispatch Forms Table	
		$(document).ready( function(){
			//Datatable for Sales Quotation Table
		    var new_client_table_data  = $("#new_client_table").DataTable({
		    	responsive: true,
		    	"processing": true,
		    	"serverSide": true,
	            "order":[],
	            "ajax":{
	                url: "<?php echo site_url('SalesInquiryController/get_new_client_list') ?>",
	                type: "POST"
	           },
	            "columnDefs": [
	                {
	                   "targets": [8],
	                    "orderable": false, 
	                }
	            ]
		    });
		    //end of datatable

			//click select edit for masterlist table
		    $('#new_client_table tbody').on( 'click', '.btn_select', function () {
		    	var data = new_client_table_data.row($(this).parents('tr')).data();
				var rowdata = new_client_table_data.row(this).data();
				if (data == undefined) {
					var me = '<?php echo site_url('SalesInquiryController/fetch_client_data/') ?>'+rowdata[0];
					$(".client_id_edit").val(rowdata[0]);
				} else if (rowdata == undefined) {
					var me = '<?php echo site_url('SalesInquiryController/fetch_client_data/') ?>'+data[0];
					$(".client_id_edit").val(data[0]);
				}
			   //ajax
			 	$.ajax({
			 		url: me,
			 		type: 'get',
			 		dataType: 'json',
			 		success: function(response) {

			 			$(".client_name_edit").val(response.client_data[0].customer_name);
						$(".contact_person_edit").val(response.client_data[0].contact_person);
						$(".contact_number_edit").val(response.client_data[0].contact_number);
						$(".location_edit").val(response.client_data[0].location);
						$(".email_add_edit").val(response.client_data[0].email_add);
						$(".website_edit").val(response.client_data[0].website);
						$(".interest_edit").val(response.client_data[0].interest);
						$(".type_edit").val(response.client_data[0].type);
						$(".notes_edit").val(response.client_data[0].notes);
			 			
			 			
			 		}
			 	});
			} );

				//Fetching Data in Pending Requisition (For Delete)
		$('#new_client_table tbody').on('click','.btn_client_del',function(){

			var data = new_client_table_data.row($(this).parents('tr')).data();
			var rowdata = new_client_table_data.row(this).data();

			if (data == undefined) {
				$('#client_id_del').val(rowdata[0]);
			} else if (rowdata == undefined) {
				$('#client_id_del').val(data[0]);
			}

			});


					//Fetching Data in Pending Requisition (For Approved)
		$('#new_client_table tbody').on('click','.btn_client_approved',function(){

			var data = new_client_table_data.row($(this).parents('tr')).data();
			var rowdata = new_client_table_data.row(this).data();

			if (data == undefined) {
				$('#client_id_approved').val(rowdata[0]);
			} else if (rowdata == undefined) {
				$('#client_id_approved').val(data[0]);
			}

			});

            //Modal Add Vendor
		$('#modal-add-client').submit(function(e) {
		 	e.preventDefault();
		 	
		 	var me = $(this);
		 	var succ = '';

		 	toastr.options = {
				"closeButton": false,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}

			$(':submit').attr('disabled','disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Client Added!");
                         window.location = '<?php echo site_url('inquiry-tempo-clients') ?>';
						 me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

		   //Modal Edit Vendor
		   $('#modal-edit-client').submit(function(e) {
		 	e.preventDefault();
		 	
		 	var me = $(this);
		 	var succ = '';

		 	toastr.options = {
				"closeButton": false,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}

			$(':submit').attr('disabled','disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Client Updated!");
						 window.setTimeout(function() {
                                window.location = '<?php echo site_url('inquiry-tempo-clients') ?>';
                            }, 1000);
						 me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

		$('#modal-delete-client').submit(function(e) {
		 	e.preventDefault();
		 	
		 	var me = $(this);
		 	var succ = '';

		 	toastr.options = {
				"closeButton": false,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}

			$(':submit').attr('disabled','disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Client Deleted!");
                         window.location = '<?php echo site_url('inquiry-tempo-clients') ?>';
						 me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

		
		$('#modal-approved-client').submit(function(e) {
		 	e.preventDefault();
		 	
		 	var me = $(this);
		 	var succ = '';

		 	toastr.options = {
				"closeButton": false,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}

			$(':submit').attr('disabled','disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Client Approved!");
                         window.location = '<?php echo site_url('inquiry-tempo-clients') ?>';
						 me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});


		$('#form-add-project').submit(function(e) {
		 	e.preventDefault();
		 	
		 	var me = $(this);
		 	var succ = '';

		 	toastr.options = {
				"closeButton": false,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}

			$(':submit').attr('disabled','disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Project Added!");
                         window.location = '<?php echo site_url('inquiry-tempo-clients') ?>';
						 me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

		$('#form-edit-project').submit(function(e) {
		 	e.preventDefault();
		 	
		 	var me = $(this);
		 	var succ = '';

		 	toastr.options = {
				"closeButton": false,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}

			$(':submit').attr('disabled','disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Project Updated");
                         window.location = '<?php echo site_url('inquiry-tempo-clients') ?>';
						 me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

		$('#form-edit-existingclient-project').submit(function(e) {
		 	e.preventDefault();
		 	
		 	var me = $(this);
		 	var succ = '';

		 	toastr.options = {
				"closeButton": false,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}

			$(':submit').attr('disabled','disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Project Updated");
                         window.location = '<?php echo site_url('inquiry-existing-clients') ?>';
						 me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

			//Fetching Data in Pending Requisition (For Viewing)
			$('#new_client_table tbody').on('click','.btn_view',function(){

				var data = new_client_table_data.row($(this).parents('tr')).data();
				var rowdata = new_client_table_data.row(this).data();

				if (data == undefined) {
					var me = '<?php echo site_url('SalesInquiryController/get_project/') ?>'+rowdata[0];
				} else if (rowdata == undefined) {
					var me = '<?php echo site_url('SalesInquiryController/get_project/') ?>'+data[0];
				}

				$('#modal_loading').addClass('overlay d-flex justify-content-center align-items-center');
				$('#modal_loading').append('<i class="fas fa-2x fa-sync fa-spin"></i>');

				//ajax
				$.ajax({
					url: me,
					type: 'get',
					dataType: 'json',
					success: function(response) {
						$('#tbody-project').empty();
						i = 1;
						$.each(response.results, function (key, value) {

							$('#tbody-project').append('<tr>' +
								'<td>' + i++ + '</td>' +
								'<td>' + response.results[key].project_type + '</td>' +
								'<td>' + response.results[key].project_status + '</td>' +
								'<td>' + response.results[key].lastname + "," + response.results[key].firstname + " " + response.results[key].middlename + '</td>' +
								'<td>' + response.results[key].branch + '</td>' +
								'<td> <a href="' + '<?php echo site_url('inquiry-edit-project/') ?>' + response.results[key].project_id + '" class="btn btn-xs btn-warning btn-block"><i class="fas fa-edit"></i> Edit</a><a href="' + '<?php echo site_url('SalesInquiryController/delete_newclient_project/') ?>' + response.results[key].project_id + '" class="btn btn-danger btn-xs btn-block" onclick="return confirm(\'Are you sure?\')" title="Delete"><i class="fas fa-trash"></i> Delete</a></td>' +
							'</tr>');
							
						});

						$('#modal_loading').removeClass('overlay d-flex justify-content-center align-items-center');
						$('#modal_loading').empty();
					}
					});
				});

		// Add Item Button
			$('.add-task-btn').click(function(){

				var newfield = $('.add-task:last').clone();
				newfield.find('textarea').val('');
				newfield.find('input').val('');
				// Add after last <div class='input-form'>
				$(newfield).insertAfter(".add-task:last");
				});


			$(".delete-task-btn").click(function(){

				count = $('.add-task').length;

				if (count !== 1) {
				$('.add-task').last().remove();
				} else {
				return 0;
				}
			});
	});

</script>

<script>
	$(document).ready( function(){

	 	var existing_client_table_data  = $("#existing_client_table").DataTable({
		    	responsive: true,
		    	"processing": true,
		    	"serverSide": true,
	            "order":[],
	            "ajax":{
	                url: "<?php echo site_url('SalesInquiryController/get_existing_client_list') ?>",
	                type: "POST"
	           },
	            "columnDefs": [
	                {
	                   "targets": [8],
	                    "orderable": false, 
	                }
	            ]
		    });
			// END OF DATATABLE

			//click select edit for masterlist table
		    $('#existing_client_table tbody').on( 'click', '.btn_existing', function () {
		    	var data = existing_client_table_data.row($(this).parents('tr')).data();
				var rowdata = existing_client_table_data.row(this).data();
				if (data == undefined) {
					var me = '<?php echo site_url('SalesInquiryController/fetch_existing_client_data/') ?>'+rowdata[0];
					$(".existing_client_id_edit").val(rowdata[0]);
				} else if (rowdata == undefined) {
					var me = '<?php echo site_url('SalesInquiryController/fetch_existing_client_data/') ?>'+data[0];
					$(".existing_client_id_edit").val(data[0]);
				}
			   //ajax
			 	$.ajax({
			 		url: me,
			 		type: 'get',
			 		dataType: 'json',
			 		success: function(response) {

			 			$(".existing_client_name_edit").val(response.existing_client_data[0].CompanyName);
						$(".existing_contact_person_edit").val(response.existing_client_data[0].ContactPerson);
						$(".existing_contact_number_edit").val(response.existing_client_data[0].ContactNumber);
						$(".existing_location_edit").val(response.existing_client_data[0].Address);
						$(".existing_email_add_edit").val(response.existing_client_data[0].EmailAddress);
						$(".existing_website_edit").val(response.existing_client_data[0].Website);
						$(".existing_interest_edit").val(response.existing_client_data[0].Interest);
						$(".existing_type_edit").val(response.existing_client_data[0].Type);
						$(".existing_notes_edit").val(response.existing_client_data[0].Notes);
			 			
			 			
			 		}
			 	});
			} );

			//Fetching Data in Pending Requisition (For Delete)
			$('#existing_client_table tbody').on('click','.btn_existing_client_del',function(){

				var data = existing_client_table_data.row($(this).parents('tr')).data();
				var rowdata = existing_client_table_data.row(this).data();

				if (data == undefined) {
					$('#existing_client_id_del').val(rowdata[0]);
				} else if (rowdata == undefined) {
					$('#existing_client_id_del').val(data[0]);
				}

				});

				//Fetching Data in Pending Requisition (For Viewing)
			$('#existing_client_table tbody').on('click','.btn_existing_view',function(){

				var data = existing_client_table_data.row($(this).parents('tr')).data();
				var rowdata = existing_client_table_data.row(this).data();

				if (data == undefined) {
					var me = '<?php echo site_url('SalesInquiryController/get_project/') ?>'+rowdata[0];
				} else if (rowdata == undefined) {
					var me = '<?php echo site_url('SalesInquiryController/get_project/') ?>'+data[0];
				}

				$('#modal_loading').addClass('overlay d-flex justify-content-center align-items-center');
				$('#modal_loading').append('<i class="fas fa-2x fa-sync fa-spin"></i>');

				//ajax
				$.ajax({
					url: me,
					type: 'get',
					dataType: 'json',
					success: function(response) {
						$('#tbody-project').empty();
						i = 1;
						$.each(response.results, function (key, value) {

							$('#tbody-project').append('<tr>' +
								'<td>' + i++ + '</td>' +
								'<td>' + response.results[key].project_type + '</td>' +
								'<td>' + response.results[key].project_status + '</td>' +
								'<td>' + response.results[key].lastname + "," + response.results[key].firstname + " " + response.results[key].middlename + '</td>' +
								'<td>' + response.results[key].branch + '</td>' +
								'<td> <a href="' + '<?php echo site_url('inquiry-edit-existingclient-project/') ?>' + response.results[key].project_id + '" class="btn btn-xs btn-warning btn-block"><i class="fas fa-edit"></i> Edit</a><a href="' + '<?php echo site_url('SalesInquiryController/delete_existingclient_project/') ?>' + response.results[key].project_id + '" class="btn btn-danger btn-xs btn-block" onclick="return confirm(\'Are you sure?\')" title="Delete"><i class="fas fa-trash"></i> Delete</a> </td>' +
							'</tr>');
						});

						$('#modal_loading').removeClass('overlay d-flex justify-content-center align-items-center');
						$('#modal_loading').empty();
					}
					});
				});

			//Modal Edit Vendor
			$('#modal-edit-existing-client').submit(function(e) {
		 	e.preventDefault();
		 	
		 	var me = $(this);
		 	var succ = '';

		 	toastr.options = {
				"closeButton": false,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}

			$(':submit').attr('disabled','disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Client Updated!");
						 window.setTimeout(function() {
                                window.location = '<?php echo site_url('inquiry-existing-clients') ?>';
                            }, 1000);
						 me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

		$('#modal-delete-existing-client').submit(function(e) {
		 	e.preventDefault();
		 	
		 	var me = $(this);
		 	var succ = '';

		 	toastr.options = {
				"closeButton": false,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}

			$(':submit').attr('disabled','disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Client Deleted!");
                         window.location = '<?php echo site_url('inquiry-existing-clients') ?>';
						 me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

		$('#form-add-existingclient-project').submit(function(e) {
		 	e.preventDefault();
		 	
		 	var me = $(this);
		 	var succ = '';

		 	toastr.options = {
				"closeButton": false,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}

			$(':submit').attr('disabled','disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Project Added!");
                         window.location = '<?php echo site_url('inquiry-existing-clients') ?>';
						 me[0].reset();
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

		$('#modal-add-branch').submit(function(e) {
		 	e.preventDefault();
		 	
		 	var me = $(this);
		 	var succ = '';

		 	toastr.options = {
				"closeButton": false,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}

			$(':submit').attr('disabled','disabled');
			$('.loading-modal').modal();

		 	//ajax
		 	$.ajax({
		 		url: me.attr('action'),
		 		type: 'post',
		 		data: me.serialize(),
		 		dataType: 'json',
		 		success: function(response) {
		 			if (response.success == true) {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');
		 				toastr.success("Brand Added!");
						 document.location.reload(true);
						 me[0].reset();
						 
		 			} else {
		 				$(':submit').removeAttr('disabled','disabled');
						$('.loading-modal').modal('hide');

		 				toastr.error(response.errors);
		 			}

		 		}
		 	});
		});

	});
</script>