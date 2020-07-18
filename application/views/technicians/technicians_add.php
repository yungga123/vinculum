<?php 
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Employee Add</h1>
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
                        <?php echo form_open('TechniciansController/addTechValidate',["id" => "form-add-tech"]) ?>
                        <div class="card-header">
                            <label>Fill up fields below</label>
                        </div>

                        <div class="card-body">

                            <!-- Basic Employee Information -->
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
                                                        <input class="form-control" type="text" name="tech_id" id="tech_id">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_fname">First Name</label>
                                                        <input class="form-control" type="text" name="tech_fname" id="tech_fname">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_mname">Middle Name</label>
                                                        <input class="form-control" type="text" name="tech_mname" id="tech_mname">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_lname">Last Name</label>
                                                        <input class="form-control" type="text" name="tech_lname" id="tech_lname">
                                                    </div>

                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="tech_bday">Birth Date</label>
                                                        <input class="form-control" type="date" name="tech_bday" id="tech_bday">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_contact_number">Contact Number</label>
                                                        <input class="form-control" type="text" name="tech_contact_number" id="tech_contact_number">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_address">Address</label>
                                                        <textarea class="form-control" name="tech_address" id="tech_address" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Other Information -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label>Other Information</label>
                                        </div>

                                        <div class="card-body">
                                            <div class="row">

                                                <!-- Position, SSS, TIN, PagIBIG, Phil-Health Number -->
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="tech_position">Position</label>
                                                        <input class="form-control" type="text" name="tech_position" id="tech_position">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_sss_number">SSS Number</label>
                                                        <input class="form-control" type="text" name="tech_sss_number" id="tech_sss_number">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_tin_number">TIN Number</label>
                                                        <input class="form-control" type="text" name="tech_tin_number" id="tech_tin_number">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_pagibig_number">PAG-IBIG Number</label>
                                                        <input class="form-control" type="text" name="tech_pagibig_number" id="tech_pagibig_number">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_phil_health_number">Phil-Health Number</label>
                                                        <input class="form-control" type="text" name="tech_phil_health_number" id="tech_phil_health_number">
                                                    </div>

                                                    
                                                </div>

                                                <!-- Employement Status, Employment Validity, Date Hired, Daily Rate -->
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="tech_status">Employment Status</label>
                                                        <select class="form-control" name="tech_status" id="tech_status">
                                                            <option value="">--- Please Select ---</option>
                                                            <option>Temporary</option>
                                                            <option>Probationary</option>
                                                            <option>Project-Based</option>
                                                            <option>Part-Time</option>
                                                            <option>Regular</option>
                                                            <option>Resigned</option>
                                                            <option>Terminated</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_validity">Employment Validity</label>
                                                        <input type="date" name="tech_validity" id="tech_validity" class="form-control" aria-describedby="validityHelp">
                                                        <small id="validityHelp" class="text-muted">Note: If employment is permanent, leave blank</small>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_date_hired">Date Hired</label>
                                                        <input type="date" name="tech_date_hired" id="tech_date_hired" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_daily_rate">Daily Rate</label>
                                                        <input class="form-control" type="text" name="tech_daily_rate" id="tech_daily_rate">
                                                    </div>
                                                    
                                                </div>

                                                <!-- PagIBIG, SSS, Phil-Health Contribution, Tax Rate, Other Remarks -->
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="tech_pagibig_rate">PAG-Ibig Contribution</label>
                                                        <input class="form-control" type="text" name="tech_pagibig_rate" id="tech_pagibig_rate">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_sss_rate">SSS Contribution</label>
                                                        <input class="form-control" type="text" name="tech_sss_rate" id="tech_sss_rate">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_phil_health_rate">Phil-Health Contribution</label>
                                                        <input class="form-control" type="text" name="tech_phil_health_rate" id="tech_phil_health_rate">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_tax">Tax Rate</label>
                                                        <input class="form-control" type="text" name="tech_tax" id="tech_tax">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tech_remarks">Other Remarks</label>
                                                        <textarea class="form-control" name="tech_remarks" id="tech_remarks" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary text-bold float-right">SUBMIT</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
</div>