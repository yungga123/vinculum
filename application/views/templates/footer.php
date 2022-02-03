<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<div class="modal loading-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body text-center">
				<div class="d-flex justify-content-center mt-4">
					<div class="spinner-border" role="status">
						<span class="sr-only">Loading...</span>
					</div>
				</div>
				<br>
				<label style="font-size: 28px;" class="text-success">LOADING... PLEASE WAIT...</label>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Modal for Accepted Request Login -->
<div class="modal fade" id="acceptedrequest_validate" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php echo form_open('LoginController/requisition_login_validate', ["id" => "form-requisition-accepted"]) ?>
			<div class="modal-header">
				<h5 class="modal-title">Approved Requisition Login</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<h6>Please Enter Passcode:</h6>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<input type="password" name="accpasscode" class="form-control">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success">Enter</button>
			</div>
			<?php echo form_close() ?>
		</div>
	</div>
</div>

<!-- Modal for Filed Request Login -->
<div class="modal fade" id="filedrequest_validate" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php echo form_open('LoginController/requisition_login_validate', ["id" => "form-requisition-filed"]) ?>
			<div class="modal-header">
				<h5 class="modal-title">Filed Requisition Login</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<h6>Please Enter Passcode:</h6>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<input type="password" name="accpasscode" class="form-control">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success">Enter</button>
			</div>
			<?php echo form_close() ?>
		</div>
	</div>
</div>

<footer class="main-footer">
	<strong>Copyright &copy; 2017-2019 <a href="http://www.vinculumtechonologies.com">Vinculum Techonologies Corporation</a>.</strong>
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
		<b>Version</b> 2.0.0
	</div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>


<!-- DataTables -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- Moment JS -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/moment/moment.min.js"></script>

<!-- ChartJS -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/chart.js/Chart.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/toastr/toastr.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<?php if ($this->uri->segment(1) == 'customers') : ?>
	<!-- bs-custom-file-input -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<?php endif ?>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>dist/js/adminlte.js"></script>
<!-- Date Range Picker -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.js"></script>

<!-- fullCalendar 2.2.5 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/fullcalendar/main.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/select2/js/select2.full.min.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Universal Toaster For Success -->
<?php if ($this->session->flashdata('success')) : ?>
	<script type="text/javascript">
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
		toastr.success("<?php echo $this->session->flashdata('success') ?>");
	</script>
<?php endif ?>

<!-- Universal Toaster for Fail -->
<?php if ($this->session->flashdata('fail')) : ?>
	<script type="text/javascript">
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
		toastr.error('<?php echo $this->session->flashdata('fail') ?>');
	</script>
<?php endif ?>

<script>
	function payroll_validate() {
		var pwd = prompt("Please Enter Passcode", "");

		if (pwd == 'vinculumrocks') {
			window.location.href = "<?php echo site_url('payroll') ?>";
		} else {
			return false;
		}

	}
</script>
<script>
	$('#form-payroll-validation').submit(function(e) {
		e.preventDefault();

		var me = $(this);

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
			data: me.serialize(),
			dataType: 'json',
			success: function(response) {
				if (response.success == true) {
					$(':submit').removeAttr('disabled', 'disabled');
					$('.loading-modal').modal('hide');
					window.location.href = "<?php echo site_url('payroll') ?>";
				} else {
					$(':submit').removeAttr('disabled', 'disabled');
					$('.loading-modal').modal('hide');
					toastr.error(response.errors);

				}

			}
		});
	});
</script>

<!-- Initialize Select2 -->
<script>
	$(function() {
		$('.select2').select2();
	});
</script>


<script>
	$(document).ready(function() {
		//Form Requisition Login Validate
		$('#form-requisition-pending').submit(function(e) {
			e.preventDefault();

			var me = $(this);

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
				data: me.serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.success == true) {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						window.location = '<?php echo site_url('requisition-pending') ?>';
						me[0].reset();
					} else {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						toastr.error(response.errors);

					}

				}
			});
		});

		//Form Requisition Accepted Validate
		$('#form-requisition-accepted').submit(function(e) {
			e.preventDefault();

			var me = $(this);

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
				data: me.serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.success == true) {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						window.location = '<?php echo site_url('requisition-accepted') ?>';
						me[0].reset();
					} else {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						toastr.error(response.errors);

					}

				}
			});
		});

		//Form Requisition Filed Validate
		$('#form-requisition-filed').submit(function(e) {
			e.preventDefault();

			var me = $(this);

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
				data: me.serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.success == true) {
						$(':submit').removeAttr('disabled', 'disabled');
						$('.loading-modal').modal('hide');
						window.location = '<?php echo site_url('requisition-filed') ?>';
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