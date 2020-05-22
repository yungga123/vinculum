<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Service Report Update</h1>
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
                            <?php echo form_open('ServiceReportController/service_report_update_validate',["id" => "form-update-sr"]) ?>
                            <input type="hidden" name="sr_id" value="<?php echo $this->uri->segment(2) ?>">
                            <!-- Service Report Information -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label>Service Report Information</label>
                                        </div>

                                        <div class="card-body">
                                            <?php foreach ($results_service_report_view as $row) { ?>
                                            <div class="row">
                                                <div class="col-sm-6">

                                                    <div class="form-group">
                                                        <label for="customer_name">Customer Name</label>
                                                        <select name="customer_name" id="customer_name" class="form-control">
                                                            <option value="">---Please Select Customer---</option>
                                                            
                                                            <?php foreach ($results_customers as $row2) { ?>
                                                                <option <?php if ($row2->CustomerID==$row->customer_id) {
                                                                    echo 'selected';
                                                                } ?> value="<?php echo $row2->CustomerID ?>"><?php echo $row2->CompanyName.' --- '.$row2->CustomerID ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <input type="text" name="description" id="description" class="form-control" value="<?php echo $row->description ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="date_requested">Date Requested</label>
                                                        <input type="date" name="date_requested" id="date_requested" class="form-control" value="<?php echo $row->date_requested ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="date_implemented">Date Implemented</label>
                                                        <input type="date" name="date_implemented" id="date_implemented" class="form-control" value="<?php echo $row->date_implemented ?>">
                                                    </div>

                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="received_by">Received By</label>
                                                        <input type="text" name="received_by" id="received_by" class="form-control" value="<?php echo $row->received_by ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="checked_by">Checked By</label>
                                                        <input type="text" name="checked_by" id="checked_by" class="form-control" value="<?php echo $row->checked_by ?>">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <?php } ?>
                                            
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
                                            <?php foreach ($results_direct_items_view as $row) { ?>
                                            <div class="row add-direct">
                                                <input type="hidden" name="direct_item_id[]" value="<?php echo $row->id ?>">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        
                                                        <label for="direct_item[]">Direct Item</label>
                                                        <input class="form-control" type="text" name="direct_item[]" value="<?php echo $row->direct_item ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label for="direct_item_qty[]">Quantity</label>
                                                        <input type="text" name="direct_item_qty[]" class="form-control" value="<?php echo $row->qty_rqstd ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label for="direct_item_amt[]">Amount</label>
                                                        <input type="text" name="direct_item_amt[]" class="form-control" value="<?php echo $row->amt ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label for="direct_item_returns[]">Returns</label>
                                                        <input type="text" name="direct_item_returns[]" class="form-control" value="<?php echo $row->returns ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
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
                                            <?php foreach ($results_indirect_items_view as $row) { ?>
                                              
                                            <div class="row add-indirect">
                                                <div class="col-sm-6">
                                                    <input type="hidden" name="indirect_item_id[]" value="<?php echo $row->id ?>">
                                                    <div class="form-group">
                                                        <label for="indirect_item[]">Indirect Item</label>
                                                        <input type="text" name="indirect_item[]" class="form-control" value="<?php echo $row->indirect_item ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label for="indirect_item_qty[]">Quantity</label>
                                                        <input type="text" name="indirect_item_qty[]" class="form-control" value="<?php echo $row->qty_rqstd ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label for="indirect_item_amt[]">Amount</label>
                                                        <input type="text" name="indirect_item_amt[]" class="form-control" value="<?php echo $row->amt ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label for="indirect_item_returns[]">Returns</label>
                                                        <input type="text" name="indirect_item_returns[]" class="form-control" value="<?php echo $row->amt ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <?php } ?>
                                            
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
                                            <?php foreach ($results_tools_view as $row) { ?>
                                            <div class="row add-tools">
                                                <div class="col-sm-6">
                                                    <input type="hidden" name="tools_id[]" value="<?php echo $row->id ?>">
                                                    <div class="form-group">
                                                        <label for="tools[]">Tools</label>
                                                        <input type="text" class="form-control" name="tools[]" value="<?php echo $row->tools ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                    <label for="tools_qty[]">Quantity</label>
                                                    <input type="text" name="tools_qty[]" class="form-control" value="<?php echo $row->qty_rqstd ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                    <label for="tools_returns[]">Returns</label>
                                                    <input type="text" name="tools_returns[]" class="form-control" value="<?php echo $row->returns ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            
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