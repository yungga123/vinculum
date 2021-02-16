<?php
defined('BASEPATH') or die('Access Denied');

$ItemId = 1;
$discount_id = 0;
$sub_total_amount = 0;
$total_discount = 0;
$total_vat = 0;
$total_quotation_amount = 0;

foreach ($results_quotation as $row) {

	if ($row->Date_created != '0000-00-00') {
		$Datecreated = date_format(date_create($row->Date_created),'F d, Y');
	}


	$results_quotation = [
		'quotation_reference_no' => $row->quotation_ref,
		'quotation_customer_name' => $row->customer_name,
		'quotation_contact_person' => $row->contact_person,
		'quotation_contact_number' => $row->contact_number,
		'quotation_email' => $row->email,
		'quotation_customer_location' => $row->customer_location,
		'quotation_project_type' => $row->project_type,
		'quotation_Subject' => $row->subject,
		'quotation_sales_name' => $row->prepared_by,
		'quotation_sales_email' => $row->prepared_email,
		'quotation_date_created' => $Datecreated,
		'quotation_warranty' => $row->warranty_covered,
		'quotation_promo' => $row->promo,
		'quotation_payment' => $row->payment_mode,
		'quotation_discount' => $row->discount,
		'quotation_vat' => $row->vat
	];

	if ($row->vat !=''){
		$results_vat = [
			
			'vat_inclusive' => 'VAT Inclusive',
			'total_vat_inclusive' => 'Vat Inclusive'
		];
	}
	else {
		$results_vat = ['vat_inclusive' => 'VAT Exclusive'];
	}
	

	if ($row->discount == 0){
		$discount_id = 0;
	}
	else
	{
		$discount_id = 1;
	}
}

					
//FORMULA FOR SUB TOTAL AMOUNT
foreach ($results_quotation_items as $row) {
	$sub_total_amount = ($row->amount*$row->qty) + $sub_total_amount;
}


if($results_quotation['quotation_discount'] > 1){
	//FORMULA FOR TOTAL QUOTATION DISCOUNT AMOUNT
	$total_discount = $results_quotation['quotation_discount']; 	

	//FORMULA FOR QUOTATION DISCOUNT PERCENTAGE DISPLAY
	$results_quotation['quotation_discount'] = "";
	$discount_text = "Amount";
}

else{
	//FORMULA FOR TOTAL QUOTATION DISCOUNT AMOUNT
	$total_discount = $sub_total_amount * $results_quotation['quotation_discount'];

	//FORMULA FOR QUOTATION DISCOUNT PERCENTAGE DISPLAY
	$results_quotation['quotation_discount'] =  $results_quotation['quotation_discount'] * 10;
	$discount_text = "%";
}

//FORMULA FOR TOTAL VAT AMOUNT
$total_vat = $sub_total_amount * .12;

//FORMULA FOR TOTAL QUOTATION AMOUNT
$total_quotation_amount = ($sub_total_amount + $total_vat) - $total_discount;



