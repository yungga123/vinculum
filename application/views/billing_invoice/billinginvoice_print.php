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
										<td style="width: 71px; text-align:center;">
											<?php foreach ($slcctmrs as $row) {
												echo "<option value='" . $row['po_id'] . "'>" . $row['po_id'] . "</option>";
											} ?>
										</td>
										<td style="width: 107px;">
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-warning text-bold btn-xs btn-block"><i class="fas fa-edit">EDIT</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_view') ?>" class="btn btn-primary text-bold btn-xs btn-block"><i class="fas fa-search">VIEW</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-success text-bold btn-xs btn-block"><i class="fas fa-check">ACCEPT</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-danger text-bold btn-xs btn-block"><i class="fas fa-trash">DISCARD</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-warning text-bold btn-xs btn-block"><i class="fas fa-edit">EDIT</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_view') ?>" class="btn btn-primary text-bold btn-xs btn-block"><i class="fas fa-search">VIEW</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-success text-bold btn-xs btn-block"><i class="fas fa-check">ACCEPT</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-danger text-bold btn-xs btn-block"><i class="fas fa-trash">DISCARD</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-warning text-bold btn-xs btn-block"><i class="fas fa-edit">EDIT</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_view') ?>" class="btn btn-primary text-bold btn-xs btn-block"><i class="fas fa-search">VIEW</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-success text-bold btn-xs btn-block"><i class="fas fa-check">ACCEPT</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-danger text-bold btn-xs btn-block"><i class="fas fa-trash">DISCARD</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-warning text-bold btn-xs btn-block"><i class="fas fa-edit">EDIT</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_view') ?>" class="btn btn-primary text-bold btn-xs btn-block"><i class="fas fa-search">VIEW</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-success text-bold btn-xs btn-block"><i class="fas fa-check">ACCEPT</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-danger text-bold btn-xs btn-block"><i class="fas fa-trash">DISCARD</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-warning text-bold btn-xs btn-block"><i class="fas fa-edit">EDIT</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_view') ?>" class="btn btn-primary text-bold btn-xs btn-block"><i class="fas fa-search">VIEW</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-success text-bold btn-xs btn-block"><i class="fas fa-check">ACCEPT</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-danger text-bold btn-xs btn-block"><i class="fas fa-trash">DISCARD</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-warning text-bold btn-xs btn-block"><i class="fas fa-edit">EDIT</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_view') ?>" class="btn btn-primary text-bold btn-xs btn-block"><i class="fas fa-search">VIEW</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-success text-bold btn-xs btn-block"><i class="fas fa-check">ACCEPT</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-danger text-bold btn-xs btn-block"><i class="fas fa-trash">DISCARD</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-warning text-bold btn-xs btn-block"><i class="fas fa-edit">EDIT</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_view') ?>" class="btn btn-primary text-bold btn-xs btn-block"><i class="fas fa-search">VIEW</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-success text-bold btn-xs btn-block"><i class="fas fa-check">ACCEPT</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-danger text-bold btn-xs btn-block"><i class="fas fa-trash">DISCARD</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-warning text-bold btn-xs btn-block"><i class="fas fa-edit">EDIT</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_view') ?>" class="btn btn-primary text-bold btn-xs btn-block"><i class="fas fa-search">VIEW</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-success text-bold btn-xs btn-block"><i class="fas fa-check">ACCEPT</i></a>
											<a href="<?php echo site_url('BillingInvoiceController/billing_invoice_edit') ?>" class="btn btn-danger text-bold btn-xs btn-block"><i class="fas fa-trash">DISCARD</i></a>
										</td>
										<td>
											<?php
											foreach ($duedate as $row) {
												echo "<option value='" . $row['id'] . "'>" . $row['due_date'] . "</option>";
											}
											?>
										</td>
										<td>
											<?php
											foreach ($birthdate as $row) {
												echo "<option value='" . $row['firstname'] . "'>" . $row['firstname'] . "</option>";
											}
											?>
										</td>
										<td>
											<?php
											foreach ($birthdate as $row) {
												echo "<option value='" . $row['firstname'] . "'>" . $row['firstname'] . "</option>";
											}
											?>
										</td>
										<td>
											<?php
											foreach ($birthdate as $row) {
												echo "<option value='" . $row['firstname'] . "'>" . $row['firstname'] . "</option>";
											}
											?>
										</td>
									</tr>
								</thead>
							</table>

							<div class="modal" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Modal title</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p>Modal body text goes here.</p>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-primary">Save changes</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>