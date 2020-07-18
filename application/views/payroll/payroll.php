<?php 
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Payroll</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <label>Payroll Computation</label>
                            <a href="<?php echo site_url('payroll-table') ?>" class="btn btn-success text-bold float-right"><i class="fas fa-table"></i> VIEW LIST OF PAYROLL</a>
                        </div>

                        <?php
                            
                            if ($payroll['case'] == 'update') {
                                echo form_open();
                            } else {
                                echo form_open('PayrollController/addPayrollValidate',["id" => "form-payroll"]);
                            }
                        ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- Select Employee -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="emp_id">Select Employee</label>
                                                        <?php if ($payroll['case'] == 'update') { ?>
                                                            <select class="form-control select-employee" name="emp_id" id="emp_id">
                                                                <option value=""><--- Please Select ---></option>
                                                                <?php foreach ($technicians as $row) { ?>
                                                                    <option value="<?php echo $row->id ?>" <?php if ($row->id==$payroll['emp_id']) {
                                                                        echo 'selected';
                                                                    } ?>>
                                                                        <?php echo $row->name.' | '.$row->position.' | ID : '.$row->id ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        <?php } else { ?>
                                                            <select class="form-control select-employee" name="emp_id" id="emp_id">
                                                                <option value=""><--- Please Select ---></option>
                                                                <?php foreach ($technicians as $row) { ?>
                                                                    <option value="<?php echo $row->id ?>">
                                                                        <?php echo $row->name.' | '.$row->position.' | ID : '.$row->id ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        <?php } ?>
                                                         
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="daily_rate">Daily Rate</label>
                                                                <input type="text" class="form-control" name="daily_rate" id="daily_rate" readonly <?php if ($payroll['case'] == 'update') {
                                                                    echo 'value="'.number_format($payroll['basic_income_rate'],2).'"';
                                                                } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="sss_rate">SSS</label>
                                                                <input type="text" class="form-control" name="sss_rate" id="sss_rate" readonly <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['sss_cont'],2).'"';
                                                                } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="pagibig_rate">PAG-IBIG</label>
                                                                <input type="text"
                                                                    class="form-control" name="pagibig_rate" id="pagibig_rate" readonly <?php if ($payroll['case']=='update') {
                                                                        echo 'value="'.number_format($payroll['pagibig_cont'],2).'"';
                                                                    } ?>>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="philhealth_rate">PhilHealth</label>
                                                                <input type="text" class="form-control" name="philhealth_rate" id="philhealth_rate" readonly <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['philhealth_cont'],2).'"';
                                                                } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="tax_rate">Tax Rate</label>
                                                                <input type="text" class="form-control" name="tax_rate" id="tax_rate" readonly <?php if ($payroll['case']=='update') {
                                                                        echo 'value="'.number_format($payroll['tax'],2).'"';
                                                                    } ?>>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="days_worked">Days Worked</label>
                                                                <input type="text" class="form-control" name="days_worked" id="days_worked" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['basic_income_days'],2).'"';
                                                                } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="hours_late">Hours Late</label>
                                                                <input type="text" class="form-control" name="hours_late" id="hours_late" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['tardiness_hrs'],2).'"';
                                                                } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="days_absent">Days Absent</label>
                                                                <input type="text" class="form-control" name="days_absent" id="days_absent" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['tardiness_hrs'],2).'"';
                                                                } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="cash_adv">Cash Advance</label>
                                                                <input type="text" class="form-control" name="cash_adv" id="cash_adv" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['cash_adv'],2).'"';
                                                                } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="others">Other Deductions</label>
                                                                <input type="text" class="form-control" name="others" id="others" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['other_deduction'],2).'"';
                                                                } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="addback">Addback</label>
                                                                <input type="text" class="form-control" name="addback" id="addback" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['addback'],2).'"';
                                                                } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="incentives">Incentives</label>
                                                                <input type="text" class="form-control" name="incentives" id="incentives" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['incentives'],2).'"';
                                                                } ?>>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="ot_hrs">No. of OT Hours</label>
                                                                <input type="text" class="form-control" name="ot_hrs" id="ot_hrs" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['overtime_hrs'],2).'"';
                                                                } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="night_diff_hrs">No. of Night Differential Hours</label>
                                                                <input type="text" class="form-control" name="night_diff_hrs" id="night_diff_hrs" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['nightdiff_hrs'],2).'"';
                                                                } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="wdo">Working Day-off Days</label>
                                                                <input type="text" class="form-control" name="wdo" id="wdo" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['wdo_days'],2).'"';
                                                                } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="reg_holiday">Regular Holidays</label>
                                                                <input type="text" class="form-control" name="reg_holiday" id="reg_holiday" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['regday_days'],2).'"';
                                                                } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="special_holiday">Special Holidays</label>
                                                                <input type="text" class="form-control" name="special_holiday" id="special_holiday" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['spcday_days'],2).'"';
                                                                } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="vacation_leave">No. of Vacation Leaves</label>
                                                                <input type="text" class="form-control" name="vacation_leave" id="vacation_leave" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['vl'],2).'"';
                                                                } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="sick_leave">No. of Sick Leaves</label>
                                                                <input type="text" class="form-control" name="sick_leave" id="sick_leave" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['sl'],2).'"';
                                                                } ?>>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="commission">Commission</label>
                                                                <input type="text" class="form-control" name="commission" id="commission" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['commission'],2).'"';
                                                                } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="13th_month">13th Month Pay</label>
                                                                <input type="text" class="form-control" name="13th_month" id="13th_month" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['13th_month'],2).'"';
                                                                } ?>>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label for="remarks">Notes</label>
                                                                <input type="text" class="form-control" name="remarks" id="remarks" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.$payroll['notes'].'"';
                                                                } ?>>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="rest_day">No. of Rest Days</label>
                                                                <input type="text" class="form-control" name="rest_day" id="rest_day" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['restday_days'],2).'"';
                                                                } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="awol">No. of AWOLs</label>
                                                                <input type="text" class="form-control" name="awol" id="awol" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.number_format($payroll['awol_days'],2).'"';
                                                                } ?>>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <label>Computed Values</label>
                                                </div>

                                                <div class="card-body">
                                                    <table class="table table-bordered table-sm">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th colspan="2" width="50%">Earnings</th>
                                                                <th colspan="2" width="50%">Deductions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Basic Income</td>
                                                                <td class="basicIncome"></td>
                                                                <td>Absents</td>
                                                                <td class="absents"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>WDO</td>
                                                                <td class="wdo_pay"></td>
                                                                <td>Tardiness</td>
                                                                <td class="tardiness"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Night Diff</td>
                                                                <td class="ndpay"></td>
                                                                <td>Cash Advance</td>
                                                                <td class="cash_adv"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Special Holdiday</td>
                                                                <td class="spholidaypay"></td>
                                                                <td>Others</td>
                                                                <td class="other_deduct"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Regular Holiday</td>
                                                                <td class="regHolidayPay"></td>
                                                                <td>SSS</td>
                                                                <td class="sss"></td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Overtime</td>
                                                                <td class="ot_pay"></td>
                                                                <td>Pag-IBIG</td>
                                                                <td class="pagibig"></td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>Incentives</td>
                                                                <td class="incentives"></td>
                                                                <td>PhilHealth</td>
                                                                <td class="philhealth"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Commission</td>
                                                                <td class="commission"></td>
                                                                <td>Tax</td>
                                                                <td class="tax"></td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td>13th Month</td>
                                                                <td class="13thmonth"></td>
                                                                <td>AWOL</td>
                                                                <td class="awol"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Addback</td>
                                                                <td class="addback"></td>
                                                                <td>Rest Days</td>
                                                                <td class="rest_days"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <div class="text-right">
                                                        <label>Gross Pay:</label> <span class="gross_pay"></span><br>
                                                        <label>Net Pay:</label> <span class="net_pay"></span>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <label>Cut-Off Date</label>
                                                </div>

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="start_date">Start Date</label>
                                                                <input type="date" name="start_date" id="start_date" class="form-control" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.$payroll['start_date'].'"';
                                                                } ?>>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="end_date">End Date</label>
                                                                <input type="date" name="end_date" id="end_date" class="form-control" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.$payroll['end_date'].'"';
                                                                } ?>>
                                                            </div>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <button class="btn btn-block btn-success text-bold"><i class="fas fa-check"></i> SUBMIT</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>