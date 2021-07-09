<?php
defined('BASEPATH') or die('Access Denied'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">List of Existing Clients</h1>
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
							Clients Table
							<!--
								<div class="float-right">
								<a href="<?php echo site_url('exportexistingclientsproject/') ?>" class="btn btn-danger btn-sm"> <i class="fas fa-file-excel"></i> Generate Report</a>
								</div>
							-->
                        </div>

						<div class="card-body">
							<div class="col-sm-12">
								<table id="existing_client_table" class="table table-bordered table-hover div-service" style="width: 100%">
				            		<thead>
				            			<tr>
				            				<th>ID</th>
											<th>Customer Name</th>
											<th>Contact Person</th>
											<th>Contact Number</th>
											<th>Email</th>
				            				<th>Location</th>
                                            <th>Website</th>
                                            <th>Interest</th>
                                            <th>Type</th>
                                            <th>Notes</th>
                                            <th>Installation Date</th>
                                            <th>Operation</th>
				            			</tr>
				            		</thead>
			            		</table>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- Modal Edit Client -->
<div class="modal fade" id="modal_edit_existing_client">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
		<?php echo form_open('SalesInquiryController/update_existing_client_validate',["id" => "modal-edit-existing-client"]) ?>
		<input type="hidden" name="existing_client_id_edit" id="existing_client_id_edit" class="form-control existing_client_id_edit">
				<div class="modal-header">
					<h4 class="modal-title">Edit Client</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<div class="form-group">
										<label for="existing_customer_name" class="control-label">Customer Name</label>
										<input type="text" name="existing_customer_name" class="form-control existing_client_name_edit" placeholder="Enter Customer">
									</div>
									<div class="form-group">
										<label for="existing_contact_person" class="control-label">Contact Person</label>
										<input type="text" name="existing_contact_person" class="form-control existing_contact_person_edit" placeholder="Enter Contact Person">
									</div>
									<div class="form-group">
										<label for="existing_contact_number" class="control-label">Contact Number</label>
										<input type="text" name="existing_contact_number" class="form-control existing_contact_number_edit" placeholder="Enter Contact Number">
									</div>
                                    <div class="form-group">
										<label for="existing_client_email" class="control-label">Email Address</label>
										<input type="text" name="existing_client_email" class="form-control existing_email_add_edit" placeholder="Enter Email Address">
									</div>
									<div class="form-group">
										<label for="existing_location" class="control-label">Address</label>
										<textarea class="form-control existing_location_edit" type="text" name="existing_location" placeholder="Enter your Full Address"></textarea>
									</div>
                                    
								</div>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
                                    <div class="form-group">
										<label for="existing_client_installationdate" class="control-label">Installation Date</label>
                                        <input class="form-control existing_website_edit" type="date" name="existing_client_installationdate" placeholder="Select Date">
                                    </div>
									<div class="form-group">
										<label for="existing_client_website" class="control-label">Website</label>
										<input type="text" name="existing_client_website" class="form-control existing_website_edit" placeholder="Enter Website">
									</div>

                                    <div class="form-group">
										<label for="existing_client_interest">Interest</label>
										<input type="text" name="existing_client_interest" class="form-control existing_interest_edit" placeholder="Enter Interest">									      
									</div>

									<div class="form-group">
										<p>
											<label for="existing_client_type">Type</label>

											<select name="existing_client_type" class="form-control existing_type_edit">
												<option value="">---Please Select---</option>
												<option value="Residential">Residential</option>
												<option value="Commercial">Commercial</option>
											</select>
										</p>
									</div>

									<div class="form-group">
										<label for="existing_client_notes">Notes</label>
										<div class="input-group">
											<input class="form-control existing_notes_edit" type="text" name="existing_client_notes" placeholder="Enter Remarks">
										</div>									      
									</div>

								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer float-right">
				<button type="submit" class="btn btn-success">Update Client</button>
			</div>
			<?php echo form_close() ?>
		</div>
	<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!-- Modal -->
<div class="modal fade modal_view_project">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div id="modal_loading">

            </div>
            <div class="modal-header">
                <h5 class="modal-title"><b>Project List</b><h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="table-project">
                        <thead>
                            <tr>
								<th>No.</th>
                                <th>Project Type</th>
                                <th>Status</th>
                                <th>Sales Incharge</th>
								<th>Branch</th>
                                <th>Operation</th>
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


<!-- Modal for Delete-->
<div class="modal fade" id="delete-existing-client" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Delete Client</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <?php echo form_open('SalesInquiryController/delete_existing_client',["id" => "modal-delete-existing-client"]) ?>
            <div class="modal-body text-center">
                <div class="form-group">
                  <label for="existing_client_id_del">Are you sure you want to delete this Client?</label>
                  <input type="text" class="form-control col-6 offset-3 text-center text-bold" name="existing_client_id_del" id="existing_client_id_del" readonly>
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

<!-- Modal for Approved-->
<div class="modal fade" id="approved-tempo-client" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Approved Client</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <?php echo form_open('SalesInquiryController/approved_client',["id" => "modal-approved-client"]) ?>
            <div class="modal-body text-center">
                <div class="form-group">
                  <label for="client_id_approved">Are you sure you want to Approved this Client ?</label>
                  <input type="text" class="form-control col-6 offset-3 text-center text-bold" name="client_id_approved" id="client_id_approved" readonly>
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