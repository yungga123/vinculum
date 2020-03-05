<?php
defined('BASEPATH') or die('Access Denied');

// $DispatchID = '';
// $companyName = '';
// $customerName = '';
// $contactPerson = '';
// $contactNumber = '';
// $dispatchDate = '';
// $address = '';
// $timeIn = '';
// $timeOut = '';
// $remarks = '';
// $assignedTech1 = '';
// $assignedTech2 = 'N/A';
// $assignedTech3 = 'N/A';
// $assignedTech4 = 'N/A';
// $assignedTech5 = 'N/A';
// $with_permit = '';
// $typeOfService = '';

// foreach ($results as $row) {
// 	$DispatchID = $dispatch_id;
// 	$companyName = $row->CompanyName;
// 	$customerName = $row->CustomerName;
// 	$contactPerson = $row->ContactPerson;
// 	$contactNumber = $row->ContactNumber;
// 	$dispatchDate = $row->DispatchDate;
// 	$address = $row->Address;

// 	if ($row->TimeIn == '00:00:00' or $row->TimeIn == '') {
// 		$timeIn = '';
// 	} else {
// 		$timeIn = date('g:i A',strtotime($row->TimeIn));
// 	}

// 	if ($row->TimeOut == '00:00:00' or $row->TimeIn == '') {
// 		$timeOut = '';
// 	} else {
// 		$timeOut =  date('g:i A',strtotime($row->TimeOut));
// 	} 	

// 	$remarks = $row->Remarks;

// 	if ($row->AssignedTechnicians1 == '') {
// 		$assignedTech1 = 'N/A';
// 	} else {
// 		$assignedTech1 = $row->AssignedTechnicians1;
// 	}

// 	if ($row->AssignedTechnicians2 == '') {
// 		$assignedTech2 = 'N/A';
// 	} else {
// 		$assignedTech2 = $row->AssignedTechnicians2;
// 	}

// 	if ($row->AssignedTechnicians3 == '') {
// 		$assignedTech3 = 'N/A';
// 	} else {
// 		$assignedTech3 = $row->AssignedTechnicians3;
// 	}

// 	if ($row->AssignedTechnicians4 == '') {
// 		$assignedTech4 = 'N/A';
// 	} else {
// 		$assignedTech4 = $row->AssignedTechnicians4;
// 	}

// 	if ($row->AssignedTechnicians5 == '') {
// 		$assignedTech5 = 'N/A';
// 	} else {
// 		$assignedTech5 = $row->AssignedTechnicians5;
// 	}

// 	if ($row->WithPermit == 'Yes') {
// 		$with_permit = 'Yes';
// 	} elseif($row->WithPermit == 'No') {
// 		$with_permit = 'No';
// 	} else {
// 		$with_permit = '';
// 	}

// 	if ($row->Installation == 1) {
// 		$typeOfService = 'Installation';
// 	}

// 	if ($row->RepairOrService) {
// 		$typeOfService = 'Service';
// 	}

// 	if ($row->Warranty) {
// 		$typeOfService = 'Warranty';
// 	}
// }

// $pdf = new PDF_MC_Table('p','mm','Letter');
// $pdf->AddPage();
// $pdf->SetAutoPageBreak(false);


// $pdf->SetFont('Times','B',18);

// $pdf->Image(base_url('assets/images/vinculumNewLogo.jpg'),10,10,44);

// $pdf->Cell(195,5,'',0,1,'C');
// $pdf->Cell(195,5,'Dispatch Form',0,1,'C');
// $pdf->Cell(195,5,'',0,1,'C');

// $pdf->SetFont('Times','',11);
// $pdf->Cell(195,5,'Dispatch ID: '. $DispatchID,0,1,'R');

// $pdf->SetFont('Times','B',11);
// $pdf->Cell(30,5,'Customer Name',1,0,'');
// $pdf->SetFont('Times','',11);
// $pdf->Cell(165,5,utf8_decode($customerName.' --- '.$companyName),1,1,'');

