<?php
defined('BASEPATH') or die('Access Denied');

$tech_id_edit = '';
$tech_fname_edit = '';
$tech_mname_edit = '';
$tech_lname_edit = '';
$tech_bday_edit = '';
$tech_contactnumber_edit = '';
$tech_position_edit = '';
$tech_address_edit = '';
$tech_sssnumber_edit = '';
$tech_tinnumber_edit = '';
$tech_pagibignumber_edit = '';
$tech_philhealthnumber_edit = '';
$tech_status_edit = '';
$tech_validity_edit = '';
$tech_datehired_edit = '';
$tech_dailyrate_edit = '';
$tech_pagibigrate_edit = '';
$tech_sssrate_edit = '';
$tech_philhealthrate_edit = '';
$tech_tax_edit = '';
$tech_sl_credit_edit = '';
$tech_vl_credit_edit = '';
$tech_remarks_edit = '';

foreach ($results as $row) {
	$tech_id_edit = $row->id;
	$tech_fname_edit = $row->firstname;
	$tech_mname_edit = $row->middlename;
	$tech_lname_edit = $row->lastname;
	if ($row->birthdate != '0000-00-00') {
		$tech_bday_edit = $row->birthdate;
	}
	$tech_contactnumber_edit = $row->contact_number;
	$tech_position_edit = $row->position;
	$tech_address_edit = $row->address;
	$tech_sssnumber_edit = $row->sss_number;
	$tech_tinnumber_edit = $row->tin_number;
	$tech_pagibignumber_edit = $row->pagibig_number;
	$tech_philhealthnumber_edit = $row->phil_health_number;
	$tech_status_edit = $row->status;

	if ($row->validity != '0000-00-00') {
		$tech_validity_edit = $row->validity;
	}
	
	if ($row->date_hired != '0000-00-00') {
		$tech_datehired_edit = $row->date_hired;
	}
	
	$tech_dailyrate_edit = $row->daily_rate;
	$tech_pagibigrate_edit = $row->pag_ibig_rate;
	$tech_sssrate_edit = $row->sss_rate;
	$tech_philhealthrate_edit = $row->phil_health_rate;
	$tech_tax_edit = $row->tax;
	$tech_sl_credit_edit = $row->sl_credit;
	$tech_vl_credit_edit = $row->vl_credit;
	$tech_remarks_edit = $row->remarks;
}
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Employees Update</h1>
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
							<label>Fill up fields below</label>
						</div>

						<div class="card-body">
							<?php echo form_open('TechniciansController/editTechValidate',["id" => "form-edit-tech"]) ?>

							<!-- Employee Basic Information -->
							<div class="row">
								<div class="col-sm-12">
									<div class="card">
										<div class="card-header">
											<label>Employee Basic Information</label>
										</div>

										<div class="card-body">
											
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<label for="tech_id">Employee ID</label>
														<input class="form-control" type="text" name="tech_id" id="tech_id" readonly value="<?php echo $tech_id_edit ?>">
													</div>

													<div class="form-group">
														<label for="tech_fname">First Name</label>
														<input class="form-control" type="text" name="tech_fname" id="tech_fname" value="<?php echo $tech_fname_edit ?>">
													</div>

													<div class="form-group">
														<label for="tech_mname">Middle Name</label>
														<input class="form-control" type="text" name="tech_mname" id="tech_mname" value="<?php echo $tech_mname_edit ?>">
													</div>

													<div class="form-group">
														<label for="tech_lname">Last Name</label>
														<input class="form-control" type="text" name="tech_lname" id="tech_lname" value="<?php echo $tech_lname_edit ?>">
													</div>

												</div>

												<div class="col-sm-6">
													<div class="form-group">
                                                        <label for="tech_bday">Birth Date</label>
                                                        <input class="form-control" type="date" name="tech_bday" id="tech_bday" value="<?php echo $tech_bday_edit ?>">
													</div>
													
													<div class="form-group">
                                                        <label for="tech_contact_number">Contact Number</label>
                                                        <input class="form-control" type="text" name="tech_contact_number" id="tech_contact_number" value="<?php echo $tech_contactnumber_edit ?>">
													</div>
													
													<div class="form-group">
                                                        <label for="tech_address">Address</label>
                                                        <textarea class="form-control" name="tech_address" id="tech_address" rows="3"><?php echo $tech_address_edit ?></textarea>
                                                    </div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								
							</div>

							<!-- Employee Other Information -->
							<div class="row">
								<div class="col-sm-12">
									<div class="card">
										<div class="card-header">
											<label>Other Employee Information</label>
										</div>

										<div class="card-body">
											<div class="row">
												<div class="col-sm-4">
                                                    <div class="form-group">
														<label for="tech_position">Position</label>
														<input class="form-control" type="text" name="tech_position" id="tech_position" value="<?php echo $tech_position_edit ?>">
													</div>

                                                    <div class="form-group">
                                                        <label for="tech_sss_number">SSS Number</label>
                                                        <input class="form-control" type="text" name="tech_sss_number" id="tech_sss_number" value="<?php echo $tech_sssnumber_edit ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_tin_number">TIN Number</label>
                                                        <input class="form-control" type="text" name="tech_tin_number" id="tech_tin_number" value="<?php echo $tech_tinnumber_edit ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_pagibig_number">PAG-IBIG Number</label>
                                                        <input class="form-control" type="text" name="tech_pagibig_number" id="tech_pagibig_number" value="<?php echo $tech_pagibignumber_edit ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_phil_health_number">Phil-Health Number</label>
                                                        <input class="form-control" type="text" name="tech_phil_health_number" id="tech_phil_health_number" value="<?php echo $tech_philhealthnumber_edit ?>">
                                                    </div>

                                                    
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="tech_status">Employment Status</label>
                                                        <select class="form-control" name="tech_status" id="tech_status">
                                                            <option value="">--- Please Select ---</option>
                                                            <option <?php if ($tech_status_edit == 'Temporary'){echo ' selected';} ?>>Temporary</option>
                                                            <option <?php if ($tech_status_edit == 'Probationary'){echo ' selected';} ?>>Probationary</option>
                                                            <option <?php if ($tech_status_edit == 'Project-Based'){echo ' selected';} ?>>Project-Based</option>
                                                            <option <?php if ($tech_status_edit == 'Part-Time'){echo ' selected';} ?>>Part-Time</option>
															<option <?php if ($tech_status_edit == 'Regular'){echo ' selected';} ?>>Regular</option>
															<option <?php if ($tech_status_edit == 'Resigned'){echo ' selected';} ?>>Resigned</option>
															<option <?php if ($tech_status_edit == 'Terminated'){echo ' selected';} ?>>Terminated</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_validity">Employment Validity</label>
                                                        <input type="date" name="tech_validity" id="tech_validity" class="form-control" aria-describedby="validityHelp" value="<?php echo $tech_validity_edit ?>">
                                                        <small id="validityHelp" class="text-muted">Note: If employment is permanent, leave blank</small>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_date_hired">Date Hired</label>
                                                        <input type="date" name="tech_date_hired" id="tech_date_hired" class="form-control" value="<?php echo $tech_datehired_edit ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_daily_rate">Daily Rate</label>
                                                        <input class="form-control" type="text" name="tech_daily_rate" id="tech_daily_rate" value="<?php echo $tech_dailyrate_edit ?>">
													</div>
													
													<div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="tech_vl_credit">VL Credit</label>
                                                                <input class="form-control" type="text" name="tech_vl_credit" id="tech_vl_credit" value="<?php echo $tech_vl_credit_edit ?>">
                                                            </div>

                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="tech_sl_credit">SL Credit</label>
                                                                <input class="form-control" type="text" name="tech_sl_credit" id="tech_sl_credit" value="<?php echo $tech_sl_credit_edit ?>">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="tech_pagibig_rate">PAG-Ibig Contribution</label>
                                                        <input class="form-control" type="text" name="tech_pagibig_rate" id="tech_pagibig_rate" value="<?php echo $tech_pagibigrate_edit ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_sss_rate">SSS Contribution</label>
                                                        <input class="form-control" type="text" name="tech_sss_rate" id="tech_sss_rate" value="<?php echo $tech_sssrate_edit ?>">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="tech_phil_health_rate">Phil-Health Contribution</label>
                                                        <input class="form-control" type="text" name="tech_phil_health_rate" id="tech_phil_health_rate" value="<?php echo $tech_philhealthrate_edit ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_tax">Tax Rate</label>
                                                        <input class="form-control" type="text" name="tech_tax" id="tech_tax" value="<?php echo $tech_tax_edit ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_remarks">Other Remarks</label>
                                                        <textarea class="form-control" name="tech_remarks" id="tech_remarks" rows="3"><?php echo $tech_remarks_edit ?></textarea>
                                                    </div>
                                                </div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>

						<div class="card-footer">
							<button type="submit" class="btn btn-success text-bold float-right">CONFIRM</button>
							<?php echo form_close() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>