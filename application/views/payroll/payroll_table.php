<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Payroll Table</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
    <!-- /.content-header -->
    
    <section class="content">
        <div class="container-fluid">

            <!-- CutOFF Filter -->
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    <div class="card">
                        <div class="card-header">
                            <label>Cutoff Date Filter</label>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php echo form_open('payroll-filter') ?>
                                    <div class="form-group">
                                        <label for="cutoff_filter_start">Start Date</label>
                                        <input type="date" class="form-control" name="cutoff_filter_start" id="cutoff_filter_start" required value="<?php if ($this->uri->segment(1)=='payroll-filter') { echo $start_date; } ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="cutoff_filter_end">End Date</label>
                                        <input type="date" class="form-control" name="cutoff_filter_end" id="cutoff_filter_end" required value="<?php if ($this->uri->segment(1)=='payroll-filter') { echo $end_date; } ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="<?php echo site_url('payroll-table') ?>" class="btn btn-warning text-bold">VIEW ALL PAYROLL</a>
                            <button class="btn btn-success text-bold float-right" type="submit"><i class="fas fa-check"></i> CONFIRM</button>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>

            </div>
            
            <!-- Payroll Table -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <label>List of Payroll</label>
                            <a href="<?php echo site_url('payroll') ?>" class="btn btn-success text-bold float-right"><i class="fas fa-plus"></i> ADD PAYROLL</a>
                        </div>

                        <div class="card-body">
                            <table id="<?php if ($this->uri->segment(1) == 'payroll-filter') {
                                echo 'payroll_filter';
                            } else {
                                echo 'payroll_table';
                            } ?>" class="table table-bordered table-hover" style="width: 100%">
			            		<thead>
			            			<tr>
                                        <th>Payroll ID</th>
                                        <th>Cut-Off Date</th>
                                        <th>Employee ID</th>
                                        <th>Employee Name</th>
                                        <th>Position</th>
                                        <th>Daily Rate</th>
                                        <th>Gross Pay</th>
                                        <th>Net Pay</th>
                                        <th>Operation</th>
			            			</tr>
                                </thead>

                                <?php if ($this->uri->segment(1) == 'payroll-filter') {
                                    echo '<tbody>';
                                    foreach ($payroll_filter as $row) {
                                            $basic_pay = $row->daily_rate*$row->days_worked;
                                            $regular_holiday_pay = $row->daily_rate*$row->reg_holiday;
                                            $special_holiday_pay = $row->daily_rate*$row->special_holiday*0.3;
                                            $wdo_pay = $row->daily_rate*$row->wdo*1.3;
                                            $ot_pay = ($row->daily_rate/8)*1.25*$row->ot_hrs;
                                            $night_diff_pay = ($row->daily_rate/8)*0.1*$row->night_diff_hrs;
                                            $absents = $row->daily_rate*$row->days_absent;
                                            $awol = $row->daily_rate*$row->awol;
                                            $rest_days = $row->daily_rate*$row->rest_day;
                                            $tardiness = ($row->daily_rate/8)*$row->hours_late;
                                            $gross_pay = ($basic_pay+$regular_holiday_pay+$special_holiday_pay+$wdo_pay+$ot_pay+$night_diff_pay) - ($absents+$tardiness+$awol+$rest_days);
                                            $contribution = $row->sss_rate+$row->pag_ibig_rate+$row->phil_health_rate;
                                            $net_pay = $gross_pay+$row->incentives+$row->commission+$row->thirteenth_month+$row->addback - ($contribution+$row->tax+$row->cash_adv+$row->others);
                                        ?>
                                        <tr>
                                            <td><?php echo $row->payroll_id ?></td>
                                            <td><?php echo date_format(date_create($row->cutoff_start),'F d, Y').' - '.date_format(date_create($row->cutoff_end),'F d, Y') ?></td>
                                            <td><?php echo $row->emp_id ?></td>
                                            <td><?php echo $row->firstname.' '.$row->middlename.' '.$row->lastname ?></td>
                                            <td><?php echo $row->position ?></td>
                                            <td><?php echo $row->daily_rate ?></td>
                                            <td><?php echo number_format($gross_pay,2) ?></td>
                                            <td><?php echo number_format($net_pay,2) ?></td>
                                            <td>
                                                <a href="<?php echo site_url('payslip-update/'.$row->payroll_id) ?>" class="btn btn-warning btn-xs" target="_blank"><i class="fas fa-edit"></i></a> 

                                                <a href="'.site_url('payroll-delete/'.$row->payroll_id).'" class="btn btn-danger btn-xs" onclick="return confirm('Delete this payroll?')"><i class="fas fa-trash"></i></a>

                                                <a href="<?php echo site_url('payslip/'.$row->payroll_id) ?>" class="btn btn-success btn-xs" target="_blank"><i class="fas fa-search"></i></a>

                                            </td>
                                        </tr>
                                    <?php }
                                    echo '</tbody>';
                                } ?>
			            	</table>
                        </div>

                        <div class="card-footer">
                            <?php if ($this->uri->segment(1) == 'payroll-filter') { ?>
                                <a href="<?php echo site_url('payroll-print/'.$start_date.'/'.$end_date) ?>" class="btn btn-success text-bold float-right" target="_blank"><i class="fas fa-print"></i> PRINT</a>
                            <?php } else { ?>

                                <a href="<?php echo site_url('payroll-print-all') ?>" class="btn btn-success text-bold float-right" target="_blank"><i class="fas fa-print"></i> PRINT</a>

                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>