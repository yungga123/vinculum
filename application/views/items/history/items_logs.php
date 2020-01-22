<?php
defined('BASEPATH') or exit('No direct script access allowed.');

?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">History</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="card card-primary">
						<div class="card-header">Date Range</div>
						<div class="card-body">
							<?php echo form_open('specific-logs',["id" => "","class" => "col-sm-6 offset-sm-3"]) ?>
							<?php date_default_timezone_set("Asia/Manila") ?>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="">From</label>
										<input class="form-control" type="date" id="date_from" name="date_from" value="<?php if($specific == FALSE){ echo date("Y-m-d"); } else { echo date("Y-m-d",strtotime($date_from)); }  ?>">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label for="">To</label>
										<input class="form-control" type="date" id="date_to" name="date_to" value="<?php if($specific == FALSE){ echo date("Y-m-d"); } else { echo date("Y-m-d",strtotime($date_to)); }  ?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6 offset-sm-3">
									<button class="btn btn-block btn-primary" type="submit">Proceed</button>
								</div>
							</div>
							
							<?php echo form_close() ?>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="card card-primary">
						<div class="card-header">
							<div class="card-title">
								<h5>Item Register History</h5>
							</div>
							<div class="card-tools">
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-print-logs"><i class="fas fa-print"></i> Print</button>
							</div>
						</div>

						<div class="card-body">
							<table id="item_register_history" class="table table-bordered table-hover" style="width: 100%">
			            		<thead>
			            			<tr>
			            				<th>Transaction ID</th>
										<th>Item Code</th>
										<th>Item Name</th>
										<th>Category</th>
										<th>Date Added</th>
										<th>Time Added</th>
										<th>Dealer's Price</th>
										<th>Seller's Price</th>
										<th>Stocks Added</th>
										<th>Location</th>
										<th>Supplier</th>
										<th>Encoder</th>
										<th>Date Registered</th>
			            			</tr>
			            		</thead>

			            		<tbody>
			            			<?php foreach ($results as $row): ?>
			            				<tr>
				            				<td><?php echo $row->id ?></td>
											<td><?php echo $row->itemCode ?></td>
											<td><?php echo $row->itemName ?></td>
											<td><?php echo $row->itemType ?></td>
											<td><?php echo $row->dateLog ?></td>
											<td><?php echo $row->timeLog ?></td>
											<td><?php echo $row->itemSupplierPrice ?></td>
											<td><?php echo $row->itemPrice ?></td>
											<td><?php echo $row->stocksRegistered ?></td>
											<td><?php echo $row->location ?></td>
											<td><?php echo $row->supplier ?></td>
											<td><?php echo $row->encoder ?></td>
											<td><?php echo $row->date_of_purchase ?></td>
				            			</tr>
			            			<?php endforeach ?>
			            			
			            		</tbody>

			            	</table>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="card card-primary">
						<div class="card-header">
							<div class="card-title">
								<h5>Item Delete History</h5>
							</div>
							<div class="card-tools">
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-print-deleted-logs"><i class="fas fa-print"></i> Print</button>
							</div>
						</div>

						<div class="card-body">
							<table id="item_delete_history" class="table table-bordered table-hover" style="width: 100%">
			            		<thead>
			            			<tr>
			            				<th>Date</th>
			            				<th>Time</th>
			            				<th>Item Code</th>
										<th>Item Name</th>
										<th>Category</th>
										<th>Original Price</th>
										<th>Selling Price</th>
			            			</tr>
			            		</thead>

			            		<tbody>
			            			<?php foreach ($results2 as $row): ?>
			            				<tr>
				            				<td><?php echo $row->dateLog ?></td>
				            				<td><?php echo $row->timeLog ?></td>
				            				<td><?php echo $row->item_code ?></td>
				            				<td><?php echo $row->item_name ?></td>
				            				<td><?php echo $row->item_type ?></td>
				            				<td><?php echo $row->itemSupplierPrice ?></td>
				            				<td><?php echo $row->itemPrice ?></td>
				            			</tr>
			            			<?php endforeach ?>
			            		</tbody>

			            	</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>

<div class="modal fade" id="modal-print-logs">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Date Range Select</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<?php echo form_open(site_url('print-logs'),['class' => 'form-horizontal','target' => '_blank']) ?>
					<div class="form-group row">
						<label for="start_date" class="col-sm-3 col-form-label">Start Date</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" id="start_date" name="start_date" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="end_date" class="col-sm-3 col-form-label">End Date</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" id="end_date" name="end_date" required>
						</div>
					</div>
				
			</div>

			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Proceed</button>
				<?php echo form_close() ?>
			</div>
		</div>
	<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-print-deleted-logs">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Date Range Select</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<?php echo form_open('LogsController/print_deleted_logs',['class' => 'form-horizontal','target' => '_blank']) ?>
					<div class="form-group row">
						<label for="start_date" class="col-sm-3 col-form-label">Start Date</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" id="start_date" name="start_date" required>
						</div>
					</div>

					<div class="form-group row">
						<label for="end_date" class="col-sm-3 col-form-label">End Date</label>
						<div class="col-sm-9">
							<input type="date" class="form-control" id="end_date" name="end_date" required>
						</div>
					</div>
				
			</div>

			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Proceed</button>
				<?php echo form_close() ?>
			</div>
		</div>
	<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->