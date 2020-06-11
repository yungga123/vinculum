<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Tools Return History</h1>
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
                            <span class="text-bold">Menu Selection</span>
                        </div>

                        <div class="card-body">
                            <button type="button" class="btn btn-primary btn-block text-bold">SAMPLE BUTTON</button>
                            <button type="button" class="btn btn-primary btn-block text-bold">SAMPLE BUTTON</button>
                            <button type="button" class="btn btn-primary btn-block text-bold">SAMPLE BUTTON</button>
                            <button type="button" class="btn btn-primary btn-block text-bold">SAMPLE BUTTON</button>
                        </div>

                        <div class="card-footer">
                            <a href="<?php echo site_url('tools') ?>" class="btn btn-success btn-block text-bold"><i class="fas fa-wrench"></i> TOOLS LIST</a>
                            <a href="<?php echo site_url('tools-pullout') ?>" class="btn btn-primary btn-block text-bold"><i class="fas fa-sign-out-alt"></i> TOOLS PULLOUT LIST</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9">
                    <div class="card">
                        <div class="card-header">
                            <span class="text-bold">Return History Table</span>
                        </div>

                        <div class="card-body">
                            <table id="tools_return_history" class="table table-bordered table-hover" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Pullout ID</th>
			            				<th>Tool Code</th>
			            				<th>Tool Model</th>
			            				<th>Tool Description</th>
			            				<th>Assigned to</th>
			            				<th>Customer</th>
                                        <th>Quantity</th>
                                        <th>Date of Pullout</th>
                                        <th>Time of Pullout</th>
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