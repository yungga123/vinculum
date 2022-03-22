<?php
defined('BASEPATH') or die('Access Denied');
?>

<style>
	#projectReport_table {
		width: 50%;
	}
</style>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Billing Invoice Print</h1>
					<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">

						<div class="card-body">
							<table id="projectReport_table" class="table table-bordered table-hover table-sm" style="width: 100%;">
								<thead>
									<tr>
										<th>BI No.</th>
										<th>Operation</th>
										<th>Date Added</th>
										<th>Request By</th>
										<th>Processed By</th>
										<th>Approved By</th>
									</tr>
								</thead>
							</table>


							<table id="projectReport_table" class="table table-bordered table-hover table-sm" style="width: 100%;">
								<thead>
									<tr>
										<th style="width: 71px; text-align:center;">
											<?php
											foreach ($slcctmrs as $row) {
												echo "<option value='" . $row['id'] . "'>" . $row['id'] . "</option>";
											}
											?>
										</th>
										<th>
											<a href="<? echo site_url('BillingInvoiceController/billinginvoiceedit') ?>"><button type="button" class="btn btn-warning btn-xs"><i class="fas fa-edit">EDIT</i></button></a>
											<br>
											<a href="<? echo site_url('BillingInvoiceController/billinginvoiceedit') ?>"><button type="button" class="btn btn-danger btn-xs"><i class="fas fa-trash">DELETE</i></button></a>
											<br>
											<a href="<? echo site_url('BillingInvoiceController/billinginvoiceedit') ?>"><button type="button" class="btn btn-primary btn-xs"><i class="fas fa-view">SEARCH</i></button></a>
											<br>
											<a href="<? echo site_url('BillingInvoiceController/billinginvoiceedit') ?>"><button type="button" class="btn btn-success btn-xs"><i class="fas fa-search">VIEW</i></button></a>
										</th>
										<th><?php
											foreach ($duedate as $row) {
												echo "<option value='" . $row['id'] . "'>" . $row['due_date'] . "</option>";
											}
											?>
										</th>
										<th><?php
											foreach ($birthdate as $row) {
												echo "<option value='" . $row['id'] . "'>" . $row['firstname'] . "</option>";
											}
											?>
										</th>
										<th><?php
											foreach ($birthdate as $row) {
												echo "<option value='" . $row['id'] . "'>" . $row['firstname'] . "</option>";
											}
											?>
										</th>
										<th><?php
											foreach ($birthdate as $row) {
												echo "<option value='" . $row['id'] . "'>" . $row['firstname'] . "</option>";
											}
											?>
										</th>
									</tr>
								</thead>
							</table>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
</div>