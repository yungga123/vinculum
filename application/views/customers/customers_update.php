<?php
defined('BASEPATH') or die('Access Denied');

$customer_id = '';
$customer_name = '';
$contact_person = '';
$customer_address = '';
$contact_number = '';
$email_address = '';
$customer_website = '';
$installation_date = '';
$customer_interest = '';
$customer_type = '';
$customer_notes = '';

foreach ($results as $row) {
	$customer_id = $row->CustomerID;
	$customer_name = $row->CompanyName;
	$contact_person = $row->ContactPerson;
	$customer_address = $row->Address;
	$contact_number = $row->ContactNumber;
	$email_address = $row->EmailAddress;
	$customer_website = $row->Website;
	$installation_date = $row->InstallationDate;
	$customer_interest = $row->Interest;
	$customer_type = $row->Type;
	$customer_notes = $row->Notes;

}
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Update Existing Client</h1>
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
									<?php echo form_open('CustomersController/customer_update_validate',["id" => "form-customer-update"]) ?>
									<div class="form-group">
										<label>Customer ID</label>
										<input class="form-control" type="text" name="customer_id_edit" id="customer_id_edit" readonly value="<?php echo $customer_id ?>">
									</div>
									<div class="form-group">
										<label>Customer Name</label>
										<input class="form-control" type="text" name="customer_name_edit" id="customer_name_edit" placeholder="Enter Customer Name here." value="<?php echo $customer_name ?>">
									</div>

									<div class="form-group">
										<label>Contact Person</label>
										<input class="form-control" type="text" name="contact_person_edit" id="contact_person_edit" placeholder="Enter Contact Number here." value="<?php echo $contact_person ?>">
									</div>

									<div class="form-group">
										<label>Address</label>
										<input class="form-control" type="text" name="customer_address_edit" id="customer_address_edit" placeholder="Enter Address here." value="<?php echo $customer_address ?>">
									</div>

									<div class="form-group">
										<label>Contact Details</label>
										<input class="form-control" type="text" name="contact_number_edit" id="contact_number_edit" placeholder="Enter Contact Number here" value="<?php echo $contact_number ?>">
									</div>

									<div class="form-group">
										<label>Email Address</label>
										<input class="form-control" type="text" name="email_address_edit" id="email_address_edit" placeholder="Enter Email Address here." value="<?php echo $email_address ?>">
									</div>

								</div>

								<div class="col-6">
									<div class="form-group">
										<label>Website</label>
										<input class="form-control" type="text" name="customer_website_edit" id="customer_website_edit" placeholder="Enter Website here." value="<?php echo $customer_website ?>">
									</div>

									<div class="form-group">
										<label>Installation Date</label>
										<input class="form-control" type="date" name="installation_date_edit" id="installation_date_edit" value="<?php echo $installation_date ?>">
									</div>

									<div class="form-group">
										<label>Interest</label>
										<textarea class="form-control" rows="3" name="customer_interest_edit" id="customer_interest_edit" placeholder="Enter Interest here. e.g. CCTV"><?php echo $customer_interest ?></textarea>
									</div>

									<div class="form-group">
										<label>Type</label>
										<input class="form-control" type="text" name="customer_type_edit" id="customer_type_edit" placeholder="Commercial/Residential?" value="<?php echo $customer_type ?>">
									</div>

									<div class="form-group">
										<label>Notes</label>
										<textarea class="form-control" rows="3" name="customer_notes_edit" id="customer_notes_edit" placeholder="Your notes here."><?php echo $customer_notes ?></textarea>
									</div>
								</div>
							</div>
							
						</div>
						
						<div class="card-footer">
							<button type="submit" class="btn btn-success float-right">Update Customer</button>	
							<a href="<?php echo site_url('customers') ?>" class="btn btn-primary">Customers Database</a>
						</div>

						<?php echo form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>