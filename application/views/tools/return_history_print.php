<?php
defined('BASEPATH') or die('Access Denied');

date_default_timezone_set('Asia/Manila');

if ($client == '') {
    $client = "ALL CUSTOMERS";
}

if ($assigned_to == '') {
    $assigned_to = 'NO SPECIFIC';
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

  	<style type="text/css">

        @page { 
            size: landscape;
          
        }

		@media print {
			.table-bordered td, .table-bordered th {
				border: 1px solid #000000 !important;
			}

			.table thead th {
				vertical-align: bottom !important;
				border-bottom: 2px solid #000000 !important;
			}
		}
		
	</style>
</head>

<body>
	<div class="row">
		<div class="col-12 text-center">
            <label>RETURN HISTORY</label>
		</div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <table class="table table-sm table-bordered" style="font-size: 11px">
                <tbody>
                    <tr>
                        <td width="15%" class="text-bold">Client</td>
                        <td width="35%"><?php echo $client ?></td>
                        <td width="15%" class="text-bold">Assigned To</td>
                        <td width="35%"><?php echo $assigned_to ?></td>
                    </tr>
                    <tr>
                        <td width="15%" class="text-bold">Date Coverage</td>
                        <td width="35%"><?php echo date_format(date_create($start_date),'F d, Y') ?> to <?php echo date_format(date_create($end_date),'F d, Y') ?></td>
                        <td width="15%" class="text-bold">Date Printed</td>
                        <td width="35%"><?php echo date('F d, Y h:i A') ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-sm table-bordered" style="font-size: 11px">
                <tbody>
                    <tr class="text-bold">
                        <td>Pullout ID</td>
                        <td>Tool Code</td>
                        <td>Tool Model</td>
                        <td>Description</td>
                        <td>Assigned To</td>
                        <td>Customer</td>
                        <td>Quantity</td>
                        <td>Date of Pullout</td>
                        <td>Time of Pullout</td>
                    </tr>
                    <?php foreach ($results as $row) { ?>
                        <tr>
                            <td><?php echo $row->toolpullout_id ?></td>
                            <td><?php echo $row->tool_code ?></td>
                            <td><?php echo $row->tool_model ?></td>
                            <td><?php echo $row->tool_description ?></td>
                            <td><?php echo $row->assigned_to ?></td>
                            <td><?php echo $row->customer ?></td>
                            <td><?php echo $row->quantity ?></td>
                            <td><?php echo date_format(date_create($row->date_of_pullout),'F d, Y') ?></td>
                            <td><?php echo date_format(date_create($row->time_of_pullout),'h:i A') ?></td>
                        </tr>
                    <?php } ?>
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