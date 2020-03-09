<?php 
defined('BASEPATH') or exit('Access Denied');
 ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Pull OUT Item</h1>
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
						<div class="card-header" style="font-weight: bold;">First Step: Select A Customer</div>

						<div class="card-body">

							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Customer Name</label>
										<select class="form-control" name="" id="">
											<option value="">---</option>

											<?php foreach ($customer_results as $row): ?>
												<option value="<?php echo $row->CustomerID ?>"><?php echo $row->CompanyName.' --- '.$row->CustomerID ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<p style="font-weight: bold;">Second Step: Search Item to Pullout</p>
						</div>

						<div class="card-body">
							<div class="row">
								<div class="col-8">
									<div class="form-group">
										<div class="input-group input-group">
											<input type="text" class="form-control" placeholder="Search Item Name or Item Code">
											<span class="input-group-append">
											<button type="button" class="btn btn-info btn-flat"><i class="fas fa-search"></i> Search</button>
											</span>
										</div>
									</div>
								</div>		
							</div>
						</div>

						<div class="card-body">
							<div class="row">
								<div class="col-12">
									<div class="table-responsive">
										<table class="table table-bordered table-hover">

											<thead>
												<tr>
													<th>Item Code</th>
													<th>Description</th>
													<th>Category</th>
													<th>Supplier Price</th>
													<th>Selling Price</th>
													<th>No. of Stocks</th>
													<th>Date of Purchase</th>
													<th>Location</th>
													<th>Supplier</th>
													<th>Encoder</th>
													<th>Operation</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td>DS-CHUCHU</td>
													<td>Chichichic</td>
													<td>Direct</td>
													<td>2400.00</td>
													<td>3000.00</td>
													<td>8</td>
													<td>January 28, 2020</td>
													<td>SHOWROOM</td>
													<td>HYE</td>
													<td>Irish</td>
													<td><button class="btn btn-danger">Pullout</button></td>
												</tr>
											</tbody>

										</table>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>