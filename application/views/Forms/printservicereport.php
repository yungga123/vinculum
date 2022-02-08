<?php
defined('BASEPATH') or die('Access Denied');

$DispatchID = '';
$companyName = '';
$customerName = '';
$contactPerson = '';
$contactNumber = '';
$dispatchDate = '';
$address = '';
$timeIn = '';
$timeOut = '';
$dispatch_out = '';
$concern = '';
$assignedTech1 = '';
$assignedTech2 = 'N/A';
$assignedTech3 = 'N/A';
$assignedTech4 = 'N/A';
$assignedTech5 = 'N/A';
$assignedTech6 = 'N/A';
$assignedTech7 = 'N/A';
$assignedTech8 = 'N/A';
$with_permit = '';
$typeOfService = '';
$sr_number = '';
$remarks = '';

foreach ($results as $row) {
	$DispatchID = $dispatch_id;
	$companyName = $row->CompanyName;
	$customerName = $row->CustomerName;
	$contactPerson = $row->ContactPerson;
	$contactNumber = $row->ContactNumber;
	$dispatchDate = $row->DispatchDate;
	$address = $row->Address;
	$sr_number = $row->sr_number;
	$remarks = $row->remarks2;


	if ($row->dispatch_out == '00:00:00' or $row->dispatch_out == '') {
		$dispatch_out = '';
	} else {
		$dispatch_out = date('g:i A',strtotime($row->dispatch_out));
	}

	if ($row->TimeIn == '00:00:00' or $row->TimeIn == '') {
		$timeIn = '';
	} else {
		$timeIn = date('g:i A',strtotime($row->TimeIn));
	}

	if ($row->TimeOut == '00:00:00' or $row->TimeIn == '') {
		$timeOut = '';
	} else {
		$timeOut =  date('g:i A',strtotime($row->TimeOut));
	} 	

	$concern = $row->Remarks;

	if ($row->AssignedTechnicians1 == '') {
		$assignedTech1 = 'N/A';
	} else {
		$assignedTech1 = $row->AssignedTechnicians1;
	}

	if ($row->AssignedTechnicians2 == '') {
		$assignedTech2 = 'N/A';
	} else {
		$assignedTech2 = $row->AssignedTechnicians2;
	}

	if ($row->AssignedTechnicians3 == '') {
		$assignedTech3 = 'N/A';
	} else {
		$assignedTech3 = $row->AssignedTechnicians3;
	}

	if ($row->AssignedTechnicians4 == '') {
		$assignedTech4 = 'N/A';
	} else {
		$assignedTech4 = $row->AssignedTechnicians4;
	}

	if ($row->AssignedTechnicians5 == '') {
		$assignedTech5 = 'N/A';
	} else {
		$assignedTech5 = $row->AssignedTechnicians5;
	}

	if ($row->AssignedTechnicians6 == '') {
		$assignedTech6 = 'N/A';
	} else {
		$assignedTech6 = $row->AssignedTechnicians6;
	}

	if ($row->AssignedTechnicians7 == '') {
		$assignedTech7 = 'N/A';
	} else {
		$assignedTech7 = $row->AssignedTechnicians7;
	}

	if ($row->AssignedTechnicians8 == '') {
		$assignedTech8 = 'N/A';
	} else {
		$assignedTech8 = $row->AssignedTechnicians8;
	}

	if ($row->Installation == 1) {
		$typeOfService = 'Installation';
	}

	if ($row->RepairOrService) {
		$typeOfService = 'Service';
	}

	if ($row->WithPermit == 'Yes') {
		$with_permit = 'YES';
	} else {
		$with_permit = 'NO';
	}

	if ($row->Warranty) {
		$typeOfService = 'Warranty';
	}
}
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
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.css">
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

  	<style type="text/css">
		@media print {
			.table-bordered td, .table-bordered th {
				border: 1px solid #000000 !important;
			}

			.table thead th {
				vertical-align: bottom !important;
				border-bottom: 2px solid #000000 !important;
			}

		}
		
	</style>


