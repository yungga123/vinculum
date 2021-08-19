<?php
defined('BASEPATH') or die('Access Denied');
date_default_timezone_set('Asia/Manila');

if($form_id == "add-form"){
        $job_order_id = 1;
    foreach ($latest_joborder as $row) {
        $job_order_id = $row->id + 1;
    }
}
elseif($form_id="edit-form"){
    //edit data
    foreach($joborder_data as $row){

        if($row->commited_schedule == "0000-00-00"){
            $joborder_commitedschedule_edit = "";
        }
        else{
            $joborder_commitedschedule_edit = $row->commited_schedule;
        }

        $joborder_data_edit_result = [
            'joborder_status_edit' => $row->jo_status,
            'joborder_warranty_edit' => $row->under_warranty,
            'joborder_comments_edit' => $row->comments,
            'joborder_id_edit' => $row->id,
            'joborder_customerid_edit' => $row->customer_id,
            'joborder_daterequested_edit' => $row->date_requested,
            'joborder_typeofproject_edit' => $row->type_of_project,
            'joborder_dateported_edit' => $row->date_reported,
            'joborder_commitedschedule_edit' => $joborder_commitedschedule_edit,
            'joborder_requestedby_edit' => $row->requested_by,
            'joborder_datefiled_edit' => $row->date_filed,
            'joborder_pic_edit' => $row->pic
        ];
    }
}
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Project Job Order</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- Important Note -->
                <div class="col-sm-3">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <label><i class="fas fa-sticky-note"></i> Important Note!</label>
                                </div>

                                <div class="card-body">
                                    <p>
                                        You must add the <b class="text-danger">customer in customer database before adding job order</b>. If the customer is existing, you may proceed here.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <a href="<?php echo site_url('joborder-list/pending') ?>" class="btn btn-success text-bold btn-block"><i class="fas fa-table"></i> JOB ORDER LIST</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9">
                <?php if($form_id == "add-form"): ?>
                    <!-- Client Information -->
                    <?php echo form_open('JobOrderController/add_existing_customer', ["id" => "form-addexisting-joborder"]) ?>
                    <div class="card">
                        <div class="card-header">
                            <label>Provide Information Below (Existing Customer)</label>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <label for="job_order_id">Job Order No.</label>
                                            <input type="text" name="job_order_id" id="job_order_id" class="form-control" readonly value="<?php echo $job_order_id ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="customer">Select Customer</label>
                                        <select class="form-control select2" name="customer" id="customer">
                                            <option value="">--- Please select customer ---</option>
                                            <?php foreach ($customers as $row) { ?>
                                                <option value="<?php echo $row->CustomerID ?>"><?php echo $row->CompanyName . ' - ' . $row->CustomerID ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="date_requested">Date Requested</label>
                                        <input type="date" name="date_requested" id="date_requested" class="form-control" value="<?php echo date('Y-m-d') ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="date_requested">Status:</label>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="jo_status" value="phone support" >
                                                        For Phone Support
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="jo_status" value="service" >
                                                        For Service
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="jo_status" value="installation" >
                                                        For Installation
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
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
                                        <select name="requestor" id="requestor" class="form-control" placeholder="" aria-describedby="requestor_help">
                                            <option value="">--- Please select ---</option>
                                            <?php foreach ($employees as $row) { ?>
                                                <option value="<?php echo $row->id ?>"<?php echo ($this->session->userdata('logged_in')['emp_id'] == $row->id) ? '' : ' hidden' ?>><?php echo $row->name . ' | ' . $row->position . ' | ' . $row->id ?></option>
                                            <?php } ?>
                                        </select>
                                        <small id="requestor_help" class="text-muted">Must be registered first to employee list.</small>
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
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-sm-6 offset-sm-3">
                                        <button type="submit" class="btn btn-success btn-block text-bold"><i class="fas fa-check-circle"></i> SUBMIT</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <?php echo form_close() ?>
                <?php else: ?>
                    <?php if($route_id == "edit-pending-form"): ?>
                        <?php echo form_open('JobOrderController/edit_joborder_validate', ["id" => "form-editpending-joborder"]) ?>
                    <?php elseif($route_id == "edit-accepted-form"): ?>
                        <?php echo form_open('JobOrderController/edit_joborder_validate', ["id" => "form-editaccepted-joborder"]) ?>
                    <?php endif ?>
                    <!-- Client Information -->
                    <div class="card">
                        <div class="card-header">
                           <?php if($route_id == "edit-pending-form"): ?>
                                <label>Edit Pending Job Order (Existing Customer)</label>
                            <?php else: ?>
                                <label>Edit Accepted Job Order (Existing Customer)</label>
                           <?php endif ?>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="job_order_id">Job Order No.</label>
                                                <input type="text" name="job_order_id" id="job_order_id" class="form-control" readonly value="<?php echo $joborder_data_edit_result['joborder_id_edit'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="customer">Select Customer</label>
                                        <select class="form-control select2" name="customer" id="customer">
                                            <option value="">--- Please select customer ---</option>
                                            <?php foreach ($customers as $row) { ?>
                                                <option value="<?php echo $row->CustomerID ?>" <?php if ($joborder_data_edit_result['joborder_customerid_edit'] == $row->CustomerID) { echo 'selected';} ?> ><?php echo $row->CompanyName . ' - ' . $row->CustomerID ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="date_requested">Date Requested</label>
                                        <input type="date" name="date_requested" id="date_requested" class="form-control" value="<?php echo $joborder_data_edit_result['joborder_daterequested_edit'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="date_requested">Status:</label>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="jo_status" value="phone support" <?php if($joborder_data_edit_result['joborder_status_edit'] == "phone support") { echo 'checked'; }?> >
                                                        For Phone Support
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="jo_status" value="service" <?php if($joborder_data_edit_result['joborder_status_edit'] == "service") { echo 'checked'; }?> >
                                                        For Service
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="jo_status" value="installation" <?php if($joborder_data_edit_result['joborder_status_edit'] == "installation") { echo 'checked'; }?> >
                                                        For Installation
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Type of Project</label>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="service_type" value="Service" <?php if($joborder_data_edit_result['joborder_typeofproject_edit'] == "Service") { echo 'checked="checked"';} ?> >
                                                Service
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="service_type" value="Project" <?php if($joborder_data_edit_result['joborder_typeofproject_edit'] == "Project") { echo 'checked="checked"';} ?> >
                                                Project
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                <?php foreach($joborder_data_scope as $row): ?>
                                <input type="hidden" name="job_order_scope_id" value="<?php echo $row->id ?>">
                                    <div class="form-group">
                                        <label>Scope</label>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="cctv" value="1" <?php if($row->cctv == 1) { echo 'checked';} ?> >
                                                CCTV
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="biometrics" value="1" <?php if($row->biometrics == 1) { echo 'checked="checked"';} ?> >
                                                Biometrics/Access Control
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="fdas" value="1" <?php if($row->fdas == 1) { echo 'checked="checked"';} ?> >
                                                FDAS
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="intrusion_alarm" value="1" <?php if($row->intrusion_alarm == 1) { echo 'checked="checked"';} ?> >
                                                Intrusion Alarm
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="pabx" value="1" <?php if($row->pabx == 1) { echo 'checked="checked"';} ?> >
                                                PABX
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="gate_barrier" value="1" <?php if($row->gate_barrier == 1) { echo 'checked="checked"';} ?> >
                                                Gate Barrier
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="efence" value="1"  <?php if($row->efence == 1) { echo 'checked="checked"';} ?> >
                                                E-Fence
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="structured_cabling" value="1" <?php if($row->structured_cabling == 1) { echo 'checked="checked"';} ?> >
                                                Structured Cabling
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="pabgm" value="1" <?php if($row->pabgm == 1) { echo 'checked="checked"';} ?> >
                                                PABGM
                                            </label>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="comments">Comments</label>
                                        <textarea class="form-control" name="comments" id="comments" rows="8" placeholder="Enter comments here.&#10;If service, list here the reported problems.&#10;If project, list here the work scope."><?php echo $joborder_data_edit_result['joborder_comments_edit'] ?></textarea>
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
                                        <input type="date" name="date_reported" id="date_reported" class="form-control" placeholder="" aria-describedby="date_reported_help" value="<?php echo $joborder_data_edit_result['joborder_dateported_edit'] ?>">
                                        <small id="date_reported_help" class="text-muted">Indicate when the client called or requested for schedule.</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="requestor">Requested By</label>
                                        <select name="requestor" id="requestor" class="form-control" placeholder="" aria-describedby="requestor_help">
                                            <option value="">--- Please select ---</option>
                                            <?php foreach ($employees as $row) { ?>
                                                <option value="<?php echo $row->id ?>" <?php if ($joborder_data_edit_result['joborder_requestedby_edit'] == $row->id) { echo 'selected';} else { echo 'hidden';} ?>><?php echo $row->name . ' | ' . $row->position . ' | ' . $row->id ?></option>
                                            <?php } ?>
                                        </select>
                                        <small id="requestor_help" class="text-muted">Must be registered first to employee list.</small>
                                    </div>

                                    <?php if($route_id == "edit-accepted-form"): ?>
                                        <input type="hidden" name="edit-accepted" value="<?php echo $route_id ?>">
                                        <div class="form-group">
                                            <label for="pic_assigned">Project Incharge</label>
                                            <select name="pic_assigned" class="form-control">
                                                <option value="">--- Please select ---</option>
                                                <?php foreach($joborder_scheduled_data as $row): ?>
                                                    <option value="<?php echo $row->id ?>" <?php if ($joborder_data_edit_result['joborder_pic_edit'] == $row->id) { echo 'selected';} ?> ><?php echo $row->lastname.", ".$row->firstname." ".$row->middlename ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <small id="requestor_help" class="text-muted">Must be registered first to employee list.</small>
                                        </div>
                                    <?php endif ?>
                                </div>

                                

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="date_scheduled">Committed Schedule</label>
                                        <input type="date" name="date_scheduled" id="date_scheduled" class="form-control" placeholder="" aria-describedby="date_scheduled_help" value="<?php echo $joborder_data_edit_result['joborder_commitedschedule_edit'] ?>">
                                        <small id="date_scheduled_help" class="text-muted">To be filled-up by ADMIN. Leave blank if requesting.</small>
                                    </div>

                                    <div class="form-group">
                                        <label>Under Warranty?</label>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="under_warranty" value="Yes" <?php if($joborder_data_edit_result['joborder_warranty_edit'] == "Yes") { echo 'checked="checked"';} ?> >
                                                Yes
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="under_warranty" value="No" <?php if($joborder_data_edit_result['joborder_warranty_edit'] == "No") { echo 'checked="checked"';} ?>>
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
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-sm-6 offset-sm-3">
                                        <button type="submit" class="btn btn-success btn-block text-bold"><i class="fas fa-check-circle"></i> SUBMIT</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php echo form_close() ?>
                <?php endif ?>
                </div>
            </div>
        </div>
    </section>
</div>



<!-- Modal -->
<div class="modal fade" id="success_joborder" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-body text-center">
                <p><b class="text-success" style="font-size: 28px">SUCCESS!!!</b></p>

                <p><b>Your JOB ORDER was successfully submitted</b></p>

                <p><u><a href="<?php echo site_url('joborder-list/pending') ?>">You can view it now here.</a></u></p>
            </div>

            <div class="modal-footer float-center">
                <button type="button" class="btn btn-success text-bold" data-dismiss="modal"><i class="fas fa-check"></i> OKAY</button>
            </div>

        </div>
    </div>
</div>

