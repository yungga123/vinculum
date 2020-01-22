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
	                <h3><?php echo $countItem ?></h3>

	                <p>Registered Items</p>
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
	                <h3>44</h3>

	                <p>Scheduled Tasks</p>
	              </div>
	              <div class="icon">
	                <i class="fas fa-calendar-alt"></i>
	              </div>
	              <a href="javascript:void(0)" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	            </div>
          	</div>

          	<div class="col-lg-3 col-6">
	            <!-- small box -->
	            <div class="small-box bg-success">
	              <div class="inner">
	                <h3>45</h3>

	                <p>Customer Inquiries</p>
	              </div>
	              <div class="icon">
	                <i class="fas fa-users"></i>
	              </div>
	              <a href="javascript:void(0)" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

      	</div>
      </div>
  	</section>
  </div>