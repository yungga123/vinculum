<?php
defined('BASEPATH') or die('Access Denied');
?>

<script>
	// Dispatch Forms Table	
	$(document).ready(function() {
		//Datatable for Sales Quotation Table
		var new_client_table_data = $("#new_client_table").DataTable({
			responsive: true,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				url: "<?php echo site_url('SalesInquiryController/get_new_client_list') ?>",
				type: "POST"
			},
			"columnDefs": [{
				"targets": [8],
				"orderable": false,
			}]
		});
		//end of datatable

		//click select edit for table
		$('#new_client_table tbody').on('click', '.btn_select', function() {
			var data = new_client_table_data.row($(this).parents('tr')).data();
			var rowdata = new_client_table_data.row(this).data();
			if (data == undefined) {
				var me = '<?php echo site_url('SalesInquiryController/fetch_client_data/') ?>' + rowdata[0];
				$(".client_id_edit").val(rowdata[0]);
			} else if (rowdata == undefined) {
				var me = '<?php echo site_url('SalesInquiryController/fetch_client_data/') ?>' + data[0];
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
					$(".source_edit").val(response.client_data[0].source);
					$(".interest_edit").val(response.client_data[0].interest);
					$(".type_edit").val(response.client_data[0].type);
					$(".notes_edit").val(response.client_data[0].notes);


				}
			});
		});

		//Fetching Data in Pending Requisition (For Delete)
		$('#new_client_table tbody').on('click', '.btn_client_del', function() {

			var data = new_client_table_data.row($(this).parents('tr')).data();
			var rowdata = new_client_table_data.row(this).data();

			if (data == undefined) {
				$('#client_id_del').val(rowdata[0]);
			} else if (rowdata == undefined) {
				$('#client_id_del').val(data[0]);
			}

		});


		//Fetching Data in Pending Requisition (For Approved)
		$('#new_client_table tbody').on('click', '.btn_client_approved', function() {

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

			$(':submit').attr('disabled', 'disabled');
			$('.loading-modal').modal();

			//ajax
			$.ajax({
				url: me.attr('action'),
				type: 'post',
				data: me.serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.success == true) {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						toastr.success("Client Added!");
						window.location = '<?php echo site_url('inquiry-tempo-clients/') ?>list';
						me[0].reset();
					} else {
						$(':submit').removeAttr('disabled', 'disabled');
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

			$(':submit').attr('disabled', 'disabled');
			$('.loading-modal').modal();

			//ajax
			$.ajax({
				url: me.attr('action'),
				type: 'post',
				data: me.serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.success == true) {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						toastr.success("Client Updated!");
						window.setTimeout(function() {
							window.location = '<?php echo site_url('inquiry-tempo-clients/') ?>list';
						}, 1000);
						me[0].reset();
					} else {
						$(':submit').removeAttr('disabled', 'disabled');
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

			$(':submit').attr('disabled', 'disabled');
			$('.loading-modal').modal();

			//ajax
			$.ajax({
				url: me.attr('action'),
				type: 'post',
				data: me.serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.success == true) {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						toastr.success("Client Deleted!");
						window.location = '<?php echo site_url('inquiry-tempo-clients/') ?>list';
						me[0].reset();
					} else {
						$(':submit').removeAttr('disabled', 'disabled');
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

			$(':submit').attr('disabled', 'disabled');
			$('.loading-modal').modal();

			//ajax
			$.ajax({
				url: me.attr('action'),
				type: 'post',
				data: me.serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.success == true) {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						toastr.success("Client Approved!");
						window.location = '<?php echo site_url('inquiry-tempo-clients/') ?>list';
						me[0].reset();
					} else {
						$(':submit').removeAttr('disabled', 'disabled');
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

			$(':submit').attr('disabled', 'disabled');
			$('.loading-modal').modal();

			//ajax
			$.ajax({
				url: me.attr('action'),
				type: 'post',
				data: me.serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.success == true) {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						toastr.success("Project Added!");
						window.location = '<?php echo site_url('inquiry-tempo-clients/') ?>list';
						me[0].reset();
					} else {
						$(':submit').removeAttr('disabled', 'disabled');
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

			$(':submit').attr('disabled', 'disabled');
			$('.loading-modal').modal();

			//ajax
			$.ajax({
				url: me.attr('action'),
				type: 'post',
				data: me.serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.success == true) {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						toastr.success("Project Updated");
						window.location = '<?php echo site_url('inquiry-tempo-clients/') ?>list';
						me[0].reset();
					} else {
						$(':submit').removeAttr('disabled', 'disabled');
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

			$(':submit').attr('disabled', 'disabled');
			$('.loading-modal').modal();

			//ajax
			$.ajax({
				url: me.attr('action'),
				type: 'post',
				data: me.serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.success == true) {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						toastr.success("Project Updated");
						window.location = '<?php echo site_url('inquiry-existing-clients') ?>/list';
						me[0].reset();
					} else {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');

						toastr.error(response.errors);
					}

				}
			});
		});

		//Fetching Data in New Client (For Viewing)
		$('#new_client_table tbody').on('click', '.btn_view', function() {

			var data = new_client_table_data.row($(this).parents('tr')).data();
			var rowdata = new_client_table_data.row(this).data();

			if (data == undefined) {
				var me = '<?php echo site_url('SalesInquiryController/get_project/') ?>' + rowdata[0];
			} else if (rowdata == undefined) {
				var me = '<?php echo site_url('SalesInquiryController/get_project/') ?>' + data[0];
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

					//$.each(response.task_results, function (key, value) {
					//	$task = response.task_results[key].project_task;
					//	$task_date = response.task_results[key].date_of_task;
					//	});

					$.each(response.results, function(key, value) {
						$('#tbody-project').append('<tr>' +
							'<td>' + i++ + '</td>' +
							'<td>' + response.results[key].project_type + '</td>' +
							'<td>' + response.results[key].project_status + '</td>' +
							'<td>' + response.results[key].lastname + "," + response.results[key].firstname + " " + response.results[key].middlename + '</td>' +
							'<td>' + response.results[key].branch + '</td>' +
							'<td>' + response.results[key].project_task + '</td>' +
							'<td>' + response.results[key].date_of_task + '</td>' +
							'<td>' + response.results[key].project_details + '</td>' +
							'<td>' + response.results[key].project_amount + '</td>' +
							'<td>' + response.results[key].quotation_ref + '</td>' +
							'<td>' + response.results[key].date_of_installation + '</td>' +
							'<td> <a href="' + '<?php echo site_url('inquiry-edit-project/') ?>' + response.results[key].project_id + '" class="btn btn-xs btn-warning btn-block"><i class="fas fa-edit"></i> Edit Project</a><a href="' + '<?php echo site_url('SalesInquiryController/delete_newclient_project/') ?>' + response.results[key].project_id + '" class="btn btn-danger btn-xs btn-block" onclick="return confirm(\'Are you sure?\')" title="Delete"><i class="fas fa-trash"></i> Delete Project</a> <a href="' + '<?php echo site_url('inquiry-tempo-clients/') ?>' + response.results[key].project_id + '" class="btn btn-xs btn-danger btn-block" id="btn-archive-project"><i class="far fa-times-circle"></i> Reject Project</a></td>' +
							'</tr>'
						);


					});



					$('#modal_loading').removeClass('overlay d-flex justify-content-center align-items-center');
					$('#modal_loading').empty();
				}
			});
		});

		//Fetching Data in New Client (For Viewing of branch)
		$('#new_client_table tbody').on('click', '.btn_view_branch', function() {

			var data = new_client_table_data.row($(this).parents('tr')).data();
			var rowdata = new_client_table_data.row(this).data();

			if (data == undefined) {
				var me = '<?php echo site_url('SalesInquiryController/get_branch/') ?>' + rowdata[0] + '/new';
			} else if (rowdata == undefined) {
				var me = '<?php echo site_url('SalesInquiryController/get_branch/') ?>' + data[0] + '/new';
			}

			$('#modal_loading').addClass('overlay d-flex justify-content-center align-items-center');
			$('#modal_loading').append('<i class="fas fa-2x fa-sync fa-spin"></i>');

			//ajax
			$.ajax({
				url: me,
				type: 'get',
				dataType: 'json',

				success: function(response) {
					$('#tbody_branch').empty();

					$.each(response.results, function(key, value) {
						$('#tbody_branch').append('<tr>' +
							'<td>' + response.results[key].branch_id + '</td>' +
							'<td>' + response.results[key].branch_name + '</td>' +
							'<td>' + response.results[key].branch_address + '</td>' +
							'<td>' + response.results[key].branch_contact_person + '</td>' +
							'<td>' + response.results[key].branch_contact_number + '</td>' +
							'<td> <button type="button" class="btn btn-warning btn-xs btn-block btn_edit_branch"><i class="fas fa-edit"></i> Edit Branch</button><a href="' + '<?php echo site_url('SalesInquiryController/delete_branch_new/') ?>' + response.results[key].branch_id + '" class="btn btn-danger btn-xs btn-block" onclick="return confirm(\'Are you sure?\')" title="Delete"><i class="fas fa-trash"></i> Delete Branch</a></td>' +
							'</tr>'
						);

					});

					$('#modal_loading').removeClass('overlay d-flex justify-content-center align-items-center');
					$('#modal_loading').empty();
				}
			});
		});

		// Add Item Button
		$('.add-task-btn').click(function() {

			var newfield = $('.add-task:last').clone();
			newfield.find('textarea').val('');
			newfield.find('input').val('');
			newfield.find('textarea').val('').css("background-color", "transparent").css("color", "black");
			newfield.find('.others:checkbox').prop('checked', false).end();
			// Add after last <div class='input-form'>
			$(newfield).insertAfter(".add-task:last");
		});


		$(".delete-task-btn").click(function() {

			count = $('.add-task').length;

			if (count !== 1) {
				$('.add-task').last().remove();
			} else {
				return 0;
			}
		});

		$(document).on('change', ".others", function() {

			if ($(this).is(':checked')) {
				var clone = $(this).parents('section').clone().find('.others:checkbox').prop('checked', false).end();
				$('.sth').append(clone);
			}

		});

		$('#new_client_table tbody').on('click', '.btn_client_del', function() {

			var data = new_client_table_data.row($(this).parents('tr')).data();
			var rowdata = new_client_table_data.row(this).data();

			if (data == undefined) {
				$('#reject_project_id').val(rowdata[0]);
			} else if (rowdata == undefined) {
				$('#reject_project_id').val(data[0]);
			}

		});

	});
</script>

<script>
	$(document).ready(function() {

		var existing_client_table_data = $("#existing_client_table").DataTable({
			responsive: true,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				url: "<?php echo site_url('SalesInquiryController/get_existing_client_list') ?>",
				type: "POST"
			},
			"columnDefs": [{
				"targets": [8],
				"orderable": false,
			}]
		});
		// END OF DATATABLE

		//Fetching Data in Existing Client (For Viewing of branch)
		$('#existing_client_table tbody').on('click', '.btn_view_existing_branch', function() {

			var data = existing_client_table_data.row($(this).parents('tr')).data();
			var rowdata = existing_client_table_data.row(this).data();

			if (data == undefined) {
				var me = '<?php echo site_url('SalesInquiryController/get_branch/') ?>' + rowdata[0] + '/existing';
			} else if (rowdata == undefined) {
				var me = '<?php echo site_url('SalesInquiryController/get_branch/') ?>' + data[0] + '/existing';
			}

			$('#modal_loading').addClass('overlay d-flex justify-content-center align-items-center');
			$('#modal_loading').append('<i class="fas fa-2x fa-sync fa-spin"></i>');

			//ajax
			$.ajax({
				url: me,
				type: 'get',
				dataType: 'json',

				success: function(response) {
					$('#tbody_branch').empty();

					$.each(response.results, function(key, value) {
						$('#tbody_branch').append('<tr>' +
							'<td>' + response.results[key].branch_id + '</td>' +
							'<td>' + response.results[key].branch_name + '</td>' +
							'<td>' + response.results[key].branch_address + '</td>' +
							'<td>' + response.results[key].branch_contact_person + '</td>' +
							'<td>' + response.results[key].branch_contact_number + '</td>' +
							'<td> <button type="button" class="btn btn-warning btn-xs btn-block btn_edit_branch"><i class="fas fa-edit"></i> Edit Branch</button><a href="' + '<?php echo site_url('SalesInquiryController/delete_branch_existing/') ?>' + response.results[key].branch_id + '" class="btn btn-danger btn-xs btn-block" onclick="return confirm(\'Are you sure?\')" title="Delete"><i class="fas fa-trash"></i> Delete Branch</a></td>' +
							'</tr>'
						);

					});

					$('#modal_loading').removeClass('overlay d-flex justify-content-center align-items-center');
					$('#modal_loading').empty();
				}
			});
		});

		//click select edit for masterlist table
		$('#existing_client_table tbody').on('click', '.btn_existing', function() {
			var data = existing_client_table_data.row($(this).parents('tr')).data();
			var rowdata = existing_client_table_data.row(this).data();
			if (data == undefined) {
				var me = '<?php echo site_url('SalesInquiryController/fetch_existing_client_data/') ?>' + rowdata[0];
				$(".existing_client_id_edit").val(rowdata[0]);
			} else if (rowdata == undefined) {
				var me = '<?php echo site_url('SalesInquiryController/fetch_existing_client_data/') ?>' + data[0];
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
					$(".existing_source_edit").val(response.existing_client_data[0].source);
					$(".existing_interest_edit").val(response.existing_client_data[0].Interest);
					$(".existing_type_edit").val(response.existing_client_data[0].Type);
					$(".existing_notes_edit").val(response.existing_client_data[0].Notes);


				}
			});
		});

		//Fetching Data in Existing Client (For Delete)
		$('#existing_client_table tbody').on('click', '.btn_existing_client_del', function() {

			var data = existing_client_table_data.row($(this).parents('tr')).data();
			var rowdata = existing_client_table_data.row(this).data();

			if (data == undefined) {
				$('#existing_client_id_del').val(rowdata[0]);
			} else if (rowdata == undefined) {
				$('#existing_client_id_del').val(data[0]);
			}

		});

		//Fetching Data in Existing Client (For Viewing)
		$('#existing_client_table tbody').on('click', '.btn_existing_view', function() {

			var data = existing_client_table_data.row($(this).parents('tr')).data();
			var rowdata = existing_client_table_data.row(this).data();

			if (data == undefined) {
				var me = '<?php echo site_url('SalesInquiryController/get_project/') ?>' + rowdata[0];
			} else if (rowdata == undefined) {
				var me = '<?php echo site_url('SalesInquiryController/get_project/') ?>' + data[0];
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

					//$.each(response.task_results, function (key, value) {
					//	$task = response.task_results[key].project_task;
					//	$task_date = response.task_results[key].date_of_task;

					//	});

					$.each(response.results, function(key, value) {

						$('#tbody-project').append('<tr>' +
							'<td>' + i++ + '</td>' +
							'<td>' + response.results[key].project_type + '</td>' +
							'<td>' + response.results[key].project_status + '</td>' +
							'<td>' + response.results[key].lastname + "," + response.results[key].firstname + " " + response.results[key].middlename + '</td>' +
							'<td>' + response.results[key].branch + '</td>' +
							'<td>' + response.results[key].project_task + '</td>' +
							'<td>' + response.results[key].date_of_task + '</td>' +
							'<td>' + response.results[key].project_details + '</td>' +
							'<td>' + response.results[key].project_amount + '</td>' +
							'<td>' + response.results[key].quotation_ref + '</td>' +
							'<td>' + response.results[key].date_of_installation + '</td>' +
							'<td> <a href="' + '<?php echo site_url('inquiry-edit-existingclient-project/') ?>' + response.results[key].project_id + '" class="btn btn-xs btn-warning btn-block"><i class="fas fa-edit"></i> Edit Project</a><a href="' + '<?php echo site_url('SalesInquiryController/delete_existingclient_project/') ?>' + response.results[key].project_id + '" class="btn btn-danger btn-xs btn-block" onclick="return confirm(\'Are you sure?\')" title="Delete"><i class="fas fa-trash"></i> Delete Project</a><a href="' + '<?php echo site_url('inquiry-existing-clients/') ?>' + response.results[key].project_id + '" class="btn btn-xs btn-danger btn-block" id="btn-archive-project"><i class="far fa-times-circle"></i> Reject Project</a></td>'
						);

						$('#reject_project_id').val(response.results[key].project_id);
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

			$(':submit').attr('disabled', 'disabled');
			$('.loading-modal').modal();

			//ajax
			$.ajax({
				url: me.attr('action'),
				type: 'post',
				data: me.serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.success == true) {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						toastr.success("Client Updated!");
						window.setTimeout(function() {
							window.location = '<?php echo site_url('inquiry-existing-clients') ?>/list';
						}, 1000);
						me[0].reset();
					} else {
						$(':submit').removeAttr('disabled', 'disabled');
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

			$(':submit').attr('disabled', 'disabled');
			$('.loading-modal').modal();

			//ajax
			$.ajax({
				url: me.attr('action'),
				type: 'post',
				data: me.serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.success == true) {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						toastr.success("Client Deleted!");
						window.location = '<?php echo site_url('inquiry-existing-clients') ?>/list';
						me[0].reset();
					} else {
						$(':submit').removeAttr('disabled', 'disabled');
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

			$(':submit').attr('disabled', 'disabled');
			$('.loading-modal').modal();

			//ajax
			$.ajax({
				url: me.attr('action'),
				type: 'post',
				data: me.serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.success == true) {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						toastr.success("Project Added!");
						window.location = '<?php echo site_url('inquiry-existing-clients') ?>/list';
						me[0].reset();
					} else {
						$(':submit').removeAttr('disabled', 'disabled');
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

			$(':submit').attr('disabled', 'disabled');
			$('.loading-modal').modal();

			//ajax
			$.ajax({
				url: me.attr('action'),
				type: 'post',
				data: me.serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.success == true) {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						toastr.success("Brand Added!");
						document.location.reload(true);
						me[0].reset();

					} else {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');

						toastr.error(response.errors);
					}

				}
			});
		});

		$('#modal-reject-project').submit(function(e) {
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

			$(':submit').attr('disabled', 'disabled');
			$('.loading-modal').modal();

			//ajax
			$.ajax({
				url: me.attr('action'),
				type: 'post',
				data: me.serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.success == true) {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						toastr.success("Project Rejected!");
						window.location = '<?php echo site_url('inquiry-tempo-clients/') ?>list';
						me[0].reset();
					} else {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');

						toastr.error(response.errors);
					}

				}
			});
		});

		$('#modal-reject-project-existing').submit(function(e) {
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

			$(':submit').attr('disabled', 'disabled');
			$('.loading-modal').modal();

			//ajax
			$.ajax({
				url: me.attr('action'),
				type: 'post',
				data: me.serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.success == true) {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						toastr.success("Project Rejected!");
						window.location = '<?php echo site_url('inquiry-existing-clients') ?>/list';
						me[0].reset();
					} else {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');

						toastr.error(response.errors);
					}

				}
			});
		});
	});
</script>

<script>
	$(document).ready(function() {

		var archive_projects_table_data = $("#archive_projects_table").DataTable({
			responsive: true,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				url: "<?php echo site_url('SalesInquiryController/get_archive_projects_list') ?>",
				type: "POST"
			},
			"columnDefs": [{
				"targets": [7],
				"orderable": false,
			}]
		});

		//Fetching Data in New Client (For Viewing)
		$('#archive_projects_table tbody').on('click', '.btn_archive_view', function() {

			var data = archive_projects_table_data.row($(this).parents('tr')).data();
			var rowdata = archive_projects_table_data.row(this).data();

			if (data == undefined) {
				var me = '<?php echo site_url('SalesInquiryController/get_archive_project/') ?>' + rowdata[0];
			} else if (rowdata == undefined) {
				var me = '<?php echo site_url('SalesInquiryController/get_archive_project/') ?>' + data[0];
			}

			$('#modal_loading').addClass('overlay d-flex justify-content-center align-items-center');
			$('#modal_loading').append('<i class="fas fa-2x fa-sync fa-spin"></i>');

			//ajax
			$.ajax({
				url: me,
				type: 'get',
				dataType: 'json',

				success: function(response) {
					$('#tbody-archive-project').empty();
					i = 1;

					//$.each(response.task_results, function (key, value) {
					//	$task = response.task_results[key].project_task;
					//	$task_date = response.task_results[key].date_of_task;
					//	});

					$.each(response.results, function(key, value) {
						$('#tbody-archive-project').append('<tr>' +
							'<td>' + response.results[key].id + '</td>' +
							'<td>' + response.results[key].customer_name + '</td>' +
							'<td>' + response.results[key].contact_person + '</td>' +
							'<td>' + response.results[key].contact_number + '</td>' +
							'<td>' + response.results[key].email_add + '</td>' +
							'<td>' + response.results[key].location + '</td>' +
							'<td>' + response.results[key].website + '</td>' +
							'<td>' + response.results[key].source + '</td>' +
							'<td>' + response.results[key].interest + '</td>' +
							'<td>' + response.results[key].type + '</td>' +
							'<td>' + response.results[key].notes + '</td>' +
							'</tr>');
					});

					$('#modal_loading').removeClass('overlay d-flex justify-content-center align-items-center');
					$('#modal_loading').empty();
				}
			});
		});


		<?php if ($this->uri->segment(2) != 'list' && $this->uri->segment(1) == 'inquiry-tempo-clients') : ?>
			$('#reject_project_id').val(<?php echo $this->uri->segment(2) ?>);
			$("#modal_reject_project").modal({
				backdrop: 'static',
				keyboard: false
			});
		<?php endif ?>

		$("#table-branch").on('click', '.btn_edit_branch', function() { 
			// get the current row
			var currentRow = $(this).closest("tr");

			var col1 = currentRow.find("td:eq(0)").text();
			var col2 = currentRow.find("td:eq(1)").text();
			var col3 = currentRow.find("td:eq(2)").text();
			var col4 = currentRow.find("td:eq(3)").text();
			var col5 = currentRow.find("td:eq(4)").text();

			$('#edit_branch_id').val(col1);
			$('#edit_branch_name').val(col2);
			$('#edit_branch_address').val(col3);
			$('#edit_branch_contact_person').val(col4);
			$('#edit_branch_contact_number').val(col5);


			$(".modal_view_branch").modal('hide');
			$("#modal_edit_branch").modal({
				backdrop: 'static',
				keyboard: false
			});
		});

		$('#modal-edit-branch').submit(function(e) {
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

			$(':submit').attr('disabled', 'disabled');
			$('.loading-modal').modal();

			//ajax
			$.ajax({
				url: me.attr('action'),
				type: 'post',
				data: me.serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.success == true) {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						toastr.success("Brand Updated!");
						document.location.reload(true);
						me[0].reset();

					} else {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');

						toastr.error(response.errors);
					}

				}
			});
		});

	});
</script>