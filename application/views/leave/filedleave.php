<?php
defined('BASEPATH') or die('Access Denied');

if ($this->uri->segment(2) == 'pending') {
    $page_title = 'Pending Filed Leave List';
    $pending_button = 'disabled';
    $approved_button = '';
    $discarded_button = '';
} elseif($this->uri->segment(2) == 'approved') {
    $page_title = 'Approved Filed Leave List';
    $pending_button = '';
    $approved_button = 'disabled';
    $discarded_button = '';
} elseif($this->uri->segment(2) == 'discarded'){
    $page_title = 'Discarded Filed Leave List';
    $pending_button = '';
    $approved_button = '';
    $discarded_button = 'disabled';
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Filed Leaves</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-header text-bold">
                            Status
                        </div>
                        <div class="card-body">
                            <a href="<?php echo site_url('filed-leaves/pending') ?>" class="btn btn-warning btn-lg btn-block text-bold <?php echo $pending_button ?>">PENDING LEAVES</a>
                            <a href="<?php echo site_url('filed-leaves/approved') ?>" class="btn btn-success btn-lg btn-block text-bold <?php echo $approved_button ?>">APPROVED LEAVES</a>
                            <a href="<?php echo site_url('filed-leaves/discarded') ?>" class="btn btn-danger btn-lg btn-block text-bold <?php echo $discarded_button ?>">DISCARDED LEAVES</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 text-bold">                    <div class="card">
                        <div class="card-header">
                            <?php echo $page_title ?>
                        </div>
                        <div class="card-body">
                            <table id="filedleave_table" class="table table-bordered table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Leave ID</th>
                                        <th>Name of Employee</th>
                                        <th>Type of Leave</th>
                                        <th>Department</th>
                                        <th>Date of Application</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Reason of Leave</th>
                                        <th>Processed By</th>
                                        <th>Approved By</th>
                                        <?php if($this->uri->segment(2) == 'approved') :?>
                                            <th>Notes</th>
                                        <?php endif ?>
                                        <?php if($this->uri->segment(2) != 'discarded') :?>
                                            <th>Operations</th>
                                        <?php endif ?>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>


<!-- Modal -->
<div class="modal fade leave-approved" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-sm-6">
                <b class="modal-title">Approved Filed Leave</b>
                </div>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('LeaveController/approve_leave', ["id" => "modal-approve-leave"]) ?>
            <input type="hidden" name="processed_by" id="processed_by">
            <div class="modal-body text-center">
                
                <label>Employee Details: </label>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="approve_leave_id">Employee Name</label>
                        <input type="text" name="approve_leave_employee_name" id="approve_leave_employee_name" class="form-control text-bold text-center" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="approve_leave_id">Designation</label>
                        <input type="text" name="approve_employee_designation" id="approve_employee_designation" class="form-control text-bold text-center" readonly>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <label>Remaining Sick Leave: <label id="approved_sl_credit"></label>
                    </div>
                    <div class="col-sm-6">
                        <label>Remaining Vacation Leave: <label id="approved_vl_credit"></label></label>
                    </div>
                </div>
                <hr><br><br>
                <div class="row">
                    <div class="col-sm-12">
                        <label>Filed Leave details: </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="approve_leave_id">Leave Form ID</label>
                        <input type="text" name="approve_leave_id" id="approve_leave_id" class="form-control text-bold text-center" readonly>
                    </div>
                    <div class="col-sm-6">
                    <label for="approve_leave_id">Type of Leave</label>
                        <input type="text" name="approved_type_of_leave" id="approved_type_of_leave" class="form-control text-bold text-center" readonly>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="task_date">Start Date</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="start_date" id="start_date" placeholder="Select Date">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="task_date">End Date</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="end_date" id="end_date" placeholder="Select Date">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Notes</label>
                    <textarea type="text" name="approve_notes" class="form-control" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label>Please Enter Passcode:</label>
                    <input type="password" name="passcode" class="form-control">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> CANCEL</button>
                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> ACCEPT</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade leave-edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <b class="modal-title">Edit Filed Leave</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('LeaveController/edit_leave', ["id" => "modal-edit-leave"]) ?>
            <div class="modal-body text-center">
                <div class="form-group">
                    <label for="approve_leave_id">Leave Form ID</label>
                    <input type="text" name="edit_leave_id" id="edit_leave_id" class="form-control col-6 offset-3 text-bold text-center" readonly>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="employee">Employee Name</label>
                            <input type="text" name="edit_employee_name" id="edit_employee_name" class="form-control text-center" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="employee">Type of Leave</label>
                            <select class="form-control" name="edit_type_of_leave" id="edit_type_of_leave">
                                <option value="Vacation Leave">Vacation Leave</option>
                                <option value="Sick Leave">Sick Leave</option>
                                <option value="Leave of Absence">Leave of Absence</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="department">Department</label>
                            <input type="text" name="edit_department" id="edit_department" class="form-control text-center" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="task_date">Start Date</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="edit_start_date" id="edit_start_date" placeholder="Select Date">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="task_date">End Date</label>
                            <div class="input-group">
                                <input class="form-control" type="date" name="edit_end_date" id="edit_end_date" placeholder="Select Date">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Reason of Leave</label>
                    <textarea type="text" name="edit_reason" id="edit_reason" class="form-control" rows="3" readonly></textarea>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="edit_processed_by">Processed By</label>
                            <select class="form-control" name="edit_processed_by" id="edit_processed_by">
                                <option value="">--- PLEASE SELECT ---</option>
                                <option value="Jenina F. Gaceta">Jenina F. Gaceta</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="edit_approved_by">Approved By</label>
                            <select class="form-control" name="edit_approved_by" id="edit_approved_by">
                                <option value="">--- PLEASE SELECT ---</option>
                                <option value="Marvin G. Lucas">Marvin G. Lucas</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> CANCEL</button>
                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> ACCEPT</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade leave-delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Delete Filed Leave</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('LeaveController/delete_leave', ["id" => "modal-delete-leave"]) ?>
            <div class="modal-body text-center">
                <div class="form-group">
                    <label for="delete_leave_id">Are you sure you want to delete?</label>
                    <input type="text" class="form-control col-6 offset-3 text-center text-bold" name="delete_leave_id" id="delete_leave_id" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> NO</button>
                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> YES</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>