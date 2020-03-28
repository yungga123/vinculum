<?php

defined('BASEPATH') or die('Access Denied');

$dispatch_id = "";
$dispatch_date = "";
$dispatch_time = "";
$assigned_sales = "";
$address = "";
$customer_1 = "";
$purpose_1 = "";
$time_in_1 = "";
$time_out_1 = "";
$customer_2 = "";
$purpose_2 = "";
$time_in_2 = "";
$time_out_2 = "";
$customer_3 = "";
$purpose_3 = "";
$time_in_3 = "";
$time_out_3 = "";
$customer_4 = "";
$purpose_4 = "";
$time_in_4 = "";
$time_out_4 = "";

foreach ($results as $row) {
	$dispatch_id = $row->id;
	$dispatch_date = $row->dispatch_date;
	$dispatch_time = $row->dispatch_time;
	$assigned_sales = $row->assigned_sales;
	$address = $row->address;
	$customer_1 = $row->customer_1;
	$purpose_1 = $row->purpose_1;
	$time_in_1 = $row->time_in_1;
	$time_out_1 = $row->time_out_1;
	$customer_2 = $row->customer_2;
	$purpose_2 = $row->purpose_2;
	$time_in_2 = $row->time_in_2;
	$time_out_2 = $row->time_out_2;
	$customer_3 = $row->customer_3;
	$purpose_3 = $row->purpose_3;
	$time_in_3 = $row->time_in_3;
	$time_out_3 = $row->time_out_3;
	$customer_4 = $row->customer_4;
	$purpose_4 = $row->purpose_4;
	$time_in_4 = $row->time_in_4;
	$time_out_4 = $row->time_out_4;
}

if ($time_in_1 == "00:00:00") {
	$time_in_1 = "";
} else {
	$time_in_1 = date('h:i A',strtotime($time_in_1));
}

if ($time_out_1 == "00:00:00") {
	$time_out_1 = "";
} else {
	$time_out_1 = date('h:i A',strtotime($time_out_1));
}

if ($time_in_2 == "00:00:00") {
	$time_in_2 = "";
} else {
	$time_in_2 = date('h:i A',strtotime($time_in_2));
}

if ($time_out_2 == "00:00:00") {
	$time_out_2 = "";
} else {
	$time_out_2 = date('h:i A',strtotime($time_out_2));
}


if ($time_in_3 == "00:00:00") {
	$time_in_3 = "";
} else {
	$time_in_3 = date('h:i A',strtotime($time_in_3));
}

if ($time_out_3 == "00:00:00") {
	$time_out_3 = "";
} else {
	$time_out_3 = date('h:i A',strtotime($time_out_3));
}


if ($time_in_4 == "00:00:00") {
	$time_in_4 = "";
} else {
	$time_in_4 = date('h:i A',strtotime($time_in_4));
}

if ($time_out_4 == "00:00:00") {
	$time_out_4 = "";
} else {
	$time_out_4 = date('h:i A',strtotime($time_out_4));
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
	<div class="row">
		<div class="col-12 text-center">
			<p>
				<label style="font-size: 24px">
					DISPATCH FORM
				</label>
			</p>

			<p>
				<label class="float-right">
					No. : <?php echo $dispatch_id ?>
				</label>
			</p>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<tbody>
					<tr>
						<td width="20%" class="text-bold">Pre-technical Sales</td>
						<td width="80%"><?php echo $assigned_sales ?></td>
					</tr>

					<tr>
						<td width="20%" class="text-bold">Location</td>
						<td width="80%"><?php echo $address ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<tbody>
					<tr class="text-bold text-center">
						<td width="40%">Client Name</td>
						<td width="15%">Contact Number</td>
						<td width="15%">Purpose</td>
						<td width="10%">Time In</td>
						<td width="10%">Time Out</td>
						<td width="10%">Signature</td>
					</tr>

					<tr>
						<td width="40%"><?php echo $customer_1 ?></td>
						<td width="15%">Contact Number</td>
						<td width="15%"><?php echo $purpose_1 ?></td>
						<td width="10%"><?php echo $time_in_1 ?></td>
						<td width="10%"><?php echo $time_out_1 ?></td>
						<td width="10%"></td>
					</tr>

					<tr>
						<td width="40%"><?php echo $customer_2 ?></td>
						<td width="15%">Contact Number</td>
						<td width="15%"><?php echo $purpose_2 ?></td>
						<td width="10%"><?php echo $time_in_2 ?></td>
						<td width="10%"><?php echo $time_out_2 ?></td>
						<td width="10%"></td>
					</tr>

					<tr>
						<td width="40%"><?php echo $customer_3 ?></td>
						<td width="15%">Contact Number</td>
						<td width="15%"><?php echo $purpose_3 ?></td>
						<td width="10%"><?php echo $time_in_3 ?></td>
						<td width="10%"><?php echo $time_out_3 ?></td>
						<td width="10%"></td>
					</tr>

					<tr>
						<td width="40%"><?php echo $customer_4 ?></td>
						<td width="15%">Contact Number</td>
						<td width="15%"><?php echo $purpose_4 ?></td>
						<td width="10%"><?php echo $time_in_4 ?></td>
						<td width="10%"><?php echo $time_out_4 ?></td>
						<td width="10%"></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-6">
			<table class="table table-bordered table-sm" style="font-size: 15px">

				<tbody>
					<tr>
						<td width="50%" class="text-bold">Dispatch Date</td>
						<td width="50%"><?php echo date_format(date_create($dispatch_date),'F d, Y') ?></td>
					</tr>

					<tr>
						<td width="50%" class="text-bold">Dispatch Time</td>
						<td width="50%"><?php echo date_format(date_create($dispatch_time),'g:i A') ?></td>
					</tr>
				</tbody>
				
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-6">
			<label>Customer Acceptance:</label>
			<br>
			__________________________________
			<br>
			Customer Signature over Printed Name
		</div>

		<div class="col-6 text-right">
			<label>Dispatch By:</label>
			<br>
			<u>Jenina F. Gaceta</u>
			<br>
			HRAD Assistant
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