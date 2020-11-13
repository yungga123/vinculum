<?php
defined('BASEPATH') or exit('No direct script access allowed');
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

        @page {
            size: landscape;
        }
    </style>


</head>


<body>
    <div class="row">
        <div class="col-12">
            <h2 class="text-bold text-center">JOB ORDER LIST</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-sm" style="font-size: 12px">
                <tbody>
                    <tr class="text-bold">
                        <td>No.</td>
                        <td>Status</td>
                        <td>Committed Schedule</td>
                        <td>Customer Name</td>
                        <td>Scope</td>
                        <td>Date Requested</td>
                        <td>Type of Project</td>
                        <td>Comments</td>
                        <td>Date Reported</td>
                        <td>Requested By</td>
                        <td>Warranty</td>
                        <td>Remarks</td>
                    </tr>

                    <?php 
                        
                        foreach ($results->result() as $row) {

                            $scope = array();

                            $sub_scope = array();
                            
                            if ($row->cctv == 1) {
                                $sub_scope[] = 'CCTV';
                            }
                            if ($row->biometrics == 1) {
                                $sub_scope[] = 'AC/Biometrics';
                            }
                            if ($row->fdas == 1) {
                                $sub_scope[] = 'FDAS';
                            }
                            if ($row->intrusion_alarm == 1) {
                                $sub_scope[] = 'Intrusion Alarms';
                            }
                            if ($row->pabx == 1) {
                                $sub_scope[] = 'PABX Systems';
                            }
                            if ($row->gate_barrier == 1) {
                                $sub_scope[] = 'Gate Barriers';
                            }
                            if ($row->efence == 1) {
                                $sub_scope[] = 'E-Fence';
                            }
                            if ($row->structured_cabling == 1) {
                                $sub_scope[] = 'Structured Cabling';
                            }
                            if ($row->gate_barrier == 1) {
                                $sub_scope[] = 'Gate Barriers';
                            }

                            $scope[] = $sub_scope;
                    ?>
                        <tr>
                            <td><?php echo $row->joborder_id ?></td>
                            <td><?php echo ($row->decision == '') ? 'Pending' : $row->decision ?></td>
                            <td><?php echo ($row->commited_schedule != "0000-00-00") ? date_format(date_create($row->commited_schedule),'F d, Y') : "None" ?></td>
                            <td><?php echo $row->CompanyName ?></td>
                            <td><?php echo implode(", ",$scope[0]) ?></td>
                            <td><?php echo ($row->date_requested != '0000-00-00') ? date_format(date_create($row->date_requested),'F d, Y') : 'None' ?></td>
                            <td><?php echo $row->type_of_project ?></td>
                            <td><?php echo $row->comments ?></td>
                            <td><?php echo ($row->date_reported != '0000-00-00') ? date_format(date_create($row->date_reported),'F d, Y') : 'None' ?></td>
                            <td><?php echo $row->requested_by ?></td>
                            <td><?php echo $row->under_warranty ?></td>
                            <td><?php echo $row->remarks ?></td>
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