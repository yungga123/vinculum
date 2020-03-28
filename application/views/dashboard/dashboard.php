<?php
defined('BASEPATH') or exit('No direct script access allowed.');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Dashboard</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	<section class="content">
      <div class="container-fluid">
      	<div class="row">
      		<div class="col-lg-3 col-6">
	            <!-- small box -->
	            <div class="small-box bg-info">
	              <div class="inner">
	                <h3><?php echo $direct_item_count ?></h3>

	                <p>Direct Items</p>
	              </div>
	              <div class="icon">
	                <i class="fas fa-barcode"></i>
	              </div>
	              <a href="<?php echo site_url('masterlistofitems') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	            </div>
          	</div>

          	<div class="col-lg-3 col-6">
          		<div class="small-box bg-warning">
	              <div class="inner">
	                <h3><?php echo $indirect_item_count ?></h3>

	                <p>Indirect Items</p>
	              </div>
	              <div class="icon">
	                <i class="fas fa-cogs"></i>
	              </div>
	              <a href="<?php echo site_url('masterlistofindirectitems') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	            </div>
          	</div>

          	<div class="col-lg-3 col-6">
	            <!-- small box -->
	            <div class="small-box bg-success">
	              <div class="inner">
	                <h3>45</h3>

	                <p>Schedules Board</p>
	              </div>
	              <div class="icon">
	                <i class="fas fa-users"></i>
	              </div>
	              <a href="<?php echo site_url('schedules') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	            </div>
	        </div>

	        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $countDispatch ?></h3>

                <p>Dispatch Forms</p>
              </div>
              <div class="icon">
                <i class="fas fa-file-signature"></i>
              </div>
              <a href="<?php echo site_url('dispatchtable') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

      	</div>

      	<div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="<?php echo site_url('customers') ?>">Customers</a></span>
                <span class="info-box-number"><?php echo number_format($customer_count) ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-hard-hat"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="<?php echo site_url('technicians') ?>">Technicians</a></span>
                <span class="info-box-number"><?php echo number_format($technicians_count) ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><a href="<?php echo site_url('pending-pullouts') ?>">Pending Pullouts</a></span>
                <span class="info-box-number"><?php echo number_format($pullouts_count) ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

        </div>
      </div>
  	</section>
  </div>