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
        <?php echo form_open('PRFController/add_prf_validate', ["id" => "form-addprf-validate"]) ?>
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
                                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-check-circle"></i> Add Project</button>
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
                                                    <option value="<?php echo $row->CustomerID.'/' ?>select-branch"
                                                    <?php if ($client_id == $row->CustomerID) {echo 'selected';} ?>>
                                                    <?php echo $row->CustomerID . " --- " . $row->CompanyName ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
                                            <input type="hidden" name="project_name_hidden" value="<?php echo $client_id; ?>">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="project_activity">Project Activity</label>
                                            <select type="text" name="project_activity" id="project_activity" class="form-control select2">
                                                <option value="">---Please Select---</option>
                                                <?php foreach ($project_list as $row) : ?>
                                                    <option value="<?php echo $row->project_id; ?>">
                                                    <?php echo $row->project_type ?>
                                                    </option>
                                                <?php endforeach ?>
                                            </select>
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
                                                    <option value="<?php echo $client_id.'/' ?><?php echo $row->branch_id; ?>"
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
                                              
                                                    <option value="<?php echo $this->session->userdata('logged_in')['emp_id']; ?>" selected>
                                                    <?php echo $this->session->userdata('logged_in')['emp_id'] . ' --- ' . $this->session->userdata('logged_in')['firstname'] . ' ' . $this->session->userdata('logged_in')['lastname'] . ' --- ' . $this->session->userdata('logged_in')['position']?>
                                                    </option>
                            
                                            </select>     
                                        </div>
                                    </div>
                                </div>
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
                                                <div class="form-group add-direct">
                                                    <div class="row">
                                                        <div class="col-sm-10">
                                                            <label for="direct_item_name[]">Item Name</label>
                                                            <select type="text" name="direct_item_name[]" id="direct_item_name[]" class="form-control select-direct-item">
                                                                <option value="">---Please Select---</option>
                                                                <?php foreach ($direct_item_list as $row) : ?>
                                                                    <option value="<?php echo $row->itemCode; ?>"><?php echo $row->itemName ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label for="direct_item_qty[]">Item Qty</label>
                                                            <input type="text" name="direct_item_qty[]" id="direct_item_qty[]" class="form-control">
                                                        </div>
                                                        <!-- <div class="col-sm-2">
                                                            <label for="available_qty[]">Available</label>
                                                            <input type="text" name="available_qty[]" id="available_qty" class="form-control" readonly>
                                                        </div> -->
                                                    </div>
                                                </div>
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
                                                <div class="form-group add-indirect">
                                                    <div class="row">
                                                        <div class="col-sm-10">
                                                            <label for="indirect_item_name[]">Item Name</label>
                                                            <select type="text" name="indirect_item_name[]" id="indirect_item_name[]" class="form-control">
                                                                <option value="">---Select---</option>
                                                                <?php foreach ($indirect_item_list as $row) : ?>
                                                                    <option value="<?php echo $row->itemCode; ?>"><?php echo $row->itemName ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label for="indirect_item_qty[]">Item Qty</label>
                                                            <input type="text" name="indirect_item_qty[]" id="indirect_item_qty[]" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
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
                                                <div class="form-group add-tools">
                                                    <div class="row">
                                                        <div class="col-sm-10">
                                                            <label for="tools_item_name[]">Item Name</label>
                                                            <select type="text" name="tools_item_name[]" id="tools_item_name[]" class="form-control">
                                                                <option value="">---Please Select---</option>
                                                                <?php foreach ($tools_item_list as $row) : ?>
                                                                    <option value="<?php echo $row->code; ?>"><?php echo $row->model ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label for="tools_item_qty[]">Item Qty</label>
                                                            <input type="text" name="tools_item_qty[]" id="tools_item_qty[]" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
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