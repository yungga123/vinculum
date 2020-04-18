<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">List of Tools</h1>
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
							<label>Tools Menu</label>
						</div>

						<div class="card-body">
							<a href="<?php echo site_url('addtools') ?>" class="btn btn-block btn-success text-bold"><i class="fas fa-plus"></i> ADD TOOLS</a>
							<a href="<?php echo site_url('printtools') ?>" class="btn btn-block btn-warning text-bold" target="_blank"><i class="fas fa-print"></i> PRINT TOOLS</a>
						</div>
					</div>
				</div>
				<div class="col-sm-9">
					<div class="card">
						<div class="card-header">
							<label>Tools Table</label>
						</div>

						<div class="card-body">
							<table id="tools_table" class="table table-bordered table-hover" style="width: 100%">
			            		<thead>
			            			<tr>
			            				<th>Tool Code</th>
			            				<th>Model</th>
			            				<th>Description</th>
			            				<th>Tool Type</th>
			            				<th>Quantity</th>
			            				<th>Price</th>
			            				<th>Operation</th>
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


<div class="modal fade modal-edit-tool">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div id="tool_loading">
                
            </div>

			<div class="modal-header">
				<label style="font-size:24px">Edit Tools</label>
			</div>
			<div class="modal-body">
				<?php echo form_open('ToolsController/edit_tools_validate',["id" => "form-edittools"]) ?>
				<div class="form-group">
					<label for="tool_code">Tool Code</label>
					<input class="form-control" type="text" name="tool_code" id="tool_code" readonly>
				</div>

				<div class="form-group">
					<label for="tool_model">Model</label>
					<input class="form-control" type="text" name="tool_model" id="tool_model">
				</div>

				<div class="form-group">
					<label for="tool_description">Description</label>
					<input class="form-control" type="text" name="tool_description" id="tool_description">
				</div>

				<div class="form-group">
					<label for="tool_type">Type</label>
					<select class="form-control" name="tool_type" id="tool_type">
						<option value="">--- Please Select ---</option>
						<option>Hand Tools</option>
						<option>Power Tools</option>
						<option>Utility</option>
						<option>Others</option>
					</select>
				</div>

				<div class="form-group">
					<label for="tool_quantity">Quantity</label>
					<input class="form-control" type="text" name="tool_quantity" id="tool_quantity">
				</div>

				<div class="form-group">
					<label for="tool_price">Price</label>
					<input class="form-control" type="text" name="tool_price" id="tool_price">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary text-bold" data-dismiss="modal">CLOSE</button>
				<button type="submit" class="btn btn-primary text-bold">SUBMIT</button>
			</div>
			<?php echo form_close() ?>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade modal-delete-tool">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<?php echo form_open('ToolsController/delete_tool_validate',["id" => "form-deletetool"]) ?>
			<div class="modal-body text-center">
				<label style="font-size: 22px">DELETE THIS TOOL?</label>

				<div class="form-group">
					<label for="tool_delete_code">Tool Code</label>
					<input class="form-control text-center text-bold" type="text" name="tool_delete_code" id="tool_delete_code" readonly>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger text-bold" data-dismiss="modal">NO</button>
				<button type="submit" class="btn btn-success text-bold">YES</button>
			</div>
			<?php echo form_close() ?>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->