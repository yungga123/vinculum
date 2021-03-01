<?php
defined('BASEPATH') or die('Access Denied');
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/fontawesome-free/css/all.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/jqvmap/jqvmap.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/select2/css/select2.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/summernote/summernote-bs4.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- DataTables Responsive -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<!-- Toastr -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/toastr/toastr.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>

	<div class="container-fluid">
		<div class="row mt-4 mb-2">
			<div class="col-sm-6 offset-sm-3">
				<div class="card card-success">
					<div class="card-body">
						<h3 class="text-center text-bold">Home Alarm Application</h3>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="form-group">
						  <label for="marketing_assosciate">Marketing Associate</label>
						  <input type="text" class="form-control" name="marketing_assosciate" id="marketing_assosciate" aria-describedby="marketing_associateId" placeholder="">
						  <small id="marketing_associateId" class="form-text text-muted">Help text</small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

<!-- jQuery -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>


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

<!-- Select2 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/select2/js/select2.full.min.js"></script>