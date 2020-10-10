<?php
defined('BASEPATH') or die('Access Denied');

$copy = 'Employee Copy';
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
		
	</style>

  
</head>


<body>

    <div class="row">
        <?php for ($i=0; $i < 2; $i++) { ?>
            <div class="col-6">
                <div class="row">
                    <div class="col-12">
                        <label style="font-size : 20px">PAYSLIP (No. <?php echo $payroll['id'] ?>)</label>
                        <label class="float-right" style="font-size : 15px">VINCULUM TECHNOLOGIES</label><br>
                        <?php echo $copy ?>
                        <span class="float-right" style="font-size: 15px;">70 Nat'l Road, Putatan, Muntinlupa City</span>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <table class="table table-sm table-bordered" style="font-size:11px;">
                            <tbody>
                                <tr>
                                    <td class="text-bold" width="15%">Cut-Off Period</td>
                                    <td width="45%"><?php echo $payroll['cutoff_date'] ?></td>
                                    <td class="text-bold" width="15%">SSS No.</td>
                                    <td width="25%"><?php echo $payroll['emp_sss_no'] ?></td>
                                </tr>

                                <tr>
                                    <td class="text-bold">Employee ID</td>
                                    <td><?php echo $payroll['emp_id'] ?></td>
                                    <td class="text-bold">TIN No.</td>
                                    <td><?php echo $payroll['emp_tin_no'] ?></td>
                                </tr>

                                <tr>
                                    <td class="text-bold">Name</td>
                                    <td><?php echo $payroll['emp_name'] ?></td>
                                    <td class="text-bold">PAG-IBIG No.</td>
                                    <td><?php echo $payroll['emp_pagibig_no'] ?></td>
                                </tr>

                                <tr>
                                    <td class="text-bold">Position</td>
                                    <td><?php echo $payroll['emp_position'] ?></td>
                                    <td class="text-bold">Philhealth No.</td>
                                    <td><?php echo $payroll['emp_philhealth_no'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <table class="table table-sm table-bordered" style="font-size: 11px;">
                            <tr>
                                <td width="50%" class="text-bold text-center" colspan="4">EARNINGS</td>
                                <td width="50%" class="text-bold text-center" colspan="4">DEDUCTIONS</td>
                            </tr>

                            <tr class="text-center text-bold">
                                <td width="15%">ITEMS</td>
                                <td width="8.75%">RATE</td>
                                <td width="8.75%">HRS/DAYS</td>
                                <td width="8.75%">AMOUNT</td>
                                <td width="15%">ITEMS</td>
                                <td width="8.75%">RATE</td>
                                <td width="8.75%">HRS/DAYS</td>
                                <td width="8.75%">AMOUNT</td>
                            </tr>

                            <tr>
                                <td>Basic Income</td>
                                <td><?php echo number_format($payroll['basic_income_rate'],2) ?></td>
                                <td><?php echo number_format($payroll['basic_income_days'],2) ?></td>
                                <td><?php echo number_format($payroll['basic_income_amt'],2) ?></td>
                                <td>Absents</td>
                                <td><?php echo number_format($payroll['absent_rate'],2) ?></td>
                                <td><?php echo number_format($payroll['absent_days'],2) ?></td>
                                <td><?php echo number_format($payroll['absent_amt'],2) ?></td>
                            </tr>

                            <tr>
                                <td>Over Time</td>
                                <td><?php echo number_format($payroll['overtime_rate'],2) ?></td>
                                <td><?php echo number_format($payroll['overtime_hrs'],2) ?></td>
                                <td><?php echo number_format($payroll['overtime_amt'],2) ?></td>
                                <td>Tardiness</td>
                                <td><?php echo number_format($payroll['tardiness_rate'],2) ?></td>
                                <td><?php echo number_format($payroll['tardiness_hrs'],2) ?></td>
                                <td><?php echo number_format($payroll['tardiness_amt'],2) ?></td>
                            </tr>

                            <tr>
                                <td>Night Diff</td>
                                <td><?php echo number_format($payroll['nightdiff_rate'],2); ?></td>
                                <td><?php echo number_format($payroll['nightdiff_hrs'],2); ?></td>
                                <td><?php echo number_format($payroll['nightdiff_amt'],2); ?></td>
                                <td>AWOL</td>
                                <td><?php echo number_format($payroll['awol_rate'],2); ?></td>
                                <td><?php echo number_format($payroll['awol_days'],2); ?></td>
                                <td><?php echo number_format($payroll['awol_amt'],2); ?></td>
                            </tr>

                            <tr>
                                <td>Regular Holiday</td>
                                <td><?php echo number_format($payroll['regday_rate'],2); ?></td>
                                <td><?php echo number_format($payroll['regday_days'],2); ?></td>
                                <td><?php echo number_format($payroll['regday_amt'],2); ?></td>
                                <td>Rest Days</td>
                                <td><?php echo number_format($payroll['restday_rate'],2); ?></td>
                                <td><?php echo number_format($payroll['restday_days'],2); ?></td>
                                <td><?php echo number_format($payroll['restday_amt'],2); ?></td>
                            </tr>

                            <tr>
                                <td>Special Holiday</td>
                                <td><?php echo number_format($payroll['spcday_rate'],2); ?></td>
                                <td><?php echo number_format($payroll['spcday_days'],2); ?></td>
                                <td><?php echo number_format($payroll['spcday_amt'],2); ?></td>
                                <td>Cash Adv</td>
                                <td colspan="3"><?php echo number_format($payroll['cash_adv'],2); ?></td>
                            </tr>

                            <tr>
                                <td>WDO</td>
                                <td><?php echo number_format($payroll['wdo_rate'],2); ?></td>
                                <td><?php echo number_format($payroll['wdo_days'],2); ?></td>
                                <td><?php echo number_format($payroll['wdo_amt'],2); ?></td>
                                <td>SSS</td>
                                <td colspan="3"><?php echo number_format($payroll['sss_cont'],2); ?></td>
                            </tr>

                            <tr>
                                <td>Sick Pay</td>
                                <td><?php echo number_format($payroll['basic_income_rate'],2); ?></td>
                                <td><?php echo number_format($payroll['sl'],2); ?></td>
                                <td><?php echo number_format($payroll['sl_pay'],2); ?></td>
                                <td>PAG-IBIG</td>
                                <td colspan="3"><?php echo number_format($payroll['pagibig_cont'],2); ?></td>
                            </tr>

                            <tr>
                                <td>Vacation Pay</td>
                                <td><?php echo number_format($payroll['basic_income_rate'],2); ?></td>
                                <td><?php echo number_format($payroll['vl'],2); ?></td>
                                <td><?php echo number_format($payroll['vl_pay'],2); ?></td>
                                <td>PhilHealth</td>
                                <td colspan="3"><?php echo number_format($payroll['philhealth_cont'],2); ?></td>
                            </tr>

                            <tr>
                                <td>Incentives</td>
                                <td colspan="3"><?php echo number_format($payroll['incentives'],2); ?></td>
                                <td>Tax</td>
                                <td colspan="3"><?php echo number_format($payroll['tax'],2); ?></td>
                            </tr>

                            <tr>
                                <td>Commission</td>
                                <td colspan="3"><?php echo number_format($payroll['commission'],2); ?></td>
                                <td>Others</td>
                                <td colspan="3"><?php echo number_format($payroll['other_deduction'],2); ?></td>
                            </tr>

                            <tr>
                                <td>13th Month</td>
                                <td colspan="3"><?php echo number_format($payroll['13th_month'],2); ?></td>
                                <td rowspan="2">Notes</td>
                                <td colspan="3" rowspan="2"><?php echo $payroll['notes'] ?></td>
                            </tr>

                            <tr>
                                <td>Addback</td>
                                <td colspan="3"><?php echo number_format($payroll['addback'],2); ?></td>
                            </tr>

                            <!-- <tr>
                                <td colspan="8">Notes: </td>
                            </tr> -->
                        </table>
                    </div>
                </div>

                <div class="row">

                    <div class="col-6">
                        <p style="font-size:10px">I hereby acknowledge to have the sum specified herein as full payment of my service rendered.</p>
                        <p style="font-size:10px">____________________________________________ <br>Received By:</p>
                    </div>

                    <div class="col-6">
                        <div class="text-right">
                            <p><label>Gross Pay:</label> <?php echo number_format($payroll['gross_pay'],2) ?></p>
                            <p><label>Net Pay:</label> <?php echo number_format($payroll['net_pay'],2) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php $copy = 'Company Copy' ?>
        
        <?php } ?>
        
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