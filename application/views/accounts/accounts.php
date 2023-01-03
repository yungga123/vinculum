<?php
defined('BASEPATH') or die('No direct script access allowed.');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Masterlist of Items</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
                        <div class="card-header d-flex p-0">
                            <h3 class="card-title p-3">Accounts List</h3>
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Active</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Pending</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Tab 3</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                                    Dropdown <span class="caret"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>

			            <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <table id="item_masterlist" class="table table-bordered table-hover" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>Item Code</th>
                                                <th>Description</th>
                                                <th>Brand</th>
                                                <th>Item Size</th>
                                                <th>Category</th>
                                                <th>Supplier's Price</th>
                                                <th>SRP</th>
                                                <th>Project Price</th>
                                                <th>No. of Stocks</th>
                                                <th>Date Added</th>
                                                <th>Location</th>
                                                <th>Supplier</th>
                                                <th>Encoder</th>
                                                <th>Operation</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div class="tab-pane" id="tab_2">
                                    <table id="item_masterlist" class="table table-bordered table-hover" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>Item Code</th>
                                                <th>Description</th>
                                                <th>Brand</th>
                                                <th>Item Size</th>
                                            
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
						</div>
						
						<div class="card-footer">
							<a href="<?php echo site_url('exportitems/').$category ?>" class="btn btn-success text-bold float-right"> <i class="fas fa-file-excel"></i> EXPORT TO EXCEL</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>