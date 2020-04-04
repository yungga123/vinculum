<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">List of Project Reports</h1>
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
							Project Report Table
						</div>

						<div class="card-body">
							<table id="projectReport_table" class="table table-bordered table-hover table-sm" style="width: 100%">
			            		<thead>
			            			<tr>
			            				<th>Project ID</th>
			            				<th>Project Name</th>
			            				<th>Project Description</th>
			            				<th>Date Requested</th>
			            				<th>Date Implemented</th>
			            				<th>Date Finished</th>
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