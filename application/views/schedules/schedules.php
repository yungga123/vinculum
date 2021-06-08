<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Schedules</h1>
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
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<label>Calendar Menu</label>
								</div>
								<div class="card-body">
									<button class="btn btn-block btn-success text-bold" data-toggle="modal" data-target=".add-schedule"><i class="fas fa-plus"></i> ADD SCHEDULE</button>
									<button class="btn btn-block btn-warning text-bold" data-toggle="modal" data-target=".update-schedule-info"><i class="fas fa-edit"></i> UPDATE SCHEDULE</button>
									<button class="btn btn-block btn-danger text-bold" data-toggle="modal" data-target=".delete-schedule-info"><i class="fas fa-trash"></i> DELETE SCHEDULE</button>
								</div>
								<div class="card-footer">
									<a href="<?php echo site_url('schedules') ?>" class="btn btn-block btn-primary text-bold"><i class="fas fa-redo"></i> REFRESH SCHEDULE</a>

									<button class="btn btn-primary btn-block text-bold" data-toggle="modal" data-target=".schedule-today-info">SCHEDULES TODAY</button>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<label>LEGEND</label>
								</div>

								<div class="card-body text-center">
									<div class="bg-primary color-palette"><span>Installation</span></div>
									<div class="bg-warning color-palette"><span>Services</span></div>
									<div class="bg-danger color-palette"><span>Payables</span></div>
									<div class="bg-success color-palette"><span>Holiday/Event</span></div>
									<div class="bg-secondary color-palette"><span>Meetings</span></div>

								</div>
							</div>
						</div>
					</div>
					
				</div>
				<div class="col-sm-9">
					<div class="card">
						<div class="card-header">
							<label>Schedule Calendar</label>
						</div>

						<div class="card-body">
							<div id="calendar"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<!-- Modal for Add Schedule -->
<div class="modal fade add-schedule" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<label>ADD SCHEDULE</label>
			</div>

			<div class="modal-body">
				<?php echo form_open('SchedulesController/addEventValidate',["id" => "form-add-event"]) ?>
				<div class="form-group">
					<label for="event_title">Title</label>
					<input class="form-control" type="text" name="event_title" id="event_title">
				</div>

				<div class="form-group">
					<label for="event_daterange">Date Range</label>
					<input class="form-control" type="text" name="event_daterange" id="event_daterange" readonly>
					<input type="hidden" name="event_sd" id="event_sd" value="<?php echo date('Y-m-d 00:00:00') ?>">
					<input type="hidden" name="event_ed" id="event_ed" value="<?php echo date('Y-m-d 23:59:00') ?>">
				</div>

				<div class="form-group">
					<label for="event_desc">Description</label>
					<textarea class="form-control" name="event_desc" id="event_desc" rows="9"></textarea>
				</div>

				<div class="form-group">
					<label for="event_type">Schedule Type</label>
					<select class="form-control" name="event_type" id="event_type">
						<option value="">--- Please Select ---</option>
						<option value="installation">Installation</option>
						<option value="service">Service</option>
						<option value="payables">Payables/Bills</option>
						<option value="holiday">Holiday/event</option>
						<option value="meeting">Meeting</option>
					</select>
				</div>
				
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary text-bold" data-dismiss="modal">CLOSE</button>
				<button type="submit" class="btn btn-success text-bold submit-button">CONFIRM</button>
			</div>
			<?php echo form_close() ?>
		</div>
	</div>
</div>

