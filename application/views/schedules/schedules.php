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
									<button class="btn btn-block btn-warning text-bold" data-toggle="modal" data-target=".update-schedule"><i class="fas fa-edit"></i> UPDATE SCHEDULE</button>
									<button class="btn btn-block btn-danger text-bold" data-toggle="modal" data-target=".delete-schedule"><i class="fas fa-trash"></i> DELETE SCHEDULE</button>
								</div>
								<div class="card-footer">
									<a href="<?php echo site_url('schedules') ?>" class="btn btn-block btn-primary text-bold"><i class="fas fa-redo"></i> REFRESH SCHEDULE</a>
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
									<div class="bg-success color-palette"><span>Holiday</span></div>

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
					<input type="hidden" name="event_sd" id="event_sd">
					<input type="hidden" name="event_ed" id="event_ed">
				</div>

				<div class="form-group">
					<label for="event_desc">Description</label>
					<input class="form-control" type="text" name="event_desc" id="event_desc">
				</div>

				<div class="form-group">
					<label for="event_type">Schedule Type</label>
					<select class="form-control" name="event_type" id="event_type">
						<option value="">--- Please Select ---</option>
						<option value="installation">Installation</option>
						<option value="service">Service</option>
						<option value="payables">Payables/Bills</option>
						<option value="holiday">Holiday</option>
					</select>
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
<div class="modal fade update-schedule" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
<div class="modal fade delete-schedule" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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