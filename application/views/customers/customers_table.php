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
				<div class="col-sm-3">
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<p style="font-weight: bold;">Menu Selection</p>
								</div>
								<div class="card-body">

									<a href="<?php echo site_url('customers-print') ?>" class="btn btn-primary btn-block text-bold" target="_blank"><i class="fas fa-print"></i> PRINT CUSTOMER DATABASE</a>

									<button type="button" class="btn btn-warning btn-block text-bold" data-toggle="modal" data-target=".modal-customerdetail-info"><i class="fas fa-print"></i> PRINT CUSTOMER DETAILS</button>

									<a href="<?php echo site_url('exportcustomers') ?>" class="btn btn-success btn-block text-bold"><i class="fas fa-file-excel"></i> EXPORT TO EXCEL</a>

									<button type="button" class="btn btn-info btn-block text-bold" data-toggle="modal" data-target=".modal-addcustomer-info"><i class="fas fa-folder"></i> ADD CUSTOMER FILE</button>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<label>Customer Adding</label>
								</div>

								<div class="card-body">
									<a href="<?php echo site_url('customers-add') ?>" class="btn btn-success btn-block text-bold"><i class="fas fa-plus"></i> ADD CUSTOMER</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-9">
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
				<?php echo form_open_multipart('CustomersController/upload_customer_file', ["id" => "form-customerfileadd"]) ?>
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

<!-- Modal for Delete-->
<div class="modal fade modal-deletecustomer" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Delete Client</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('CustomersController/delete_client', ["id" => "modal-delete-client"]) ?>
            <div class="modal-body text-center">
                <div class="form-group">
                    <label for="po_id_del">Are you sure you want to delete?</label>
                    <input type="text" class="form-control col-6 offset-3 text-center text-bold" name="client_del_id" id="client_del_id" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> NO</button>
                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> YES</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade modal_view_project">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div id="modal_loading">

			</div>
			<div class="modal-header">
				<h5 class="modal-title"><b>Project List</b>
					<h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-bordered table-xl" id="table-project">
						<thead>
							<tr>
								<th>No.</th>
								<th>Project Type</th>
								<th>Status</th>
								<th>Sales Incharge</th>
								<th>Branch</th>
								<th>Task</th>
								<th>Date of Task</th>
								<th>Project Details</th>
								<th>Project Amount</th>
								<th>Quotation Reference</th>
							</tr>
						</thead>

						<tbody id="tbody-project">


						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success text-bold" data-dismiss="modal"><i class="fas fa-check"></i> OKAY</button>
			</div>
		</div>
	</div>
</div>