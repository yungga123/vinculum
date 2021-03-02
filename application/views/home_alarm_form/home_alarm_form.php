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
					
					<div class="card-body">
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label for="first_name">First Name</label>
									<input type="text" class="form-control form-control-sm" name="first_name" id="first_name" placeholder="Input your first name.">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="middle_name">Middle Name</label>
									<input type="text" class="form-control form-control-sm" name="middle_name" id="middle_name" placeholder="Input your middle name.">
								</div>
							</div>
							<div class="col-sm-4">
							
								<div class="form-group">
									<label for="last_name">Last Name</label>
									<input type="text" class="form-control form-control-sm" name="last_name" id="last_name" placeholder="Input your last name.">
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
												<option value=""></option>
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
												<option value=""></option>
												<?php for ($i=1; $i < 32 ; $i++) { ?>
												<option value="<?php echo $i ?>"><?php echo $i ?></option>
												<?php } ?>
											</select>
											<small id="bdate_dayId" class="text-muted">Day</small>
										</div>
										<div class="col-sm">
											<select class="form-control form-control-sm" name="bdate_year" id="bdate_year" aria-describedby="bdate_yearId">
													<option value=""></option>
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
									<input type="text" class="form-control form-control-sm" name="nationality" id="nationality" placeholder="Input your nationality.">
								</div>

								<div class="form-group">
									<label for="residence_address">Residence Address</label>
									<textarea cols="3" class="form-control form-control-sm" name="residence_address" id="residence_address" placeholder="Input your residence address."></textarea>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label for="contact_no">Contact No.</label>
									<input type="text" class="form-control form-control-sm" name="contact_no" id="contact_no" placeholder="Input your Contact No.">
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
									<input type="text" class="form-control form-control-sm" name="spouse_first_name" id="spouse_first_name" placeholder="Input your spouse's first name.">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="spouse_middle_name">Middle Name</label>
									<input type="text" class="form-control form-control-sm" name="spouse_middle_name" id="spouse_middle_name" placeholder="Input your spouse's middle name.">
								</div>
							</div>
							<div class="col-sm-4">
							
								<div class="form-group">
									<label for="spouse_last_name">Last Name</label>
									<input type="text" class="form-control form-control-sm" name="spouse_last_name" id="spouse_last_name" placeholder="Input your spouse's last name.">
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
												<option value=""></option>
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
												<option value=""></option>
												<?php for ($i=1; $i < 32 ; $i++) { ?>
												<option value="<?php echo $i ?>"><?php echo $i ?></option>
												<?php } ?>
											</select>
											<small id="spouse_bdate_dayId" class="text-muted">Day</small>
										</div>
										<div class="col-sm">
											<select class="form-control form-control-sm" name="spouse_bdate_year" id="spouse_bdate_year" aria-describedby="spouse_bdate_yearId">
													<option value=""></option>
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
									<label for="email_address">Email Address</label>
									<input type="text" class="form-control form-control-sm" name="email_address" id="email_address" placeholder="Input your email address.">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="spouse_nationality">Nationality</label>
									<input type="text" class="form-control form-control-sm" name="spouse_nationality" id="spouse_nationality" placeholder="Input your spouse's nationality.">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label for="spouse_contact_no">Contact No.</label>
									<input type="text" class="form-control form-control-sm" name="spouse_contact_no" id="spouse_contact_no" placeholder="Input your spouse's Contact No.">
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
									<input type="text" name="household_count" id="household_count" class="form-control form-control-sm" placeholder="Input number." aria-describedby="household_countId">
									<small id="household_countId" class="text-muted">How many people are in the house?</small>
								</div>

								<div class="form-group">
									<label for="house_floors">House Floors</label>
									<input type="text" name="house_floors" id="house_floors" class="form-control form-control-sm" placeholder="Input number." aria-describedby="house_floorsId">
									<small id="house_floorsId" class="text-muted">Your house's number of floor</small>
								</div>

								<div class="form-group">
									<label for="signal_strength">Signal Strength / Network</label>
									<input type="text" name="signal_strength" id="signal_strength" class="form-control form-control-sm" placeholder="Input number." aria-describedby="signal_strengthId">
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
									<input type="text" name="property_type" id="property_type" class="form-control form-control-sm" placeholder="Input here." aria-describedby="property_typeId">
									<small id="property_typeId" class="text-muted">Property type?</small>
								</div>

								<div class="form-group">
									<label for="helpers_number">Number of Helpers</label>
									<input type="text" name="helpers_number" id="helpers_number" class="form-control form-control-sm" placeholder="Input here." aria-describedby="helpers_numberId">
									<small id="helpers_numberId" class="text-muted">If you have no helper, leave blank</small>
								</div>

								<div class="form-group">
									<label for="speed_test">Network Speedtest</label>
									<input type="text" name="speed_test" id="speed_test" class="form-control form-control-sm" placeholder="Input here." aria-describedby="speed_testId">
									<small id="speed_testId" class="text-muted">Speed test in MBPS.</small>
								</div>

								<div class="form-group">
									<label for="gps_coordinate">GPS Coordinates</label>
									<input type="text" name="gps_coordinate" id="gps_coordinate" class="form-control form-control-sm" placeholder="Input here." aria-describedby="gps_coordinateId">
									<small id="gps_coordinateId" class="text-muted">Your GPS Coordinate based on GOOGLE MAPS.</small>
								</div>
							</div>

							<div class="col-sm">
								<div class="form-group">
									<label for="pets_number">Number of Pets</label>
									<input type="text" name="pets_number" id="pets_number" class="form-control form-control-sm" placeholder="Input number." aria-describedby="pets_numberId">
									<small id="pets_numberId" class="text-muted">If you have no pet, leave blank</small>
								</div>

								<div class="form-group">
									<label for="lot_area">Lot Area</label>
									<input type="text" name="lot_area" id="lot_area" class="form-control form-control-sm" placeholder="Input number." aria-describedby="lot_areaId">
									<small id="lot_areaId" class="text-muted">Indicate your house's lot area in sqm.</small>
								</div>

								<div class="form-group">
									<label for="isp">Internet Service Provider</label>
									<input type="text" name="isp" id="isp" class="form-control form-control-sm" placeholder="Input your ISP." aria-describedby="ispId">
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
					<div class="card-body">
						<div class="row">
							<div class="col-sm">
								<div class="form-group">
									<label for="wireless_keypad">Wireless Keypad</label>
									<input type="text" name="wireless_keypad" id="wireless_keypad" class="form-control form-control-sm" placeholder="Input number." aria-describedby="wireless_keypadId">
									<small id="wireless_keypadId" class="text-muted">How many Keypads?</small>
								</div>

								<div class="form-group">
									<label for="displacement_detector">Displacement Detector</label>
									<input type="text" name="displacement_detector" id="displacement_detector" class="form-control form-control-sm" placeholder="Input number." aria-describedby="displacement_detectorId">
									<small id="displacement_detectorId" class="text-muted">How many displacement detectors?</small>
								</div>

								<div class="form-group">
									<label for="indoor_motionsensor">Indoor Motion Sensor</label>
									<input type="text" name="indoor_motionsensor" id="indoor_motionsensor" class="form-control form-control-sm" placeholder="Input number." aria-describedby="indoor_motionsensorId">
									<small id="indoor_motionsensorId" class="text-muted">How many indoor motion sensor?</small>
								</div>

								<div class="form-group">
									<label for="water_leak_detector">Water Leak Detector</label>
									<input type="text" name="water_leak_detector" id="water_leak_detector" class="form-control form-control-sm" placeholder="Input number." aria-describedby="water_leak_detectorId">
									<small id="water_leak_detectorId" class="text-muted">How many water leak detectors?</small>
								</div>
							</div>
							<div class="col-sm">
								<div class="form-group">
									<label for="indoor_siren">Indoor Siren</label>
									<input type="text" name="indoor_siren" id="indoor_siren" class="form-control form-control-sm" placeholder="Input number." aria-describedby="indoor_sirenId">
									<small id="indoor_sirenId" class="text-muted">How many indoor sirens?</small>
								</div>

								<div class="form-group">
									<label for="ic_card_tags">IC Card Tags</label>
									<input type="text" name="ic_card_tags" id="ic_card_tags" class="form-control form-control-sm" placeholder="Input number." aria-describedby="ic_card_tagsId">
									<small id="ic_card_tagsId" class="text-muted">How many IC card tags?</small>
								</div>

								<div class="form-group">
									<label for="outdoor_motionsensor">Outdoor Motion Sensor</label>
									<input type="text" name="outdoor_motionsensor" id="outdoor_motionsensor" class="form-control form-control-sm" placeholder="Input number." aria-describedby="outdoor_motionsensorId">
									<small id="outdoor_motionsensorId" class="text-muted">How many outdoor motion sensor?</small>
								</div>

								<div class="form-group">
									<label for="alarm_output_expander">Alarm Output Expander</label>
									<input type="text" name="alarm_output_expander" id="alarm_output_expander" class="form-control form-control-sm" placeholder="Input number." aria-describedby="alarm_output_expanderId">
									<small id="alarm_output_expanderId" class="text-muted">How many alarm output expander?</small>
								</div>
							</div>
							<div class="col-sm">
								<div class="form-group">
									<label for="outdoor_siren">Outdoor Siren</label>
									<input type="text" name="outdoor_siren" id="outdoor_siren" class="form-control form-control-sm" placeholder="Input number." aria-describedby="outdoor_sirenId">
									<small id="outdoor_sirenId" class="text-muted">How many outdoor sirens?</small>
								</div>

								<div class="form-group">
									<label for="remote_keyfob">Remote Keyfob</label>
									<input type="text" name="remote_keyfob" id="remote_keyfob" class="form-control form-control-sm" placeholder="Input number." aria-describedby="remote_keyfobId">
									<small id="remote_keyfobId" class="text-muted">How many remote keyfobs?</small>
								</div>

								<div class="form-group">
									<label for="panic_button">Panic Button</label>
									<input type="text" name="panic_button" id="panic_button" class="form-control form-control-sm" placeholder="Input number." aria-describedby="panic_buttonId">
									<small id="panic_buttonId" class="text-muted">How many panic buttons?</small>
								</div>

								<div class="form-group">
									<label for="heat_detector">Heat Detector</label>
									<input type="text" name="heat_detector" id="heat_detector" class="form-control form-control-sm" placeholder="Input number." aria-describedby="heat_detectorId">
									<small id="heat_detectorId" class="text-muted">How many heat detectors?</small>
								</div>
							</div>
							<div class="col-sm">
								<div class="form-group">
									<label for="host_panel">Alarm Host Panel</label>
									<input type="text" name="host_panel" id="host_panel" class="form-control form-control-sm" placeholder="Input number." aria-describedby="host_panelId">
									<small id="host_panelId" class="text-muted">How many panels?</small>
								</div>

								<div class="form-group">
									<label for="smoke_detector">Smoke Detector</label>
									<input type="text" name="smoke_detector" id="smoke_detector" class="form-control form-control-sm" placeholder="Input number." aria-describedby="smoke_detectorId">
									<small id="smoke_detectorId" class="text-muted">How many smoke detectors?</small>
								</div>

								<div class="form-group">
									<label for="wireless_repeater">Wireless Repeater</label>
									<input type="text" name="wireless_repeater" id="wireless_repeater" class="form-control form-control-sm" placeholder="Input number." aria-describedby="wireless_repeaterId">
									<small id="wireless_repeaterId" class="text-muted">How many wireless repeaters?</small>
								</div>

								<div class="form-group">
									<label for="speaker">Speaker</label>
									<input type="text" name="speaker" id="speaker" class="form-control form-control-sm" placeholder="Input number." aria-describedby="speakerId">
									<small id="speakerId" class="text-muted">How many speakers?</small>
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<label for="cctv">CCTV</label>
									<input type="text" name="cctv" id="cctv" class="form-control form-control-sm" placeholder="Input number." aria-describedby="cctvId">
									<small id="cctvId" class="text-muted">CCTV Option? If yes, how many?</small>
								</div>			
							</div>
							<div class="col-sm-9">
								<div class="form-group">
									<label for="final_remarks">Final Remarks</label>
									<textarea name="final_remarks" id="final_remarks" class="form-control form-control-sm" placeholder="Input your final remarks here." aria-describedby="final_remarksId"></textarea>
									<small id="final_remarksId" class="text-muted">Other concerns? You may add through here.</small>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-body" style="text-align: justify;">
						<p>I hereby authorize and give my consent to <b><u>Home Alarm System</u></b> and its accredited third-party partners to collect, store, process and share my information provided that such collection storage, processing and sharing are in accordance with the provisions of Republic Art No. 10173 or the Data Privacy Act of 2012 its implementing Rules and Regulations and other laws rules and regulations relating to data privacy</p>
					</div>
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