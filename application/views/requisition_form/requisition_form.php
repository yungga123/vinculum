<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Item Requisition</h1>
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
                        
                        <?php echo form_open('RequisitionFormController/add_item_requisition_validate', ["id" => "form-additem-request"]) ?>
                        <div class="card-body">

                            <!-- Requestor and Approval -->
                            <div class="card">
                                <div class="card-header">
                                    <b>Requestor and Approval</b>
                                </div>

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label for="requested_by"> Requested By</label>
                                                <select type="text" name="requested_by" id="requested_by" class="form-control select2">
                                                    <option value="">---Please Select---</option>

                                                    <?php foreach ($employees as $row) { ?>
                                                        <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="processed_by">Processed By</label>
                                                <select type="text" name="processed_by" id="processed_by" class="form-control select2">
                                                    <option value="">---Please Select---</option>

                                                    <?php foreach ($employees as $row) { ?>
                                                        <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
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
                                                        <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="received_by">Received By</label>
                                                <select type="text" name="received_by" id="received_by" class="form-control select2">
                                                    <option value="">---Please Select---</option>

                                                    <?php foreach ($employees as $row) { ?>
                                                        <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="checked_by">Checked By</label>
                                                <select type="text" name="checked_by" id="checked_by" class="form-control select2">
                                                    <option value="">---Please Select---</option>

                                                    <?php foreach ($employees as $row) { ?>
                                                        <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Items for request -->
                            <div class="card">
                                <div class="card-header">
                                    <b>Items for Request</b>
                                </div>

                                <div class="card-body">
                                    <div class="row add-item">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <input type="text" name="description[]" id="description" class="form-control" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label for="unit_cost">Cost</label>
                                                <input type="text" name="unit_cost[]" id="unit_cost" class="form-control" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <label for="qty">Qty</label>
                                                <input type="text" name="qty[]" id="qty" class="form-control" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="supplier">Supplier</label>
                                                <input type="text" name="supplier[]" id="supplier" class="form-control" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="date_needed">Date Needed</label>
                                                <input type="date" name="date_needed[]" id="date_needed" class="form-control" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="purpose">Purpose/s</label>
                                                <input type="text" name="purpose[]" id="purpose" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="float-right">

                                        <button type="button" class="btn btn-danger btn-sm text-bold delete-item-btn"><i class="fas fa-times" aria-hidden="true"></i> DELETE FIELD</button>

                                        <button type="button" class="btn btn-success btn-sm text-bold add-item-btn"><i class="fas fa-plus" aria-hidden="true"></i> ADD FIELD</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="float-right">
                                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> SUBMIT</button>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
