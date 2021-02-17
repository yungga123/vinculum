<?php
defined('BASEPATH') or die('No direct script access allowed.');

$start_date_format = date_format(date_create($start_date),'F d, Y');
$end_date_format = date_format(date_create($end_date),'F d, Y');

$r_total_price = number_format("0",2);
$r_return_price = number_format("0",2);

foreach ($total_price as $row) {
  $r_total_price = number_format($row->total_price,2);
}

foreach ($return_price as $row) {
  $r_return_price = number_format($row->return_price,2);
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

  <!-- HTML Print -->
  <style type="text/css" media="print">
    @page { 
        size: landscape;
    }
  </style>

  
</head>


<body>
	<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Return Pullouts</h3>
          <div class="card-tools">Date Coverage: <?php echo $start_date_format.' - '.$end_date_format ?></div>
        </div>
        <!-- /.card-header -->
        <div style="font-size: 14px" class="card-body p-0">
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>Return ID</th>
                <th>Date Processed</th>
                <th>Confirm ID</th>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Item Type</th>
                <th>Item Price</th>
                <th>Stocks Pulled out</th>
                <th>Stocks Returned</th>
                <th>Pullout to</th>
                <th>Total Cost</th>
                <th>Return Cost</th>
              </tr>
            </thead>
            <tbody>
            		<tr>
                  <?php foreach ($results as $row): ?>
                    <tr>
                      <td><?php echo $row->return_id ?></td>
                      <td><?php echo date_format(date_create($row->date_processed),"F d, Y g:i A");  ?></td>
                      <td><?php echo $row->confirm_id ?></td>
                      <td><?php echo $row->item_code ?></td>
                      <td><?php echo $row->item_name ?></td>
                      <td><?php echo $row->itemType ?></td>
                      <td><?php echo number_format($row->itemPrice,2) ?></td>
                      <td><?php echo $row->stocks_pulled_out ?></td>
                      <td><?php echo $row->stocks_returned ?></td>
                      <td><?php echo $row->pullout_to ?></td>
                      <td><?php echo number_format($row->stocks_pulled_out*$row->itemPrice,2) ?></td>
                      <td><?php echo number_format($row->stocks_returned*$row->itemPrice,2) ?></td>
                    </tr>
                  <?php endforeach ?>
                </tr>
              
            </tbody>
          </table>
        </div>

        <div class="card-body">
          <div class="text-right">
            <p><label>Total Cost: <span class="text-red"><?php echo $r_total_price ?> PHP</span></label></p>

            <p><label>Return Cost: <span class="text-red"><?php echo $r_return_price ?> PHP</span></label></p>
          </div>
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
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