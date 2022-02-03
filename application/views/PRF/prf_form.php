<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Project Request Form</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <?php if ($status == "Add") : ?>
                <?php echo form_open('PRFController/add_prf_validate', ["id" => "form-addprf-validate"]) ?>
            <?php else : ?>
                <?php echo form_open('PRFController/edit_prf_validate', ["id" => "form-editprf-validate"]) ?>
            <?php endif ?>

            <input type="hidden" name="prf_id_hidden" value="<?php echo $prf_id; ?>">

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4>Project Details:</h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-success float-right"><i class="fas fa-check-circle"></i><?php echo $button_title; ?></button>
                                        <!-- <a href="#" class="btn btn-success btn-md float-right" data-toggle="modal" data-target="#"> <i class="fas fa-plus"></i> Add Project </a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="project_name">Project Name</label>
                                            <select type="text" name="project_name" id="project_name" class="form-control select-customer select2">
                                                <option value="">---Please Select---</option>
                                                <?php foreach ($client_list as $row) : ?>
                                                    <option value="<?php echo $row->CustomerID . '/select-branch' . '/' . $prf_id; ?>"
                                                        <?php if ($client_id == $row->CustomerID) { echo 'selected';} ?>>
                                                        <?php echo $row->CustomerID . " --- " . $row->CompanyName ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                            <input type="hidden" name="project_name_hidden" value="<?php echo $client_id; ?>">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="sales_incharge">Sales Incharge</label>
                                            <select type="text" name="sales_incharge" id="sales_incharge" class="form-control select2">
                                                <option value="">---Please Select---</option>
                                                <?php foreach ($sales_list as $row) : ?>
                                                    <?php if($row->id == "01021415" || $row->id =="SSC091321" || $row->id =="24120518"):?>
                                                        <option value="<?php echo $row->id; ?>"
                                                            <?php if ($sales_id == $row->id) { echo 'selected';} ?>>
                                                                <?php echo $row->lastname.', '.$row->firstname.' '.$row->middlename?>     
                                                        </option>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </select>
                                            <input type="hidden" name="project_name_hidden" value="<?php echo $client_id; ?>">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="project_branch">Branch</label>
                                            <select type="text" name="project_branch" id="project_branch" class="form-control select-branch select2">
                                                <option value="">---Please Select---</option>
                                                <?php foreach ($branch_list as $row) : ?>
                                                    <option value="<?php echo $client_id . '/' ?><?php echo $row->branch_id . '/' . $prf_id; ?>"
                                                        <?php if ($branch_id == $row->branch_id) {echo 'selected';} ?>>
                                                        <?php echo $row->branch_name ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                            <input type="hidden" name="project_branch_hidden" value="<?php echo $branch_id; ?>">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="requested_by">Requested By:</label>
                                            <select type="text" name="requested_by" id="requested_by" class="form-control">
                                                <?php foreach($requestor_list as $row):?>
                                                    <option value="<?php echo $row->id; ?>"<?php if($requestor_id == $row->id){echo 'selected'; }?>>
                                                        <?php echo $row->id.' ---- '.$row->lastname.', '. $row->firstname;?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="project_activity">Project Activity</label>
                                            <select type="text" name="project_activity" id="project_activity" class="form-control select2">
                                                <option value="">---Please Select---</option>
                                                <?php foreach ($project_list as $row) : ?>
                                                    <option value="<?php echo $row->project_id; ?>"
                                                        <?php if ($project_id == $row->project_id) {echo 'selected';} ?>>
                                                        <?php echo $row->project_type ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <?php if($status=="Edit"): ?>
                                            <div class="col-sm-6">
                                                <label for="person_in_charge">Person In Charge</label>
                                                <select type="text" name="person_in_charge" id="person_in_charge" class="form-control select2">
                                                    <option value="">---Please Select---</option>
                                                        <?php foreach ($pic_list as $row) : ?>
                                                            <?php if($row->id =="FITS202020601" || $row->id =="FITS6202020" || $row->id == "20100418" || $row->id =="TSE021521" || $row->id =="TSE020921"): ?>
                                                                <option value="<?php echo $row->id; ?>"
                                                                <?php if ($pic_id == $row->id) {echo 'selected';} ?>>
                                                                <?php echo $row->lastname.', '.$row->firstname.' '.$row->middlename ?>
                                                            <?php endif ?>
                                                        <?php endforeach ?>
                                                    </option>
                                                </select>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <?php if($status =="Edit"): ?>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label for="date_issued">Date Issued:</label>
                                                <input type="date" name="date_issued" class="form-control" value="<?php echo $date_issued; ?>" >
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="prepared_by">Prepared By:</label>
                                                <select type="text" name="prepared_by" id="prepared_by" class="form-control  select2">
                                                    <option value="">---Please Select---</option>
                                                    <?php foreach ($inventory_personnel_list as $row) : ?>
                                                        <?php if($row->id =="AS071421" || $row->id =="IC080221"): ?>
                                                            <option value="<?php echo $row->id; ?>"
                                                                <?php if ($inventory_id == $row->id) {echo 'selected';} ?>>
                                                                <?php echo $row->lastname.', '.$row->firstname.' '.$row->middlename ?>
                                                            </option>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <h4>Items Details:</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Direct</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="<?php if($status =="Edit"){echo 'col-sm-8';}else{echo 'col-sm-10';}?>">
                                                        <label for="direct_item_name">Item Name</label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label for="direct_item_qty">Item Qty</label>
                                                    </div>
                                                    <?php if($status == "Edit"):?>
                                                        <div class="col-sm-2">
                                                            <label for="direct_available_qty">Available</label>
                                                        </div>
                                                    <?php endif ?>
                                                </div>
                                                <?php foreach ($prfdirectitems as $row1) : ?>
                                                    <div class="form-group add-direct">
                                                        <div class="row">
                                                        <input type="hidden" name="prf_direct_items_id[]" value="
                                                        <?php if ($status == "Edit") {echo $row1->prf_items_id;} ?>">
                                                            <div class="<?php if($status =="Edit"){echo 'col-sm-8';}else{echo 'col-sm-10';}?>">
                                                                <select type="text" name="direct_item_name[]" class="form-control select-direct-item">
                                                                    <option value="">---Please Select---</option>
                                                                    <?php foreach ($direct_item_list as $row) : ?>
                                                                        <option value="<?php echo $row->itemCode; ?>"
                                                                            <?php if ($status == "Edit") {
                                                                            if ($row->itemCode == $row1->item_name) { echo 'selected';}}?>>
                                                                            <?php echo $row->itemName ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <input type="text" name="direct_item_qty[]" class="form-control"
                                                                <?php if ($status == "Edit") {echo ' value=';echo $row1->item_qty;} ?>>
                                                            </div>
                                                            <?php if($status == "Edit"):?>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="direct_available_qty[]" id="direct_available_qty" class="form-control" value="<?php echo $row1->stock_available; ?>">
                                                                </div>
                                                            <?php endif ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                            <div class="card-footer">
                                                <div class="float-right">

                                                    <button type="button" class="btn btn-danger btn-sm text-bold delete-direct-btn"><i class="fas fa-times" aria-hidden="true"></i> DELETE FIELD</button>

                                                    <button type="button" class="btn btn-success btn-sm text-bold add-direct-btn"><i class="fas fa-plus" aria-hidden="true"></i> ADD FIELD</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Indirect</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="<?php if($status =="Edit"){echo 'col-sm-8';}else{echo 'col-sm-10';}?>">
                                                        <label for="indirect_item_name">Item Name</label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label for="indirect_item_qty">Item Qty</label>
                                                    </div>
                                                    <?php if($status == "Edit"):?>
                                                        <div class="col-sm-2">
                                                            <label for="indirect_available_qty">Available</label>
                                                        </div>
                                                    <?php endif ?>
                                                </div>
                                                <?php foreach ($prfindirectitems as $row1) : ?>
                                                    <div class="form-group add-indirect">
                                                        <div class="row">
                                                        <input type="hidden" name="prf_indirect_items_id[]" value="
                                                        <?php if ($status == "Edit") {echo $row1->prf_items_id;} ?>">
                                                            <div class="<?php if($status =="Edit"){echo 'col-sm-8';}else{echo 'col-sm-10';}?>">
                                                                <select type="text" name="indirect_item_name[]" class="form-control">
                                                                    <option value="">---Select---</option>
                                                                    <?php foreach ($indirect_item_list as $row) : ?>
                                                                        <option value="<?php echo $row->itemCode; ?>"
                                                                            <?php if ($status == "Edit") {
                                                                            if ($row->itemCode == $row1->item_name) {echo 'selected';}} ?>>
                                                                            <?php echo $row->itemName ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <input type="text" name="indirect_item_qty[]" class="form-control"
                                                                <?php if ($status == "Edit") {echo ' value=';echo $row1->item_qty;} ?>>
                                                            </div>
                                                            <?php if($status == "Edit"):?>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="indirect_available_qty[]" id="indirect_available_qty" class="form-control" value="<?php echo $row1->stock_available; ?>">
                                                                </div>
                                                            <?php endif ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                            <div class="card-footer">
                                                <div class="float-right">

                                                    <button type="button" class="btn btn-danger btn-sm text-bold delete-indirect-btn"><i class="fas fa-times" aria-hidden="true"></i> DELETE FIELD</button>

                                                    <button type="button" class="btn btn-success btn-sm text-bold add-indirect-btn"><i class="fas fa-plus" aria-hidden="true"></i> ADD FIELD</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Tools</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="<?php if($status =="Edit"){echo 'col-sm-8';}else{echo 'col-sm-10';}?>">
                                                        <label for="tools_item_name">Item Name</label>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <label for="tools_item_qty">Item Qty</label>
                                                    </div>
                                                    <?php if($status == "Edit"):?>
                                                        <div class="col-sm-2">
                                                            <label for="tools_available_qty">Available</label>
                                                        </div>
                                                    <?php endif ?>
                                                </div>
                                                <?php foreach ($prftoolsitems as $row1) : ?>
                                                    <div class="form-group add-tools">
                                                        <div class="row">
                                                        <input type="hidden" name="prf_tools_items_id[]" value="
                                                        <?php if ($status == "Edit") {echo $row1->prf_items_id;} ?>">
                                                            <div class="<?php if($status =="Edit"){echo 'col-sm-8';}else{echo 'col-sm-10';}?>">
                                                                <select type="text" name="tools_item_name[]" class="form-control">
                                                                    <option value="">---Please Select---</option>
                                                                    <?php foreach ($tools_item_list as $row) : ?>
                                                                        <option value="<?php echo $row->code; ?>"
                                                                        <?php if ($status == "Edit") {
                                                                            if ($row->code == $row1->item_name) {echo 'selected';}} ?>>
                                                                            <?php echo $row->model ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <input type="text" name="tools_item_qty[]" class="form-control"
                                                                <?php if ($status == "Edit") {echo 'value=';echo $row1->item_qty;} ?>>
                                                            </div>
                                                            <?php if($status == "Edit"):?>
                                                                <div class="col-sm-2">
                                                                    <input type="text" name="tools_available_qty[]" id="tools_available_qty" class="form-control" value="<?php echo $row1->stock_available; ?>">
                                                                </div>
                                                            <?php endif ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                            <div class="card-footer">
                                                <div class="float-right">

                                                    <button type="button" class="btn btn-danger btn-sm text-bold delete-tools-btn"><i class="fas fa-times" aria-hidden="true"></i> DELETE FIELD</button>

                                                    <button type="button" class="btn btn-success btn-sm text-bold add-tools-btn"><i class="fas fa-plus" aria-hidden="true"></i> ADD FIELD</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </section>
</div>