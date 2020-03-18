<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Pending Pullouts</h1>
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
						<div class="card-header text-bold">
							Double Check your pullouts
						</div>

						<div class="card-body">
							<table class="table table-bordered table-hover table-pendingpullout" style="width: 100%">

								<thead>
									<tr>
										<th>ID</th>
										<th>Item Code</th>
										<th>Description</th>
										<th>Item Type</th>
										<th>Supplier Price</th>
										<th>SRP</th>
										<th>No. of Stocks</th>
										<th>Stocks to pullout</th>
										<th>Pulled out to</th>
										<th>Total Price</th>
										<th>Less Price</th>
										<th>Final Price</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody>
									<?php foreach ($results as $row): ?>
									<tr>
										<td><?php echo $row->id ?></td>
										<td><?php echo $row->item_code ?></td>
										<td><?php echo $row->itemName ?></td>
										<td><?php echo $row->itemType ?></td>
										<td><?php echo $row->itemSupplierPrice ?></td>
										<td><?php echo $row->itemPrice ?></td>
										<td><?php echo $row->stocks ?></td>
										<td><?php echo $row->stocks_to_pullout ?></td>
										<td><?php echo $row->CompanyName ?></td>
										<td><?php echo $row->total_price ?></td>
										<td><?php echo $row->discount ?></td>
										<td><?php echo $row->final_price ?></td>
										<td>
											<a href="<?php echo site_url('PullOutsController/delete_pending_pullout/'.$row->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i> Delete</a>
											<button type="button" class="btn btn-warning btn-sm"><i class="fas fa-tag"></i> Less</button>
										</td>
									</tr>
									<?php endforeach ?>
								</tbody>

							</table>
						</div>

						<div class="card-body">
							<div class="text-right">
								<p><label>Total Price (Without Less) : <span class="text-red">0.00</span></label></p>
								<p><label>Final Price : <span class="text-red">0.00</span></label></p>
							</div>
						</div>

						<div class="card-footer">
							<a href="<?php echo site_url('Pull-Out-item') ?>" class="btn btn-primary text-bold">ADD MORE ITEMS</a>
							<button type="button" class="btn btn-success float-right text-bold">PROCEED TO PULLOUT</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>