foreach ($results_salesinfo as $row) {
		$results_salesinfo = [
			'quotation_sales_contact' => $row->contact_number,
			'quotation_sales_name' => $row->lastname. ", " .$row->firstname. " " .$row->middlename
		];
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

	<!-- Title Page -->
	<div class="row">
		<div class="col-sm-3">
			<img src="<?php echo base_url('assets/images/vinculumnew.jpg') ?>" alt="vcmlogo" class="img-thumbnail mb-4" style="height: 120px;width: 270px">
		</div>
		<div class="col-sm-5">
			
		</div>
		<div class="col-sm-4">
					<tr>
						<h8>Vinculum Tech Enterprise</h8>
					</tr>
					<br>
					<tr>
						<h8>#70 National Highway, Putatan, 1772 Muntinlupa City</h8>
					</tr>
					<br>
					<tr>
						<h8>Mobile No:</h8>
						<h8><?php echo $results_salesinfo['quotation_sales_contact'] ?></h8>
					</tr>
					<br>
					<tr>
						<h8>Email: </h8>
						<h8><u><?php echo $results_quotation['quotation_sales_email'] ?></u></h8>
					</tr>
					<br>
					<tr>
						<h8>Website: </h8>
						<h8><u>www.vinculumtechnologies.com</u></h8>
					</tr>
					<br>
					<br>
					<tr>
						<h8>Date: </h8>
						<h8><?php echo $results_quotation['quotation_date_created'] ?></h8>
						
					</tr>
		</div>
		
	</div>

	<div class="row">
		<table class="table table-bordered table-sm" style="font-size: 15px">
			<tbody>
				<tr>
					<td width="10%" style="font-weight: bold">Customer name</td>
					<td width="40%"><?php echo $results_quotation['quotation_customer_name'] ?></td>
					<td width="10%" style="font-weight: bold">Reference Number</td>
					<td width="40%"><?php echo $results_quotation['quotation_reference_no'] ?></td>
				</tr>

				<tr>
					<td width="10%" style="font-weight: bold">Contact Person</td>
					<td width="40%"><?php echo $results_quotation['quotation_contact_person'] ?></td>
					<td width="10%" style="font-weight: bold">Email Address</td>
					<td width="40%"><?php echo $results_quotation['quotation_email'] ?></td>
				</tr>

				<tr>
					<td width="10%" style="font-weight: bold">Contact Number</td>
					<td width="40%"><?php echo $results_quotation['quotation_contact_number'] ?></td>
					<td width="10%" style="font-weight: bold">Subject</td>
					<td width="40%"><?php echo $results_quotation['quotation_Subject'] ?></td>
				</tr>

				<tr>
					<td width="10%" style="font-weight: bold">Location</td>
					<td width="40%"><?php echo $results_quotation['quotation_customer_location'] ?></td>
					<td width="10%" style="font-weight: bold">Project</td>
					<td width="40%"><?php echo $results_quotation['quotation_project_type'] ?></td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<label> Dear Sir/Madam, </label><br>
			<label> We Have the pleasure to present you the following article(s) on the terms and conditions set forth here under. </label>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<tbody>

					<tr class="text-center">
						<th width="5%">Item No.</th>
						<th width="55%">Item Description</th>
						<th width="5%">Qty</th>
						<th width="10%">Availability</th>
						<th width="5%">Unit</th>
						<th width="10%">Amount</th>
						<th width="10%">Total Amount</th>
					</tr>

					<?php if (count($results_quotation_items) == 0): ?>
						<tr>
							<td>No records</td>
							<td>No records</td>
							<td>No records</td>
							<td>No records</td>
							<td>No records</td>
						</tr>
						<?php else: ?>
						<?php foreach ($results_quotation_items as $row): ?>
							<tr>
								<td class="text-center"><?php echo $ItemId ?></td>
								<td style="white-space: pre-wrap;"><?php echo $row->description ?></td>
								<td class="text-center"><?php echo $row->qty ?></td>
								<td class="text-center"><?php echo $row->availability ?></td>
								<td class="text-center"><?php echo $row->unit ?></td>
								<td class="text-center"><?php echo $row->amount ?></td>
								<td class="text-center"><?php echo number_format($row->amount*$row->qty,2) ?></td>
								
								<?php $ItemId = $ItemId +1 ?>
							</tr>
							 
						<?php endforeach ?>
					<?php endif ?>

					<tr class="text-center">
						<th width="5%">Warranty:</th>
						<th width="65%"><?php echo $results_quotation['quotation_warranty'] ?></th>
						<th colspan="4" width="20%">SubTotal Vat Exclusive</th>
						<th width="10%"><?php echo number_format($sub_total_amount,2)?></th>
					</tr>


				<!-- Vat Amount-->
				<?php if (count($results_vat ) == 1 && $results_quotation['quotation_promo'] == "" ): ?>
					<tr style="display: none" class="text-center">
						<td width = 5% style="font-weight: bold">Promo:</td>
						<td width = 5% style="font-weight: bold"><?php echo $results_quotation['quotation_promo'] ?></td>
						<td colspan="4" style="color: #FF0000; font-weight: bold">Vat Amount 12%</td>
						<td><?php echo number_format($total_vat,2) ?></td>
					</tr>

				<?php elseif (count($results_vat ) == 2 && $results_quotation['quotation_promo'] != "" ): ?>
					<tr class="text-center">
						<td width = 5% style="font-weight: bold">Promo:</td>
						<td width = 5% style="font-weight: bold"><?php echo $results_quotation['quotation_promo'] ?></td>
						<td colspan="4" style="color: #FF0000; font-weight: bold">Vat Amount 12%</td>
						<td><?php echo number_format($total_vat,2) ?></td>
					</tr>

				<?php elseif (count($results_vat ) == 2 && $results_quotation['quotation_promo'] == "" ): ?>
					<tr class="text-center">
						<td colspan="2"></td>
						<td colspan="4" style="color: #FF0000; font-weight: bold">Vat Amount 12%</td>
						<td><?php echo number_format($total_vat,2) ?></td>
					</tr>
				<?php endif ?>
				<!-- End of Vat amount-->

				<!-- Discount Amount-->
				<?php if ($discount_id == 1 && (count($results_vat ) == 2 && $results_quotation['quotation_promo'] != "" )): ?>
					<tr class="text-center">
						<td colspan="2"></td>
						<td colspan="4" style="color: #FF0000; font-weight: bold" >Discount <?php echo $results_quotation['quotation_discount'], $discount_text ?></td>
						<td><?php echo number_format($total_discount,2) ?></td>
						
					</tr>
				
				<?php elseif ($discount_id == 1 && (count($results_vat ) == 1 && $results_quotation['quotation_promo'] != "" )): ?>
					<tr class="text-center">
						<td width = 5% style="font-weight: bold">Promo:</td>
						<td width = 5% style="font-weight: bold"><?php echo $results_quotation['quotation_promo'] ?></td>
						<td colspan="4" style="color: #FF0000; font-weight: bold" >Discount <?php echo $results_quotation['quotation_discount'], $discount_text ?></td>
						<td><?php echo number_format($total_discount,2) ?></td>
					</tr>

				<?php elseif ($discount_id == 1 && (count($results_vat ) == 1 && $results_quotation['quotation_promo'] == "" )): ?>
					<tr class="text-center">
						<td colspan="2"></td>
						<td colspan="4" style="color: #FF0000; font-weight: bold" >Discount <?php echo $results_quotation['quotation_discount'], $discount_text ?></td>
						<td><?php echo number_format($total_discount,2) ?></td>
					</tr>

				<?php elseif ($discount_id == 1 && (count($results_vat ) == 2 && $results_quotation['quotation_promo'] == "" )): ?>
					<tr class="text-center">
						<td colspan="2"></td>
						<td colspan="4" style="color: #FF0000; font-weight: bold" >Discount <?php echo $results_quotation['quotation_discount'], $discount_text ?></td>
						<td><?php echo number_format($total_discount,2) ?></td>
					</tr>
				<?php endif ?>
				<!-- End of Discount amount-->

				<!-- Total Quotation Amount -->
				<?php if ($discount_id == 1 && (count($results_vat) == 2 && $results_quotation['quotation_promo'] != "" )): ?>
					<tr class="text-center">
						<td colspan="2"></td>
						<td colspan="4" style="font-weight: bold">Grand Total (<font style="color: #FF0000"><?php echo $results_vat['vat_inclusive'] ?></font>) </td>
						<td><?php echo number_format($total_quotation_amount,2) ?></td>
					</tr>

				<?php elseif ($discount_id == 0 && (count($results_vat) == 1 && $results_quotation['quotation_promo'] != "" )): ?>
					<tr class="text-center">
						<td width = 5% style="font-weight: bold">Promo:</td>
						<td width = 5% style="font-weight: bold"><?php echo $results_quotation['quotation_promo'] ?></td>
						<td colspan="4" style="font-weight: bold">Grand Total (<font style="color: #FF0000"><?php echo $results_vat['vat_inclusive'] ?></font>) </td>
						<td><?php echo number_format($total_quotation_amount,2) ?></td>
					</tr>

				<?php elseif ($discount_id == 0 && (count($results_vat) == 2 && $results_quotation['quotation_promo'] != "" )): ?>
					<tr class="text-center">
						<td colspan="2"></td>
						<td colspan="4" style="font-weight: bold">Grand Total (<font style="color: #FF0000"><?php echo $results_vat['vat_inclusive'] ?></font>) </td>
						<td><?php echo number_format($total_quotation_amount,2) ?></td>
					</tr>

				<?php elseif ($discount_id == 0 && (count($results_vat) == 1 && $results_quotation['quotation_promo'] == "" )): ?>
					<tr class="text-center">
						<td colspan="2"></td>
						<td colspan="4" style="font-weight: bold">Grand Total (<font style="color: #FF0000"><?php echo $results_vat['vat_inclusive'] ?></font>) </td>
						<td><?php echo number_format($total_quotation_amount,2) ?></td>
					</tr>

				<?php else: ?>
					<tr class="text-center">
						<td colspan="2"></td>
						<td colspan="4" style="font-weight: bold">Grand Total (<font style="color: #FF0000"><?php echo $results_vat['vat_inclusive'] ?></font>) </td>
						<td><?php echo number_format($total_quotation_amount,2) ?></td>
					</tr>

				<?php endif ?>
				<!-- End of Total Quotation Amount-->

				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<tbody>
					
										
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-1">
			<br>
			<label>Prepared By:</label>
		</div>
		<div class="col-sm-3">
			<br>
			<label><u><?php echo $results_salesinfo['quotation_sales_name'] ?></u></label>
			<br>
			<label>Pre-Technical Sales</label>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-1">
			<br><br>
			<label>Approved By:</label>
		</div>
		
		<div class="col-sm-3">
			<br><br>
			<u>Ginelou Nino Garzon</u>
			<br>
			<label>President</label>
		</div>

		<div class="col-sm-4">
		</div>
		<div class="col-sm-4">
			<br><br>
			<label>Conformed By:___________________________________________________</label>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			<br><br>
			<b>
			<h8>Terms and Conditions</h8>
			<br>
			<h8>*Payment and Order</h8>
			<br>
			<h8>-> <?php echo $results_quotation['quotation_payment'] ?></h8>
			<br>
			<h8>-> Prices are <?php echo $results_vat['vat_inclusive'] ?></h8>
			<br>
			<h8>-> Clients with Terms - Postdated check is collected upon delivery.</h8>
			<br>
			<h8>-> In any case that the payment went beyond the agreed payment date, client will be liable for a 7% interest (compounded payment).</h8>
			<br>
			<h8>-> In case of refunds, processing time will take 7-15 working days</h8>
			<br>
			<h8>-> Issued POs are considered firm and irrevocable. Signature of company representative under conforme in this document will be considered a Purchase Order and are considered firm and irrevocable.</h8>
			<br>
			<h8>-> There will be a 20% charge for every cancelled order. Prices are subject to change without prior notice.</h8>
			<br>
			<h8>*Delivery and Mobilization</h8>
			<br>
			<h8>-> Supplies order have 2 to 3 days in Metro Manila and 3 to 5 days in Provincial Areas</h8>
			<br>
			<h8>-> Start of Mobilization is in 2 to 3 days in Metro Manila and 3 to 5 days in Provincial Areas</h8>
			<br>
			<h8>*Special cases during Skeletal work force situation</h8>
			<br>
			<h8>-> May double duration of delivery and installation lead time. Personnel and Technicians have personal protective gear</h8>
			</b>
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
