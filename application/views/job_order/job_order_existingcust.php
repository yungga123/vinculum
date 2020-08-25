<?php
defined('BASEPATH') or die('Access Denied');
date_default_timezone_set('Asia/Manila');
?>

<div class="col-sm-9">

    <!-- Client Information -->
    <div class="card">
        <div class="card-header">
            <label>Provide Information Below (Existing Customer)</label>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="customer">Select Customer</label>
                        <select class="form-control" name="customer" id="customer">
                            <option value="">--- Please select customer ---</option>
                            <?php foreach ($customers as $row) { ?>
                                <option value="<?php echo $row->CustomerID ?>"><?php echo $row->CompanyName.' - '.$row->CustomerID ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="date">Date Requested</label>
                        <input type="date" name="date" id="date" class="form-control" value="<?php echo date('Y-m-d') ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Type of Project</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="service_type" value="Service">
                                Service
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="service_type" value="Project">
                                Project
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">

                    <div class="form-group">
                        <label>Scope</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="scope[]" value="CCTV">
                                CCTV
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="scope[]" value="Biometrics/Access Control">
                                Biometrics/Access Control
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="scope[]" value="FDAS">
                                FDAS
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="scope[]" value="Intrusion Alarm">
                                Intrusion Alarm
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="scope[]" value="PABX">
                                PABX
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="scope[]" value="Gate Barrier">
                                Gate Barrier
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="scope[]" value="E-Fence">
                                E-Fence
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="scope[]" value="Structured Cabling">
                                Structured Cabling
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="scope[]" value="PABGM">
                                PABGM
                            </label>
                        </div>
                    </div>

                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="comments">Comments</label>
                        <textarea class="form-control" name="comments" id="comments" rows="8" placeholder="Enter comments/remarks here.&#10;If service, list here the reported problems.&#10;If project, list here the work scope."></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Schedule Confirmation -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="date_reported">Date Reported</label>
                        <input type="date" name="date_reported" id="date_reported" class="form-control" placeholder="" aria-describedby="date_reported_help">
                        <small id="date_reported_help" class="text-muted">Indicate when the client called or requested for schedule.</small>
                    </div>

                    <div class="form-group">
                        <label for="requestor">Requested By</label>
                        <select name="requestor" id="requestor" class="form-control" placeholder="" aria-describedby="requestot_help">
                            <option value="">--- Please select ---</option>
                        </select>
                        <small id="requestot_help" class="text-muted">Must be registered first to employee list.</small>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="date_scheduled">Committed Schedule</label>
                        <input type="date" name="date_scheduled" id="date_scheduled" class="form-control" placeholder="" aria-describedby="date_scheduled_help">
                        <small id="date_scheduled_help" class="text-muted">To be filled-up by ADMIN. Leave blank if requesting.</small>
                    </div>

                    <div class="form-group">
                        <label>Under Warranty?</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="under_warranty" value="Yes">
                                Yes
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="under_warranty" value="No">
                                No
                            </label>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Submit -->
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-success btn-block text-bold"><i class="fas fa-check-circle"></i> SUBMIT</button>
                </div>
            </div>
        </div>
    </div>
    
</div>