// $pdf->SetFont('Times','B',11);
// $pdf->Cell(30,5,'Contact Person',1,0,'');
// $pdf->SetFont('Times','',11);
// $pdf->Cell(165,5,$contactPerson,1,1,'');

// $pdf->SetFont('Times','B',11);
// $pdf->Cell(30,5,'Contact Number',1,0,'');
// $pdf->SetFont('Times','',11);
// $pdf->Cell(165,5,$contactNumber,1,1,'');

// $pdf->SetFont('Times','B',11);
// $pdf->Cell(30,5,'Address',1,0,'');
// $pdf->SetFont('Times','',11);

// $fontSize = 11;
// $tempFontSize = $fontSize;
// while ( $pdf->GetStringWidth($address) > 163.5) {
// 		$pdf->SetFontSize($tempFontSize -= 0.1);
// }
// $pdf->Cell(165,5,utf8_decode($address),1,1,'');
// $tempFontSize = $fontSize;
// $pdf->SetFontSize($fontSize);

// $pdf->Cell(195,5,'',0,1,'');

// $pdf->SetFont('Times','B',10);
// $pdf->Cell(95,4,'Personnel/s',1,0,'C');
// $pdf->Cell(5,4,'',0,0,'C');
// $pdf->Cell(6,4,$with_permit,1,0,'C');
// $pdf->SetFont('Times','',10);
// $pdf->Cell(89,4,'With work permit?',1,1,''); // with permit checkbox

// $pdf->Cell(95,4,$assignedTech1,1,0,'');
// $pdf->Cell(5,4,'',0,0,'C');
// $pdf->Cell(95,4,'',0,0,'');

// $pdf->ln(4);
// $pdf->Cell(95,4,$assignedTech2,1,0,'');
// $pdf->Cell(5,4,'',0,0,'');
// $pdf->SetFont('Times','B',10);
// $pdf->Cell(30,4,'Activity Remarks',1,0,'');
// $pdf->ln(4);


// //Multi Cell Custom Functions
// $pdf->SetWidths([95]);
// $pdf->SetLineHeight(5);


// $pdf->SetFont('Times','',10);
// $pdf->Cell(95,4,$assignedTech3,1,0,'');
// $pdf->Cell(5,4,'',0,0,'');
// $pdf->Row(Array('AHGSDHGKJSAD sdf gdsgfdsgjfdsg ofds goijfds goidsjgoidsjfgoi fdsgoijfd oigjfd oigjfdsoig fdsoi jgoifds jgoifds goifds goifds jgoifdsjg fdsjg oifds'));

// $pdf->ln(4);
// $pdf->Cell(95,4,$assignedTech4,1,0,'');

// $pdf->ln(4);
// $pdf->Cell(95,4,$assignedTech5,1,0,'');

// $pdf->SetFont('Times','B',11);
// $pdf->Cell(195,5,'',0,1,'');
// $pdf->Cell(20,5,'Concern :',0,0,'');
// $pdf->SetFont('Times','',11);
// $pdf->MultiCell(175,5,$remarks,1,'');

// $pdf->ln(10);
// $pdf->SetFont('Times','B',11);
// $pdf->Cell(20,5,'Time In',1,0,'');

// $pdf->SetFont('Times','',11);
// $pdf->Cell(30,5,$timeIn,1,0,'');
// $pdf->Cell(5,5,'',0,0,'');
// $pdf->SetFont('Times','B',11);
// $pdf->Cell(30,5,'Type of Service',1,0,'');
// $pdf->Cell(35,5,'',0,0,'');
// $pdf->Cell(30,5,'Dispatch Date',1,1,'');

// $pdf->SetFont('Times','B',11);

// $pdf->Cell(20,5,'Time Out',1,0,'');

// $pdf->SetFont('Times','',11);

// $pdf->Cell(30,5,$timeOut,1,0,'');
// $pdf->Cell(5,5,'',0,0,'');
// $pdf->Cell(60,5,$typeOfService,1,0,'');
// $pdf->Cell(5,5,'',0,0,'');
// $pdf->Cell(75,5,date('l - F j, Y',strtotime($dispatchDate)),1,1,'');

