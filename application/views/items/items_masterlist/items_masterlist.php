<?php
defined('BASEPATH') or die('No direct script access allowed.');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Masterlist of Items</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
						  <div class="row">
						  	<div class="col-sm-6">
						  		<h3 class="card-title text-danger">Note: All items registered are recorded here!</h3>
						  	</div>

						  	<div class="col-sm-6">
						  		<div class="float-right">
						  			<div class="btn-group">
						  				<a href="<?php echo base_url('index.php/addnewitem');?>" class="btn btn-primary"><i class="fas fa-plus"></i> Register New Item (Manual)</a>
						  				<a href="#" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-qrcode"></i> Register New Item (Scanner)</a>
						  				<a href="<?php echo site_url('print-items') ?>" class="btn btn-danger" target="_blank"><i class="fas fa-print"></i> Print</a>
						  			</div>
						  				
						  		</div>
						  		
						  	</div>
						  </div>
			              
			              
			            </div>

			            <div class="card-body">
			            	<table id="item_masterlist" class="table table-bordered table-hover" style="width: 100%">
			            		<thead>
			            			<tr>
			            				<th>Item Code</th>
			            				<th>Description</th>
			            				<th>Category</th>
			            				<th>Supplier's Price</th>
			            				<th>SRP</th>
			            				<th>No. of Stocks</th>
			            				<th>Date Added</th>
			            				<th>Location</th>
			            				<th>Supplier</th>
			            				<th>Encoder</th>
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

<div tabindex="-1" class="modal fade" id="myModal" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel" style="display: none;">
	<div class="modal-dialog">
	    <div class="modal-content">
	    	<form action="http://localhost/vinculum/index.php/addnewitem" method="post" accept-charset="utf-8">
	        <div class="modal-header">
	        	 <h4 class="modal-title" id="myModalLabel">Please indicate item information below.</h4>
	            <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
	        </div>
	        <div class="modal-body">
	            

	            <div class="form-group">
	            	<label>Item Code</label>
	            	<input name="itemCode" class="form-control" id="itemCode" type="text" value="">
	            </div>


	            
	        </div>
	        <div class="modal-footer">
	            <!-- <button type="button" class="btn btn-primary">Submit</button> -->
	            <input href ="<?php echo site_url('addnewitem') ?>" name="submit" class="btn btn-primary" type="submit" value="Submit">
	            
	           	<button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
	        </div>
	     </form>	    </div>
	    <!-- /.modal-content -->
	</div>
</div>


<div class="modal fade" id="modal-edit-item">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit This Item</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
				<div class="col-sm-6">
					<div class="card card-primary">
						<?php echo form_open('ItemsController/update_new_item_validate',["id" => "form-update-item"]) ?>
						<div class="card-body">
							<div class="form-group">
								<label for="item_code" class="control-label">Item Code</label>
								<input type="text" id="item_code" name="item_code" class="form-control item_code_edit" placeholder="Enter Item Code" readonly>
							</div>
							<div class="form-group">
								<label for="item_name" class="control-label">Item Name</label>
								<input type="text" id="item_name" name="item_name" class="form-control item_name_edit" placeholder="Enter Item Name">
							</div>
							<div class="form-group">
									<p>
										<label for="item_type">Item Type</label>

										<select id="item_type" name="item_type" class="form-control item_type_edit" value="">
											<option value="">---Please Select---</option>
											<option>Direct</option>
											<option>Indirect</option>
										</select>
									</p>
								</div>
							<div class="form-group">
								<label for="original_price" class="control-label">Original Price</label>
								<input type="text" id="original_price" name="original_price" class="form-control original_price_edit" placeholder="Enter Item Price">
							</div>
							<div class="form-group">
								<label for="selling_price" class="control-label">Selling Price</label>
								<input type="text" id="selling_price" name="selling_price" class="form-control selling_price_edit" placeholder="Enter Item Price">
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="card card-primary">
						<div class="card-body">
							<div class="form-group">
								<label for="location" class="control-label">Location</label>
								<input type="text" id="location" name="location" class="form-control location_edit" placeholder="Enter Where item can be located.">
							</div>

							<div class="form-group">
								<label for="no_of_stocks" class="control-label">No. of Stocks</label>
								<input type="text" id="no_of_stocks" name="no_of_stocks" class="form-control no_of_stocks_edit" placeholder="Enter Item No. of Stocks" readonly>
							</div>
							<div class="form-group">
								<label for="date_of_purchase">Date of Purchase</label>
								<div class="input-group">
									<input class="form-control date_of_purchase_edit" type="date" id="date_of_purchase" name="date_of_purchase" placeholder="Select Date">
									<div id="resetDate" class="input-group-addon">
										<i class="fa fa-remove"></i>
									</div>
								</div>									      
							</div>							
							<div class="form-group">
								<label for="supplier" class="control-label">Supplier</label>
								<input type="text" id="supplier" name="supplier" class="form-control supplier_edit" placeholder="Enter Supplier">
							</div>
							<div class="form-group">
								<label for="encoder">Encoder</label>
								<input class="form-control encoder_edit" type="text" id="encoder" name="encoder" placeholder="Enter Encoder">
							</div>
						</div>
					</div>
				</div>
			</div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update Item</button>
            </div>

            <?php echo form_close() ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

	<div class="modal fade addstocks" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3>Add Stocks</h3>
				</div>
				<div class="modal-body">
					<?php echo form_open('ItemsController/addStocksValidate',["id" => "form-addStocks"]) ?>
					<div class="form-group">
						<label for="">Item Code</label>
						<input class="form-control" type="text" name="AS_ItemCode" id="AS_ItemCode" value="" readonly>
					</div>	
					<div class="form-group">
						<label for="">Quantity</label>
						<input class="form-control" type="text" name="AS_Quantity" id="AS_Quantity" placeholder="Enter Quantity here.">
					</div>
					<button class="btn btn-success btn-block" type="submit"><i class="fas fa-plus"></i> Add to stocks</button>
					<?php echo form_close() ?>
				</div>	
			</div>
		</div>
	</div>


      