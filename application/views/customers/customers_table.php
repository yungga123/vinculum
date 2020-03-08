<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Clients Database</h1>
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
							<p style="font-weight: bold;">Menu Selection</p>
						</div>
						<div class="card-body">
							<button class="btn btn-success"><i class="fas fa-plus"></i> Add Customer</button>

							<button class="btn btn-primary"><i class="fas fa-print"></i> Print Customer Database</button>

							<button class="btn btn-warning"><i class="fas fa-print"></i> Print Customer Details</button>

							<button class="btn btn-info"><i class="fas fa-folder"></i> Add Customer File</button>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
							<table id="customers_table" class="table table-bordered table-hover" style="width: 100%">
			            		<thead>
			            			<tr>
			            				<th>ID</th>
			            				<th>Customer Name</th>
			            				<th>Contact Person</th>
			            				<th>Address</th>
			            				<th>Contact Number</th>
			            				<th>Email Address</th>
			            				<th>Website</th>
			            				<th>Installation Date</th>
			            				<th>Interest</th>
			            				<th>Type</th>
			            				<th>Notes</th>
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