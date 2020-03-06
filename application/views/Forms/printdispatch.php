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

	if ($row->Installation == 1) {
		$typeOfService = 'Installation';
	}

	if ($row->RepairOrService) {
		$typeOfService = 'Service';
	}

	if ($row->WithPermit == 'Yes') {
		$with_permit = 'fas fa-check-square';
	} else {
		$with_permit = 'fas fa-times';
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

  
</head>


<body>
	<div class="row">
		<div class="col-12">
			<div class="row">
				<div class="col-3">
					<img src="<?php echo base_url('assets/images/vinculumNewLogo.jpg') ?>" alt="vcmlogo" class="img-thumbnail mb-4" style="height: 80px;width: 200px">
				</div>
				<div class="col-6">
					<p class="text-center mx-auto" style="font-size: 23px;font-weight: bold;">DISPATCH FORM</p>
					<p class="text-center mx-auto">ID No. <?php echo $DispatchID ?></p>
				</div>
			</div>

			<div class="row">
				<div class="col-12 mb-4">
					<table class="table table-bordered table-sm" style="font-size: 15px">
						<tbody>
							<tr>
								<td width="20%" style="font-weight: bold">Customer Name</td>
								<td width="80%"><?php echo $customerName.' --- '.$companyName ?></td>
							</tr>

							<tr>
								<td width="20%" style="font-weight: bold">Contact Person</td>
								<td width="80%"><?php echo $contactPerson ?></td>
							</tr>

							<tr>
								<td width="20%" style="font-weight: bold">Contact Number</td>
								<td width="80%"><?php echo $contactNumber ?></td>
							</tr>

							<tr>
								<td width="20%" style="font-weight: bold">Address</td>
								<td width="80%"><?php echo $address ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-4">
					<table class="table table-bordered table-sm" style="font-size: 15px">
						<tbody>
							<tr>
								<td width="100%" class="text-center" style="font-weight: bold">Personnel/s</td>
							</tr>
							<tr>
								<td width="100%"><?php echo $assignedTech1 ?></td>
							</tr>

							<tr>
								<td width="100%"><?php echo $assignedTech2 ?></td>
							</tr>

							<tr>
								<td width="100%"><?php echo $assignedTech3 ?></td>
							</tr>

							<tr>
								<td width="100%"><?php echo $assignedTech4 ?></td>
							</tr>

							<tr>
								<td width="100%"><?php echo $assignedTech5 ?></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="col-4">
					<table class="table table-bordered table-sm" style="font-size: 15px">
						<tbody>
							<tr>
								<td width="30%" style="font-weight: bold;">Date</td>
								<td width="70%"><?php echo date('l - F j, Y',strtotime($dispatchDate)) ?></td>
							</tr>

							<tr>
								<td width="30%" style="font-weight: bold;">Time In</td>
								<td width="70%"><?php echo $timeIn ?></td>
							</tr>

							<tr>
								<td width="30%" style="font-weight: bold;">Time Out</td>
								<td width="70%"><?php echo $timeOut ?></td>
							</tr>

							<tr>
								<td width="30%" style="font-weight: bold;">Dispatch Out</td>
								<td width="70%"><?php echo $dispatch_out ?></td>
							</tr>

							<tr>
								<td width="30%" style="font-weight: bold;">Service Type</td>
								<td width="70%"><?php echo $typeOfService ?></td>
							</tr>
							<tr>
								<td width="100%" class="" colspan="2">Service Report No. : <?php echo $sr_number ?></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="col-4">
					<table class="table table-bordered table-sm mb-4" style="font-size: 15px">
						<tbody>
							

							<tr>
								<td width="100%" class="">With Work Permit? <i class="<?php echo $with_permit ?>"></i></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<table class="table table-bordered table-sm" style="font-size: 15px">
						<tbody>
							<tr>
								<td width="15%" style="font-weight: bold">Description</td>
								<td width="85%"><?php echo $concern ?></td>
							</tr>

							<tr>
								<td width="15%" style="font-weight: bold">Remarks</td>
								<td width="85%"><?php echo $remarks ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="row mt-3">

				<div class="col-4">
					<p style="font-weight: bold">Customer Acceptance:</p>
					<p>________________________________ <br> 
					Customer Signature over Printed Name</p>
				</div>
				
				<div class="col-4 text-center">
					<p style="font-weight: bold">Checked By:</p>
					<p><u>Jenina F. Gaceta</u><br> 
					HR Officer</p>
				</div>

				<div class="col-4 text-right">
					<p style="font-weight: bold">Dispatched By:</p>
					<p><u>Irish Gale L. Serrano</u><br> 
					Admin & Accounting</p>
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