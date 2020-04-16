<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Add Tools</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-header">
							<label>Please Provide Information</label>
						</div>

						<?php echo form_open('ToolsController/add_tools_validate',["id" => "form-addtools"]) ?>
						<div class="card-body">
							<div class="form-group">
								<label for="tool_code">Tool Code</label>
								<input class="form-control" type="text" name="tool_code" id="tool_code">
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

						<div class="card-footer">
							<a href="<?php echo site_url('tools') ?>" class="btn btn-warning text-bold">TOOLS TABLE</a>
							<button type="submit" class="btn btn-success text-bold float-right">SUBMIT</button>
						</div>
						<?php echo form_close() ?>							
					</div>
				</div>
			</div>
		</div>
	</section>
</div>