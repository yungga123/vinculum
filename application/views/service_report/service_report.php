<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Service Report</h1>
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
                            <label>Service Report Information</label>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="customer_name">Customer Name</label>
                                        <select name="customer_name" id="customer_name" class="form-control">
                                            <option value="">---Please Select Customer---</option>
                                            
                                            <?php foreach ($results_customers as $row) { ?>
                                                <option value="<?php echo $row->CustomerID ?>"><?php echo $row->CompanyName.' --- '.$row->CustomerID ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input type="text" name="description" id="description" class="form-control">
                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="date_requested">Date Requested</label>
                                        <input type="date" name="date_requested" id="date_requested" class="form-control" value="<?php echo date('Y-m-d') ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="date_implemented">Date Implemented</label>
                                        <input type="date" name="date_implemented" id="date_implemented" class="form-control" value="<?php echo date('Y-m-d') ?>">
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