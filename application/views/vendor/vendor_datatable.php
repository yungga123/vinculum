<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">List of Vendor</h1>
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
							Vendor Details
							<div class="float-right">
							<a href="<?php echo site_url('vendor-add') ?>" class="btn btn-success"> <i class="fas fa-plus"></i> ADD VENDOR</a>
							<a href="<?php echo site_url('vendor-export') ?>" class="btn btn-danger"> <i class="fas fa-excel"></i> EXPORT TO EXCEL</a>
							</div>
						</div>
						<div class="card-body">
							<div class="col-sm-12">
								<table id="vendor_table" class="table table-bordered table-hover" style="width: 100%">
				            		<thead>
				            			<tr>
											<th>ID</th>
				            				<th>Vendor Code</th>
											<th>Name</th>
											<th>Address</th>
											<th>Contact Number</th>
											<th>Contact Person</th>
											<th>Email</th>
											<th>Technical Person</th>
											<th>Technical Contact</th>	
											<th>Technical Email</th>
											<th>Supplier Ranking</th>
				            				<th>Industry Classification</th>
				            				<th>Terms and Condition</th>
											<th>Date of Partnership</th>
											<th>Bank Name</th>
											<th>Account Name</th>
											<th>Account Number</th>
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



<!-- Modal Add Vendor/Brand -->
<div class="modal fade" id="modal_add_vendor">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<?php echo form_open('VendorController/register_new_vendor',["id" => "modal-add-vendor"]) ?>
				<div class="modal-header">
					<h4 class="modal-title">Add Vendor</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<label>Vendor Details:</label>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="vendor_name" class="control-label">Name</label>
												<input type="text" id="vendor_name" name="vendor_name" class="form-control vendor_name_edit" placeholder="Enter Vendor Name">
											</div>
											<div class="form-group">
												<label for="vendor_contact" class="control-label">Contact Number</label>
												<input type="text" id="vendor_contact" name="vendor_contact" class="form-control" placeholder="Enter Vendor Contact Number">
											</div>
											<div class="form-group">
												<label for="vendor_email" class="control-label">Email Address</label>
												<input type="text" id="vendor_email" name="vendor_email" class="form-control" placeholder="Enter Vendor Email Address">
											</div>
											<div class="form-group">
												<label for="vendor_address" class="control-label">Address</label>
												<textarea type="text" rows="5" id="vendor_address" name="vendor_address" class="form-control" placeholder="Enter Vendor Address"></textarea>
											</div>
										</div>
										
										<div class="col-sm-6">
											<div class="form-group">
												<label for="vendor_contact_person" class="control-label">Contact Person</label>
												<input type="text" id="vendor_contact_person" name="vendor_contact_person" class="form-control" placeholder="Enter Vendor Contact Person">
											</div>

											<div class="form-group">
												<p>
													<label for="vendor_classification">Supplier Ranking</label>

													<select id="vendor_ranking" name="vendor_ranking" class="form-control">
														<option value="">---Please Select---</option>
														<option value="AA">AA --- Rank 1</option>
														<option value="BB">BB --- Rank 2</option>
														<option value="CC">CC --- Rank 3</option>
														<option value="DD">DD --- Rank 4</option>
														<option value="EE">EE --- Rank 5</option>
													</select>
												</p>
											</div>

											<div class="form-group">
												<p>
													<label for="vendor_classification">Industry Classification</label>

													<select id="vendor_classification" name="vendor_classification" class="form-control" value="">
														<option value="">---Please Select---</option>
														<option>Distributor</option>
														<option>Reseller</option>
														<option>SI</option>
														<option>Exclusive/Sole</option>
														<option>Partners</option>
													</select>
												</p>
											</div>

											<div class="form-group">
												<p>
													<label for="vendor_terms">Vendor Terms</label>

													<select id="vendor_terms" name="vendor_terms" class="form-control">
														<option value="">---Please Select---</option>
														<option value="00">00 --- COD/Cash</option>
														<option value="01">01 --- Dated Check</option>
														<option value="02">02 --- 7 Days</option>
														<option value="03">03 --- 15 Days</option>
														<option value="04">04 --- 30 Days</option>
														<option value="05">05 --- 45 Days</option>
														<option value="06">06 --- 60 Days</option>
														<option value="07">07 --- 90 Days</option>
													</select>
												</p>
											</div>

											<div class="form-group">
												<label for="vendor_date">Date of Partnership</label>
												<div class="input-group">
													<input class="form-control" type="date" id="vendor_date" name="vendor_date" placeholder="Select Date">
													<div id="resetDate" class="input-group-addon">
														<i class="fa fa-remove"></i>
													</div>
												</div>									      
											</div>
										</div>
									</div>
								</div>
								<hr>
								<div class="card-body">
									<div class="row">
										<div class="col-sm-12">
											<label>Vendor Technical Support Details:</label>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<label for="vendor_technical_name" class="control-label">Name</label>
												<input type="text" name="vendor_technical_name" class="form-control" placeholder="Enter Technical Name">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
													<label for="vendor_technical_contact">Contact Number</label>
													<input type="text" name="vendor_technical_contact" class="form-control" placeholder="Enter Contact Number">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label for="vendor_technical_email" class="control-label">Email Address</label>
												<input type="text" name="vendor_technical_email" class="form-control" placeholder="Enter Email Address">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="card add-brand">
								<div class="card-header">
									<label>Brand Details:</label>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="brand_name" class="control-label">Brand Name</label>
												<input type="text" name="brand_name[]" class="form-control" placeholder="Enter Brand Name">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
													<label for="brand_solutions">Solutions</label>
													<input type="text" name="brand_solutions[]" class="form-control" placeholder="Enter Solutions">
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<p>
													<label for="brand_classification">Classification Level</label>

													<select name="brand_classification[]" class="form-control" value="">
														<option value="">---Please Select---</option>
														<option>Distributor</option>
														<option>Reseller</option>
														<option>SI</option>
														<option>Exclusive/Sole</option>
														<option>Partners</option>
													</select>
												</p>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
												<label for="brand_ranking" class="control-label">Brand Ranking</label>
												<input type="text" name="brand_ranking[]" class="form-control" placeholder="Enter Ranking">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<label for="brand_contact_person" class="control-label">Contact Person</label>
												<input type="text" name="brand_contact_person[]" class="form-control" placeholder="Enter Contact Person">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label for="brand_contact_number" class="control-label">Contact Number</label>
												<input type="text" name="brand_contact_number[]" class="form-control" placeholder="Enter Contact Number">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label for="brand_email" class="control-label">Email Address</label>
												<input type="text" name="brand_email[]" class="form-control" placeholder="Enter Email Address">
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-12">
											<label>Brand Technical Support Details:</label>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<div class="form-group">
												<label for="brand_technical_name" class="control-label">Name</label>
												<input type="text" name="brand_technical_name[]" class="form-control" placeholder="Enter Technical Name">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
													<label for="brand_technical_contact">Contact Number</label>
													<input type="text" name="brand_technical_contact[]" class="form-control" placeholder="Enter Contact Number">
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<label for="brand_technical_email" class="control-label">Email Address</label>
												<input type="text" name="brand_technical_email[]" class="form-control" placeholder="Enter Email Address">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="float-right">
								<button type="button" class="btn btn-danger btn-sm delete-brand-btn"><i class="fas fa-times" aria-hidden="true"></i> DELETE FIELD</button>
								<button type="button" class="btn btn-success btn-sm add-brand-btn"><i class="fas fa-plus" aria-hidden="true"></i> ADD FIELD</button>
							</div>
						</div>
					</div>	
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success">Add Vendor</button>
				</div>
			<?php echo form_close() ?>
		</div>
	<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<!-- Modal -->
<div class="modal fade modal_view_vendor">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div id="modal_loading">

            </div>
            <div class="modal-header">
                <h5 class="modal-title"><b>Brand List</b><h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-m" id="table-brand">
                        <thead>
                            <tr>
								<th>No.</th>
                                <th>Brand Name</th>
                                <th>Products</th>
								<th>Contact Person</th>
								<th>Contact Number</th>
								<th>Email Address</th>
								<th>Technical Person</th>
								<th>Technical Contact</th>
								<th>Technical Email</th>
                                <th>Classification Level</th>
                                <th>Ranking</th>
                            </tr>
                        </thead>

                        <tbody id="tbody-brand">
							

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
<div class="modal fade" id="delete-vendor" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Delete Vendor</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <?php echo form_open('VendorController/delete_vendor',["id" => "modal-delete-vendor"]) ?>
            <div class="modal-body text-center">
                <div class="form-group">
                  <label for="vendor_id_del">Are you sure you want to delete?</label>
                  <input type="text" class="form-control col-6 offset-3 text-center text-bold" name="vendor_id_del" id="vendor_id_del" readonly>
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
