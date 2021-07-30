<?php
defined('BASEPATH') or die('Access Denied');

$total_gross_pay = 0;
$total_net_pay = 0;
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
            size: landscape;
        }
            
	</style>

  
</head>


<body>

    <div class="row">
        <div class="col-12">
            <div class="text-center">
                <label class="text-center" style="font-size: 25px;">PAYROLL</label><br>

                <?php if ($this->uri->segment(1) == 'payroll-print-all') { ?>
                    Cut-off Period: All Coverage
                <?php } else { ?>
                    Cut-off Period: <?php echo date_format(date_create($this->uri->segment(2)),'F d, Y').' - '.date_format(date_create($this->uri->segment(3)),'F d, Y') ?>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-sm" style="font-size:8px;">
                <tbody>
                    <tr class="text-center text-bold">
                        <td rowspan="4" style="vertical-align: middle;">Employee ID</td>
                        <td rowspan="4" style="vertical-align: middle;">Name</td>
                        <td rowspan="4" style="vertical-align: middle;">Position</td>
                        <td rowspan="4" style="vertical-align: middle;">Daily Rate</td>
                        <td colspan="20">EARNINGS</td>
                        <td colspan="14">DEDUCTIONS</td>
                        <td rowspan="4" style="vertical-align: middle;">Notes</td>
                        <td rowspan="4" style="vertical-align: middle;">Gross Pay</td>
                        <td rowspan="4" style="vertical-align: middle;">Net Pay</td>
                    </tr>

                    <tr class="text-center text-bold">
                        <td colspan="16">TAXABLE</td>
                        <td colspan="4">NON-TAXABLE</td>
                        <td colspan="8">DELIQUENCIES</td>
                        <td colspan="6">MANDATORY & OTHERS</td>
                    </tr>
                    <tr class="text-center text-bold">
                        <td colspan="2">Basic Income</td>
                        <td colspan="2">Overtime</td>
                        <td colspan="2">Night Diff</td>
                        <td colspan="2">Reg Holiday</td>
                        <td colspan="2">Spc Holiday</td>
                        <td colspan="2">WDO</td>
                        <td colspan="2">Sick Pay</td>
                        <td colspan="2">Vac Pay</td>
                        <td rowspan="2" style="vertical-align: middle;">Incentives</td>
                        <td rowspan="2" style="vertical-align: middle;">Commission</td>
                        <td rowspan="2" style="vertical-align: middle;">13th Month</td>
                        <td rowspan="2" style="vertical-align: middle;">Addback</td>
                        <td colspan="2">Absents</td>
                        <td colspan="2">Tardiness</td>
                        <td colspan="2">AWOL</td>
                        <td colspan="2">Rest Day</td>
                        <td rowspan="2" style="vertical-align: middle;">Cash Adv</td>
                        <td rowspan="2" style="vertical-align: middle;">SSS</td>
                        <td rowspan="2" style="vertical-align: middle;">PAG-IBIG</td>
                        <td rowspan="2" style="vertical-align: middle;">PhilHealth</td>
                        <td rowspan="2" style="vertical-align: middle;">Tax</td>
                        <td rowspan="2" style="vertical-align: middle;">Others</td>
                    </tr>
                    

                    <tr class="text-center text-bold">
                        <td>Days</td>
                        <td>Pay</td>
                        <td>Hrs</td>
                        <td>Pay</td>
                        <td>Hrs</td>
                        <td>Pay</td>
                        <td>Days</td>
                        <td>Pay</td>
                        <td>Days</td>
                        <td>Pay</td>
                        <td>Days</td>
                        <td>Pay</td>
                        <td>Days</td>
                        <td>Pay</td>
                        <td>Days</td>
                        <td>Ded</td>
                        <td>Days</td>
                        <td>Ded</td>
                        <td>Days</td>
                        <td>Ded</td>
                        <td>Days</td>
                        <td>Ded</td>
                        <td>Days</td>
                        <td>Ded</td>
                    </tr>

                    <?php foreach ($results as $row) {
                            $basic_pay = $row->daily_rate*($row->days_worked - $row->rest_day - $row->sundays);
                            $regular_holiday_pay = $row->daily_rate*$row->reg_holiday;
                            $special_holiday_pay = $row->daily_rate*$row->special_holiday*0.3;
                            $wdo_pay = $row->daily_rate*$row->wdo*1.3;
                            $ot_pay = ($row->daily_rate/8)*1.25*$row->ot_hrs;
                            $night_diff_pay = ($row->daily_rate/8)*0.1*$row->night_diff_hrs;
                            $absents = $row->daily_rate*$row->days_absent;
                            $awol = $row->daily_rate*$row->awol;
                            $rest_day = $row->daily_rate*$row->rest_day;
                            //$rest_days = $row->daily_rate*$row->rest_day;
                            $tardiness = ($row->daily_rate/8)*$row->hours_late;
                            $vl_pay = $row->vacation_leave*$row->daily_rate;
                            $sl_pay = $row->sick_leave*$row->daily_rate;
                            $gross_pay = ($basic_pay+$regular_holiday_pay+$special_holiday_pay+$wdo_pay+$ot_pay+$night_diff_pay+$vl_pay+$sl_pay) - ($absents+$tardiness+$awol);
                            $contribution = $row->sss_rate+$row->pag_ibig_rate+$row->phil_health_rate;
                            $net_pay = $gross_pay+$row->incentives+$row->commission+$row->thirteenth_month+$row->addback - ($contribution+$row->tax+$row->cash_adv+$row->others);
                        ?>
                        <tr>
                            <td><?php echo $row->emp_id ?></td>
                            <td><?php echo $row->firstname.' '.$row->middlename.' '.$row->lastname ?></td>
                            <td><?php echo $row->position ?></td>
                            <td><?php echo number_format($row->daily_rate,2) ?></td>
                            <td><?php echo number_format($row->days_worked - $row->rest_day - $row->sundays,2) ?></td>
                            <td><?php echo number_format($basic_pay,2) ?></td>
                            <td><?php echo $row->ot_hrs ?></td>
                            <td><?php echo number_format($ot_pay,2) ?></td>
                            <td><?php echo $row->night_diff_hrs ?></td>
                            <td><?php echo number_format($night_diff_pay,2) ?></td>
                            <td><?php echo $row->reg_holiday ?></td>
                            <td><?php echo number_format($regular_holiday_pay,2) ?></td>
                            <td><?php echo $row->special_holiday ?></td>
                            <td><?php echo number_format($special_holiday_pay,2) ?></td>
                            <td><?php echo $row->wdo ?></td>
                            <td><?php echo number_format($wdo_pay,2) ?></td>
                            <td><?php echo $row->sick_leave ?></td>
                            <td><?php echo number_format($sl_pay,2) ?></td>
                            <td><?php echo $row->vacation_leave ?></td>
                            <td><?php echo number_format($vl_pay,2) ?></td>
                            <td><?php echo number_format($row->incentives,2) ?></td>
                            <td><?php echo number_format($row->commission,2) ?></td>
                            <td><?php echo number_format($row->thirteenth_month,2) ?></td>
                            <td><?php echo number_format($row->addback,2) ?></td>
                            <td><?php echo $row->days_absent ?></td>
                            <td><?php echo number_format($absents,2) ?></td>
                            <td><?php echo $row->hours_late ?></td>
                            <td><?php echo number_format($tardiness,2) ?></td>
                            <td><?php echo $row->awol ?></td>
                            <td><?php echo number_format($awol,2) ?></td>
                            <td><?php echo $row->rest_day ?></td>
                            <td><?php echo number_format($rest_day,2) ?></td>
                            <!-- <td><?php //echo $row->rest_day ?></td> -->
                            <!-- <td><?php //echo number_format($rest_days,2) ?></td> -->
                            <td><?php echo number_format($row->cash_adv,2) ?></td>
                            <td><?php echo number_format($row->sss_rate,2) ?></td>
                            <td><?php echo number_format($row->pag_ibig_rate,2) ?></td>
                            <td><?php echo number_format($row->phil_health_rate,2) ?></td>
                            <td><?php echo number_format($row->tax,2) ?></td>
                            <td><?php echo number_format($row->others,2) ?></td>
                            <td><?php echo $row->notes ?></td>
                            <td><?php echo number_format($gross_pay,2) ?></td>
                            <td class="text-bold"><?php echo number_format($net_pay,2) ?></td>
                            
                        </tr>
                    <?php 
                            $total_gross_pay = $gross_pay + $total_gross_pay;
                            $total_net_pay = $net_pay + $total_net_pay;
                        } 
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-right">
            <label>Total Gross Pay: <?php echo number_format($total_gross_pay,2) ?></label><br>
            <label>Total Net Pay: <?php echo number_format($total_net_pay,2) ?></label>
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