<!-- Modal for Update Schedule -->
<div class="modal fade update-schedule" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<label>UPDATE SCHEDULE</label>
			</div>
			<?php echo form_open('SchedulesController/updateEventValidate',["id" => "form-update-event"]) ?>
			<div class="modal-body">
				<input type="hidden" name="event_id_edit" id="event_id_edit">
				<div class="form-group">
					<label for="event_title_edit">Title</label>
					<input class="form-control" type="text" name="event_title_edit" id="event_title_edit">
				</div>

				<div class="form-group">
					<label for="event_daterange_edit">Date Range</label>
					<input class="form-control" type="text" name="event_daterange_edit" id="event_daterange_edit" readonly>
					<input type="hidden" name="event_sd_edit" id="event_sd_edit">
					<input type="hidden" name="event_ed_edit" id="event_ed_edit">
				</div>

				<div class="form-group">
					<label for="event_desc_edit">Description</label>
					<textarea class="form-control" name="event_desc_edit" id="event_desc_edit" rows="9"></textarea>
				</div>

				<div class="form-group">
					<label for="event_type_edit">Schedule Type</label>
					<select class="form-control" name="event_type_edit" id="event_type_edit">
						<option value="">--- Please Select ---</option>
						<option value="installation">Installation</option>
						<option value="service">Service</option>
						<option value="payables">Payables/Bills</option>
						<option value="holiday">Holiday</option>
						<option value="meeting">Meeting</option>
					</select>
				</div>

				<div class="form-group mt-4">
	                <div class="custom-control custom-checkbox">
	                  <input class="custom-control-input" type="checkbox" name="delete_event_check" id="delete_event_check" value="1">
	                  <label for="delete_event_check" class="custom-control-label">DELETE EVENT</label>
	                </div>
	            </div>
				
			</div>

			<div class="modal-footer">
				
				<button type="button" class="btn btn-secondary text-bold" data-dismiss="modal">CLOSE</button>
				<button type="submit" class="btn btn-success text-bold">CONFIRM</button>
			</div>
			<?php echo form_close() ?>
		</div>
	</div>
</div>

<!-- Modal for Update Schedule -->
<div class="modal fade update-schedule-info" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-body">
				
				<label style="font-size: 25px">To update a schedule, you can click on a corresponding item in the calendar.</label>
				
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-success text-bold" data-dismiss="modal"><i class="fas fa-check"></i> OKAY</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal for Delete Schedule -->
<div class="modal fade delete-schedule-info" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-body">
				
				<label style="font-size: 25px">To delete a schedule, you can click on a corresponding item in the calendar.</label>
				
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-success text-bold" data-dismiss="modal"><i class="fas fa-check"></i> OKAY</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal for Delete Schedule -->
<div class="modal fade schedule-today-info" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<label>SCHEDULES FOR TODAY</label>
			</div>

			<div class="modal-body">
				
				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-3">
								<div class="card">
									<div class="card-header">
										<label>LEGEND</label>
									</div>

									<div class="card-body text-center">
										<div class="bg-primary color-palette"><span>Installation</span></div>
										<div class="bg-warning color-palette"><span>Services</span></div>
										<div class="bg-danger color-palette"><span>Payables</span></div>
										<div class="bg-success color-palette"><span>Holiday/Event</span></div>
										<div class="bg-secondary color-palette"><span>Meeting</span></div>

									</div>
								</div>
							</div>

							<div class="col-sm-9">
								<div class="card">
									<div class="card-header">
										<label>Schedules table</label>
									</div>

									<div class="card-body table-responsive p-0">
										<table class="table table-sm table-bordered">
											<thead>
												<tr>
													<th>Title</th>
													<th>Description</th>
													<th>Start Date</th>
													<th>End Date</th>
												</tr>
											</thead>

											<tbody>

												<?php if (count($results_today_event) > 0): ?>

													<?php foreach ($results_today_event as $row): ?>
														<tr class="<?php
														 	if($row->type == 'installation'){
														 		echo 'bg-primary';
														 	} else if ($row->type == 'service') {
														 		echo 'bg-warning';
														 	} else if ($row->type == 'payables') {
														 		echo 'bg-danger';
														 	} else if ($row->type == 'holiday') {
														 		echo 'bg-success';
														 	} else if ($row->type == 'meeting') {
																echo 'bg-secondary';
															}

														 ?>">
														<td><?php echo $row->title ?></td>
														<td><?php echo str_replace("\n", "<br>", $row->description) ?></td>
														<td><?php echo date_format(date_create($row->start),'M d, Y h:i A') ?></td>
														<td><?php echo date_format(date_create($row->end),'M d, Y h:i A') ?></td>
													</tr>
													<?php endforeach ?>

												<?php else : ?>
													<tr>
														<td class="text-center text-bold text-danger" colspan="4">NO SCHEDULES FOR TODAY</td>
													</tr>
												<?php endif ?>

												
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-success text-bold" data-dismiss="modal"><i class="fas fa-check"></i> OKAY</button>
			</div>
		</div>
	</div>
</div>
