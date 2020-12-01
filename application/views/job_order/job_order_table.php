<?php
defined('BASEPATH') or die('Access Denied');


if ($decision == 'accepted') {
    $page_title = 'Accepted Job Orders';
} elseif($decision == 'filed') {
    $page_title = 'Filed Job Orders';
} else {
    $page_title = 'Pending Job Orders';
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo $page_title ?></h1>
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
                            Menu Selection
                        </div>
                        <div class="card-body">
                            <a href="<?php echo site_url('joborder') ?>" class="btn btn-success btn-block text-bold"><i class="fas fa-file-medical"></i> ADD JOB ORDER</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body text-bold">
                            <a href="<?php echo site_url('joborder-list/pending') ?>" class="btn btn-warning btn-block text-bold<?php if ($decision == 'pending') { echo ' disabled'; } ?>"><i class="fas fa-pause-circle"></i> PENDING JOB ORDERS</a>

                            <a href="<?php echo site_url('joborder-list/accepted') ?>" class="btn btn-success btn-block text-bold<?php if ($decision == 'accepted') { echo ' disabled'; } ?>"><i class="fas fa-check-circle"></i> ACCEPTED JOB ORDERS</a>

                            <a href="<?php echo site_url('joborder-list/filed') ?>" class="btn btn-danger btn-block text-bold<?php if ($decision == 'filed') { echo ' disabled'; } ?>"><i class="fas fa-file-archive"></i> FILED JOB ORDERS</a>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <b><i class="fas fa-file"></i> Note</b>
                        </div>
                        <div class="card-body">
                            <p>Click the "+" (if present) to show more details.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-header">

                            <b><?php echo $page_title ?></b>

                        </div>
                        
                        <div class="card-body">
                            
                            <table id="joborder_table" class="table table-bordered table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th><?php if ($decision == 'filed') {
                                            echo 'Date Filed';
                                        } else {
                                            echo 'Decision';
                                        } ?></th>
                                        <th>Committed Schedule</th>
                                        <th>Customer Name</th>
                                        <th>Scope</th>
                                        <th>Date Requested</th>
                                        <th>Type of Project</th>
                                        <th>Comments</th>
                                        <th>Date Reported</th>
                                        <th>Requested by</th>
                                        <th>Warranty</th>
                                        <th>Remarks</th>            
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="card-footer">

                            
                            <?php if ($this->uri->segment(2) == 'pending') { ?>
                                <div class="float-right">
                                    <a class="btn btn-success text-bold" href="<?php echo site_url('export-jo/pending') ?>" target="_blank"><i class="fas fa-file-excel"></i> EXPORT</a>
                                    <a class="btn btn-success text-bold" href="<?php echo site_url('print-joborder/pending') ?>" target="_blank"><i class="fas fa-print"></i> PRINT</a>
                                    
                                </div>
                                
                            <?php } ?>

                            <?php if ($this->uri->segment(2) == 'filed') { ?>

                                <a class="btn btn-success text-bold" href="<?php echo site_url('export-jo/filed') ?>" target="_blank"><i class="fas fa-file-excel"></i> EXPORT</a>

                                <a class="btn btn-success text-bold" href="<?php echo site_url('print-joborder/filed') ?>" target="_blank"><i class="fas fa-print"></i> PRINT</a>
                                
                            <?php } ?>

                            <?php if ($this->uri->segment(2) == 'accepted') { ?>

                                <a class="btn btn-success text-bold" href="<?php echo site_url('export-jo/accepted') ?>" target="_blank"><i class="fas fa-file-excel"></i> EXPORT</a>
                                
                                <a class="btn btn-success text-bold" href="<?php echo site_url('print-joborder/accepted') ?>" target="_blank"><i class="fas fa-print"></i> PRINT</a>
                                
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Accept/Discard JO -->
<div class="modal fade modal-decision" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">

            <div class="modal-body text-center">

                <h2><span class="badge badge-pill" id="status"></span></h2>
                <?php echo form_open('JobOrderController/update_job_order_decision',["id" => "form_updatedecision"]) ?>
                <div class="form-group">
                    <label for="job_order_id">Job Order No.</label>
                    <input type="text" name="job_order_id" id="job_order_id" class="form-control text-bold text-center col-sm-6 offset-sm-3" readonly value="">
                </div>
                
                <input type="hidden" name="decision" id="decision" class="form-control" value="">

                <div class="form-group form-commdate">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> CANCEL</button>
                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> PROCEED</button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade modal-filejo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <?php echo form_open('JobOrderController/update_job_order_filejo',["id" => "form_filejo"]) ?>
                <div class="form-group">
                    <label for="job_filejo_id">Job Order No.</label>
                    <input type="text" name="job_filejo_id" id="job_filejo_id" class="form-control text-bold text-center col-sm-6 offset-sm-3" readonly value="">
                </div>

                <div class="form-group">
                    <label for="remarks">Remarks</label>
                    <textarea type="text" name="remarks" id="remarks" class="form-control text-bold text-center" cols="3"></textarea>
                </div>

                <input type="hidden" name="decision_filejo" id="decision_filejo">

                <p class="text-bold mt-4" style="font-size: 18px;">Are you sure to file this Job Order?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> NO</button>
                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> YES</button>
            </div>
        </div>
    </div>
</div>