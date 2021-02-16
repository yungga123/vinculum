<?php
defined('BASEPATH') or die('Access Denied');


$start_date_format = date_format(date_create($start_date),'F d, Y');
$end_date_format = date_format(date_create($end_date),'F d, Y');

$r_total_price = number_format("0",2);
$r_return_price = number_format("0",2);

foreach ($total_price as $row) {
	$r_total_price = number_format($row->total_price,2);
}

foreach ($return_price as $row) {
	$r_return_price = number_format($row->return_price,2);
}
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Return of Items History</h1>
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
						<div class="card-header">
							<label>Please Select Date Range</label>
						</div>

						<div class="card-body col-sm-4 offset-sm-4">
							<?php echo form_open('specific-return-history') ?>
							<div class="form-group">
								<label for="cpullout_return_date">Date Range</label>
								<input class="form-control" type="text" name="cpullout_return_date" id="cpullout_return_date" readonly>
							</div>

							<input class="form-control" type="hidden" name="rpullout_start_date" id="rpullout_start_date" readonly>
						
							<input class="form-control" type="hidden" name="rpullout_end_date" id="rpullout_end_date" readonly>


							<button type="submit" class="btn btn-success btn-block text-bold"><i class="fas fa-check"></i> PROCEED</button>
							<?php echo form_close() ?>
						</div>


					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<label>Date Coverage: <span class="text-red"><?php echo $start_date_format.' to '.$end_date_format ?></span></label>
						</div>

						<div class="card-body">
							<table class="table table-bordered table-hover table-returnhistory" style="width: 100%">

								<thead>
									<tr>
										<th>Return ID</th>
										<th>Date Processed</th>
										<th>Confirm ID</th>
										<th>Item Code</th>
										<th>Item Name</th>
										<th>Item Type</th>
										<th>Item Price</th>
										<th>Stocks Pulled out</th>
										<th>Stocks Returned</th>
										<th>Pullout to</th>
										<th>Total Cost</th>
										<th>Return Cost</th>
									</tr>
								</thead>

								<tbody>

									<?php foreach ($results as $row): ?>
										<tr>
											<td><?php echo $row->return_id ?></td>
											<td><?php echo date_format(date_create($row->date_processed),"F d, Y g:i A");  ?></td>
											<td><?php echo $row->confirm_id ?></td>
											<td><?php echo $row->item_code ?></td>
											<td><?php echo $row->item_name ?></td>
											<td><?php echo $row->itemType ?></td>
											<td><?php echo number_format($row->itemPrice,2) ?></td>
											<td><?php echo $row->stocks_pulled_out ?></td>
											<td><?php echo $row->stocks_returned ?></td>
											<td><?php echo $row->pullout_to ?></td>
											<td><?php echo number_format($row->stocks_pulled_out*$row->itemPrice,2) ?></td>
											<td><?php echo number_format($row->stocks_returned*$row->itemPrice,2) ?></td>
										</tr>
									<?php endforeach ?>
									
								</tbody>

							</table>
						</div>

						<div class="card-body">
							<div class="text-right">
								<p><label>Total Cost: <span class="text-red"><?php echo $r_total_price ?></span></label></p>
								<p><label>Return Cost: <span class="text-red"><?php echo $r_return_price ?></span></label></p>
							</div>
						</div>

						<div class="card-footer">
							<a class="btn btn-primary text-bold" href="<?php echo site_url('confirmed-pullouts') ?>">CONFIRMED PULLOUTS</a>

							<a class="btn btn-success text-bold float-right" href="<?php echo site_url('print-return/'.$start_date.'/'.$end_date) ?>" target="_target"><i class="fas fa-print"></i> PRINT</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
</div>