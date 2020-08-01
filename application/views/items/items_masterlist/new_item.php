<?php
defined('BASEPATH') or exit('No direct script access allowed.');

date_default_timezone_set('Asia/Manila');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Register New Item</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<div class="card card-primary">

						<div class="card-header">
							Item Details
						</div>
						<?php echo form_open('ItemsController/register_new_item_validate',["id" => "form-register-item"]) ?>
						<div class="card-body">
							<div class="form-group">
								<label for="item_code" class="control-label">Item Code</label>
								<input type="text" id="item_code" name="item_code" class="form-control" placeholder="Enter Item Code" value="<?php if ($this->uri->segment(1) == 'addnewitem-scan') {
									echo $item_code;
								} ?>">
							</div>
							<div class="form-group">
								<label for="item_name" class="control-label">Item Name</label>
								<input type="text" id="item_name" name="item_name" class="form-control" placeholder="Enter Item Name">
							</div>
							<div class="form-group">
									<p>
										<label for="item_type">Item Type</label>

										<select id="item_type" name="item_type" class="form-control" value="">
											<option value="">---Please Select---</option>
											<option>Direct</option>
											<option>Indirect</option>
										</select>
									</p>
								</div>
							<div class="form-group">
								<label for="original_price" class="control-label">Original Price</label>
								<input type="text" id="original_price" name="original_price" class="form-control" placeholder="Enter Item Price">
							</div>
							<div class="form-group">
								<label for="selling_price" class="control-label">Selling Price</label>
								<input type="text" id="selling_price" name="selling_price" class="form-control" placeholder="Enter Item Price">
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card card-primary">

						<div class="card-header">
							Additional Details
						</div>
						<div class="card-body">
							<div class="form-group">
								<label for="location" class="control-label">Location</label>
								<input type="text" id="location" name="location" class="form-control" placeholder="Enter Where item can be located.">
							</div>

							<div class="form-group">
								<label for="no_of_stocks" class="control-label">No. of Stocks</label>
								<input type="text" id="no_of_stocks" name="no_of_stocks" class="form-control" placeholder="Enter Item No. of Stocks">
							</div>
							<div class="form-group">
								<label for="date_of_purchase">Date Added</label>
								<div class="input-group">
									<input class="form-control" type="date" id="date_of_purchase" name="date_of_purchase" placeholder="Select Date" value="<?php echo date('Y-m-d') ?>">
								</div>									      
							</div>							
							<div class="form-group">
								<label for="supplier" class="control-label">Supplier</label>
								<input type="text" id="supplier" name="supplier" class="form-control" placeholder="Enter Supplier">
							</div>
							<div class="form-group">
								<label for="encoder">Encoder</label>
								<input class="form-control" type="text" id="encoder" name="encoder" placeholder="Enter Serial Number">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 offset-sm-3">
					<div class="form-group">
						<input class="btn btn-primary btn-lg btn-block swalDefaultError" type="submit" value="Submit" />
					</div>
				</div>
			</div>
			<?php echo form_close() ?>
		</div>
	</section>	
</div>