</head>


<body>
	<div class="header">
		<img src="https://www.businesslist.ph/img/ph/s/1531385651-20-vinculum-technologies.jpg" style="width: 250px; margin: 3%;">
<div class="container">
	<form action="" method="POST" style="margin-bottom: 100px">
	<h2>Service Report</h2>
	
	<div class="customer" style="text-align: left; margin-top: 30px; width: 100%; height: auto;">
	<tr>
		<td><b>Customer:</b>	<u><?php echo $companyName ?><br></td></u>
	</tr>
	<tr>
		<td><b>Address:</b>	<u><td width="80%"><?php echo $address ?></td><br></td></u>
	</tr>
	<tr>
		<td><b>Responsible:</b>	_____________________________________<br></td>
	</tr>
	<tr>
		<td><b>Phone:</b>	__________________________________________<br></td>
	</tr>
	</div>

	<div class="order_no" style="text-align: center; margin-top: -150px; width: 100%; height: auto;">
		<td><b>Order No.:</b>	_________________________</td>
	</div>
	
	<div class="arrival" style="text-align: left; margin-top: -20px; float: right; width: 20%; hegiht: auto;">
	<tr>
		<td><b>Arrival Time:</b>________________<br</td>
	</tr>
	<tr>
		<td><b>Date:</b><u><td width="70%"><?php echo date('F j, Y',strtotime($dispatchDate)) ?></u><br></td>
	</tr>
	<tr>
		<td><b>Type:</b>_______________________<br></td>
	</tr>
	<tr>
		<td><b>Serial No:</b>___________________<br></td>
	</tr>
		<td><b>Customer Site:</b></td>
		<input type="checkbox">
		<td><b>In-house:</b></td>
		<input type="checkbox">
	</div>
	
	<div class="error_description" style="text-align: left; margin-top: 150px; width: 50%; height: auto;">
	<tr>
		<td><b>Error Description:</b><br>
		___________________________________________________________________</td>
	</tr>
	<tr><br>
		<td><b>Error Description:</b><br>
		___________________________________________________________________</td>
	</tr>
	<tr><br>
		<td><b>Error Description:</b><br>
		____________________________________________________________________</td>
	<tr><br>
	<br>
		<td><b>Remaks:</b>_____________________________________________________________________________________________________________________________________<br>
		_____________________________________________________________________________________________________________________________________________</td>
	</tr>
	</div>
	
	<div class="corrective_action" style="text-align: left; margin-top: -217px; width: 50%; height: auto; float: right;">
	<tr>
		<td><b>Corrective Action:</b><br>
		__________________________________________________________________</td>
		<br>
	</tr>
	<tr>
		<td><b>Corrective Action:</b><br>
		__________________________________________________________________</td>
		<br>
	</tr>
	<tr>
		<td><b>Corrective Action:</b><br>
		__________________________________________________________________</td>
		<br>
	</tr>
	</div>
	
	<div class="unit_condition" style="text-align: left; margin-top: 50px;">
	<tr><b>
	<label>Unit Condition:</label><br>
	<label>ITEMS</label><br>
		<td>1) CCTV </td><br>
		<td>2) BIOMETRICS </td><br>
		<td>3) VEHICLE CCTV </td><br>
		<td>4) NETWORK CABLES </td><br>
		<td>5) INTERNET CONNECTION </td><br>
		<td>6) E-FENCE </td><br>
		<td>7) WIRELESS CONNECTION </td><br>
		<td>8) PABX </td><br>
		<td>9) FDAS </td><br>
		<td>10) GPS </td><br></b>
	</div>

	<div class="good_defective" style="text-align: center; margin-top: -260px; column-count: 2; width: 100px;
	margin-left: 40%;">
	<label>GOOD</label><br>
		<input type="checkbox"><br>
		<input type="checkbox"><br>
		<input type="checkbox"><br>
		<input type="checkbox"><br>
		<input type="checkbox"><br>
		<input type="checkbox"><br>
		<input type="checkbox"><br>
		<input type="checkbox"><br>
		<input type="checkbox"><br>
		<input type="checkbox"><br>

	<label>DEFECTIVE</label><br>
		<input type="checkbox"><br>
		<input type="checkbox"><br>
		<input type="checkbox"><br>
		<input type="checkbox"><br>
		<input type="checkbox"><br>
		<input type="checkbox"><br>
		<input type="checkbox"><br>
		<input type="checkbox"><br>
		<input type="checkbox"><br>
		<input type="checkbox"><br>
	</div>

	<div class="defective" style="text-align: right; margin-top: -260px;">
	<th><b>if defective please specify:</b>
	______________<br>
	____________________________________<br>
	____________________________________<br>
	____________________________________<br>
	____________________________________<br>
	____________________________________<br>
	____________________________________<br>
	____________________________________<br>
	____________________________________<br>
	____________________________________<br>
	</th>
	</div>

	<div class="item_no" style="text-align: left; margin-top: 50px; column-count: 5; width: 100%; height: auto;">
	<label>ITEM NO.</label><br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	
	
	<label>DESCRIPTION</label>
	______________________<br>
	______________________<br>
	______________________<br>
	______________________<br>
	______________________<br>
	______________________<br>
	______________________<br>
	______________________<br>
	______________________<br>
	______________________<br>

	<label>QTY</label><br>
	____________<br>
	____________<br>
	____________<br>
	____________<br>
	____________<br>
	____________<br>
	____________<br>
	____________<br>
	____________<br>
	____________<br>

	<label>UNIT PRICE</label>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>

	<label>TOTAL PRICE</label>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	_________________<br>
	</div>

	<div class="labor" style="text-align: left; width: auto;">
	<tr>
		<td><b>Labor(Hours)</td>_____________
		<br><td><b>Travel Time(Hours)</td>_________
	</tr>
	</div>
	
	<div class="travel_cost" style="text-align: center; margin-top: -70px;">
	<tr>
		<br><td><b>Travel Cost</b></td>	_____________
		<br><td><b>Time Out</b></td>	______________
	</tr>
	</div>

	<div class="total_price" style="text-align: right; margin-top: -30px">
	<tr>
		<td><b>Total Price:</b></td>
		<input type="text">
	</div>

	<div class="warranty" style="text-align: left; margin-top: 20px;">
	<tr>
		<td><b>Warranty</b>
		<input type="checkbox">
		</td>
	</tr>
	</div>
	
	<div class="installation" style="margin-left: 25%; margin-top: -21px;">
	<tr>
		<td><b>Installation</b>
		<input type="checkbox">
		</td>
	</tr>
	</div>
	<div class="training" style="text-align: center; margin-top: -29px;">
	<tr>
		<td><b>Training</b>
		<input type="checkbox">
		</td>
	</tr>
	</div>
	<div class="emergency" style="text-align: right; margin-right: 25%; margin-top: -25px;">
	<tr>
		<td><b>Emergency Repair</b>
		<input type="checkbox">
		</td>
	</tr>
	</div>
	<div class="repair" style="text-align: right; margin-top: -25px;">
	<tr>
		<td><b>Repair</b>
		<input type="checkbox">
		</td>
		
	</tr>
	<br>
	</div>
	<div class="customer" style="margin-top: 50px; text-align: center; float: left;">
	<tr>
		<td>________________________________________________________<br></td>
		<b>Customer's Signature over Printed Name</b>
	</tr>
	</div>

	<div class="technician" style="float: right; text-align: center;
	margin-top: 50px;">
	<tr>
		<u><td width="50%"><?php echo $assignedTech1 ?></td><br></u>
		<b>Technician</b></td>
	</tr>
	</div>
	</form>
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
<!-- ChartJS -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/chart.js/Chart.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
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

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>