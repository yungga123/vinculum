<?php
defined('BASEPATH') or exit('No direct script access allowed.');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Actual Stocks of Items</h1>
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
							<p class="text-danger">Note: Actual stocks are here and can pullout.</p>
						</div>

						<div class="card-body">
							<table id="item_actual_stocks_dt" class="table table-bordered table-hover" style="width: 100%">
			            		<thead>
			            			<tr>
			            				<th>Item Code</th>
			            				<th>Item Name</th>
			            				<th>Category</th>
			            				<th>Original Price</th>
			            				<th>Selling Price</th>
			            				<th>No. of Stocks</th>
			            				<th>Re-stocking Date</th>
			            				<th>Location</th>
			            				<th>Supplier</th>
			            				<th>Encoder</th>
			            				<th>Operation</th>
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