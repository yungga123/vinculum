<?php
defined('BASEPATH') or die('Access Denied');

$results_project_report = array();
$dateRequested = '';
$dateImplemented = '';
$dateFinished = '';



foreach ($results as $row) {

	if ($row->date_requested != '0000-00-00') {
		$dateRequested = date_format(date_create($row->date_requested),'F d, Y');
	}

	if ($row->date_implemented != '0000-00-00') {
		$dateImplemented = date_format(date_create($row->date_implemented),'F d, Y');
	}

	if ($row->date_finished != '0000-00-00') {
		$dateFinished = date_format(date_create($row->date_finished),'F d, Y');
	}

	$results_project_report = [
		'id' => $row->id,
		'name' => $row->name,
		'description' => $row->description,
		'date_requested' => $dateRequested,
		'date_implemented' => $dateImplemented,
		'date_finished' => $dateFinished
	];
}

$results_project_report['total_petty_cash'] = 0;
$results_project_report['total_transpo'] = 0;
$results_project_report['total_indirectItems'] = 0;
$results_project_report['total_directItems'] = 0;


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

	<!-- Title Page -->
	<div class="row">
		<div class="col-12 text-center mb-3">
			<label style="font-size: 25px">PROJECT PLAN REPORT</label>
			<br>
			<label>Project Report No. <?php echo $results_project_report['id'] ?></label>
		</div>
	</div>

	<!-- Project Description -->
	<div class="row">
		<div class="col-6">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<tbody>
					<tr>
						<td width="20%" style="font-weight: bold">Project Name</td>
						<td width="80%"><?php echo $results_project_report['name'] ?></td>
					</tr>
					<tr>
						<td width="20%" style="font-weight: bold">Description</td>
						<td width="80%"><?php echo $results_project_report['description'] ?></td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="col-6">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<tbody>
					<tr>
						<td width="30%" style="font-weight: bold">Date Requested</td>
						<td width="70%"><?php echo $results_project_report['date_requested'] ?></td>
					</tr>
					<tr>
						<td width="30%" style="font-weight: bold">Date Implemented</td>
						<td width="70%"><?php echo $results_project_report['date_implemented'] ?></td>
					</tr>
					<tr>
						<td width="30%" style="font-weight: bold">Date Finished</td>
						<td width="70%"><?php echo $results_project_report['date_finished'] ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Petty Cash and Transpo -->
	<div class="row">
		<div class="col-6">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<thead>
					<tr class="text-center">
						<th width="25%">Petty Cash</th>
						<th width="25%">Date</th>
						<th width="50%">Remarks</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($results_petty_cash) == 0): ?>
						<tr>
							<td>/</td>
							<td>/</td>
							<td>/</td>
						</tr>
					<?php else: ?>
						<?php foreach ($results_petty_cash as $row): ?>
							<?php
								$pettycashDate = '';
								if ($row->date != '0000-00-00') {
									$pettycashDate = date_format(date_create($row->date),'M d, Y');
								}
							?>
							<tr>
								<td><?php echo $row->petty_cash ?></td>
								<td><?php echo $pettycashDate ?></td>
								<td><?php echo $row->remarks ?></td>
							</tr>

							<?php $results_project_report['total_petty_cash'] = $row->petty_cash + $results_project_report['total_petty_cash'] ?>
						<?php endforeach ?>
						<tr>
							<td>/</td>
							<td>/</td>
							<td>/</td>
						</tr>
					<?php endif ?>
					
					
					<tr>
						<td class="text-center text-bold" colspan="3">Total: <?php echo number_format($results_project_report['total_petty_cash'],2) ?></td>
					</tr>
				</tbody>

			</table>
		</div>

		<div class="col-6">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<thead>
					<tr class="text-center">
						<th width="25%">Transpo</th>
						<th width="25%">Date</th>
						<th width="50%">Remarks</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($results_transpo) == 0): ?>
						<tr>
							<td>/</td>
							<td>/</td>
							<td>/</td>
						</tr>
					<?php else: ?>
						<?php foreach ($results_transpo as $row): ?>
							<?php 
								$transpoDate = '';
								if ($row->date != '0000-00-00') {
									$transpoDate = date_format(date_create($row->date),'M d, Y');
								}
							?>
							<tr>
								<td><?php echo $row->transpo ?></td>
								<td><?php echo $transpoDate ?></td>
								<td><?php echo $row->remarks ?></td>
							</tr>

							<?php $results_project_report['total_transpo'] = $row->transpo + $results_project_report['total_transpo'] ?>
						<?php endforeach ?>
						<tr>
							<td>/</td>
							<td>/</td>
							<td>/</td>
						</tr>
					<?php endif ?>
					
					<tr>
						<td class="text-center text-bold" colspan="3">Total: <?php echo number_format($results_project_report['total_transpo'],2) ?></td>
					</tr>
				</tbody>

			</table>
		</div>
	</div>

	<!-- Indirect Items -->
	<div class="row">
		<div class="col-12">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<thead class="text-center" >
					<tr>
						<th width="35%" rowspan="2" class="align-middle">Indirect Item</th>
						<th width="10%" rowspan="2" class="align-middle">Qty</th>
						<th width="10%" rowspan="2" class="align-middle">Amount (1u)</th>
						<th width="15%" colspan="2" class="align-middle">Consumed</th>
						<th width="15%" colspan="2" class="align-middle">Returns</th>
						<th width="15%" rowspan="2" class="align-middle">Remarks</th>
					</tr>
					<tr>
						<th>Qty</th>
						<th>Amt</th>
						<th>Qty</th>
						<th>Amt</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($results_indirectItems) == 0): ?>
						<tr>
							<td>/</td>
							<td>/</td>
							<td>/</td>
							<td>/</td>
							<td>/</td>
							<td>/</td>
						</tr>
					<?php else: ?>
						<?php foreach ($results_indirectItems as $row): ?>
							<tr>
								<td><?php echo $row->indirect_item ?></td>
								<td><?php echo number_format($row->qty,2) ?></td>
								<td><?php echo number_format($row->amt,2) ?></td>
								<td><?php echo number_format($row->consumed,2) ?></td>
								<td><?php echo number_format($row->consumed*$row->amt,2) ?></td>
								<td><?php echo number_format($row->returns,2) ?></td>
								<td><?php echo number_format($row->returns*$row->amt,2) ?></td>
								<td><?php echo $row->remarks ?></td>
							</tr>
						<?php endforeach ?>
					<?php endif ?>
					
					<tr>
						<td class="text-center text-bold" colspan="8">Total Released: <?php echo number_format($results_project_report['total_indirectItems'],2) ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Direct Items -->
	<div class="row">
		<div class="col-12">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<thead>
					<tr class="text-center">
						<th width="35%" rowspan="2" class="align-middle">Direct Item</th>
						<th width="10%" rowspan="2" class="align-middle">Qty</th>
						<th width="10%" rowspan="2" class="align-middle">Amount (1u)</th>
						<th width="15%" colspan="2" class="align-middle">Consumed</th>
						<th width="15%" colspan="2" class="align-middle">Returns</th>
						<th width="15%" rowspan="2" class="align-middle">Remarks</th>
					</tr>

					<tr class="text-center">
						<th>Qty</th>
						<th>Amt</th>
						<th>Qty</th>
						<th>Amt</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($results_directItems) == 0): ?>
						<tr>
							<td>/</td>
							<td>/</td>
							<td>/</td>
							<td>/</td>
							<td>/</td>
							<td>/</td>
							<td>/</td>
							<td>/</td>
						</tr>
					<?php else: ?>
						<?php foreach ($results_directItems as $row): ?>
							<tr>
								<td><?php echo $row->direct_item ?></td>
								<td><?php echo $row->qty ?></td>
								<td><?php echo $row->amt ?></td>
								<td><?php echo $row->consumed ?></td>
								<td><?php echo number_format($row->consumed*$row->amt,2) ?></td>
								<td><?php echo $row->returns ?></td>
								<td><?php echo number_format($row->returns*$row->amt,2) ?></td>
								<td><?php echo $row->remarks ?></td>
							</tr>
						<?php endforeach ?>
						<tr>
							<td>/</td>
							<td>/</td>
							<td>/</td>
							<td>/</td>
							<td>/</td>
							<td>/</td>
							<td>/</td>
							<td>/</td>
						</tr>
					<?php endif ?>
					
					<tr>
						<td class="text-center text-bold" colspan="8">Total: <?php echo number_format($results_project_report['total_directItems'],2) ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<!-- Tools Requested -->
	<div class="row">
		<div class="col-12">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<thead>
					<tr class="text-center">
						<th width="50%">Tools Requested</th>
						<th width="10%">Qty</th>
						<th width="10%">Returns</th>
						<th width="30%">Remarks</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($results_toolRqstd) == 0): ?>
						<tr>
							<td>/</td>
							<td>/</td>
							<td>/</td>
							<td>/</td>
						</tr>
					<?php else: ?>
						<?php foreach ($results_toolRqstd as $row): ?>
							<tr>
								<td><?php echo $row->tool_rqstd ?></td>
								<td><?php echo $row->qty ?></td>
								<td><?php echo $row->returns ?></td>
								<td><?php echo $row->remarks ?></td>
							</tr>
						<?php endforeach ?>
						<tr>
							<td>/</td>
							<td>/</td>
							<td>/</td>
							<td>/</td>
						</tr>
					<?php endif ?>
					
				</tbody>
			</table>
		</div>
	</div>

	<!-- Assigned IT and Assigned Tech-->
	<div class="row">
		<div class="col-6">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<thead>
					<tr class="text-center">
						<th width="50%">Assigned IT</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($results_assignedIT) == 0): ?>
						<tr>
							<td>/</td>
						</tr>
					<?php else: ?>
						<?php foreach ($results_assignedIT as $row): ?>
							<tr>
								<td><?php echo $row->assigned_it ?></td>
							</tr>
						<?php endforeach ?>
						<tr>
							<td>/</td>
						</tr>
					<?php endif ?>
					
				</tbody>
			</table>
		</div>

		<div class="col-6">
			<table class="table table-bordered table-sm" style="font-size: 15px">
				<thead>
					<tr class="text-center">
						<th width="50%">Assigned Technician</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($results_assignedTech) == 0): ?>
						<tr>
							<td>/</td>
						</tr>
					<?php else: ?>
						<?php foreach ($results_assignedTech as $row): ?>
							<tr>
								<td><?php echo $row->assigned_tech ?></td>
							</tr>
						<?php endforeach ?>
						<tr>
							<td>/</td>
						</tr>
					<?php endif ?>
					
				</tbody>
			</table>
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