<?php

defined('BASEPATH') or die('Access Denied');

date_default_timezone_set("Asia/Manila");

$start_date_format = date_format(date_create($start_date),'F d, Y');
$end_date_format = date_format(date_create($end_date),'F d, Y');
$cpullout_total_price = number_format("0",2);
$cpullout_final_price = number_format("0",2);

foreach ($total_price as $row) {
	$cpullout_total_price = number_format($row->total_price,2);}

foreach ($final_price as $row) {
	$cpullout_final_price = number_format($row->final_price,2);
}
?>

<div class="content-wrapper">
	
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Confirmed Pullouts</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-header"> 
							<label>Please Select Date Range</label>
						</div>

						<div class="card-body">
							<div class="row">
								<div class="col-12">
									<?php echo form_open('specific_confirmed_pullouts') ?>
									<div class="form-group">
										<input type="text" class="form-control" name="conpulledout_daterange" id="conpulledout_daterange" readonly>
									</div>

									<input type="hidden" class="form-control" name="cpullout_start_date" id="cpullout_start_date">
									<input type="hidden" class="form-control" name="cpullout_end_date" id="cpullout_end_date">

									<button type="submit" class="btn btn-block btn-success text-bold"><i class="fas fa-search"></i> VIEW</button>
									<?php echo form_close() ?>
								</div>
							</div>											
						</div>

						
					</div>
				</div>

				<div class="col-sm-6">
					<div class="card">
						<div class="card-header">
							<label>Operations</label>
						</div>

						<div class="card-body">
							<a href="<?php echo site_url('print-pullout/'.$start_date.'/'.$end_date) ?>" class="btn btn-success btn-block text-bold" target="_blank"><i class="fas fa-print"></i> PRINT DATE COVERAGE</a>

							<a class="btn btn-primary btn-block text-bold" href="<?php echo site_url('return-history') ?>"><i class="fas fa-history"></i> RETURN OF ITEMS LOGS</a>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<label>Date Covered: <span class="text-red"><?php echo $start_date_format.' to '.$end_date_format ?></span></label>
						</div>

						<div class="card-body">
							<table class="table table-bordered table-hover table-confirmedpullout" style="width: 100%">

								<thead>
									<tr>
										<th>ID</th>
										<th>Confirm Date</th>
										<th>Date/Time Pending</th>
										<th>Item Code</th>
										<th>Item Name</th>
										<th>Selling Price</th>
										<th>Stocks Pulled Out</th>
										<th>Pulled Out to</th>
										<th>Total Price</th>
										<th>Less Price</th>
										<th>Final Price</th>
										<th>Operation</th>
									</tr>
								</thead>

								<tbody>
									<?php foreach ($results_confirm_pullout as $row): ?>
										<tr>
											<td><?php echo $row->id ?></td>
											<td><?php echo $row->confirm_date ?></td>
											<td><?php echo $row->date_of_pullout ?></td>
											<td><?php echo $row->item_code ?></td>
											<td><?php echo $row->itemName ?></td>
											<td><?php echo number_format($row->itemPrice,2) ?></td>
											<td><?php echo $row->stocks_pulled_out ?></td>
											<td><?php echo $row->CompanyName ?></td>
											<td><?php echo number_format($row->itemPrice*$row->stocks_pulled_out,2) ?></td>
											<td><?php echo number_format($row->discount,2) ?></td>
											<td><?php echo number_format(($row->itemPrice*$row->stocks_pulled_out)-$row->discount,2) ?></td>
											<td>
												<button type="button" class="btn btn-danger btn-sm text-bold btn-delete-cpullout" title="Delete" data-toggle="modal" data-target=".modal_delete_pullout"><i class="fas fa-trash"></i></button>

												<button type="button" class="btn btn-success btn-sm text-bold btn-get-cpullout" title="Return" data-toggle="modal" data-target=".modal_confirmed_pullout"><i class="fas fa-undo"></i></button>
											</td>
										</tr>
									<?php endforeach ?>
									
								</tbody>

							</table>
						</div>

						<div class="card-body">
							<div class="text-right">
								<p><label>Total Price (Without Less): <span class="text-red"><?php echo $cpullout_total_price ?> PHP</span></label></p>

								<p><label>Final Price: <span class="text-red"><?php echo $cpullout_final_price ?> PHP</span></label></p>
							</div>
							
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

</div>


<div class="modal fade modal_confirmed_pullout" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<label style="font-size: 22px;font-weight: bold;">Do you want to return this item?</label>
				<small  class="form-text text-red">Note: Returning all items with less price will result negative in final price.</small>
				<?php echo form_open('PullOutsController/return_cpullouts',["id" => "form-return-pullouts"]) ?>
				<div class="form-group">
					<label for="cpullout_id">Item ID</label>
					<input class="form-control text-center text-bold" type="text" name="cpullout_id" id="cpullout_id" readonly>
				</div>

				<div class="form-group">
					<input class="form-control" type="text" name="cpullout_stocks_return" id="cpullout_stocks_return" placeholder="Enter stocks pulled out to return.">
				</div>

				<button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> YES</button>
	    		<button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> NO</button>
	    		<?php echo form_close() ?>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<div class="modal fade modal_delete_pullout" style="display: none;" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<p></p><label class="text-red" style="font-size: 20px;">Removing items in confirmed pullouts is invalid.</label>

				<p><label style="font-size: 20px;">Confirming this message will be <span class="text-red">sent as request</span> to delete this item. Do you you want to request to delete this item?</label></p>

				<div class="form-group">
					<label for="cpullout_delete_id">Item ID</label>
					<input class="form-control text-center text-bold" type="text" name="cpullout_delete_id" id="cpullout_delete_id" readonly>
				</div>

				<button type="success" class="btn btn-success text-bold"><i class="fas fa-check"></i> YES</button>
	    		<button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> NO</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
