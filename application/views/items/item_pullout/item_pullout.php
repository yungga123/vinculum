<?php 
defined('BASEPATH') or exit('Access Denied');
 ?>

<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					 <h1 class="m-0 text-dark">Indirect Items</h1>
				</div>
			</div>
		</div>
	</div>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="card">
					<div class="card-body">
						<div class="col-lg-12">
				<?php if($this->session->flashdata('msg')): ?>
	    		<p><?php echo $this->session->flashdata('msg'); ?></p>
				<?php endif; ?>
						<div class="table-responsive">
							<table class="table table-striped table-bordered" id="Pull-Out-Item">
								<thead>
									<tr>
										<th>ID</th>
										<th>Item Code</th>
										<th>Item Name</th>
										<th>Item Type</th>
										<th>Original Price</th>
										<th>Selling Price</th>
										<th>Stocks</th>
										<th>Date Of Punch</th>
										<th>Stocks to Pullout</th>
										<th>Pulled-out To</th>
										<th>Discount</th>
										<th>Total Price</th>
										<th>Discounted Price</th>
										<th>Action</th>
									</tr>	
								</thead>

								<tbody>
									<?php foreach ($results as $row) { ?>
									<tr>
										<td><?php echo $row->id ?></td>
										<td><?php echo $row->item_code ?></td>
										<td><?php echo $row->itemName ?></td>
										<td><?php echo $row->itemType ?></td>
										<td><?php echo $row->itemSupplierPrice ?></td>
										<td><?php echo $row->itemPrice ?></td>
										<td><?php echo $row->stocks ?></td>
										<td><?php echo $row->date_of_punch ?></td>
										<td><?php echo $row->stocks_to_pullout ?></td>
										<td><?php echo $row->customer_name ?></td>
										<td><?php echo number_format($row->discount*100).'%'; ?></td>
										<td><?php echo number_format($row->total_price,2) ?></td>
										<td><?php echo number_format($row->discount_price,2) ?></td>
										<td class="text-center"><a class="btn btn-sm btn-danger" href="<?php echo base_url('index.php/itemsController/deletePullout/').$row->id ?>" onclick="return confirm('Are you sure?')" ><i class="fa fa-trash"></i> Delete</a></td>
									</tr>
									<?php } ?>
								</tbody>
								
								
							</table>
						</div>

						<div class="row">
							<div class="col-lg-9"></div>
							<div class="col-md-3">
								<div class="pull-right">
									<label for="total_price">Total Price:</label>
									<input class="form-control" type="text" name="total_price" readonly value="<?php foreach ($sum_of_pullouts as $row) {echo number_format($row->total_pullout_price,2);}
									 ?>">
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="card-footer">
							<div class="row">
								<div class="col-md-12">
									<div class="pull-right">

										<a href="<?php echo site_url('make-warranty') ?>" class="btn btn-success">Warranty Items</a>

										<button type="button" class="btn btn-info" data-target="#ScanItem" data-toggle="modal"><i class="fa fa-plus"></i> Add more items</button>
										<a href="<?php echo site_url('ItemsController/confirmPullout') ?>" onclick="return confirm('Pull out following items?')" class="btn btn-success"><i class="fa fa-check"></i> Confirm Pull-out</a>

									</div>
								</div>
							</div>
					</div>
				</div>
			</div>		
		</div>
	</section>
</div>


<div class="modal fade" id="ScanItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	        <div class="modal-header">
	            <h4 class="modal-title" id="myModalLabel">Scan Item</h4>
	            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	        </div>

	        <div class="modal-body">
	           	<h4>Note: Items that pulled-out will be SOLD items.</h4>
		           	<div class="form-group">
						<label>Item Code</label>
						<input id="itemCode" class="form-control" type="text" name="itemCode" autofocus placeholder="Focus in this textbox and scan the item barcode.">
					</div>
	        </div>

	        <div class="modal-body">
	        	<div id="dynamic_field">

				</div>
	        </div>
	       
	        <div class="modal-footer">
	            <!-- <button type="button" class="btn btn-primary">Submit</button> -->
	           	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	    </div>

	    		<?php if($this->session->flashdata('msg')): ?>
				<p><?php echo $this->session->flashdata('msg'); ?></p>
				<?php endif; ?>
				<?php echo form_error('itemcode2','<div class="alert alert-danger alert-dismissable">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>') ?>
				<?php echo form_close() ?>
	    <!-- /.modal-content -->
	</div>
</div>