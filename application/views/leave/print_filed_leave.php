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
    <!-- Title Page -->
    <div class="row">
        <div class="col-sm-6 offset-sm-3 text-center">
            <h3>VINCULUM TECHNOLOGIES</h3>
            <h3>APPLICATION FOR LEAVE OF ABSENCE</h3>
        </div>
        <div class="col-sm-2 offset-sm-1">
            <h8>Control No: <?php echo $approved_year."".$leave_id."".$approved_month."".$approved_day ?></h8>
        </div>
    </div>
    <br><br><br>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered table-sm">
                <tbody>
                    <tr>
                        <td width="50%"><b>NAME: </b> <?php echo $lastname . ", " . $firstname . " " . $middlename ?></td>
                        <td width="50%"><b>DATE OF APPLICATION: </b> <?php echo $date_of_application ?></td>
                    <tr>
                        <td width="50%"><b>EMPLOYEE NO. </b><?php echo $employee_id ?></td>
                        <td width="50%"><b>DEPARTMENT: </b><?php echo $department ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-4 offset-sm-1">
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="po_vat" id="po_vat" <?php if($type_of_leave == "Vacation Leave") echo 'checked' ?>>
                    Vacation Leave w/Pay
                </label>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="po_vat" id="po_vat" <?php if($type_of_leave == "Sick Leave") echo 'checked' ?>>
                    Sick Leave w/Pay
                </label>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="po_vat" id="po_vat" <?php if($type_of_leave == "Leave of Absence") echo 'checked' ?>>
                    Leave of Absence w/o Pay
                </label>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered table-sm">
                <tbody>
                    <tr>
                        <td width="50%"><b>FROM: </b> <?php echo $filed_start_date  ?></td>
                        <td width="50%"><b>TO: </b> <?php echo $filed_end_date ?></td>
                    <tr>
                        <td width="50%" colspan="2"><b>REASON </b><?php echo $reason ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
        <br>
    <div class="row">
        <div class="col-sm-11 offset-sm-1">
            <h5>I fully understand that my failure to return to work after the above-stated period shall be constrained as abandoned </h5>
        </div>
        <div class="col-sm-12">
            <h5>and therefore, I am ready to accept whatever disciplinary action that will be imposed on me related to such offense. </h5>
        </div>
    </div>
        <br><br><br>
    <div class="row text-center">
        <div class="col-sm-12">
            ___________________________________________
        </div>
        <div class="col-sm-12">
            <h5>Employee's Signature</h5>
        </div>
    </div>

</body>
<br><br><br>
    <footer class="footer">
        <div class="row">
        <div class="col-sm-12">
        This Leave of Absence Form is system generated.
        </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
            <strong>Copyright &copy; 2017-2021 <a href="http://www.vinculumtechonologies.com">Vinculum Techonologies Corporation</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
	      <b>F01-11</b>
	    </div>
            </div>
        </div>
	   
	    
	</footer>

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