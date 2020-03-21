<?php 
defined('BASEPATH') or exit('Access Denied');
 ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Pull OUT Item</h1>
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
						<div class="card-header" style="font-weight: bold;">First Step: Select A Customer</div>

						<div class="card-body">
							
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Customer Name</label>
										<select class="form-control pullout_customer_name" name="" id="">
											<option value="">---</option>

											<?php foreach ($customer_results as $row): ?>
												<option value="<?php echo $row->CustomerID ?>"><?php echo $row->CompanyName.' --- '.$row->CustomerID ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<?php echo form_open('PullOutsController/getSearchItem',["id" => "form-item-search"]) ?>
							<p style="font-weight: bold;">Second Step: Search Item to Pullout</p>
							
						</div>

						<div class="card-body">
							<div class="row">
								<div class="col-8">
									<div class="form-group">
										<div class="input-group input-group">
											<input type="text" class="form-control" placeholder="Search Item Name or Item Code" name="search_item" id="search_item">
											<span class="input-group-append">
											<button type="submit" class="btn btn-info btn-flat"><i class="fas fa-search"></i> Search</button>
											</span>
										</div>
										<?php echo form_close() ?>
									</div>
								</div>		

							</div>
						</div>

						<div class="card-body">
							<div class="row">
								<div class="col-12">
									<div class="table-responsive">
										<table class="table table-bordered table-hover table-pullout">

											<thead>
												<tr>
													<th>Operation</th>
													<th>Item Code</th>
													<th>Description</th>
													<th>Category</th>
													<th>Supplier Price</th>
													<th>Selling Price</th>
													<th>No. of Stocks</th>
													<th>Date of Purchase</th>
													<th>Location</th>
													<th>Supplier</th>
													<th>Encoder</th>
												</tr>
											</thead>

											<tbody id="search-result"></tbody>

										</table>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<p style="font-weight: bold;">Third Step: Proceed to Confirmation</p>
						</div>

						<div class="card-body">
							<div class="row">
								<div class="col-6">
									<a href="<?php echo site_url('masterlistofitems') ?>" class="btn btn-block btn-primary text-bold">DIRECT ITEMS MASTERLIST</a>
								</div>
								<div class="col-6">
									<a href="<?php echo site_url('pending-pullouts') ?>" class="btn btn-block btn-success text-bold">CONFIRM PULLOUT</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>



<div class="modal fade pullout_stocks" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<label style="font-size: 22px;font-weight: bold;">Enter Quantity</label>
	    		<br>
	    		<?php echo form_open('PullOutsController/insert_pullout',["id" => "form-insert-pullout"]) ?>
	    		<div class="form-group">
	    			<label>Customer ID</label>
	    			<input class="form-control" type="text" name="pullout_customer_name" id="pullout_customer_name" value="" readonly>
	    		</div>
	    		<div class="form-group">
	    			<label>Item Code</label>
	    			<input class="form-control" type="text" name="item_code_val" id="item_code_val" value="" readonly>
	    		</div>
	    		
	    		<div class="form-group">
	    			<label>Stocks to pullout</label>
	    			<input class="form-control" type="text" name="pullout_stocks" id="pullout_stocks" placeholder="Enter Quantity to pullout here.">
	    		</div>
	    		
	    		<button type="submit" class="btn btn-success btn-block">Proceed to Pullout</button>
	    		<?php echo form_close() ?>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>