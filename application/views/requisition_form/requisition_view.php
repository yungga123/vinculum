<?php
defined('BASEPATH') or die('Access Denied');

$requisition_data = [
    'req_id' => '',
    'date' => '',
    'processed_by' => '',
    'approved_by' => '',
    'requested_by' => '',
    'checked_by' => '',
    'received_by' => ''
];

foreach ($results_requisition as $row) {
    $requisition_data['req_id'] = $row->req_id;
    $requisition_data['date'] = ($row->date != '0000-00-00') ? date_format(date_create($row->date), 'M d, Y h:iA') : '';
    $requisition_data['processed_by'] = $row->proc_first.' '.$row->proc_last;
    $requisition_data['approved_by'] = $row->app_first.' '.$row->app_last;
    $requisition_data['requested_by'] = $row->req_first.' '.$row->req_last;
    $requisition_data['checked_by'] = $row->check_first.' '.$row->check_last;
    $requisition_data['received_by'] = $row->rec_first.' '.$row->rec_last;
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
	    	@media print {
			.table-bordered td, .table-bordered th {
				border: 1px solid #000000 !important;
			}

			.table thead th {
				vertical-align: bottom !important;
				border-bottom: 2px solid #000000 !important;
			}
		}

        @page { 
            size: portrait;
        }
            
	</style>

  
</head>


<body>

    <div class="row">
        <div class="col-12">

            <div class="text-center">
                <h3>
                    Requisition Form
                </h3>

                <p>RF No. <?php echo $requisition_data['req_id'] ?></p>
            </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-sm">
                <tbody>
                    <tr>
                        <td width="10%" class="text-bold">Requestor:</td>
                        <td width="60%"><?php echo $requisition_data['requested_by'] ?></td>
                        <td width="10%" class="text-bold">Date & Time</td>
                        <td width="20%"><?php echo $requisition_data['date'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-sm">
                <tbody>
                    <tr class="text-center text-bold">
                        <td width="5%">No</td>
                        <td width="30%%">Description</td>
                        <td width="10%">Unit Cost</td>
                        <td width="5%%">Qty</td>
                        <td width="13%">Supplier</td>
                        <td width="12%">Date Needed</td>
                        <td width="25%">Purpose</td>
                    </tr>

                    <?php 
                    $i = 1;
                    foreach ($results_req_items as $row) { ?>
                    <tr>
                        <td class="text-center"><?php echo $i++ ?></td>
                        <td><?php echo $row->description ?></td>
                        <td><?php echo number_format($row->unit_cost,2) ?></td>
                        <td><?php echo number_format($row->qty) ?></td>
                        <td><?php echo $row->supplier ?></td>
                        <td class="text-center"><?php echo ($row->date_needed != '0000-00-00') ? date_format(date_create($row->date_needed),'m/d/Y') : '' ?></td>
                        <td><?php echo $row->purpose ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <p><b>Processed by:</b> <u><?php echo $requisition_data['processed_by'] ?></u></p>
            <p><b>Approved by:</b> <u><?php echo $requisition_data['approved_by'] ?></u></p>
        </div>

        <div class="col-6">
            <p><b>Received by:</b> <u><?php echo $requisition_data['received_by'] ?></u></p>
            <p><b>Checked by:</b> <u><?php echo $requisition_data['checked_by'] ?></u></p>
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
