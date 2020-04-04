<?php
defined('BASEPATH') or die('Access Denied');

$results_project_report = array();

foreach ($results as $row) {
	$results_project_report = [
		'id' => $row->id,
		'name' => $row->name,
		'description' => $row->description,
		'date_requested' => $row->date_requested,
		'date_implemented' => $row->date_implemented,
		'date_finished' => $row->date_finished
	];
}


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
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.css">
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

	<!-- Project Description -->
	<div class="row">
		<div class="col-12 text-center mb-3">
			<label style="font-size: 25px">PROJECT PLAN REPORT</label>
			<br>
			<label>Project Report No. <?php echo $results_project_report['id'] ?></label>
		</div>
	</div>

	<!-- Petty Cash -->
	<div class="row">
		<div class="col-6">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<tbody>
					<tr>
						<td width="20%" style="font-weight: bold">Project Name</td>
						<td width="80%"><?php echo $results_project_report['name'] ?></td>
					</tr>
					<tr>
						<td width="20%" style="font-weight: bold">Description</td>
						<td width="80%"><?php echo $results_project_report['description'] ?></td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="col-6">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<tbody>
					<tr>
						<td width="30%" style="font-weight: bold">Date Requested</td>
						<td width="70%"><?php echo date_format(date_create($results_project_report['date_requested']),'F d, Y') ?></td>
					</tr>
					<tr>
						<td width="30%" style="font-weight: bold">Date Implemented</td>
						<td width="70%"><?php echo date_format(date_create($results_project_report['date_implemented']),'F d, Y') ?></td>
					</tr>
					<tr>
						<td width="30%" style="font-weight: bold">Date Finished</td>
						<td width="70%"><?php echo date_format(date_create($results_project_report['date_finished']),'F d, Y') ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Transpo -->
	<div class="row">
		<div class="col-6">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<thead>
					<tr class="text-center">
						<th width="40%">Petty Cash</th>
						<th width="30%">Date</th>
						<th width="30%">Remarks</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>/</td>
						<td>/</td>
						<td>/</td>
					</tr>
					<tr>
						<td class="text-center text-bold" colspan="3">Total: 1000</td>
					</tr>
				</tbody>

			</table>
		</div>

		<div class="col-6">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<thead>
					<tr class="text-center">
						<th width="40%">Transpo</th>
						<th width="30%">Date</th>
						<th width="30%">Remarks</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>/</td>
						<td>/</td>
						<td>/</td>
					</tr>
					<tr>
						<td class="text-center text-bold" colspan="3">Total: 1000</td>
					</tr>
				</tbody>

			</table>
		</div>
	</div>

	<!-- Indirect Items -->
	<div class="row">
		<div class="col-12">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<thead>
					<tr class="text-center">
						<th width="45%">Indirect Item</th>
						<th width="10%">Qty</th>
						<th width="10%">Amount</th>
						<th width="10%">Consumed</th>
						<th width="10%">Returns</th>
						<th width="15%">Remarks</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>/</td>
						<td>/</td>
						<td>/</td>
						<td>/</td>
						<td>/</td>
						<td>/</td>
					</tr>
					<tr>
						<td class="text-center text-bold" colspan="6">Total: 1000</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Direct Items -->
	<div class="row">
		<div class="col-12">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<thead>
					<tr class="text-center">
						<th width="45%">Direct Item</th>
						<th width="10%">Qty</th>
						<th width="10%">Amount</th>
						<th width="10%">Consumed</th>
						<th width="10%">Returns</th>
						<th width="15%">Remarks</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>/</td>
						<td>/</td>
						<td>/</td>
						<td>/</td>
						<td>/</td>
						<td>/</td>
					</tr>
					<tr>
						<td class="text-center text-bold" colspan="6">Total: 1000</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Tools Requested -->
	<div class="row">
		<div class="col-12">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<thead>
					<tr class="text-center">
						<th width="50%">Tools Requested</th>
						<th width="10%">Qty</th>
						<th width="10%">Returns</th>
						<th width="30%">Remarks</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>/</td>
						<td>/</td>
						<td>/</td>
						<td>/</td>
					</tr>
				</tbody>
			</table>
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
<!-- ChartJS -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/chart.js/Chart.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
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

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>