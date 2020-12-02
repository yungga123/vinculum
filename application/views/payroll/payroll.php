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
                                echo form_open('PayrollController/updatePayrollValidate/'.$this->uri->segment(2),["id" => "form-payroll-update"]);
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
                                                            <select class="form-control form-control-sm select-employee" name="emp_id" id="emp_id">
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
                                                            <select class="form-control form-control-sm select-employee" name="emp_id" id="emp_id">
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

                                    <!-- Employee Rates -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-4">

                                                            <div class="form-group">
                                                                <label for="daily_rate">Daily Rate</label>
                                                                <input type="text" class="form-control form-control-sm" name="daily_rate" id="daily_rate" readonly <?php if ($payroll['case'] == 'update') {
                                                                    echo 'value="'.$payroll['basic_income_rate'].'"';
                                                                } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="sss_rate">SSS</label>
                                                                <input type="text" class="form-control form-control-sm" name="sss_rate" id="sss_rate" readonly <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.$payroll['sss_cont'].'"';
                                                                } ?>>
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-4">

                                                            <div class="form-group">
                                                                <label for="pagibig_rate">PAG-IBIG</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm" name="pagibig_rate" id="pagibig_rate" readonly <?php if ($payroll['case']=='update') {
                                                                        echo 'value="'.$payroll['pagibig_cont'].'"';
                                                                    } ?>>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="philhealth_rate">PhilHealth</label>
                                                                <input type="text" class="form-control form-control-sm" name="philhealth_rate" id="philhealth_rate" readonly <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.$payroll['philhealth_cont'].'"';
                                                                } ?>>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="tax_rate">Tax Rate</label>
                                                                <input type="text" class="form-control form-control-sm" name="tax_rate" id="tax_rate" readonly <?php if ($payroll['case']=='update') {
                                                                        echo 'value="'.$payroll['tax'].'"';
                                                                    } ?>>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <!-- Computation (First Group) -->
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="card">
                                                                <div class="card-header text-center">
                                                                    <b>Earnings</b>
                                                                </div>

                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="days_worked">W. DAYS</label>
                                                                                <input type="text" class="form-control form-control-sm" name="days_worked" id="days_worked" placeholder="Typically 13" <?php if ($payroll['case']=='update') {
                                                                                    echo 'value="'.$payroll['basic_income_days'].'"';
                                                                                } ?>>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="ot_hrs">OT</label>
                                                                                <input type="text" class="form-control form-control-sm" name="ot_hrs" id="ot_hrs" placeholder="In hours format." <?php if ($payroll['case']=='update') {
                                                                                    echo 'value="'.$payroll['overtime_hrs'].'"';
                                                                                } ?>>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="night_diff_hrs">ND</label>
                                                                                <input type="text" class="form-control form-control-sm" name="night_diff_hrs" id="night_diff_hrs" placeholder="Input Hours." <?php if ($payroll['case']=='update') {
                                                                                    echo 'value="'.$payroll['nightdiff_hrs'].'"';
                                                                                } ?>>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="reg_holiday">REG HDAY</label>
                                                                                <input type="text" class="form-control form-control-sm" name="reg_holiday" id="reg_holiday" placeholder="Input Day" <?php if ($payroll['case']=='update') {
                                                                                    echo 'value="'.$payroll['regday_days'].'"';
                                                                                } ?>>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="special_holiday">SPC HDAY</label>
                                                                                <input type="text" class="form-control form-control-sm" name="special_holiday" id="special_holiday" placeholder="Input Day" <?php if ($payroll['case']=='update') {
                                                                                    echo 'value="'.$payroll['spcday_days'].'"';
                                                                                } ?>>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="commission">COMMISSION</label>
                                                                                <input type="text" class="form-control form-control-sm" name="commission" id="commission" placeholder="Input amount" <?php if ($payroll['case']=='update') {
                                                                                    echo 'value="'.$payroll['commission'].'"';
                                                                                } ?>>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label for="wdo">WDO</label>
                                                                                <input type="text" class="form-control form-control-sm" name="wdo" id="wdo" placeholder="Input Day" <?php if ($payroll['case']=='update') {
                                                                                    echo 'value="'.$payroll['wdo_days'].'"';
                                                                                } ?>>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="addback">ADDBACK</label>
                                                                                <input type="text" class="form-control form-control-sm" name="addback" id="addback" placeholder="Input amount" <?php if ($payroll['case']=='update') {
                                                                                    echo 'value="'.$payroll['addback'].'"';
                                                                                } ?>>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="incentives">INCENTIVE</label>
                                                                                <input type="text" class="form-control form-control-sm" name="incentives" id="incentives" placeholder="Input amount" <?php if ($payroll['case']=='update') {
                                                                                    echo 'value="'.$payroll['incentives'].'"';
                                                                                } ?>>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="sick_leave">SL</label>
                                                                                <input type="text" class="form-control form-control-sm" name="sick_leave" id="sick_leave" placeholder="Input day" <?php if ($payroll['case']=='update') {
                                                                                    echo 'value="'.$payroll['sl'].'"';
                                                                                } ?>>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="vacation_leave">VL</label>
                                                                                <input type="text" class="form-control form-control-sm" name="vacation_leave" id="vacation_leave" placeholder="Input day" <?php if ($payroll['case']=='update') {
                                                                                    echo 'value="'.$payroll['vl'].'"';
                                                                                } ?>>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="13th_month">13TH MO</label>
                                                                                <input type="text" class="form-control form-control-sm" name="13th_month" id="13th_month" placeholder="Input amount" <?php if ($payroll['case']=='update') {
                                                                                    echo 'value="'.$payroll['13th_month'].'"';
                                                                                } ?>>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="card">
                                                                <div class="card-header text-center">
                                                                    <b>Deductions</b>
                                                                </div>

                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-6">

                                                                            <div class="form-group">
                                                                                <label for="hours_late">LATE</label>
                                                                                <input type="text" class="form-control form-control-sm" name="hours_late" id="hours_late" placeholder="Input Hours" <?php if ($payroll['case']=='update') {
                                                                                    echo 'value="'.$payroll['tardiness_hrs'].'"';
                                                                                } ?>>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="days_absent">ABSENT</label>
                                                                                <input type="text" class="form-control form-control-sm" name="days_absent" id="days_absent" placeholder="Input Day" <?php if ($payroll['case']=='update') {
                                                                                    echo 'value="'.$payroll['absent_days'].'"';
                                                                                } ?>>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="rest_day">RD</label>
                                                                                <input type="text" class="form-control form-control-sm" name="rest_day" id="rest_day" placeholder="Input day" <?php if ($payroll['case']=='update') {
                                                                                    echo 'value="'.$payroll['restday_days'].'"';
                                                                                } ?>>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-sm-6">
                                                                            
                                                                            <div class="form-group">
                                                                                <label for="awol">AWOL</label>
                                                                                <input type="text" class="form-control form-control-sm" name="awol" id="awol" placeholder="Input amount" <?php if ($payroll['case']=='update') {
                                                                                    echo 'value="'.$payroll['awol_days'].'"';
                                                                                } ?>>
                                                                            </div>
                                                                        
                                                                            <div class="form-group">
                                                                                <label for="others">OTHER</label>
                                                                                <input type="text" class="form-control form-control-sm" name="others" id="others" placeholder="Input amount" <?php if ($payroll['case']=='update') {
                                                                                    echo 'value="'.$payroll['other_deduction'].'"';
                                                                                } ?>>
                                                                            </div>


                                                                            <div class="form-group">
                                                                                <label for="cash_adv">CA</label>
                                                                                <input type="text" class="form-control form-control-sm" name="cash_adv" id="cash_adv" placeholder="Input amount" <?php if ($payroll['case']=='update') {
                                                                                    echo 'value="'.$payroll['cash_adv'].'"';
                                                                                } ?>>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label for="remarks">NOTES</label>
                                                                                <textarea class="form-control form-control-sm" name="remarks" id="remarks" rows="3" placeholder="Input notes"><?php if ($payroll['case']=='update') {
                                                                                    echo $payroll['notes'];
                                                                                } ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Computed Values -->
                                <div class="col-sm-6">
                                    
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
                                                            <tr>
                                                                <td>Vacation Pay</td>
                                                                <td class="vac_pay"></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sick Pay</td>
                                                                <td class="sick_pay"></td>
                                                                <td></td>
                                                                <td></td>
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
                                                                <input type="date" name="start_date" id="start_date" class="form-control form-control-sm" <?php if ($payroll['case']=='update') {
                                                                    echo 'value="'.$payroll['start_date'].'"';
                                                                } ?>>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="end_date">End Date</label>
                                                                <input type="date" name="end_date" id="end_date" class="form-control form-control-sm" <?php if ($payroll['case']=='update') {
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