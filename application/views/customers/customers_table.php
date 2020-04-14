<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Clients Database</h1>
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
						<div class="card-header">
							<p style="font-weight: bold;">Menu Selection</p>
						</div>
						<div class="card-body">
							<a  href="<?php echo site_url('customers-add') ?>" class="btn btn-success"><i class="fas fa-plus"></i> Add Customer</a>

							<a href="<?php echo site_url('customers-print') ?>" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i> Print Customer Database</a>
							
							<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".modal-customerdetail-info"><i class="fas fa-print"></i> Print Customer Details</button>

							<button type="button" class="btn btn-info" data-toggle="modal" data-target=".modal-addcustomer-info"><i class="fas fa-folder"></i> Add Customer File</button>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
							<table id="customers_table" class="table table-bordered table-hover" style="width: 100%">
			            		<thead>
			            			<tr>
			            				<th>ID</th>
			            				<th>Customer Name</th>
			            				<th>Contact Person</th>
			            				<th>Address</th>
			            				<th>Contact Number</th>
			            				<th>Email Address</th>
			            				<th>Website</th>
			            				<th>Installation Date</th>
			            				<th>Interest</th>
			            				<th>Type</th>
			            				<th>Notes</th>
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

<!-- Modal -->
<div class="modal fade modal-addcustomer-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <label style="font-size: 22px">Under operations, you can click <span class="text-success">"Add File"</span> Button</label>

        <label>The file must be:</label>
        <p>- In jpg|png|xlsx|docx|rtf|html|jpeg|pptx|ppt|doc|xlx|pdf format.</p>
        <p>- Maximum Size of 50MB per file.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success text-bold" data-dismiss="modal"><i class="fas fa-check"></i> Okay</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade modal-customerdetail-info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <label style="font-size: 22px">The customer name is linked to customer details that will open a new tab.</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success text-bold" data-dismiss="modal"><i class="fas fa-check"></i> Okay</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade modal-addcustomer-file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<div class="text-center">
      		<label style="font-size: 25px">Add a file to the customer.</label>
      	</div>
      	<?php echo form_open_multipart('CustomersController/upload_customer_file',["id" => "form-customerfileadd"]) ?>
      	<div class="form-group mt-3 text-center">
      		<label for="file_customer_id">Customer ID</label>
      		<input class="form-control text-bold text-center" type="text" name="file_customer_id" id="file_customer_id" readonly>
      	</div>

		<div class="custom-file">
			<input type="file" class="custom-file-input" name="file_customer_file" id="file_customer_file">
			<label class="custom-file-label" for="file_customer_file">Choose file</label>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>

        <button type="submit" class="btn btn-success text-bold"><i class="fas fa-upload"></i> Upload</button>
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>