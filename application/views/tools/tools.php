<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">List of Tools</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3">
					<div class="card">
						<div class="card-header">
							<label>Tools Menu</label>
						</div>

						<div class="card-body">
							<a href="<?php echo site_url('addtools') ?>" class="btn btn-block btn-success text-bold"><i class="fas fa-plus"></i> ADD TOOLS</a>
							<button type="button" class="btn btn-block btn-warning text-bold"><i class="fas fa-print"></i> PRINT TOOLS</button>
						</div>
					</div>
				</div>
				<div class="col-sm-9">
					<div class="card">
						<div class="card-header">
							<label>Tools Table</label>
						</div>

						<div class="card-body">
							<table id="tools_table" class="table table-bordered table-hover" style="width: 100%">
			            		<thead>
			            			<tr>
			            				<th>Tool Code</th>
			            				<th>Model</th>
			            				<th>Description</th>
			            				<th>Tool Type</th>
			            				<th>Quantity</th>
			            				<th>Price</th>
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