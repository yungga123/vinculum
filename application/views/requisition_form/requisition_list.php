<?php 
defined('BASEPATH') or die('Access Denied');

$page_title = '';

if ($this->uri->segment(1) == 'requisition-pending') {
    $page_title = 'Pending Requisitions';
} elseif ($this->uri->segment(1) == 'requisition-accepted') {
    $page_title = 'Accepted Requisitions';
} elseif ($this->uri->segment(1) == 'requisition-filed') {
    $page_title = 'Filed Requisitions';
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
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-hover" id="table_pending_request" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Req No.</th>
                                        <th>Operation</th>
                                        <th>Date Added</th>
                                        <th>Requested By</th>
                                        <th>Processed By</th>
                                        <th>Approved By</th>
                                        <th>Received By</th>
                                        <th>Checked By</th>
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
<div class="modal fade <?php echo ($this->uri->segment(1) != 'requisition-accepted') ? 'req-accept' : 'req-filed' ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <b class="modal-title"><?php echo ($this->uri->segment(1) == 'requisition-accepted') ? 'File Request' : 'Accept Request'  ?></b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <?php echo ($this->uri->segment(1) == 'requisition-pending') ? form_open('RequisitionFormController/accept_requisition',["id" => "form-accept-req"]) : form_open('RequisitionFormController/file_requisition',["id" => "form-file-req"]) ?>
            <div class="modal-body text-center">
                <div class="form-group">
                  <label for="req_form_id">Req. No.</label>
                  <input type="text" name="req_form_id" id="req_form_id" class="form-control col-6 offset-3 text-bold text-center" readonly>
                </div>
            </div>

            <?php if ($this->uri->segment(1) == 'requisition-accepted') { ?>
                <input type="hidden" id="file_processed_by" name="file_processed_by" value="">
                <input type="hidden" id="file_approved_by" name="file_approved_by" value="">
                <input type="hidden" id="file_received_by" name="file_received_by" value="">
                <input type="hidden" id="file_checked_by" name="file_checked_by" value="">

            <?php } ?>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> CLOSE</button>
                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> ACCEPT</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="delete-requisition" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Delete Requisition</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <?php echo form_open('RequisitionFormController/delete_requisition',["id" => "form-delete-request"]) ?>
            <div class="modal-body text-center">
                <div class="form-group">
                  <label for="req_form_id_del">Are you sure you want to delete?</label>
                  <input type="text" class="form-control col-6 offset-3 text-center text-bold" name="req_form_id_del" id="req_form_id_del" readonly>
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


<!-- Modal -->
<div class="modal fade modal-reqitems">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div id="modal_loading">

            </div>
            <div class="modal-header">
                <h5 class="modal-title"><b>LIST OF ITEMS</b><h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="table-reqitems">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Description</th>
                                <th>Unit Cost</th>
                                <th>Qty</th>
                                <th>Supplier</th>
                                <th>Date Needed</th>
                                <th>Purpose</th>
                            </tr>
                        </thead>

                        <tbody id="tbody-reqitems">

                        </tbody>
                    </table>
                </div>


                <div class="text-right">
                    <b>Total Price: <span id="req_total_price" class="text-danger"></span></b>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success text-bold" data-dismiss="modal"><i class="fas fa-check"></i> OKAY</button>
            </div>
        </div>
    </div>
</div>