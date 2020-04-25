<?php
defined('BASEPATH') or die('Access Denied');

$data = array();

foreach ($results_sr as $row) {
    $data['sr_id'] = $row->sr_id;
    $data['customer_name'] = $row->customer_name;
    $data['description'] = $row->description;
    $data['date_requested'] = $row->date_requested;
    $data['date_implemented'] = $row->date_implemented;
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
            <label style="font-size: 25px">VT-SR</label>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="text-right">
                <label>SR ID: <?php echo $data['sr_id'] ?></label> 
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <table class="table table-bordered table-sm">
                <tbody>
                    <tr>
                        <td width="30%" class="text-bold">Customer Name</td>
                        <td width="70%"><?php echo $data['customer_name'] ?></td>
                    </tr>

                    <tr>
                        <td width="30%" class="text-bold">Description</td>
                        <td width="70%"><?php echo $data['description'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-6">
            <table class="table table-bordered table-sm">
                <tbody>
                    <tr>
                        <td width="30%" class="text-bold">Date Requested</td>
                        <td width="70%"><?php if($data['date_requested'] != '0000-00-00') {
                            echo date_format(date_create($data['date_requested']),'F d, Y');
                        } else {
                            echo 'No Date Indicated';
                        } ?></td>
                    </tr>

                    <tr>
                        <td width="30%" class="text-bold">Date Implemented</td>
                        <td width="70%"><?php if($data['date_implemented'] != '0000-00-00') {
                            echo date_format(date_create($data['date_implemented']),'F d, Y');
                        } else {
                            echo 'No Date Indicated';
                        } ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-sm">

                <thead>
                    <tr>
                        <th colspan="5" class="text-center">DIRECT ITEMS</th>
                    </tr>
                    <tr>
                        <th width="50%">Direct Item</th>
                        <th>Requests</th>
                        <th>Returns</th>
                        <th>Request Price</th>
                        <th>Return Price</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (count($results_direct_item) != 0) { ?>
                        <?php foreach ($results_direct_item as $row) { ?>
                            <tr>
                                <td><?php echo $row->direct_item ?></td>
                                <td><?php echo $row->qty_rqstd ?></td>
                                <td><?php echo $row->returns ?></td>
                                <td><?php echo number_format($row->qty_rqstd*$row->direct_item_price,2) ?></td>
                                <td><?php echo number_format($row->returns*$row->direct_item_price,2) ?></td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="5" class="text-center">NO DIRECT ITEM REQUESTS</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-sm">

                <thead>
                    <tr>
                        <th colspan="5" class="text-center">INDIRECT ITEMS</th>
                    </tr>
                    <tr>
                        <th width="50%">Indirect Item</th>
                        <th>Requests</th>
                        <th>Returns</th>
                        <th>Request Price</th>
                        <th>Return Price</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (count($results_indirect_item) != 0) { ?>
                        <?php foreach ($results_indirect_item as $row) { ?>
                            <tr>
                                <td><?php echo $row->indirect_item ?></td>
                                <td><?php echo $row->qty_rqstd ?></td>
                                <td><?php echo $row->returns ?></td>
                                <td><?php echo number_format($row->qty_rqstd*$row->indirect_item_price,2) ?></td>
                                <td><?php echo number_format($row->returns*$row->indirect_item_price,2) ?></td>
                            </tr>
                        <?php } ?>
                        
                    <?php } else { ?>
                        <tr>
                            <td colspan="5" class="text-center">NO INDIRECT ITEM REQUESTS</td>
                        </tr>
                    <?php } ?>
                     
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-sm">

                <thead>
                    <tr>
                        <th colspan="5" class="text-center">TOOLS</th>
                    </tr>
                    <tr>
                        <th width="50%">Tools</th>
                        <th>Requests</th>
                        <th>Returns</th>
                        <th>Request Price</th>
                        <th>Return Price</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (count($results_tools) != 0) { ?>
                        <?php foreach ($results_tools as $row) { ?>
                            <tr>
                                <td><?php echo $row->tools_model ?></td>
                                <td><?php echo $row->qty_rqstd ?></td>
                                <td><?php echo $row->returns ?></td>
                                <td><?php echo number_format($row->qty_rqstd*$row->tools_price,2) ?></td>
                                <td><?php echo number_format($row->returns*$row->tools_price,2) ?></td>
                            </tr>
                        <?php } ?>
                        
                    <?php } else { ?>
                        <tr>
                            <td colspan="5" class="text-center">NO TOOLS REQUESTS</td>
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