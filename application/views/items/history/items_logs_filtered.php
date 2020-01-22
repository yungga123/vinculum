<?php
defined('BASEPATH') or exit('No direct script access allowed.');
?>

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
						<div class="card-header">
							<div class="card-title">
								<h5>Item Register History</h5>
							</div>

							<div class="card-tools">
								<p>Date Covered: Nov. 27, 2019 to Nov. 27, 2019</p>
								<a href="#" class="btn btn-success"><i class="fas fa-print"></i> Print</a>
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
										<th>Dealer's Price</th>
										<th>Seller's Price</th>
										<th>Stocks Added</th>
										<th>Location</th>
										<th>Supplier</th>
										<th>Encoder</th>
										<th>Date Purchased</th>
			            			</tr>
			            		</thead>

			            		<tbody>
			            			<?php foreach ($result_register_history as $row): ?>
			            				<tr>
				            				<td><?php echo $row->id ?></td>
				            				<td><?php echo $row->itemCode ?></td>
				            				<td><?php echo $row->itemName ?></td>
				            				<td><?php echo $row->itemType ?></td>
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
		</div>
	</section>

</div>