<?php 
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Job Order</h1>
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
                            <label>Select Item</label>
                        </div>

                        <div class="card-body">

                            <?php if ($this->uri->segment(1)=='joborder-existingcust') { ?>
                                <button class="btn btn-block btn-success text-bold" disabled><i class="fas fa-users"></i> EXISTING CUSTOMER</button>
                            <?php } else { ?>
                                <a href="<?php echo site_url('joborder-existingcust') ?>" class="btn btn-block btn-success text-bold"><i class="fas fa-users"></i> EXISTING CUSTOMER</a>
                            <?php } ?>

                            
                            <button class="btn btn-block btn-primary text-bold"><i class="fas fa-user"></i> NEW CUSTOMER</button>
                        </div>
                    </div>
                </div>

                
            