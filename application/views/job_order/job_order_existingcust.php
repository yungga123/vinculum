<?php 
defined('BASEPATH') or die('Access Denied');
?>

<div class="col-sm-9">
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

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="customer">Select Customer</label>
                        <input type="text" name="customer" id="customer" class="form-control" placeholder="">
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