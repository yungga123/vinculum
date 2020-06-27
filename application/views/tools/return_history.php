<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Tools Return History</h1>
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
                        <div class="card-header">
                            <span class="text-bold">Menu Selection</span>
                        </div>

                        <div class="card-body">
                            <button href="#" class="btn btn-warning btn-block text-bold" data-toggle="modal" data-target="#modal-printreturn"><i class="fas fa-print"></i> PRINT HISTORY</button>
                        </div>

                        <div class="card-footer">
                            <a href="<?php echo site_url('tools') ?>" class="btn btn-success btn-block text-bold"><i class="fas fa-wrench"></i> TOOLS LIST</a>
                            <a href="<?php echo site_url('tools-pullout') ?>" class="btn btn-primary btn-block text-bold"><i class="fas fa-sign-out-alt"></i> TOOLS PULLOUT LIST</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-header">
                            <span class="text-bold">Return History Table</span>
                        </div>

                        <div class="card-body">
                            <table id="tools_return_history" class="table table-bordered table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Pullout ID</th>
			            				<th>Tool Code</th>
			            				<th>Tool Model</th>
			            				<th>Tool Description</th>
			            				<th>Assigned to</th>
			            				<th>Customer</th>
                                        <th>Quantity</th>
                                        <th>Date of Pullout</th>
                                        <th>Time of Pullout</th>
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
<div class="modal fade" id="modal-printreturn" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('ToolsController/print_return_history',["target" => "_blank"]) ?>
                <div class="form-group">
                    <label for="customer_name">Customer Name</label>
                    <select name="customer_name" id="customer_name" class="form-control text-bold text-center" aria-describedby="customer_name_label">
                        <option value="">ALL</option>
                        <?php foreach ($customers as $row) { ?>
                            <option value="<?php echo $row->CustomerID ?>"><?php echo $row->CompanyName.' - '.$row->CustomerID ?></option>
                        <?php } ?>
                    </select>
                    <small id="customer_name_label" class="text-muted">Select customer.</small>
                </div>

                <div class="form-group">
                    <label for="assigned_to">Assigned To</label>
                    <select name="assigned_to" id="assigned_to" class="form-control text-bold text-center" aria-describedby="assigned_to_label">
                        <option value="">ALL</option>
                        <?php foreach ($technicians as $row) { ?>
                            <option value="<?php echo $row->id ?>"><?php echo $row->firstname.' '.$row->lastname.' | ID Number:  '.$row->id.' | '.$row->position ?></option>
                        <?php } ?>
                    </select>
                    <small id="assigned_to_label" class="text-muted">Select assigned to.</small>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="date" name="start_date" id="start_date" class="form-control text-bold text-center" aria-describedby="start_date_label">
                            <small id="start_date_label" class="text-muted">Start Date</small>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="date" name="end_date" id="end_date" class="form-control text-bold text-center" aria-describedby="end_date_label">
                            <small id="end_date_label" class="text-muted">End Date</small>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> CLOSE</button>
                <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> PROCEED</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>