<?php
defined('BASEPATH') or die('Access Denied');

$data = array();

foreach ($project_details as $row) {
	$data = [
		'project_name' => $row->name,
		'project_description' => $row->description,
		'date_requested' => $row->date_requested,
		'date_implemented' => $row->date_implemented,
		'date_finished' => $row->date_finished
	];
}

?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Update Project Report</h1>
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
									<?php echo form_open('ProjectReportController/projectReportUpdateValidate',["id" => "form-update-projectreport"]) ?>
									<!-- Project Information -->
									<div class="card">
										<input type="hidden" name="project_id" value="<?php echo $this->uri->segment(2) ?>">
										<div class="card-header text-center">
											<label>Project Information</label>
										</div>

										<div class="card-body">

											<div class="row">
												
												<div class="col-sm-6">
													<div class="form-group">
														<label for="project_name">Project Name</label>
														<input class="form-control" type="text" name="project_name" id="project_name" value="<?php echo $data['project_name'] ?>">
													</div>

													<div class="form-group">
														<label for="project_description">Project Description</label>
														<input class="form-control" type="text" name="project_description" id="project_description" value="<?php echo $data['project_description'] ?>">
													</div>
												</div>

												<div class="col-sm-6">
													
													<div class="form-group">
														<label for="date_requested">Date Requested</label>
														<input class="form-control" type="date" name="date_requested" id="date_requested" value="<?php echo $data['date_requested'] ?>">
													</div>

													<div class="form-group">
														<label for="date_implemented">Date Implemented</label>
														<input class="form-control" type="date" name="date_implemented" id="date_implemented" value="<?php echo $data['date_implemented'] ?>">
													</div>

													<div class="form-group">
														<label for="date_finished">Date Finsihed</label>
														<input class="form-control" type="date" name="date_finished" id="date_finished" value="<?php echo $data['date_finished'] ?>">
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
											<?php foreach ($petty_cash as $row): ?>
											<input type="text" name="petty_id[]" value="<?php echo $row->id ?>">
											<div class="row add-petty">
												<div class="col-sm-6">
													<div class="form-group">
														<label for="petty_cash">Petty Cash</label>
														<input class="form-control" type="text" name="petty_cash[]" value="<?php echo $row->petty_cash ?>">
													</div>
												</div>

												<div class="col-sm-3">

													<div class="form-group">
														<label for="petty_cash_date">Date</label>
														<input class="form-control" type="date" name="petty_cash_date[]" value="<?php echo $row->date ?>">
													</div>
													
												</div>

												<div class="col-sm-3">

													<div class="form-group">
														<label for="petty_cash_remarks">Remarks</label>
														<input class="form-control" type="text" name="petty_cash_remarks[]" value="<?php echo $row->remarks ?>">
													</div>
													
												</div>
											</div>
											<?php endforeach ?>
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
											<?php foreach ($transpo as $row): ?>
											<div class="row add-transpo">

												<div class="col-sm-6">
													
													<div class="form-group">
														<label for="transpo">Transpo</label>
														<input class="form-control" type="text" name="transpo[]" value="<?php echo $row->transpo ?>">
													</div>

												</div>

												<div class="col-sm-3">

													<div class="form-group">
														<label for="transpo_date">Date</label>
														<input class="form-control" type="date" name="transpo_date[]" value="<?php echo $row->date ?>">
													</div>

												</div>

												<div class="col-sm-3">
													
													<div class="form-group">
														<label for="transpo_remarks">Remarks</label>
														<input class="form-control" type="text" name="transpo_remarks[]" value="<?php echo $row->remarks ?>">
													</div>

												</div>
											</div>
											<?php endforeach ?>
											


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
											<?php foreach ($indirect_items as $row): ?>
											<div class="row add-indirect">
												<div class="col-sm-3">
													
													<div class="form-group">
														<label for="indirect_item">Indirect Item</label>
														<input class="form-control" type="text" name="indirect_item[]" value="<?php echo $row->indirect_item ?>">
													</div>

												</div>

												<div class="col-sm-1">
													
													<div class="form-group">
														<label for="indirect_item_quantity">Quantity</label>
														<input class="form-control" type="text" name="indirect_item_quantity[]" value="<?php echo $row->qty ?>">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="indirect_item_amount">Amount</label>
														<input class="form-control" type="text" name="indirect_item_amount[]" value="<?php echo $row->amt ?>">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="indirect_item_consumed">Consumed</label>
														<input class="form-control" type="text" name="indirect_item_consumed[]" value="<?php echo $row->consumed ?>">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="indirect_item_returns">Return</label>
														<input class="form-control" type="text" name="indirect_item_returns[]" value="<?php echo $row->returns ?>">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="indirect_item_remarks">Remarks</label>
														<input class="form-control" type="text" name="indirect_item_remarks[]" value="<?php echo $row->remarks ?>">
													</div>

												</div>
											</div>
											<?php endforeach ?>
											
											
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
											<?php foreach ($direct_items as $row): ?>
											<div class="row add-direct">
												<div class="col-sm-3">
													
													<div class="form-group">
														<label for="direct_item">Direct Item</label>
														<input class="form-control" type="text" name="direct_item[]" value="<?php echo $row->direct_item ?>">
													</div>

												</div>

												<div class="col-sm-1">
													
													<div class="form-group">
														<label for="direct_item_quantity">Quantity</label>
														<input class="form-control" type="text" name="direct_item_quantity[]" value="<?php echo $row->qty ?>">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="direct_item_amount">Amount</label>
														<input class="form-control" type="text" name="direct_item_amount[]" value="<?php echo  $row->amt ?>">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="direct_item_consumed">Consumed</label>
														<input class="form-control" type="text" name="direct_item_consumed[]" value="<?php echo $row->consumed ?>">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="direct_item_returns">Return</label>
														<input class="form-control" type="text" name="direct_item_returns[]" value="<?php echo $row->returns ?>">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="direct_item_remarks">Remarks</label>
														<input class="form-control" type="text" name="direct_item_remarks[]" value="<?php echo $row->remarks ?>">
													</div>

												</div>
											</div>	
											<?php endforeach ?>
											
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
											<?php foreach ($tools_rqstd as $row): ?>
											<div class="row add-tool-rqstd">
												<div class="col-sm-6">
													
													<div class="form-group">
														<label for="tool_requested">Tool Requested</label>
														<input class="form-control" type="text" name="tool_requested[]" value="<?php echo $row->tool_rqstd ?>">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="tool_requested_quantity">Quantity</label>
														<input class="form-control" type="text" name="tool_requested_quantity[]" value="<?php echo $row->qty ?>">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="tool_requested_return">Return</label>
														<input class="form-control" type="text" name="tool_requested_return[]" value="<?php echo $row->returns ?>">
													</div>

												</div>

												<div class="col-sm-2">
													
													<div class="form-group">
														<label for="tool_requested_remarks">Remarks</label>
														<input class="form-control" type="text" name="tool_requested_remarks[]" value="<?php echo $row->remarks ?>">
													</div>

												</div>
											</div>
											<?php endforeach ?>
											
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
													<?php foreach ($assigned_it as $row): ?>
													<div class="form-group add-assignedit">
														<label for="assigned_it">Assigned IT</label>
														<input class="form-control" type="text" name="assigned_it[]" value="<?php echo $row->assigned_it ?>">
													</div>
													<?php endforeach ?>
													
														
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
													<?php foreach ($assigned_tech as $row): ?>
													<div class="form-group add-assignedtech">
														<label for="assigned_tech">Assigned Technician</label>
														<input class="form-control" type="text" name="assigned_tech[]" value="<?php echo $row->assigned_tech ?>">
													</div>
													<?php endforeach ?>
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
							<button type="submit" class="btn btn-success text-bold float-right"><i class="fas fa-check"></i> CONFIRM</button>
						</div>
						<?php echo form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>