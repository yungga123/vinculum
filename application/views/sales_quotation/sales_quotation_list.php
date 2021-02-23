<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">List of Sales Quotation</h1>
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
							Sales Quotation Table
						</div>

						<div class="card-body">
							<div class="col-sm-12">
								<table id="salesquotation_table" class="table table-bordered table-hover div-service" style="width: 100%">
				            		<thead>
				            			<tr>
				            				<th>Quotation ID</th>
											<th>Customer Name</th>
											<th>Contact Person</th>
											<th>Contact Number</th>
											<th>Email</th>
				            				<th>Location</th>
				            				<th>Type of Project</th>
				            				<th>Subject</th>
				            				<th>Sales</th>
				            				<th>Date Created</th>
				            				<th>Operation</th>
				            			</tr>
				            		</thead>
			            		</table>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
</div>