// $pdf->ln(9);

// $pdf->SetFont('Times','B',11);
// $pdf->Cell(48.75,5,'Customer Acceptance:',0,0,'');
// $pdf->Cell(35,5,'',0,0,'C');
// $pdf->Cell(48.75,5,'Checked By:',0,0,'');
// $pdf->Cell(20.5,5,'',0,0,'C');
// $pdf->Cell(48.75,5,'Dispatched By:',0,0,'');

// $pdf->ln(9);

// $pdf->Cell(48.75,5,'________________________________',0,0,'');
// $pdf->Cell(24.5,5,'',0,0,'C');
// $pdf->SetFont('Times','U',11);
// $pdf->Cell(48.75,5,'Jenina F. Gaceta',0,0,'C');
// $pdf->Cell(24.5,5,'',0,0,'C');
// $pdf->Cell(48.75,5,'Irish Gale L. Serrano',0,0,'C');

// $pdf->ln(4);

// $pdf->SetFont('Times','',11);
// $pdf->Cell(48.75,5,'Customer Signature over Printed Name',0,0,'');
// $pdf->Cell(24,5,'',0,0,'C');
// $pdf->Cell(48.75,5,'HR Officer',0,0,'C');
// $pdf->Cell(25,5,'',0,0,'C');
// $pdf->Cell(48.75,5,'Admin & Accounting',0,0,'C');

// $pdf->Output();
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
					<p class="text-center mx-auto">ID No. 1565</p>
				</div>
			</div>

			<div class="row">
				<div class="col-12 mb-4">
					<table class="table table-bordered table-sm" style="font-size: 15px">
						<tbody>
							<tr>
								<td width="20%" style="font-weight: bold">Customer Name</td>
								<td width="80%">Renato Hipolito</td>
							</tr>

							<tr>
								<td width="20%" style="font-weight: bold">Contact Person</td>
								<td width="80%">Mr. Renato Hipolito</td>
							</tr>

							<tr>
								<td width="20%" style="font-weight: bold">Contact Number</td>
								<td width="80%">0943-298-4923</td>
							</tr>

							<tr>
								<td width="20%" style="font-weight: bold">Address</td>
								<td width="80%">Muntinlupa City</td>
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
								<td width="100%">Reynan Jardin</td>
							</tr>

							<tr>
								<td width="100%">John Joel Guevarra</td>
							</tr>

							<tr>
								<td width="100%">Jeorge M Reyno</td>
							</tr>

							<tr>
								<td width="100%">Carlo Temporosa</td>
							</tr>

							<tr>
								<td width="100%">Geran Roel Angco</td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="col-4">
					<table class="table table-bordered table-sm" style="font-size: 15px">
						<tbody>
							<tr>
								<td width="30%" style="font-weight: bold;">Date</td>
								<td width="70%">Saturday -  March 5, 2020</td>
							</tr>

							<tr>
								<td width="30%" style="font-weight: bold;">Time In</td>
								<td width="70%">10:00 AM</td>
							</tr>

							<tr>
								<td width="30%" style="font-weight: bold;">Time Out</td>
								<td width="70%">10:00 PM</td>
							</tr>

							<tr>
								<td width="30%" style="font-weight: bold;">Dispatch Out</td>
								<td width="70%">10:00 PM</td>
							</tr>

							<tr>
								<td width="30%" style="font-weight: bold;">Service Type</td>
								<td width="70%">Installation</td>
							</tr>
							<tr>
								<td width="100%" class="" colspan="2">Service Report No. : 224</td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="col-4">
					<table class="table table-bordered table-sm mb-4" style="font-size: 15px">
						<tbody>
							

							<tr>
								<td width="100%" class="">With Work Permit? <i class="fas fa-check-square"></i></td>
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
								<td width="20%" style="font-weight: bold">Concern</td>
								<td width="80%">No byuwing</td>
							</tr>
						</tbody>
					</table>
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