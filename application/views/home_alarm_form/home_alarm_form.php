<?php
defined('BASEPATH') or die('Access Denied');
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/fontawesome-free/css/all.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/jqvmap/jqvmap.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/select2/css/select2.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/summernote/summernote-bs4.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
	<!-- DataTables Responsive -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<!-- Toastr -->
	<link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/toastr/toastr.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>

	<div class="container-fluid">
		<div class="row mt-4 mb-2 align-items-center">
			<div class="col-sm-8 offset-sm-2">
				<div class="card card-success">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-4 text-center">
								<img src="<?php echo base_url('assets/images/vinculumnew.jpg') ?>" alt="vcm-logo" class="img-thumbnail">
							</div>
							<div class="col-sm-8 text-center">
								<h1 class="text-bold mt-4">Assessment Form</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-8 offset-sm-2">
				<div class="card card-primary">
					<div class="card-header">
						<b>PERSONAL INFORMATION</b>
					</div>
					<?php echo form_open('HomeAlarmFormController/add_home_alarm_validate',["id" => "form-add-homealarm"]) ?>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label for="first_name">First Name</label>
									<input style="text-transform: uppercase;" type="text" class="form-control form-control-sm" name="first_name" id="first_name" placeholder="Input your first name.">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="middle_name">Middle Name</label>
									<input style="text-transform: uppercase;" type="text" class="form-control form-control-sm" name="middle_name" id="middle_name" placeholder="Input your middle name.">
								</div>
							</div>
							<div class="col-sm-4">
							
								<div class="form-group">
									<label for="last_name">Last Name</label>
									<input style="text-transform: uppercase;" type="text" class="form-control form-control-sm" name="last_name" id="last_name" placeholder="Input your last name.">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Birthdate</label>
									<div class="row">
										<div class="col-sm">
											<select class="form-control form-control-sm" name="bdate_month" id="bdate_month" aria-describedby="bdate_monthId">
												<option value="01">January</option>
												<option value="02">February</option>
												<option value="03">March</option>
												<option value="04">April</option>
												<option value="05">May</option>
												<option value="06">June</option>
												<option value="07">July</option>
												<option value="08">August</option>
												<option value="09">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>
											</select>
											<small id="bdate_monthId" class="text-muted">Month</small>
										</div>
										<div class="col-sm">
											<select class="form-control form-control-sm" name="bdate_day" id="bdate_day" aria-describedby="bdate_dayId">
												<?php for ($i=1; $i < 32 ; $i++) { ?>
												<option value="<?php echo $i ?>"><?php echo $i ?></option>
												<?php } ?>
											</select>
											<small id="bdate_dayId" class="text-muted">Day</small>
										</div>
										<div class="col-sm">
											<select class="form-control form-control-sm" name="bdate_year" id="bdate_year" aria-describedby="bdate_yearId">
												<?php for ($i=1940; $i < 2022; $i++) { ?>
													<option value="<?php echo $i ?>"><?php echo $i ?></option>
												<?php } ?>
											</select>
											<small id="bdate_yearId" class="text-muted">Year</small>
										</div>
									</div>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label for="email_address">Email Address</label>
									<input type="text" class="form-control form-control-sm" name="email_address" id="email_address" placeholder="Input your email address.">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="nationality">Nationality</label>
									<input style="text-transform: uppercase;" type="text" class="form-control form-control-sm" name="nationality" id="nationality" placeholder="Input your nationality.">
								</div>

								<div class="form-group">
									<label for="residence_address">Residence Address</label>
									<textarea style="text-transform: uppercase;" cols="3" class="form-control form-control-sm" name="residence_address" id="residence_address" placeholder="Input your residence address."></textarea>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label for="contact_no">Contact No.</label>
									<input style="text-transform: uppercase;" type="text" class="form-control form-control-sm" name="contact_no" id="contact_no" placeholder="Input your Contact No.">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card card-primary">
					<div class="card-header">
						<b>SPOUSE (LEAVE BLANK IF N/A)</b>
					</div>

					<div class="card-body">		
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label for="spouse_first_name">First Name</label>
									<input style="text-transform: uppercase;" type="text" class="form-control form-control-sm" name="spouse_first_name" id="spouse_first_name" placeholder="Input your spouse's first name.">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="spouse_middle_name">Middle Name</label>
									<input style="text-transform: uppercase;" type="text" class="form-control form-control-sm" name="spouse_middle_name" id="spouse_middle_name" placeholder="Input your spouse's middle name.">
								</div>
							</div>
							<div class="col-sm-4">
							
								<div class="form-group">
									<label for="spouse_last_name">Last Name</label>
									<input style="text-transform: uppercase;" type="text" class="form-control form-control-sm" name="spouse_last_name" id="spouse_last_name" placeholder="Input your spouse's last name.">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Birthdate</label>
									<div class="row">
										<div class="col-sm">
											<select class="form-control form-control-sm" name="spouse_bdate_month" id="spouse_bdate_month" aria-describedby="spouse_bdate_monthId">
												<option value="01">January</option>
												<option value="02">February</option>
												<option value="03">March</option>
												<option value="04">April</option>
												<option value="05">May</option>
												<option value="06">June</option>
												<option value="07">July</option>
												<option value="08">August</option>
												<option value="09">September</option>
												<option value="10">October</option>
												<option value="11">November</option>
												<option value="12">December</option>
											</select>
											<small id="spouse_bdate_monthId" class="text-muted">Month</small>
										</div>
										<div class="col-sm">
											<select class="form-control form-control-sm" name="spouse_bdate_day" id="spouse_bdate_day" aria-describedby="spouse_bdate_dayId">
												<?php for ($i=1; $i < 32 ; $i++) { ?>
												<option value="<?php echo $i ?>"><?php echo $i ?></option>
												<?php } ?>
											</select>
											<small id="spouse_bdate_dayId" class="text-muted">Day</small>
										</div>
										<div class="col-sm">
											<select class="form-control form-control-sm" name="spouse_bdate_year" id="spouse_bdate_year" aria-describedby="spouse_bdate_yearId">
												<?php for ($i=1940; $i < 2022; $i++) { ?>
													<option value="<?php echo $i ?>"><?php echo $i ?></option>
												<?php } ?>
											</select>
											<small id="spouse_bdate_yearId" class="text-muted">Year</small>
										</div>
									</div>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label for="spouse_email_address">Email Address</label>
									<input type="text" class="form-control form-control-sm" name="spouse_email_address" id="spouse_email_address" placeholder="Input your email address.">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="spouse_nationality">Nationality</label>
									<input style="text-transform: uppercase;" type="text" class="form-control form-control-sm" name="spouse_nationality" id="spouse_nationality" placeholder="Input your spouse's nationality.">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label for="spouse_contact_no">Contact No.</label>
									<input style="text-transform: uppercase;" type="text" class="form-control form-control-sm" name="spouse_contact_no" id="spouse_contact_no" placeholder="Input your spouse's Contact No.">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card card-primary">
					<div class="card-header">
						<b>ADDITIONAL INFORMATION</b>							
					</div>

					<div class="card-body">
						<div class="row">
							<div class="col-sm">
								<div class="form-group">
									<label for="household_count">Household Count</label>
									<input style="text-transform: uppercase;" type="text" name="household_count" id="household_count" class="form-control form-control-sm" placeholder="Input number." aria-describedby="household_countId">
									<small id="household_countId" class="text-muted">How many people are in the house?</small>
								</div>

								<div class="form-group">
									<label for="house_floors">House Floors</label>
									<input style="text-transform: uppercase;" type="text" name="house_floors" id="house_floors" class="form-control form-control-sm" placeholder="Input number." aria-describedby="house_floorsId">
									<small id="house_floorsId" class="text-muted">Your house's number of floor</small>
								</div>

								<div class="form-group">
									<label for="signal_strength">Signal Strength / Network</label>
									<input style="text-transform: uppercase;" type="text" name="signal_strength" id="signal_strength" class="form-control form-control-sm" placeholder="Input number." aria-describedby="signal_strengthId">
									<small id="signal_strengthId" class="text-muted">Signal strength in dbM.</small>
								</div>

								<div class="form-group">
									<label for="demo_kit_presentation">Demo-kit Presentation</label>
									<select name="demo_kit_presentation" id="demo_kit_presentation" class="form-control form-control-sm" placeholder="Input number." aria-describedby="demo_kit_presentationId">
										<option value="No">No</option>
										<option value="Yes">Yes</option>
									</select>
									<small id="demo_kit_presentationId" class="text-muted">Do you want us to conduct a presentation for demo?</small>
								</div>
							</div>
							<div class="col-sm">
								<div class="form-group">
									<label for="property_type">Property Type</label>
									<input style="text-transform: uppercase;" type="text" name="property_type" id="property_type" class="form-control form-control-sm" placeholder="Input here." aria-describedby="property_typeId">
									<small id="property_typeId" class="text-muted">Property type?</small>
								</div>

								<div class="form-group">
									<label for="helpers_number">Number of Helpers</label>
									<input style="text-transform: uppercase;" type="text" name="helpers_number" id="helpers_number" class="form-control form-control-sm" placeholder="Input here." aria-describedby="helpers_numberId">
									<small id="helpers_numberId" class="text-muted">If you have no helper, leave blank</small>
								</div>

								<div class="form-group">
									<label for="speed_test">Network Speedtest</label>
									<input style="text-transform: uppercase;" type="text" name="speed_test" id="speed_test" class="form-control form-control-sm" placeholder="Input here." aria-describedby="speed_testId">
									<small id="speed_testId" class="text-muted">Speed test in MBPS.</small>
								</div>

								<div class="form-group">
									<label for="gps_coordinate">GPS Coordinates</label>
									<input style="text-transform: uppercase;" type="text" name="gps_coordinate" id="gps_coordinate" class="form-control form-control-sm" placeholder="Input here." aria-describedby="gps_coordinateId">
									<small id="gps_coordinateId" class="text-muted">Your GPS Coordinate based on GOOGLE MAPS.</small>
								</div>
							</div>

							<div class="col-sm">
								<div class="form-group">
									<label for="pets_number">Number of Pets</label>
									<input style="text-transform: uppercase;" type="text" name="pets_number" id="pets_number" class="form-control form-control-sm" placeholder="Input number." aria-describedby="pets_numberId">
									<small id="pets_numberId" class="text-muted">If you have no pet, leave blank</small>
								</div>

								<div class="form-group">
									<label for="lot_area">Lot Area</label>
									<input style="text-transform: uppercase;" type="text" name="lot_area" id="lot_area" class="form-control form-control-sm" placeholder="Input number." aria-describedby="lot_areaId">
									<small id="lot_areaId" class="text-muted">Indicate your house's lot area in sqm.</small>
								</div>

								<div class="form-group">
									<label for="isp">Internet Service Provider</label>
									<input style="text-transform: uppercase;" type="text" name="isp" id="isp" class="form-control form-control-sm" placeholder="Input your ISP." aria-describedby="ispId">
									<small id="ispId" class="text-muted">Indicate you internet speed provider. (GLOBE/PLDT/CONVERGE etc..)</small>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card card-primary">
					<div class="card-header">
						<b>INCLUDED DEVICES</b>
					</div>
					<div class="card-body" style="font-size: 12px">
						<div class="row">
							<div class="col-sm-6">
								<div class="card">
									<div class="card-header">
										<b>STANDARD ALARM PANEL KIT</b>
									</div>

									<div class="card-body">
										<table class="table table-bordered table-sm">
											<tbody>
												<tr>
													<td width="50%">Alarm Host Panel</td>
													<td width="50%"><input style="text-transform: uppercase;" type="text" name="host_panel" id="host_panel" class="form-control form-control-sm" placeholder="Input number."></td>
												</tr>
												<tr>
													<td width="50%">Door/Window Magnetic Contact</td>
													<td width="50%"><input style="text-transform: uppercase;" type="text" name="magnetic_contact" id="magnetic_contact" class="form-control form-control-sm" placeholder="Input number."></td>
												</tr>
												<tr>
													<td width="50%">Indoor Motion Detector</td>
													<td width="50%"><input style="text-transform: uppercase;" type="text" name="indoor_motionsensor" id="indoor_motionsensor" class="form-control form-control-sm" placeholder="Input number."></td>
												</tr>
												
												<tr>
													<td width="50%">Indoor Siren</td>
													<td width="50%"><input style="text-transform: uppercase;" type="text" name="indoor_siren" id="indoor_siren" class="form-control form-control-sm" placeholder="Input number."></td>
												</tr>

												<tr>
														<td width="50%">Remote Keyfob</td>
														<td width="50%"><input style="text-transform: uppercase;" type="text" name="remote_keyfob" id="remote_keyfob" class="form-control form-control-sm" placeholder="Input number."></td>
													</tr>
											</tbody>
										</table>
									</div>
								</div>

								<div class="card">
									<div class="card-header">
										<b>COMMON</b>
									</div>
									<div class="card-body">
										<div class="row">
											<table class="table table-bordered table-sm">
												<tbody>
													
													
													<tr>
														<td width="50%">IC Card Tags</td>
														<td width="50%"><input style="text-transform: uppercase;" type="text" name="ic_card_tags" id="ic_card_tags" class="form-control form-control-sm" placeholder="Input number."></td>
													</tr>

													<tr>
														<td width="50%">Panic Button</td>
														<td width="50%"><input style="text-transform: uppercase;" type="text" name="panic_button" id="panic_button" class="form-control form-control-sm" placeholder="Input number."></td>
													</tr>

													<tr>
														<td width="50%">Wireless Repeater</td>
														<td width="50%"><input style="text-transform: uppercase;" type="text" name="wireless_repeater" id="wireless_repeater" class="form-control form-control-sm" placeholder="Input number."></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="card">
									<div class="card-header">
										<b>OPTIONAL DEVICES</b>
									</div>

									<div class="card-body">
										<table class="table table-bordered table-sm">
											<tbody>
												<tr>
													<td width="50%">Displacement Detector</td>
													<td width="50%"><input style="text-transform: uppercase;" type="text" name="displacement_detector" id="displacement_detector" class="form-control form-control-sm" placeholder="Input number."></td>
												</tr>
												<tr>
													<td width="50%">Outdoor Motion Sensor</td>
													<td width="50%"><input style="text-transform: uppercase;" type="text" name="outdoor_motionsensor" id="outdoor_motionsensor" class="form-control form-control-sm" placeholder="Input number."></td>
												</tr>
												
												<tr>
													<td width="50%">Water Leak Detector</td>
													<td width="50%"><input style="text-transform: uppercase;" type="text" name="water_leak_detector" id="water_leak_detector" class="form-control form-control-sm" placeholder="Input number."></td>
												</tr>
												<tr>
													<td width="50%">Smoke Detector</td>
													<td width="50%"><input style="text-transform: uppercase;" type="text" name="smoke_detector" id="smoke_detector" class="form-control form-control-sm" placeholder="Input number."></td>
												</tr>
												<tr>
													<td width="50%">Outdoor Siren</td>
													<td width="50%"><input style="text-transform: uppercase;" type="text" name="outdoor_siren" id="outdoor_siren" class="form-control form-control-sm" placeholder="Input number."></td>
												</tr>
												<tr>
													<td width="50%">Wireless Keypad</td>
													<td width="50%"><input style="text-transform: uppercase;" type="text" name="wireless_keypad" id="wireless_keypad" class="form-control form-control-sm" placeholder="Input number."></td>
												</tr>
												<tr>
													<td width="50%">Alarm Output Expander</td>
													<td width="50%"><input style="text-transform: uppercase;" type="text" name="alarm_output_expander" id="alarm_output_expander" class="form-control form-control-sm" placeholder="Input number."></td>
												</tr>
												<tr>
													<td width="50%">CCTV</td>
													<td width="50%"><input style="text-transform: uppercase;" type="text" name="cctv" id="cctv" class="form-control form-control-sm" placeholder="Input number."></td>
												</tr>
											</tbody>
										</table>
										
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label for="final_remarks">Final Remarks</label>
									<textarea style="text-transform: uppercase;" name="final_remarks" id="final_remarks" class="form-control form-control-sm" placeholder="Input your final remarks here." aria-describedby="final_remarksId"></textarea>
									<small id="final_remarksId" class="text-muted">Other concerns? You may add through here.</small>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-body" style="text-align: justify;">
						<p>I hereby authorize and give my consent to <b><u>Home Alarm System</u></b> and its accredited third-party partners to collect, store, process and share my information provided that such collection storage, processing and sharing are in accordance with the provisions of Republic Art No. 10173 or the Data Privacy Act of 2012 and its implementing Rules and Regulations and other laws rules and regulations relating to data privacy</p>
						
						<div class="text-center">
							<div class="form-check">
							<label class="form-check-label">
								<input style="text-transform: uppercase;" type="checkbox" class="form-check-input" name="i_agree" id="i_agree" value="1">
								<span class="text text-green text-bold">I Agree</span>
							</label>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6 offset-sm-3">
						<div class="card">
							<div class="card-body">
								<button type="button" class="btn btn-success btn-block text-bold btn-submit" data-toggle="modal" data-target="#form-confirm"><i class="fas fa-check"></i> SUBMIT</button>
							</div>
							<?php echo form_close() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="form-confirm" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"><b>CONFIRM YOUR ENTRY</b></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm">
							<div class="card">
								<div class="card-header">	
									<b>PERSONAL INFORMATION</b>
								</div>
								<div class="card-body">
									<table class="table table-bordered table-sm">
										<tbody>
											<tr>
												<td width="35%" class="text-bold">FIRST NAME</td>
												<td width="65%" class="first_name"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">MIDDLE NAME</td>
												<td width="65%" class="middle_name"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">LAST NAME</td>
												<td width="65%" class="last_name"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">BIRTHDATE</td>
												<td width="65%" class="birthdate"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">EMAIL ADDRESS</td>
												<td width="65%" class="email_address"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">CONTACT NO.</td>
												<td width="65%" class="contact_no"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">NATIONALITY</td>
												<td width="65%" class="nationality"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">RESIDENCE ADDRESS</td>
												<td width="65%" class="residence_address"></td>
											</tr>
										</tbody>
										
									</table>
								</div>
							</div>
						</div>
						<div class="col-sm">
							<div class="card">
								<div class="card-header">
									<b>SPOUSE INFORMATION</b>
								</div>

								<div class="card-body">
									<table class="table table-bordered table-sm">
										<tbody>
											<tr>
												<td width="35%" class="text-bold">FIRST NAME</td>
												<td width="65%" class="spouse_first_name"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">MIDDLE NAME</td>
												<td width="65%" class="spouse_middle_name"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">LAST NAME</td>
												<td width="65%" class="spouse_last_name"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">BIRTHDATE</td>
												<td width="65%" class="spouse_birthdate"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">EMAIL ADDRESS</td>
												<td width="65%" class="spouse_email_address"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">CONTACT NO.</td>
												<td width="65%" class="spouse_contact_no"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">NATIONALITY</td>
												<td width="65%" class="spouse_nationality"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm">
							<div class="card">
								<div class="card-header">
									<b>ADDITIONAL INFORMATION</b>
								</div>

								<div class="card-body">
									<table class="table table-bordered table-sm">
										<tbody>
											<tr>
												<td width="35%" class="text-bold">HOUSEHOLD COUNT</td>
												<td width="65%" class="household_count"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">PROPERTY TYPE</td>
												<td width="65%" class="property_type"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">NUMBER OF PETS</td>
												<td width="65%" class="pets_number"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">HOUSE FLOORS</td>
												<td width="65%" class="house_floors"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">NUMBER OF HELPERS</td>
												<td width="65%" class="helpers_number"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">LOT AREA</td>
												<td width="65%" class="lot_area"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">SIGNAL STRENGTH / NETWORK</td>
												<td width="65%" class="signal_strength"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">NETWORK SPEEDTEST</td>
												<td width="65%" class="speed_test"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">INTERNET SERVICE PROVIDER</td>
												<td width="65%" class="isp"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">DEMO-KIT PRESENTATION</td>
												<td width="65%" class="demo_kit_presentation"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">GPS COORDINATES</td>
												<td width="65%" class="gps_coordinate"></td>
											</tr>
											
										</tbody>
								</table>
								</div>
							</div>
							
						</div>
						<div class="col-sm">
							<div class="card">
								<div class="card-header">
									<b>INCLUDED DEVICES</b>
								</div>
								<div class="card-body">
									<table class="table table-bordered table-sm">
										<tbody style="font-size: 12px">
											<tr>
												<td width="35%" class="text-bold">ALARM HOST PANEL</td>
												<td width="65%" class="host_panel"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">DOOR/WINDOW MAGNETIC CONTACT</td>
												<td width="65%" class="magnetic_contact"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">INDOOR MOTION DETECTOR</td>
												<td width="65%" class="indoor_motionsensor"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">INDOOR SIREN</td>
												<td width="65%" class="indoor_siren"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">REMOTE KEYFOB</td>
												<td width="65%" class="remote_keyfob"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">IC CARD TAGS</td>
												<td width="65%" class="ic_card_tags"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">PANIC BUTTON</td>
												<td width="65%" class="panic_button"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">WIRELESS REPEATER</td>
												<td width="65%" class="wireless_repeater"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">DISPLACEMENT DETECTOR</td>
												<td width="65%" class="displacement_detector"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">OUTDOOR MOTION SENSOR</td>
												<td width="65%" class="outdoor_motionsensor"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">WATER LEAK DETECTOR</td>
												<td width="65%" class="water_leak_detector"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">SMOKE DETECTOR</td>
												<td width="65%" class="smoke_detector"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">OUTDOOR SIREN</td>
												<td width="65%" class="outdoor_siren"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">WIRELESS KEYPAD</td>
												<td width="65%" class="wireless_keypad"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">ALARM OUTPUT EXPANDER</td>
												<td width="65%" class="alarm_output_expander"></td>
											</tr>
											<tr>
												<td width="35%" class="text-bold">CCTV</td>
												<td width="65%" class="cctv"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<b>FINAL REMARKS</b>
								</div>
								<div class="card-body final_remarks">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary text-bold" data-dismiss="modal"><i class="fas fa-times"></i> GO BACK</button>
					<button type="submit" class="btn btn-success text-bold" form="form-add-homealarm"><i class="fas fa-check"></i> CONFIRM</button>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Modal -->
	<div class="modal fade" id="modal-success" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body text-center">
					<b class="text-bold text-success" style="font-size: 25px;">SUCCESS!!!</b>
					<p>Your entry successfully verified. Thank you!</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success text-bold" data-dismiss="modal"><i class="fas fa-check"></i> OKAY</button>
				</div>
			</div>
		</div>
	</div>

