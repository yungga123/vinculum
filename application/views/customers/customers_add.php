<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Register New Client</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-6">
									<?php echo form_open('CustomersController/customer_add_validate',["id" => "form-customer-add"]) ?>
									<div class="form-group">
										<label>Customer Name</label>
										<input class="form-control" type="text" name="customer_name" id="customer_name" placeholder="Enter Customer Name here.">
									</div>

									<div class="form-group">
										<label>Contact Person</label>
										<input class="form-control" type="text" name="contact_person" id="contact_person" placeholder="Enter Contact Number here.">
									</div>

									<div class="form-group">
										<label>Address</label>
										<input class="form-control" type="text" name="customer_address" id="customer_address" placeholder="Enter Address here.">
									</div>

									<div class="form-group">
										<label>Contact Details</label>
										<input class="form-control" type="text" name="contact_number" id="contact_number" placeholder="Enter Contact Number here">
									</div>

									<div class="form-group">
										<label>Email Address</label>
										<input class="form-control" type="text" name="email_address" id="email_address" placeholder="Enter Email Address here.">
									</div>

								</div>

								<div class="col-6">
									<div class="form-group">
										<label>Website</label>
										<input class="form-control" type="text" name="customer_website" id="customer_website" placeholder="Enter Website here.">
									</div>

									<div class="form-group">
										<label>Installation Date</label>
										<input class="form-control" type="date" name="installation_date" id="installation_date">
									</div>

									<div class="form-group">
										<label>Interest</label>
										<textarea class="form-control" name="customer_interest" id="customer_interest" placeholder="Enter Interest here. e.g. CCTV" rows="3"></textarea>
									</div>

									<div class="form-group">
										<label>Type</label>
										<input class="form-control" type="text" name="customer_type" id="customer_type" placeholder="Commercial/Residential?">
									</div>

									<div class="form-group">
										<label>Notes</label>
										<textarea class="form-control" rows="3" name="customer_notes" id="customer_notes" placeholder="Your notes here."></textarea>
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="card-footer">
							<button type="submit" class="btn btn-success float-right">Register New Client</button>	
							<a href="<?php echo site_url('customers') ?>" class="btn btn-primary">Customers Database</a>
						</div>

						<?php echo form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>