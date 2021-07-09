<?php
defined('BASEPATH') or die('Access Denied'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">List of New Clients</h1>
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
							<div class="float-right">
								<a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_add_client"> <i class="fas fa-plus"></i> Add Client </a> 
								<a href="<?php echo site_url('exportnewclientsproject') ?>" class="btn btn-danger btn-sm"> <i class="fas fa-file-excel"></i> Generate Report</a>
							</div>
						</div>

						<div class="card-body">
							<div class="col-sm-12">
								<table id="new_client_table" class="table table-bordered table-hover div-service" style="width: 100%">
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

<!-- Modal Add Client -->
<div class="modal fade" id="modal_add_client">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
		<?php echo form_open('SalesInquiryController/register_new_client',["id" => "modal-add-client"]) ?>
				<div class="modal-header">
					<h4 class="modal-title">Add Client</h4>
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
										<label for="customer_name" class="control-label">Customer Name</label>
										<input type="text" name="customer_name" class="form-control" placeholder="Enter Customer">
									</div>
									<div class="form-group">
										<label for="contact_person" class="control-label">Contact Person</label>
										<input type="text" name="contact_person" class="form-control" placeholder="Enter Contact Person">
									</div>
									<div class="form-group">
										<label for="contact_number" class="control-label">Contact Number</label>
										<input type="text" name="contact_number" class="form-control" placeholder="Enter Contact Number">
									</div>
									<div class="form-group">
										<label for="location" class="control-label">Address</label>
										<textarea class="form-control" type="text" name="location" placeholder="Enter your Full Address"></textarea>
									</div>
                                    
								</div>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
                                    <div class="form-group">
										<label for="email" class="control-label">Email Address</label>
										<input type="text" name="email" class="form-control" placeholder="Enter Email Address">
									</div>
									<div class="form-group">
										<label for="website" class="control-label">Website</label>
										<input type="text" name="website" class="form-control" placeholder="Enter Website">
									</div>

                                    <div class="form-group">
										<label for="interest">Interest</label>
										<input type="text" name="interest" class="form-control" placeholder="Enter Interest">									      
									</div>

									<div class="form-group">
										<p>
											<label for="type">Type</label>

											<select name="type" class="form-control">
												<option value="">---Please Select---</option>
												<option value="Residential">Residential</option>
												<option value="Commercial">Commercial</option>
											</select>
										</p>
									</div>

									<div class="form-group">
										<label for="notes">Notes</label>
										<div class="input-group">
											<input class="form-control" type="text" name="notes" placeholder="Enter Remarks">
										</div>									      
									</div>

								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="modal-footer float-right">
				<button type="submit" class="btn btn-success">Add Client</button>
			</div>
			<?php echo form_close() ?>
		</div>
	<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!-- Modal Edit Client -->
<div class="modal fade" id="modal_edit_client">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
		<?php echo form_open('SalesInquiryController/update_client_validate',["id" => "modal-edit-client"]) ?>
		<input type="hidden" name="client_id_edit" class="form-control client_id_edit">
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
										<label for="customer_name" class="control-label">Customer Name</label>
										<input type="text" name="customer_name" class="form-control client_name_edit" placeholder="Enter Customer">
									</div>
									<div class="form-group">
										<label for="contact_person" class="control-label">Contact Person</label>
										<input type="text" name="contact_person" class="form-control contact_person_edit" placeholder="Enter Contact Person">
									</div>
									<div class="form-group">
										<label for="contact_number" class="control-label">Contact Number</label>
										<input type="text" name="contact_number" class="form-control contact_number_edit" placeholder="Enter Contact Number">
									</div>
									<div class="form-group">
										<label for="location" class="control-label">Address</label>
										<textarea class="form-control location_edit" type="text" name="location" placeholder="Enter your Full Address"></textarea>
									</div>
                                    
								</div>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
                                    <div class="form-group">
										<label for="email" class="control-label">Email Address</label>
										<input type="text" name="email" class="form-control email_add_edit" placeholder="Enter Email Address">
									</div>
									<div class="form-group">
										<label for="website" class="control-label">Website</label>
										<input type="text" name="website" class="form-control website_edit" placeholder="Enter Website">
									</div>

                                    <div class="form-group">
										<label for="interest">Interest</label>
										<input type="text" name="interest" class="form-control interest_edit" placeholder="Enter Interest">									      
									</div>

									<div class="form-group">
										<p>
											<label for="type">Type</label>

											<select name="type" class="form-control type_edit">
												<option value="">---Please Select---</option>
												<option value="Residential">Residential</option>
												<option value="Commercial">Commercial</option>
											</select>
										</p>
									</div>

									<div class="form-group">
										<label for="notes">Notes</label>
										<div class="input-group">
											<input class="form-control notes_edit" type="text" name="notes" placeholder="Enter Remarks">
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
<div class="modal fade" id="delete-tempo-client" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Delete Client</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <?php echo form_open('SalesInquiryController/delete_client',["id" => "modal-delete-client"]) ?>
            <div class="modal-body text-center">
                <div class="form-group">
                  <label for="client_id_del">Are you sure you want to delete this Client?</label>
                  <input type="text" class="form-control col-6 offset-3 text-center text-bold" name="client_id_del" id="client_id_del" readonly>
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