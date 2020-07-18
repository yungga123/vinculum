<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Payroll Table</h1>
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
                            <label>List of Payroll</label>
                            <a href="<?php echo site_url('payroll') ?>" class="btn btn-success text-bold float-right"><i class="fas fa-plus"></i> ADD PAYROLL</a>
                        </div>

                        <div class="card-body">
                            <table id="payroll_table" class="table table-bordered table-hover" style="width: 100%">
			            		<thead>
			            			<tr>
                                        <th>Payroll ID</th>
                                        <th>Cut-Off Date</th>
                                        <th>Employee ID</th>
                                        <th>Employee Name</th>
                                        <th>Position</th>
                                        <th>Daily Rate</th>
                                        <th>Gross Pay</th>
                                        <th>Net Pay</th>
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