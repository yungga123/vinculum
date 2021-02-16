<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>

	<!-- Angular JS -->
<!-- 	<script src="<?php //echo base_url('assets/AdminLTE/') ?>plugins/angularjs/angular.min.js"></script> -->

	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	  $.widget.bridge('uibutton', $.ui.button)
	</script>

	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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

	<?php if ($this->uri->segment(1)=='customers'): ?>
	<!-- bs-custom-file-input -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
	<?php endif ?>

	<!-- AdminLTE App -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>dist/js/adminlte.js"></script>
	<!-- Date Range Picker -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.js"></script>

	<!-- fullCalendar 2.2.5 -->
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/fullcalendar/main.min.js"></script>
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/fullcalendar-daygrid/main.min.js"></script>
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/fullcalendar-timegrid/main.min.js"></script>
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/fullcalendar-interaction/main.min.js"></script>
	<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/fullcalendar-bootstrap/main.min.js"></script>


	<!-- Universal Toaster For Success -->
	<?php if ($this->session->flashdata('success')): ?>
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
	<?php if ($this->session->flashdata('fail')): ?>
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
			var pwd = prompt("Please Enter Passcode","");

			if (pwd == 'vinculumrocks') {
				window.location.href = "<?php echo site_url('payroll') ?>";
			} else {
				return false;
			}

		}
	</script>


	
