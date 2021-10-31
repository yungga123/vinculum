<?php
defined('BASEPATH') or die('Access Denied');
?>

<!-- Data Table for Customer List -->
<script>
	$(document).ready(function() {
		//Datatable for Customers Table
		var customers_table = $("#customers_table").DataTable({
			responsive: true,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				url: "<?php echo site_url('CustomersController/get_customers') ?>",
				type: "POST"
			},
			"columnDefs": [{
				"targets": [],
				"orderable": false,
			}]
		});
		//end of datatable

		//Fetching Data in Customers Data Table
		$('#customers_table tbody').on('click', '.btn-addcustomerfile', function() {

			var data = customers_table.row($(this).parents('tr')).data();
			var rowdata = customers_table.row(this).data();

			if (data == undefined) {
				$('#file_customer_id').val(rowdata[0]);
			} else if (rowdata == undefined) {
				$('#file_customer_id').val(data[0]);
			}

		});

		//Fetching Data and delete button
		$('#customers_table tbody').on('click', '.btn-deleteclient', function() {

			var data = customers_table.row($(this).parents('tr')).data();
			var rowdata = customers_table.row(this).data();

			if (data == undefined) {
				$('#client_del_id').val(rowdata[0]);
			} else if (rowdata == undefined) {
				$('#client_del_id').val(data[0]);
			}

		});


		//Fetching Data in Existing Client (For Viewing)
		$('#customers_table tbody').on('click', '.btn_existing_view', function() {

			var data = customers_table.row($(this).parents('tr')).data();
			var rowdata = customers_table.row(this).data();

			if (data == undefined) {
				var me = '<?php echo site_url('CustomersController/get_project/') ?>' + rowdata[0];
			} else if (rowdata == undefined) {
				var me = '<?php echo site_url('CustomersController/get_project/') ?>' + data[0];
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
							'<td>' + response.results[key].quotation_ref + '</td>'
						);

						$('#reject_project_id').val(response.results[key].project_id);
					});



					$('#modal_loading').removeClass('overlay d-flex justify-content-center align-items-center');
					$('#modal_loading').empty();
				}
			});
		});
	});
</script>

<script>
	//Form Add Customer
	$('#form-customer-add').submit(function(e) {
		e.preventDefault();
		var a = '<a href="<?php echo site_url("customers") ?>"><u>View Here</u></a>';
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

					toastr.success("Customer Added! " + a);
					me[0].reset();
				} else {
					$(':submit').removeAttr('disabled', 'disabled');
					$('.loading-modal').modal('hide');

					toastr.error(response.errors);
				}

			}
		});
	});

	//Form Update Customer
	$('#form-customer-update').submit(function(e) {
		e.preventDefault();
		var a = '<a href="<?php echo site_url("customers") ?>"><u>View Here</u></a>';
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
					toastr.success("Customer Updated! " + a);
				} else {
					$(':submit').removeAttr('disabled', 'disabled');
					$('.loading-modal').modal('hide');
					toastr.error(response.errors);
				}

			}
		});
	});

	//Form Add Customer File
	$('#form-customerfileadd').submit(function(e) {
		e.preventDefault();
		var me = $(this);

		var formData = new FormData(me[0]);

		toastr.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toast-top-right",
			"preventDuplicates": true,
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
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			dataType: 'json',
			success: function(response) {
				if (response.success == true) {
					$('.loading-modal').modal('hide');
					$(':submit').removeAttr('disabled', 'disabled');
					toastr.success("Success! File added");
					me[0].reset();
				} else {
					$(':submit').removeAttr('disabled', 'disabled');
					$('.loading-modal').modal('hide');
					toastr.error(response.errors);
				}
			}
		});
	});

	//Form Customer Add Branch

	$('#form-customer-addbranch').submit(function(e) {
		e.preventDefault();
		var a = '<a href="<?php echo site_url("customers") ?>"><u>View Here</u></a>';
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

					toastr.success("Customer Added! " + a);
					me[0].reset();
				} else {
					$(':submit').removeAttr('disabled', 'disabled');

					$('.loading-modal').modal('hide');

					toastr.error(response.errors);
				}

			}
		});
	});

	//Modal Delete Client
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
					toastr.success("PO Deleted!");
					me[0].reset();
					window.setTimeout(function() {
						window.location = '<?php echo site_url('customers') ?>';
					}, 1000);
				} else {
					$(':submit').removeAttr('disabled', 'disabled');
					$('.loading-modal').modal('hide');

					toastr.error(response.errors);
				}

			}
		});
	});
</script>

<!-- Customers File Selection -->
<?php if ($this->uri->segment(1) == 'customers') : ?>
	<script type="text/javascript">
		$(document).ready(function() {
			bsCustomFileInput.init();
		});
	</script>
<?php endif ?>


</body>

</html>