</body>

<!-- jQuery -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- Moment JS -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/moment/moment.min.js"></script>

<!-- ChartJS -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/chart.js/Chart.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/toastr/toastr.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>dist/js/adminlte.js"></script>
<!-- Date Range Picker -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.js"></script>

<!-- fullCalendar 2.2.5 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/fullcalendar/main.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/fullcalendar-interaction/main.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/fullcalendar-bootstrap/main.min.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/select2/js/select2.full.min.js"></script>


<script>
	$(document).ready(function(){
		//Form Add item Request
		$('#form-add-homealarm').submit(function(e) {
			e.preventDefault();
			
			var me = $(this);

			toastr.options = {
				"closeButton": false,
				"debug": false,
				"newestOnTop": false,
				"progressBar": true,
				"positionClass": "toast-top-right",
				"preventDuplicates": true,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}

			
			$(':submit').attr('disabled','disabled');
			$('.loading-modal').modal();

			//ajax
			$.ajax({
				url: me.attr('action'),
				type: 'post',
				data: me.serialize(),
				dataType: 'json',
				success: function(response) {
					if (response.success == true) {
						$(':submit').removeAttr('disabled','disabled');
						toastr.success("Successfully Requested!!!");
						me[0].reset();
						$('#form-confirm').modal('hide');
						$('#modal-success').modal();
					} else {
						$(':submit').removeAttr('disabled','disabled');
						toastr.error(response.errors);
					}

				}
			});
		});
	});

	$(".btn-submit").click(function(){

		$('.first_name').empty();
		$('.middle_name').empty();
		$('.last_name').empty();
		$('.birthdate').empty();
		$('.email_address').empty();
		$('.nationality').empty();
		$('.residence_address').empty();
		$('.contact_no').empty();
		$('.spouse_first_name').empty();
		$('.spouse_middle_name').empty();
		$('.spouse_last_name').empty();
		$('.spouse_birthdate').empty();
		$('.spouse_email_address').empty();
		$('.spouse_nationality').empty();
		$('.spouse_contact_no').empty();
		$('.household_count').empty();
		$('.house_floors').empty();
		$('.signal_strength').empty();
		$('.demo_kit_presentation').empty();
		$('.property_type').empty();
		$('.helpers_number').empty();
		$('.speed_test').empty();
		$('.gps_coordinate').empty();
		$('.pets_number').empty();
		$('.lot_area').empty();
		$('.isp').empty();
		$('.wireless_keypad').empty();
		$('.magnetic_contact').empty();
		$('.displacement_detector').empty();
		$('.indoor_motionsensor').empty();
		$('.water_leak_detector').empty();
		$('.indoor_siren').empty();
		$('.ic_card_tags').empty();
		$('.outdoor_motionsensor').empty();
		$('.alarm_output_expander').empty();
		$('.outdoor_siren').empty();
		$('.remote_keyfob').empty();
		$('.panic_button').empty();
		$('.host_panel').empty();
		$('.smoke_detector').empty();
		$('.wireless_repeater').empty();
		$('.cctv').empty();
		$('.final_remarks').empty();


		$('.first_name').append($('#first_name').val().toUpperCase());
		$('.middle_name').append($('#middle_name').val().toUpperCase());
		$('.last_name').append($('#last_name').val().toUpperCase());
		$('.birthdate').append($('#bdate_month').find(":selected").text() + ' ' + $('#bdate_day').find(":selected").text() + ', ' + $('#bdate_year').find(":selected").text());
		$('.email_address').append($('#email_address').val());
		$('.nationality').append($('#nationality').val().toUpperCase());
		$('.residence_address').append($('#residence_address').val().toUpperCase());
		$('.contact_no').append($('#contact_no').val().toUpperCase());
		$('.spouse_first_name').append($('#spouse_first_name').val().toUpperCase());
		$('.spouse_middle_name').append($('#spouse_middle_name').val().toUpperCase());
		$('.spouse_last_name').append($('#spouse_last_name').val().toUpperCase());
		$('.spouse_birthdate').append($('#spouse_bdate_month').find(":selected").text() + ' ' + $('#spouse_bdate_day').find(":selected").text() + ', ' + $('#spouse_bdate_year').find(":selected").text());
		$('.spouse_email_address').append($('#spouse_email_address').val());
		$('.spouse_nationality').append($('#spouse_nationality').val().toUpperCase());
		$('.spouse_contact_no').append($('#spouse_contact_no').val().toUpperCase());
		$('.household_count').append($('#household_count').val().toUpperCase());
		$('.house_floors').append($('#house_floors').val().toUpperCase());
		$('.signal_strength').append($('#signal_strength').val().toUpperCase());
		$('.demo_kit_presentation').append($('#demo_kit_presentation').val().toUpperCase());
		$('.property_type').append($('#property_type').val().toUpperCase());
		$('.helpers_number').append($('#helpers_number').val().toUpperCase());
		$('.speed_test').append($('#speed_test').val().toUpperCase());
		$('.gps_coordinate').append($('#gps_coordinate').val().toUpperCase());
		$('.pets_number').append($('#pets_number').val().toUpperCase());
		$('.lot_area').append($('#lot_area').val().toUpperCase());
		$('.isp').append($('#isp').val().toUpperCase());
		$('.wireless_keypad').append($('#wireless_keypad').val().toUpperCase());
		$('.magnetic_contact').append($('#magnetic_contact').val().toUpperCase());
		$('.displacement_detector').append($('#displacement_detector').val().toUpperCase());
		$('.indoor_motionsensor').append($('#indoor_motionsensor').val().toUpperCase());
		$('.water_leak_detector').append($('#water_leak_detector').val().toUpperCase());
		$('.indoor_siren').append($('#indoor_siren').val().toUpperCase());
		$('.ic_card_tags').append($('#ic_card_tags').val().toUpperCase());
		$('.outdoor_motionsensor').append($('#outdoor_motionsensor').val().toUpperCase());
		$('.alarm_output_expander').append($('#alarm_output_expander').val().toUpperCase());
		$('.outdoor_siren').append($('#outdoor_siren').val().toUpperCase());
		$('.remote_keyfob').append($('#remote_keyfob').val().toUpperCase());
		$('.panic_button').append($('#panic_button').val().toUpperCase());
		$('.host_panel').append($('#host_panel').val().toUpperCase());
		$('.smoke_detector').append($('#smoke_detector').val().toUpperCase());
		$('.wireless_repeater').append($('#wireless_repeater').val().toUpperCase());
		$('.cctv').append($('#cctv').val().toUpperCase());
		$('.final_remarks').append($('#final_remarks').val().toUpperCase());
		
	});
</script>





