<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Service Report</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php echo form_open('ServiceReportController/add_sr_validate',["id" => "form-add-sr"]) ?>
                            <!-- Service Report Information -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label>Service Report Information</label>
                                        </div>

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for="customer_name">Customer Name</label>
                                                        <select name="customer_name" id="customer_name" class="form-control">
                                                            <option value="">---Please Select Customer---</option>
                                                            
                                                            <?php foreach ($results_customers as $row) { ?>
                                                                <option value="<?php echo $row->CustomerID ?>"><?php echo $row->CompanyName.' --- '.$row->CustomerID ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <input type="text" name="description" id="description" class="form-control">
                                                    </div>

                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="date_requested">Date Requested</label>
                                                        <input type="date" name="date_requested" id="date_requested" class="form-control" value="<?php echo date('Y-m-d') ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="date_implemented">Date Implemented</label>
                                                        <input type="date" name="date_implemented" id="date_implemented" class="form-control" value="<?php echo date('Y-m-d') ?>">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Direct Item Requests -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label>Direct Item Request</label>
                                        </div>

                                        <div class="card-body">
                                            <div class="row add-direct">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="direct_item[]">Direct Item</label>
                                                        <select type="text" name="direct_item[]" class="form-control">
                                                            <option value="">---Please Select Item---</option>

                                                            <?php foreach ($results_direct_items as $row) { ?>
                                                                <option value="<?php echo $row->itemCode ?>"><?php echo $row->itemName ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="direct_item_qty[]">Quantity</label>
                                                        <input type="text" name="direct_item_qty[]" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="direct_item_returns[]">Returns</label>
                                                        <input type="text" name="direct_item_returns[]" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="card-footer">
                                            <div class="float-right">
                                                <button type="button" class="btn btn-danger btn-sm text-bold delete-direct-btn">DELETE INPUT</button>

                                                <button type="button" class="btn btn-success btn-sm text-bold add-direct-btn">ADD INPUT</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Indirect Item Requests -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label>Indirect Item Request</label>
                                        </div>

                                        <div class="card-body">
                                            <div class="row add-indirect">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="indirect_item[]">Indirect Item</label>
                                                        <select type="text" name="indirect_item[]" class="form-control">
                                                            <option value="">---Please Select Item---</option>

                                                            <?php foreach ($results_indirect_items as $row) { ?>
                                                                <option value="<?php echo $row->itemCode ?>"><?php echo $row->itemName ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="indirect_item_qty[]">Quantity</label>
                                                        <input type="text" name="indirect_item_qty[]" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="indirect_item_returns[]">Returns</label>
                                                        <input type="text" name="indirect_item_returns[]" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="card-footer">
                                            <div class="float-right">
                                                <button type="button" class="btn btn-danger btn-sm text-bold delete-indirect-btn">DELETE INPUT</button>

                                                <button type="button" class="btn btn-success btn-sm text-bold add-indirect-btn">ADD INPUT</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tools Request -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label>Tools Request</label>
                                        </div>

                                        <div class="card-body">
                                            <div class="row add-tools">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                    <label for="tools[]">Tools</label>
                                                    <select class="form-control" name="tools[]">
                                                        <option value="">--- Please Select tools ---</option>

                                                        <?php foreach ($results_tools as $row) { ?>
                                                            <option value="<?php echo $row->code ?>"><?php echo $row->model.' -- '.$row->description ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                    <label for="tools_qty[]">Quantity</label>
                                                    <input type="text" name="tools_qty[]" class="form-control" >
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                    <label for="tools_returns[]">Returns</label>
                                                    <input type="text" name="tools_returns[]" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <div class="float-right">
                                                <button type="button" class="btn btn-danger btn-sm text-bold delete-tools-btn">DELETE INPUT</button>

                                                <button type="button" class="btn btn-success btn-sm text-bold add-tools-btn">ADD INPUT</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="card-footer">
                    <div class="float-right">
                        <button type="submit" class="btn btn-success text-bold"><i class="fas fa-check "></i> SUBMIT</button>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>

        </div>
    </section>
</div>