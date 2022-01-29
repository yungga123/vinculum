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

            .table-bordered td,
            .table-bordered th {
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
        <div class="col-sm-12">
        <table class="table table-bordered table-sm" style="font-size: 15px">
                <tbody>
                    <br>
                    <tr>
                        <td width="15%" style="font-weight: bold">Project Name:</td>
                        <td width="40%" class="text-center"><?php echo $client_name; ?></td>
                        <td width="10%" style="font-weight: bold">Date Requested:</td>
                        <td width="15%" class="text-center"><?php echo $date_requested; ?></td>
                    </tr>
                     <tr>
                        <td style="font-weight: bold">Branch Name:</td>
                        <td class="text-center"><?php echo $branch_name; ?></td>
                        <td style="font-weight: bold">Date Issued:</td>
                        <td class="text-center"><?php echo $date_issued; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Project Activity:</td>
                        <td class="text-center"><?php echo $project_name; ?></td>
                        <td style="font-weight: bold">Date Return:</td>
                        <td class="text-center"><?php echo $date_return; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td style="font-weight: bold">Time Return:</td>
                        <td class="text-center"><?php echo $time_return; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
        <table class="table table-bordered table-sm" style="font-size: 15px">
                <tbody>
                    <br>
                    <tr class="text-center">
                        <td width="20%" rowspan="2" style="font-weight: bold">Indirect Items</td>
                        <td width="5%" rowspan="2" style="font-weight: bold"><i class="fas fa-check"></i></td>
                        <td width="5%" rowspan="2" style="font-weight: bold">Qty</td>
                        <td width="5%" rowspan="2" style="font-weight: bold">Available</td>
                        <td width="5%" colspan="2" style="font-weight: bold">Consumed</td>
                        <td width="5%" colspan="2" style="font-weight: bold">Returns</td>
                    </tr>
                    <tr class="text-center">
                        <td width="5%" style="font-weight: bold">Qty</td>
                        <td width="10%" style="font-weight: bold">Remarks</td>
                        <td width="5%" style="font-weight: bold">Qty</td>
                        <td width="10%" style="font-weight: bold">Remarks</td>
                    </tr>
                    <?php foreach($prfindirectitems as $row): ?>
                        <tr>
                            <td><?php echo $row->itemName; ?></td>
                            <td></td>
                            <td class="text-center"><?php echo $row->item_qty; ?></td>
                            <td><?php echo $row->stock_available; ?></td>
                            <td class="text-center"><?php echo $row->consumed_qty; ?></td>
                            <td class="text-center"><?php echo $row->consumed_remarks; ?></td>
                            <td class="text-center"><?php echo $row->return_qty; ?></td>
                            <td class="text-center"><?php echo $row->return_remarks; ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
        <table class="table table-bordered table-sm" style="font-size: 15px">
                <tbody>
                    <br>
                    <tr class="text-center">
                        <td width="20%" rowspan="2" style="font-weight: bold">Direct Items</td>
                        <td width="5%" rowspan="2" style="font-weight: bold"><i class="fas fa-check"></i></td>
                        <td width="5%" rowspan="2" style="font-weight: bold">Qty</td>
                        <td width="5%" rowspan="2" style="font-weight: bold">Available</td>
                        <td width="5%" colspan="2" style="font-weight: bold">Consumed</td>
                        <td width="5%" colspan="2" style="font-weight: bold">Returns</td>
                    </tr>
                    <tr class="text-center">
                        <td width="5%" style="font-weight: bold">Qty</td>
                        <td width="10%" style="font-weight: bold">Remarks</td>
                        <td width="5%" style="font-weight: bold">Qty</td>
                        <td width="10%" style="font-weight: bold">Remarks</td>
                    </tr>
                    <?php foreach($prfdirectitems as $row): ?>
                        <tr>
                            <td><?php echo $row->itemName; ?></td>
                            <td></td>
                            <td class="text-center"><?php echo $row->item_qty; ?></td>
                            <td><?php echo $row->stock_available; ?></td>
                            <td class="text-center"><?php echo $row->consumed_qty; ?></td>
                            <td class="text-center"><?php echo $row->consumed_remarks; ?></td>
                            <td class="text-center"><?php echo $row->return_qty; ?></td>
                            <td class="text-center"><?php echo $row->return_remarks; ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
        <table class="table table-bordered table-sm" style="font-size: 15px">
                <tbody>
                    <br>
                    <tr class="text-center">
                        <td width="20%" rowspan="2" style="font-weight: bold">Tools Items</td>
                        <td width="5%" rowspan="2" style="font-weight: bold"><i class="fas fa-check"></i></td>
                        <td width="5%" rowspan="2" style="font-weight: bold">Qty</td>
                        <td width="5%" rowspan="2" style="font-weight: bold">Available</td>
                        <td width="5%" colspan="2" style="font-weight: bold">Consumed</td>
                        <td width="5%" colspan="2" style="font-weight: bold">Returns</td>
                    </tr>
                    <tr class="text-center">
                        <td width="5%" style="font-weight: bold">Qty</td>
                        <td width="10%" style="font-weight: bold">Remarks</td>
                        <td width="5%" style="font-weight: bold">Qty</td>
                        <td width="10%" style="font-weight: bold">Remarks</td>
                    </tr>
                    <?php foreach($prftoolsitems as $row): ?>
                        <tr>
                            <td><?php echo $row->description; ?></td>
                            <td></td>
                            <td class="text-center"><?php echo $row->item_qty; ?></td>
                            <td><?php echo $row->stock_available; ?></td>
                            <td class="text-center"><?php echo $row->consumed_qty; ?></td>
                            <td class="text-center"><?php echo $row->consumed_remarks; ?></td>
                            <td class="text-center"><?php echo $row->return_qty; ?></td>
                            <td class="text-center"><?php echo $row->return_remarks; ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
        <table class="table table-bordered table-sm" style="font-size: 15px">
                <tbody>
                    <br>
                    <tr>
                        <td width="15%" style="font-weight: bold">Prepared By:</td>
                        <td width="30%" class="text-center" width="20%"><?php echo $prepared_by; ?></td>
                        <td width="15%" style="font-weight: bold">Person In Charge:</td>
                        <td width="30%" class="text-center" width="20%"><?php echo $pic; ?></td>
                    </tr>
                    <tr>
                        <td width="15%" style="font-weight: bold">Checked By:</td>
                        <td width="30%" class="text-center" width="20%"><?php echo $checked_by; ?></td>
                        <td width="15%" style="font-weight: bold">Returned By:</td>
                        <td width="30%" class="text-center" width="20%"><?php echo $returned_by; ?></td>
                    </tr>
                    <tr>
                        <td width="15%" style="font-weight: bold">Sales In Charge:</td>
                        <td width="30%" class="text-center" width="20%"><?php echo $sales; ?></td>
                        <td colspan="2"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
        <table class="table table-bordered table-sm" style="font-size: 15px">
                <tbody>
                    <br>
                    <tr>
                        <td rowspan="2" colspan="2" width="15%" style="font-weight: bold">Remarks:</td>
                    </tr>
                    <tr style="height:200px"></tr>
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

<script>
    window.setTimeout(function() {
                        window.addEventListener("load", window.print());
                    }, 500);
</script>