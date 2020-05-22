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
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-header">Information</div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary btn-block text-bold" data-toggle="modal" data-target="#modal-service-information"><i class="fas fa-info"></i> REQUISITION GUIDE</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9">
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

                                                            <div class="form-group">
                                                                <label for="date_requested">Date Requested</label>
                                                                <input type="date" name="date_requested" id="date_requested" class="form-control" value="<?php echo date('Y-m-d') ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="date_implemented">Date Implemented</label>
                                                                <input type="date" name="date_implemented" id="date_implemented" class="form-control" value="<?php echo date('Y-m-d') ?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">

                                                            <div class="form-group">
                                                                <label for="requested_by">Requested By</label>
                                                                <input type="text" name="requested_by" id="requested_by" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="prepared_by">Prepared By</label>
                                                                <input type="text" name="prepared_by" id="prepared_by" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="checked_by">Checked By</label>
                                                                <input type="text" name="checked_by" id="checked_by" class="form-control">
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

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="direct_item[]">Direct Item</label>
                                                                <input type="text" name="direct_item[]" class="form-control" placeholder="Indicate item request.">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label for="direct_item_qty[]">Quantity</label>
                                                                <input type="text" name="direct_item_qty[]" class="form-control" placeholder="Indicate requested qty.">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label for="direct_item_amt[]">Amount</label>
                                                                <input class="form-control" type="text" name="direct_item_amt[]" placeholder="Indicate item amount">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label for="direct_item_returns[]">Returns</label>
                                                                <input type="text" name="direct_item_returns[]" class="form-control" placeholder="Leave blank if requesting">
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
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="indirect_item[]">Indirect Item</label>
                                                                <input type="text" name="indirect_item[]" class="form-control" placeholder="Indicate item request.">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label for="indirect_item_qty[]">Quantity</label>
                                                                <input type="text" name="indirect_item_qty[]" class="form-control" placeholder="Indicate requested qty.">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label for="indirect_item_amt[]">Amount</label>
                                                                <input class="form-control" type="text" name="indirect_item_amt[]" placeholder="Indicate item amount">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label for="indirect_item_returns[]">Returns</label>
                                                                <input type="text" name="indirect_item_returns[]" class="form-control" placeholder="Leave blank if requesting">
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

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="tools[]">Requested Tools</label>
                                                                <input type="text" name="tools[]" class="form-control" aria-describedby="helpId">
                                                                <small id="helpId" class="text-muted">Indicate Requested tools</small>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label for="tools_qty[]">Quantity</label>
                                                                <input type="text" name="tools_qty[]" class="form-control" aria-describedby="helpId">
                                                                <small id="helpId" class="text-muted">Indicate Quantity</small>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label for="tools_returns[]">Returns</label>
                                                                <input type="text" name="tools_returns[]" class="form-control" aria-describedby="helpId">
                                                                <small id="helpId" class="text-muted">Leave blank if requesting</small>
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
            </div>
        </div>
    </section>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-service-information" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-bold">
                ESSENTIAL ITEMS TO BRING
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <label>DIRECT ITEMS</label>
                        <p>DVRs</p>
                        <p>Camera</p>
                        <p>Audio Mic</p>
                        <p>Audio Jack</p>
                        <p>BNC to RCA Connector</p>
                        <p>DC Connector Male</p>
                        <p>DC Connector Female</p>
                        <p>BNC Connector</p>
                        <p>Video Balun (Pair)</p>
                        <p>RJ45 Connector</p>
                        <p>4Way Splitter</p>
                        <p>8Way Splitter</p>
                        <p>Centralized Power Supply</p>
                        <p>12V Power Supply 1A-5A (3A to 5A needs AC CORD)</p>
                        <p>Patch Cable Cat5E</p>
                        <p>Coax w/ or w/o Power</p>
                        <p>HDMI Cable </p>
                        <p>VGA Cable</p>
                        <p>HDD 1tb-4tb</p>
                        <p>SATA Cables</p>
                    </div>

                    <div class="col-sm-4">
                        <label>INDIRECT ITEMS</label>
                        <p>Electrical Tape</p>
                        <p>Cable Tie</p>
                        <p>Black Screw and Tox</p>
                        <p>Masking Tape</p>
                        <p>Spiral Wrap</p>
                        <p>Rubber Tape</p>
                    </div>

                    <div class="col-sm-4">
                        <label>TOOLS</label>
                        <p>Precision Tools</p>
                        <p>Ladder</p>
                        <p>Multi Tester</p>
                        <p>Tone Tracer</p>
                        <p>LAN Tester</p>
                        <p>Crimper</p>
                        <p>Hammer</p>
                        <p>Philip and Flat Screwdrivers</p>
                        <p>Wire Cutters</p>
                        <p>Long nose/Pliers</p>
                    </div>
                </div>
               
                


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success text-bold" data-dismiss="modal"><i class="fas fa-check"></i> Okay</button>
            </div>
        </div>
    </div>
</div>