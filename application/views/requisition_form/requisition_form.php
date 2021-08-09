<?php
defined('BASEPATH') or die('Access Denied');


if ($this->uri->segment(1) == 'requisition-update') {
    $req_data = array();

    foreach ($req_info as $row) {
        $req_data = [
            'processed_by' => $row->processed_by,
            'approved_by' => $row->approved_by,
            'requested_by' => $row->requested_by,
            'received_by' => $row->received_by,
            'checked_by' => $row->checked_by
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
                    <h1 class="m-0 text-dark"><?php echo ($this->uri->segment(1) == 'requisition-update') ? 'Update Requisition' : 'Item Requisition' ?></h1>
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
                        <?php echo ($this->uri->segment(1) == 'requisition-update') ? form_open('RequisitionFormController/update_item_requisition_validate', ["id" => "form-updateitem-request"]) : form_open('RequisitionFormController/add_item_requisition_validate', ["id" => "form-additem-request"]) ?>
                        <div class="card-body">

                            <!-- Requestor and Approval -->
                            <div class="card">
                                <?php if ($this->uri->segment(1) == 'requisition-update') : ?>
                                    <div class="card-header">
                                        <b>Requestor and Approval</b>
                                    </div>
                                <?php else : ?>
                                    <div class="card-header">
                                        <b>Requestor</b>
                                    </div>
                                <?php endif ?>
                                <div class="card-body">
                                    <?php if ($this->uri->segment(1) == 'requisition-update') : ?>
                                        <div class="row">

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="requested_by"> Requested By</label>
                                                    <select type="text" name="requested_by" id="requested_by" class="form-control">
                                                        <option value="">---Please Select---</option>

                                                        <?php foreach ($employees as $row) { ?>
                                                            <option value="<?php echo $row->id ?>" <?php if ($this->uri->segment(1) == 'requisition-update') {
                                                                                                        echo ($req_data['requested_by'] == $row->id) ? ' selected' : ' hidden';
                                                                                                    } ?>><?php echo $row->name ?></option>
                                                         <?php } ?>

                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label for="processed_by">Processed By</label>
                                                    <select type="text" name="processed_by" id="processed_by" class="form-control select2">
                                                        <option value="">---Please Select---</option>

                                                        <?php foreach ($employees as $row) { ?>
                                                            <?php if ($row->id == '16071818' || $row->id == 'PS021021' || $row->id == 'PS111620') { ?>
                                                                <option value="<?php echo $row->id ?>" <?php if ($this->uri->segment(1) == 'requisition-update') {
                                                                                                            echo ($req_data['processed_by'] == $row->id) ? ' selected' : '';
                                                                                                        } ?>><?php echo $row->name ?></option>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="approved_by">Approved By</label>
                                                    <select type="text" name="approved_by" id="approved_by" class="form-control select2">
                                                        <option value="">---Please Select---</option>

                                                        <?php foreach ($employees as $row) { ?>
                                                            <?php if ($row->id == '01021415' || $row->id == '02021415' || $row->id == '16071818' || $row->id == 'RNDE09232020') { ?>
                                                                <option value="<?php echo $row->id ?>" <?php if ($this->uri->segment(1) == 'requisition-update') {
                                                                                                            echo ($req_data['approved_by'] == $row->id) ? ' selected' : '';
                                                                                                        } ?>><?php echo $row->name ?></option>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="received_by">Received By</label>
                                                    <select type="text" name="received_by" id="received_by" class="form-control select2">
                                                        <option value="">---Please Select---</option>

                                                        <?php foreach ($employees as $row) { ?>

                                                            <option value="<?php echo $row->id ?>" <?php if ($this->uri->segment(1) == 'requisition-update') {
                                                                                                        echo ($req_data['received_by'] == $row->id) ? ' selected' : '';
                                                                                                    } ?>><?php echo $row->name ?>
                                                            </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="checked_by">Checked By</label>
                                                    <select type="text" name="checked_by" id="checked_by" class="form-control select2">
                                                        <option value="">---Please Select---</option>


                                                        <?php foreach ($employees as $row) { ?>
                                                            <?php if ($row->id == 'IC12042020' || $row->id == '15070218' || $row->id == 'AITS0620202001' || $row->id == 'TSE020921' || $row->id == 'TSE021521') { ?>
                                                                <option value="<?php echo $row->id ?>" <?php if ($this->uri->segment(1) == 'requisition-update') {
                                                                                                            echo ($req_data['checked_by'] == $row->id) ? ' selected' : '';
                                                                                                        } ?>><?php echo $row->name ?>
                                                                </option>
                                                            <?php } ?>
                                                        <?php } ?>

                                                        <?php foreach ($employees as $row) { ?>
                                                            <?php if ($row->id == 'IC12042020' || $row->id == '15070218' || $row->id == 'AITS0620202001' || $row->id == 'TSE020921' || $row->id == 'TSE021521') { ?>
                                                                <option value="<?php echo $row->id ?>" <?php if ($this->uri->segment(1) == 'requisition-update') {
                                                                                                            echo ($req_data['checked_by'] == $row->id) ? ' selected' : '';
                                                                                                        } ?>><?php echo $row->name ?>
                                                                </option>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="requested_by"> Requested By</label>
                                                    <select type="text" name="requested_by" id="requested_by" class="form-control select2">
                                                        <option value="">---Please Select---</option>

                                                        <?php foreach ($employees as $row) { ?>
                                                                <option value="<?php echo $row->id ?>"<?php if ($this->uri->segment(1)=='requisition-update') {
                                                                    echo ($req_data['requested_by'] == $row->id) ? ' selected' : '';
                                                                } else {
                                                                    echo ($this->session->userdata('logged_in')['emp_id'] == $row->id) ? '' : ' hidden';
                                                                } ?>><?php echo $row->name ?></option>
                                                        <?php } ?>
                                      <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <input type="hidden" name="received_by" id="received_by" value="">
                                            <input type="hidden" name="checked_by" id="checked_by" value="">
                                            <input type="hidden" name="approved_by" id="received_by" value="">
                                            <input type="hidden" name="processed_by" id="processed_by" value="">
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>

                        <!-- Items for request -->
                        <div class="card">
                            <div class="card-header">
                                <b>Items for Request</b>
                            </div>

                            <div class="card-body">

                                <?php if ($this->uri->segment(1) == 'requisition-update') { ?>
                                    <input name="req_id" type="hidden" value="<?php echo $this->uri->segment(2) ?>">
                                    <?php foreach ($req_items as $row) { ?>
                                        <div class="row add-item">
                                            <input name="item_id[]" type="hidden" value="<?php echo $row->item_id ?>">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <input type="text" name="description[]" class="form-control form-control-sm" placeholder="" value="<?php echo $row->description ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label for="qty">Qty</label>
                                                    <input type="text" name="qty[]" class="form-control form-control-sm" placeholder="" value="<?php echo $row->qty ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label for="unit">Unit</label>
                                                    <input type="text" name="unit[]" class="form-control form-control-sm" placeholder="" value="<?php echo $row->unit ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-1">
                                                <div class="form-group">
                                                    <label for="unit_cost">Cost</label>
                                                    <input type="text" name="unit_cost[]" class="form-control form-control-sm" placeholder="" value="<?php echo $row->unit_cost ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="supplier">Supplier</label>
                                                    <select type="text" name="supplier[]" class="form-control form-control-sm">
                                                        <option value="">---Please Select---</option>

                                                        <?php foreach ($vendor as $vendor_row) : ?>
                                                            <option value="<?php echo $vendor_row->id ?>" <?php if ($this->uri->segment(1) == 'requisition-update') {
                                                                                                                echo ($row->supplier == $vendor_row->id) ? ' selected' : '';
                                                                                                            } else {
                                                                                                                echo $row->supplier;
                                                                                                            }
                                                                                                            ?>>
                                                                <?php echo $vendor_row->name ?>
                                                            </option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="date_needed">Date Needed</label>
                                                    <input type="date" name="date_needed[]" class="form-control form-control-sm" placeholder="" value="<?php echo $row->date_needed ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="purpose">Purpose/s</label>
                                                    <input type="text" name="purpose[]" class="form-control form-control-sm" placeholder="" value="<?php echo $row->purpose ?>">
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <div class="row add-item">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <input type="text" name="description[]" class="form-control form-control-sm" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label for="unit_cost">Cost</label>
                                                <input type="text" name="unit_cost[]" class="form-control form-control-sm" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label for="qty">Qty</label>
                                                <input type="text" name="qty[]" class="form-control form-control-sm" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label for="unit">Unit</label>
                                                <input type="text" name="unit[]" class="form-control form-control-sm" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="supplier">Supplier</label>
                                                <select type="text" name="supplier[]" class="form-control form-control-sm select2">
                                                    <option value="">---Please Select---</option>
                                                    <?php foreach ($vendor as $row) : ?>
                                                        <option value="<?php echo $row->id ?>">
                                                            <?php echo $row->name ?>
                                                        </option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="date_needed">Date Needed</label>
                                                <input type="date" name="date_needed[]" class="form-control form-control-sm" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="purpose">Purpose/s</label>
                                                <input type="text" name="purpose[]" class="form-control form-control-sm" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>

                            <div class="card-footer">
                                <div class="float-right">

                                    <button type="button" class="btn btn-danger btn-sm text-bold delete-item-btn"><i class="fas fa-times" aria-hidden="true"></i> DELETE FIELD</button>

                                    <button type="button" class="btn btn-success btn-sm text-bold add-item-btn"><i class="fas fa-plus" aria-hidden="true"></i> ADD FIELD</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <?php if ($this->uri->segment(1) == 'requisition-update') : ?>
                                    <button type="button" class="btn btn-success text-bold btn_req_accept" disabled data-toggle="modal" data-target=".req-accept"><i class="fas fa-check"></i> ACCEPT</button>
                                <?php endif ?>
                                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-file"></i> SUBMIT</button>
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


<!-- Modal -->
<div class="modal fade req-accept" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <b class="modal-title">Accept Request</b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('RequisitionFormController/accept_requisition', ["id" => "form-accept-req"]) ?>
            <div class="modal-body text-center">
                <div class="form-group">
                    <label for="req_form_id">Req. No.</label>
                    <input type="text" name="req_form_id" value="<?php echo $this->uri->segment(2) ?>" class="form-control col-6 offset-3 text-bold text-center" readonly>
                </div>

                <div class="form-group">
                    <label>Please Enter Passcode:</label>
                    <input type="password" name="passcode" class="form-control">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> CLOSE</button>
                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> ACCEPT</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>