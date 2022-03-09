<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Generated P.O</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            <h4>PO SELECTION:</h4>
                        </div>
                        <div class="card-body">
                        <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target=".btn-accepted"> <i class="fas fa-file"></i> Generate P.O.</a>
                        <?php if($this->uri->segment(2) == "filed"): ?>
                            <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target=".btn-report"> <i class="fas fa-file-excel"></i> Generate Report</a>
                        <?php endif ?>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="card">
                        <div class="card-header">
                            <h4>PO Status:</h4>
                        </div>
                        <div class="card-body">
                            <a href="<?php echo site_url('generated-po-list') ?>/pending" class="btn btn-warning text-bold btn-xl btn-block <?php if ($this->uri->segment(2) == 'pending') {echo 'disabled';} ?>"><i class="fas fa-pause"></i> Pending PO List</a>
                            <a href="<?php echo site_url('generated-po-list') ?>/approved" class="btn btn-success text-bold btn-xl btn-block <?php if ($this->uri->segment(2) == 'approved') {echo 'disabled';} ?>"><i class="fas fa-check"></i> Approved PO List</a>
                            <a href="<?php echo site_url('generated-po-list') ?>/filed" class="btn btn-danger text-bold btn-xl btn-block <?php if ($this->uri->segment(2) == 'filed') {echo 'disabled';} ?>"><i class="fas fa-file"></i> Filed PO List</a>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-header">
                            <?php if ($this->uri->segment(2) == 'pending') {
                                echo 'Pending';
                            } else {
                                echo 'Approved';
                            } ?> P.O. List
                            <!--
<a href="<?php echo site_url('vendor-add') ?>" class="btn btn-success float-right"> <i class="fas fa-plus"></i> ADD VENDOR</a>
-->
                        </div>
                        <div class="card-body">
                            <div class="col-sm-12">
                                <table id="PO_list" class="table table-bordered table-hover" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>PO ID</th>
                                            <th>Supplier Name</th>
                                            <th>Date Created</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal for Generate P.O. -->
<div class="modal fade btn-accepted" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <b class="modal-title">Requisition List</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('POController/generate_po', ["id" => "form-accept-generatepo-req"]) ?>
            <div class="modal-body text-center">
                <table class="table table-bordered table-xl" id="table-reqitems">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Requisition ID</th>
                            <th>Dated Added</th>
                            <th>Requested By</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($requisition_list as $row) : ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input" name="reqid[]" value="<?php echo $row->id ?>">
                                </td>
                                <td>
                                    <?php echo $row->id ?>
                                </td>
                                <td>
                                    <?php echo ($row->date != '0000-00-00 00:00:00') ? date_format(date_create($row->date), 'M d, Y h:ia') : 'None'; ?>
                                </td>
                                <td>
                                    <?php echo $row->lastname . ", " . $row->firstname . " " . $row->middlename ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> CLOSE</button>
                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-edit"></i> CREATE</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- Modal for View-->
<div class="modal fade modal_view_items">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div id="modal_loading">

            </div>
            <div class="modal-header">
                <h5 class="modal-title"><b>Items List</b>
                    <h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-m" id="table-items">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Description</th>
                                <th>Qty</th>
                                <th>Unit</th>
                                <th>Cost</th>
                                <th>Total Cost</th>
                                <th>Date Needed</th>
                                <th>Purpose</th>
                            </tr>
                        </thead>

                        <tbody id="tbody-items">


                        </tbody>
                    </table>

                    <div class="text-right">
                        <b>Total Price: <span id="req_total_price" class="text-danger"></span></b>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success text-bold" data-dismiss="modal"><i class="fas fa-check"></i> OKAY</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Delete-->
<div class="modal fade" id="delete-po" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Delete PO</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('POController/delete_po', ["id" => "modal-po-vendor"]) ?>
            <div class="modal-body text-center">
                <div class="form-group">
                    <label for="po_id_del">Are you sure you want to delete?</label>
                    <input type="text" class="form-control col-6 offset-3 text-center text-bold" name="po_id_del" id="po_id_del" readonly>
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

<!-- Modal for Approved PO-->
<div class="modal fade" id="approved-po" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <b class="modal-title">Approved PO</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('POController/approved_po', ["id" => "form-approved-po"]) ?>
            <div class="modal-body text-center">
                <div class="form-group">
                    <label for="po_id">Are you sure you want to approved this PO ?</label>
                    <br><br>
                    <label for="po_id">PO ID</label>
                    <input type="text" name="po_id" id="po_id" class="form-control col-6 offset-3 text-bold text-center" readonly>
                </div>
                <div class="form-group">
                    <label>Please Enter Passcode:</label>
                    <input type="password" name="approved_po_passcode" class="form-control">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> CLOSE</button>
                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> APPROVED</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- Modal for File PO-->
<div class="modal fade" id="file-po" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <b class="modal-title">File PO</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('POController/file_po', ["id" => "form-file-po"]) ?>
            <div class="modal-body text-center">
                <div class="form-group">
                    <label for="po_id_filing">Are you sure you want to file this PO ?</label>
                    <br><br>
                    <label for="po_id_filing">PO ID</label>
                    <input type="text" name="po_id_filing" id="po_id_filing" class="form-control col-6 offset-3 text-bold text-center" readonly>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> CLOSE</button>
                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> File</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- Modal for Generate Report -->
<div class="modal fade btn-report" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <b class="modal-title">Selection:</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('export_po_report') ?>
            <!-- <form id="form_validate"> -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Supplier:</label>
                                <select type="text" name="supplier_id" class="form-control form-control-sm">
                                    <option value="">---Please Select---</option>

                                    <?php foreach ($vendor as $vendor_row) : ?>
                                        <option value="<?php echo $vendor_row->id ?>">
                                            <?php echo $vendor_row->name ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Start Date:</label>
                                <input type="date" name="start_date" id="start_date" class="form-control form-control-sm" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>End Date:</label>
                            <input type="date" name="end_date" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> CLOSE</button> -->
                    <button type="submit" class="btn btn-success text-bold"><i class="fas fa-plus"></i> GENERATE</button>
                </div>
            <!-- </form> -->
            <?php echo form_close() ?>
        </div>
    </div>
</div>