<?php
defined('BASEPATH') or die('Access Denied');

date_default_timezone_set('Asia/Manila');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Project Report</h1>
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
							<label>Project Report Information</label>
						</div>

						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">

									<?php echo form_open('ProjectReportController/addProjReportValidate',["id" => "form-add-projectreport"]) ?>

									<!-- Project Information -->
									<div class="card">

										<div class="card-header text-center">
											<label>Project Information</label>
										</div>

										<div class="card-body">

											<div class="row">
												
												<div class="col-sm-6">
													<div class="form-group">
														<label for="project_name">Project Name</label>
														<input class="form-control" type="text" name="project_name" id="project_name">
													</div>

													<div class="form-group">
														<label for="project_description">Project Description</label>
														<input class="form-control" type="text" name="project_description" id="project_description">
													</div>
												</div>

												<div class="col-sm-6">
													
													<div class="form-group">
														<label for="date_requested">Date Requested</label>
														<input class="form-control" type="date" name="date_requested" id="date_requested">
													</div>

													<div class="form-group">
														<label for="date_implemented">Date Implemented</label>
														<input class="form-control" type="date" name="date_implemented" id="date_implemented">
													</div>

													<div class="form-group">
														<label for="date_finished">Date Finsihed</label>
														<input class="form-control" type="date" name="date_finished" id="date_finished" value="<?php echo date('') ?>">
													</div>

												</div>

											</div>

										</div>
									</div>
									<!-- End of Project Information -->

									<!-- Petty Cash Information -->
									<div class="card">
										<div class="card-header text-center">
											<label>Petty Cash Information</label>
										</div>

										<div class="card-body">
											<div class="row add-petty">
												<div class="col-sm-6">
													<div class="form-group">
														<label for="petty_cash">Petty Cash</label>
														<input class="form-control" type="text" name="petty_cash[]">
													</div>
												</div>

												<div class="col-sm-3">

													<div class="form-group">
														<label for="petty_cash_date">Date</label>
														<input class="form-control" type="date" name="petty_cash_date[]">
													</div>
													
												</div>

												<div class="col-sm-3">

													<div class="form-group">
														<label for="petty_cash_remarks">Remarks</label>
														<input class="form-control" type="text" name="petty_cash_remarks[]">
													</div>
													
												</div>
											</div>
											
										</div>

										<div class="card-footer">
											<div class="float-right">
												<button type="button" class="btn btn-sm btn-danger text-bold delete-petty-btn">DELETE INPUT</button>
												<button type="button" class="btn btn-sm btn-success text-bold add-petty-btn">ADD INPUT</button>
											</div>
											
										</div>
									</div>
									<!-- End of Cash Information -->

									<!-- Transpo Information -->
									<div class="card">
										<div class="card-header text-center">
											<label>Transpo Information</label>
										</div>

										<div class="card-body">
											<div class="row add-transpo">

												<div class="col-sm-6">
													
													<div class="form-group">
														<label for="transpo">Transpo</label>
														<input class="form-control" type="text" name="transpo[]">
													</div>

												</div>

												<div class="col-sm-3">

													<div class="form-group">
														<label for="transpo_date">Date</label>
														<input class="form-control" type="date" name="transpo_date[]">
													</div>

												</div>

												<div class="col-sm-3">
													
													<div class="form-group">
														<label for="transpo_remarks">Remarks</label>
														<input class="form-control" type="text" name="transpo_remarks[]">
													</div>

												</div>

											</div>


										</div>

										<div class="card-footer">
											<div class="float-right">
												<button type="button" class="btn btn-sm btn-danger text-bold delete-transpo-btn">DELETE INPUT</button>
												<button type="button" class="btn btn-sm btn-success text-bold add-transpo-btn">ADD INPUT</button>
											</div>
										</div>
									</div>
									<!-- End of Transpo Information -->

									<!-- Indirect Item Information -->
									<div class="card">
										<div class="card-header text-center">
											<label>Indirect Item Information</label>
										</div>

										<div class="card-body">

											<div class="row add-indirect">
												<div class="col-sm-3">
													
													<div class="form-group">
														<label for="indirect_item">Indirect Item</label>
														<input class="form-control" type="text" name="indirect_item[]">
													</div>

												</div>

												<div class="col-sm-1">
													
													<div class="form-group">
														<label for="indirect_item_quantity">Quantity</label>
														<input class="form-control" type="text" name="indirect_item_quantity[]">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="indirect_item_amount">Amount</label>
														<input class="form-control" type="text" name="indirect_item_amount[]">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="indirect_item_consumed">Consumed</label>
														<input class="form-control" type="text" name="indirect_item_consumed[]">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="indirect_item_returns">Return</label>
														<input class="form-control" type="text" name="indirect_item_returns[]">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="indirect_item_remarks">Remarks</label>
														<input class="form-control" type="text" name="indirect_item_remarks[]">
													</div>

												</div>
											</div>
											
										</div>

										<div class="card-footer">
											<div class="float-right">
												<button type="button" class="btn btn-sm btn-danger text-bold delete-indirect-btn">DELETE INPUT</button>
												<button type="button" class="btn btn-sm btn-success text-bold add-indirect-btn">ADD INPUT</button>
											</div>
											
										</div>
									</div>
									<!-- End of Indirect Item Information -->

									<!-- Direct Item Information -->
									<div class="card">
										<div class="card-header text-center">
											<label>
												Direct Item Information
											</label>
										</div>

										<div class="card-body">
											<div class="row add-direct">
												<div class="col-sm-3">
													
													<div class="form-group">
														<label for="direct_item">Direct Item</label>
														<input class="form-control" type="text" name="direct_item[]">
													</div>

												</div>

												<div class="col-sm-1">
													
													<div class="form-group">
														<label for="direct_item_quantity">Quantity</label>
														<input class="form-control" type="text" name="direct_item_quantity[]">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="direct_item_amount">Amount</label>
														<input class="form-control" type="text" name="direct_item_amount[]">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="direct_item_consumed">Consumed</label>
														<input class="form-control" type="text" name="direct_item_consumed[]">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="direct_item_returns">Return</label>
														<input class="form-control" type="text" name="direct_item_returns[]">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="direct_item_remarks">Remarks</label>
														<input class="form-control" type="text" name="direct_item_remarks[]">
													</div>

												</div>
											</div>
										</div>

										<div class="card-footer">
											<div class="float-right">
												<button type="button" class="btn btn-sm btn-danger text-bold delete-direct-btn">DELETE INPUT</button>
												<button type="button" class="btn btn-sm btn-success text-bold add-direct-btn">ADD INPUT</button>
											</div>
											
										</div>
									</div>
									<!-- End of Direct Item Information -->

									<!-- Tools Requested and Issued -->
									<div class="card">
										<div class="card-header text-center">
											<label>
												Tools Requested and Issued
											</label>
										</div>

										<div class="card-body">
											<div class="row add-tool-rqstd">
												<div class="col-sm-6">
													
													<div class="form-group">
														<label for="tool_requested">Tool Requested</label>
														<input class="form-control" type="text" name="tool_requested[]">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="tool_requested_quantity">Quantity</label>
														<input class="form-control" type="text" name="tool_requested_quantity[]">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="tool_requested_return">Return</label>
														<input class="form-control" type="text" name="tool_requested_return[]">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="tool_requested_remarks">Remarks</label>
														<input class="form-control" type="text" name="tool_requested_remarks[]">
													</div>

												</div>


											</div>
										</div>

										<div class="card-footer">
											<div class="float-right">
												<button type="button" class="btn btn-sm btn-danger text-bold delete-tool-rqstd-btn">DELETE INPUT</button>
												<button type="button" class="btn btn-sm btn-success text-bold add-tool-rqstd-btn">ADD INPUT</button>
											</div>
											
										</div>
									</div>
									<!-- End of Tools Requested and Issued -->

									<!-- Assigned Personnels -->
									<div class="row">
										<div class="col-sm-6">
											<div class="card">
												<div class="card-header text-center">
													<label>Assigned IT</label>
												</div>

												<div class="card-body">

													<div class="form-group add-assignedit">
														<label for="assigned_it">Assigned IT</label>
														<input class="form-control" type="text" name="assigned_it[]">
													</div>
														
												</div>

												<div class="card-footer">
													<div class="float-right">
														<button type="button" class="btn btn-sm btn-danger text-bold delete-assignedit-btn">DELETE INPUT</button>
														<button type="button" class="btn btn-sm btn-success text-bold add-assignedit-btn">ADD INPUT</button>
													</div>
												</div>
											</div>
										</div>

										<div class="col-sm-6">
											<div class="card">
												<div class="card-header text-center">
													<label>Assigned Technician</label>
												</div>

												<div class="card-body">

													<div class="form-group add-assignedtech">
														<label for="assigned_tech">Assigned Technician</label>
														<input class="form-control" type="text" name="assigned_tech[]">
													</div>
													
												</div>

												<div class="card-footer">
													<div class="float-right">
														<button type="button" class="btn btn-sm btn-danger text-bold delete-assignedtech-btn">DELETE INPUT</button>
														<button type="button" class="btn btn-sm btn-success text-bold add-assignedtech-btn">ADD INPUT</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- End of Assigned Personnels -->

								</div>
							</div>
						</div>

						<div class="card-footer">
							<button type="submit" class="btn btn-success text-bold float-right projectadd-submit"><i class="fas fa-check"></i> CONFIRM</button>

						</div>

						<?php echo form_close() ?>	
					</div>
				</div>
			</div>
		</div>
	</section>

</div>

<div class="modal fade loading-projectadd">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body text-center">
				<div class="d-flex justify-content-center mt-4">
					<div class="spinner-border" role="status">
						<span class="sr-only">Loading...</span>
					</div>
				</div>
				<br>
				<label style="font-size: 28px;" class="text-success">LOADING... PLEASE WAIT...</label>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
  <!-- /.modal -->