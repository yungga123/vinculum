<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Tools Pullout</h1>
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
                            <label>Menu Selection</label>
                        </div>

                        <div class="card-body">
                            <button type="button" class="btn btn-primary text-bold btn-block">SAMPLE BUTTON</button>
                            <button type="button" class="btn btn-primary text-bold btn-block">SAMPLE BUTTON</button>
                            <button type="button" class="btn btn-primary text-bold btn-block">SAMPLE BUTTON</button>
                            <button type="button" class="btn btn-primary text-bold btn-block">SAMPLE BUTTON</button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-header">
                            <label>List of Tools Pullout</label>
                        </div>

                        <div class="card-body">
                            <table id="tools_pullout" class="table table-bordered table-hover" style="width: 100%">
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
                                        <th>Operation</th>
			            			</tr>
                                </thead>
                                
                                <tbody>
                                    <?php foreach ($results_tools_pullout as $row) { ?>
                                        <tr>
                                            <td><?php echo $row->toolpullout_id ?></td>
                                            <td><?php echo $row->tool_code ?></td>
                                            <td><?php echo $row->tool_model ?></td>
                                            <td><?php echo $row->tool_description ?></td>
                                            <td><?php echo $row->assigned_to ?></td>
                                            <td><?php echo $row->customer ?></td>
                                            <td><?php echo $row->quantity ?></td>
                                            <td><?php echo date_format(date_create($row->date_of_pullout),'F d, Y') ?></td>
                                            <td><?php echo date_format(date_create($row->time_of_pullout),'h:i A') ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning text-bold btn-sm"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-success text-bold btn-sm btn-toolreturn" data-toggle="modal" data-target="#modal-toolreturn"><i class="fas fa-undo"></i></button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
			            	</table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-toolreturn" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div id="tool_loading">
                
            </div>
            <div class="modal-header">
                <h5 class="modal-title">Return this tool</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <?php echo form_open('ToolsController/tools_pullout_return',["id" => "form-toolsreturn"]) ?>
            <div class="modal-body text-center">
                <input type="hidden" value="" name="pullout_id" id="pullout_id">
                <div class="form-group">
                    <label for="tool_code">Tool Code</label>
                    <input type="text" name="tool_code" id="tool_code" class="form-control text-center text-bold" placeholder="" readonly>
                </div>

                <div class="form-group">
                    <label for="assigned_to">Assigned To</label>
                    <select name="assigned_to" id="assigned_to" class="form-control text-center text-bold" readonly>
                        <option value="">--- Please Select ---</option>
                        <?php if (count($results_technicians) != 0) { ?>
                            <?php foreach ($results_technicians as $row) { ?>
                                <option value="<?php echo $row->id ?>"><?php echo $row->name.' | ID: '.$row->id.' | '.$row->position ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="customer">Customer</label>
                    <select name="customer" id="customer" class="form-control text-center text-bold" readonly>
                        <option value="">--- Please Select ---</option>
                        <?php if (count($results_customers) != 0) {
                            foreach ($results_customers as $row) { ?>
                                <option value="<?php echo $row->CustomerID ?>"><?php echo $row->CompanyName.' - '.$row->CustomerID ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" name="quantity" id="quantity" class="form-control text-center" placeholder="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> RETURN</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>