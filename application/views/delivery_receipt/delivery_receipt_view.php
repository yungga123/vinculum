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
	<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-3">
					<img src="<?php echo base_url('assets/images/vinculumnew.jpg') ?>" alt="vcmlogo" class="img-thumbnail mb-4" style="height: 120px;width: 270px">
				</div>
			
				<div class="col-sm-5"></div>
				<div class="col-sm-4 " style="text-align: center;">
							<tr>
								<h5>Company Copy</h5>
							</tr>
							<tr>
								<h1>Delivery Receipt</h1>
							</tr>		
				</div>
			</div>
			
		<div class="row">
			<div class="col-sm-8">
				<tr>
					<h5><b>Date:</b> <?php echo $date_created ?></h5>
				</tr>
				
			</div>
			<?php $itemid = 0; ?>
			<div class="col-sm-4" style="text-align: center;">
				<?php foreach ($dr_results_item as $row):
					$itemid = $itemid + $row->id;
				?>
			<?php endforeach ?>
					<tr>
						<h5><b>DR Number :</b> <?php echo $itemid ?><?php echo $dr_id_no ?></h5>
					</tr>
				
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-sm-9">
				<?php foreach($client_results as $row): ?>
				<tr>
					<h5><b>Name:</b> <?php echo $row->CompanyName ?></h5>
				</tr>
				<tr>
					<h5><b>Adrress:</b> <?php echo $row->Address ?></h5>
				</tr>
				<tr>
					<h5><b>Tel. No.</b> <?php echo $row->ContactNumber ?></h5>
				</tr>
				<?php endforeach ?>
			</div>
			
			<div class="col-sm-3" >
				<tr ><h5 style="text-align: left;"><b>Payment Terms:</b></h5></tr>
				<tr>
					<div class="form-check">
	                    <label class="form-check-label">
	                        <input type="checkbox" class="form-check-input" name="quotation_vat" <?php echo $dr_checked_dp ?>>
	                           <label>DP: <?php echo $dp_payment_amount ?></label>
	                    </label>
	                </div>
				</tr>
				<tr>
					<div class="form-check">
	                    <label class="form-check-label">
	                        <input type="checkbox" class="form-check-input" name="quotation_vat" value=".12" <?php echo $dr_checked_cod ?>>
	                            <label>COD: <?php echo $cod_payment_amount ?></label>
	                    </label>
	                </div>
				</tr>
				
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-bordered table-sm" style="font-size: 15px;">
				<tbody>
					<tr style="text-align: center; background-color:#ddd;">
						<td width="10%" style="font-weight: bold;">Item No.</td>
						<td width="10%" style="font-weight: bold">Quantity</td>
						<td width="60%" style="font-weight: bold">Description</td>
						<td width="20%" style="font-weight: bold">Remarks</td>
					</tr>

					<?php $itemNo = 0; ?>
					<?php foreach($dr_results_item as $row): ?>
						<?php if($row->itemName == "BNC Connector" || $row->itemName == "DC Male Connector" || $row->itemName == "DC Female Connector" || $row->itemName == "Video Balun ERA-138P" || $row->itemName =="RJ45 Connector" || $row->itemName == "DC Coupler" || $row->itemName == "RJ11 Connector" || $row->itemName == "BNC to DC Male Connector" || $row->itemName =="Rubber Boots" || $row->itemName == "Video Balun ERA-205B"): ?>
							<tr style="display: none">
								<td>

									<h5 style="text-align: center"><?php echo $itemNo ?></h5>
								</td>
								<td>
									<h5 style="text-align: center"><?php echo $row->stocks_pulled_out ?> units</h5>
								</td>
								<td>
									<h5><?php echo $row->itemName ?></h5>
								</td>
								<td>
									<h5 style="text-align: center">DELIVERED</h5>
								</td>
							</tr>
						<?php else: ?>
							<tr>
								<td>
									<h5 style="text-align: center"><?php echo $itemNo = $itemNo + 1 ?></h5>
								</td>
								<td>
									<h5 style="text-align: center"><?php echo $row->stocks_pulled_out ?> units</h5>
								</td>
								<td>
									<h5><?php echo $row->itemName ?></h5>
								</td>
								<td>
									<h5 style="text-align: center">DELIVERED</h5>
								</td>
							</tr>
						<?php endif ?>
					<?php endforeach ?>


					<tr>
						<td></td>
						<td></td>
						<td style="font-weight: bold">******Nothing Follows*******</td>
						<td></td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-sm-4">
				<tr>
					<h5 style="font-weight: bold">Received in Good Condition By:</h5>
				</tr>
			</div>

			<div class="col-sm-5" style="text-align: center;">
				<tr>
					<h5 style="font-weight: bold">_______________________________________</h5>
				</tr>
				<tr>
					<h5 style="font-weight: bold">Signature over Printed Name</h5>
				</tr>
			</div>

			<div class="col-sm-3" style="text-align: center;">
				<tr>
					<h5 style="font-weight: bold"><u>Irish Gale Serrano</u></h5>
				</tr>
				<tr>
					<h5 style="font-weight: bold">Authorized Signature</h5>
				</tr>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="cols-sm-12">
				<h5>1. Warranty does not cover physical damagae, misuse, tampering, unauthorized servicing, tampered warranty sticker.</h5>
				<h5>2. Down Payment issued before installation.</h5>
				<h5>3. Balance is payable to: <b>Account name: Vinculum Tech Enterprise</b></h5>
				<h5>4. Please see limitations of installation of the project in Notes and Assumptions Contract.</h5>
			</div>
		</div>
		<br>
		<br>
		<br>
		<div class="row" style="text-align: center; page-break-after: always">
			<div class="col-sm-12">
				<h5 style="font-weight: bold">Vinculum Technologies/CCTV SYSTEMS AND INSTALLATION SERVICES</h5>
				<h5 style="font-weight: bold">70-C National Road Putatan, Muntinlupa City 1773, Philippines</h5>
				<h5 style="font-weight: bold">Tel#(02) 244-5644/0975-129-3498</h5>
			</div>
		</div>	

	</div>


	<!-- Title Page -->
	<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-3">
					<img src="<?php echo base_url('assets/images/vinculumnew.jpg') ?>" alt="vcmlogo" class="img-thumbnail mb-4" style="height: 120px;width: 270px">
				</div>
			
				<div class="col-sm-5"></div>
				<div class="col-sm-4 " style="text-align: center;">
							<tr>
								<h5>Customer Copy</h5>
							</tr>
							<tr>
								<h1>Delivery Receipt</h1>
							</tr>		
				</div>
			</div>
			
		<div class="row">
			<div class="col-sm-8">
				<tr>
					<h5><b>Date:</b> <?php echo $date_created ?></h5>
				</tr>
				
			</div>
			<?php $itemid = 0; ?>
			<div class="col-sm-4" style="text-align: center;">
				<?php foreach ($dr_results_item as $row):
					$itemid = $itemid + $row->id;
				?>
			<?php endforeach ?>
					<tr>
						<h5><b>DR Number :</b> <?php echo $itemid ?><?php echo $dr_id_no ?></h5>
					</tr>
				
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-sm-9">
				<?php foreach($client_results as $row): ?>
				<tr>
					<h5><b>Name:</b> <?php echo $row->CompanyName ?></h5>
				</tr>
				<tr>
					<h5><b>Adrress:</b> <?php echo $row->Address ?></h5>
				</tr>
				<tr>
					<h5><b>Tel. No.</b> <?php echo $row->ContactNumber ?></h5>
				</tr>
				<?php endforeach ?>
			</div>
			
			<div class="col-sm-3" >
				<tr ><h5 style="text-align: left;"><b>Payment Terms:</b></h5></tr>
				<tr>
					<div class="form-check">
	                    <label class="form-check-label">
	                        <input type="checkbox" class="form-check-input" name="quotation_vat" <?php echo $dr_checked_dp ?>>
	                           <label>DP: <?php echo $dp_payment_amount ?></label>
	                    </label>
	                </div>
				</tr>
				<tr>
					<div class="form-check">
	                    <label class="form-check-label">
	                        <input type="checkbox" class="form-check-input" name="quotation_vat" value=".12" <?php echo $dr_checked_cod ?>>
	                            <label>COD: <?php echo $cod_payment_amount ?></label>
	                    </label>
	                </div>
				</tr>
				
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-bordered table-sm" style="font-size: 15px;">
				<tbody>
					<tr style="text-align: center; background-color:#ddd;">
						<td width="10%" style="font-weight: bold;">Item No.</td>
						<td width="10%" style="font-weight: bold">Quantity</td>
						<td width="60%" style="font-weight: bold">Description</td>
						<td width="20%" style="font-weight: bold">Remarks</td>
					</tr>

					<?php $itemNo = 0; ?>
					<?php foreach($dr_results_item as $row): ?>
						<?php if($row->itemName == "BNC Connector" || $row->itemName == "DC Male Connector" || $row->itemName == "DC Female Connector" || $row->itemName == "Video Balun ERA-138P" || $row->itemName =="RJ45 Connector" || $row->itemName == "DC Coupler" || $row->itemName == "RJ11 Connector" || $row->itemName == "BNC to DC Male Connector" || $row->itemName =="Rubber Boots" || $row->itemName == "Video Balun ERA-205B"): ?>
							<tr style="display: none">
								<td>
									<h5 style="text-align: center"><?php echo $itemNo ?></h5>
								</td>
								<td>
									<h5 style="text-align: center"><?php echo $row->stocks_pulled_out ?> units</h5>
								</td>
								<td>
									<h5><?php echo $row->itemName ?></h5>
								</td>
								<td>
									<h5 style="text-align: center">DELIVERED</h5>
								</td>
							</tr>
						<?php else: ?>
							<tr>
								<td>
									<h5 style="text-align: center"><?php echo $itemNo = $itemNo + 1 ?></h5>
								</td>
								<td>
									<h5 style="text-align: center"><?php echo $row->stocks_pulled_out ?> units</h5>
								</td>
								<td>
									<h5><?php echo $row->itemName ?></h5>
								</td>
								<td>
									<h5 style="text-align: center">DELIVERED</h5>
								</td>
							</tr>
						<?php endif ?>
					<?php endforeach ?>


					<tr>
						<td></td>
						<td></td>
						<td style="font-weight: bold">******Nothing Follows*******</td>
						<td></td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-sm-4">
				<tr>
					<h5 style="font-weight: bold">Received in Good Condition By:</h5>
				</tr>
			</div>

			<div class="col-sm-5" style="text-align: center;">
				<tr>
					<h5 style="font-weight: bold">_______________________________________</h5>
				</tr>
				<tr>
					<h5 style="font-weight: bold">Signature over Printed Name</h5>
				</tr>
			</div>

			<div class="col-sm-3" style="text-align: center;">
				<tr>
					<h5 style="font-weight: bold"><u>Irish Gale Serrano</u></h5>
				</tr>
				<tr>
					<h5 style="font-weight: bold">Authorized Signature</h5>
				</tr>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="cols-sm-12">
				<h5>1. Warranty does not cover physical damagae, misuse, tampering, unauthorized servicing, tampered warranty sticker.</h5>
				<h5>2. Down Payment issued before installation.</h5>
				<h5>3. Balance is payable to: <b>Account name: Vinculum Tech Enterprise</b></h5>
				<h5>4. Please see limitations of installation of the project in Notes and Assumptions Contract.</h5>
			</div>
		</div>
		<br>
		<br>
		<br>
		<div class="row" style="text-align: center;">
			<div class="col-sm-12">
				<h5 style="font-weight: bold">Vinculum Technologies/CCTV SYSTEMS AND INSTALLATION SERVICES</h5>
				<h5 style="font-weight: bold">70-C National Road Putatan, Muntinlupa City 1773, Philippines</h5>
				<h5 style="font-weight: bold">Tel#(02) 244-5644/0975-129-3498</h5>
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