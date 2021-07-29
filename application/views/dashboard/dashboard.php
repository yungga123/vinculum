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
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <label>Schedules Today</label>
            </div>

            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <div class="card">
                    <div class="card-header">
                      <label>LEGEND</label>
                    </div>

                    <div class="card-body text-center">
                      <div class="bg-primary color-palette"><span>Installation</span></div>
                      <div class="bg-warning color-palette"><span>Services</span></div>
                      <div class="bg-danger color-palette"><span>Payables</span></div>
                      <div class="bg-success color-palette"><span>Holiday/Event</span></div>
                      <div class="bg-secondary color-palette"><span>Meeting</span></div>

                    </div>
                  </div>
                </div>

                <div class="col-sm-9">
                  <div class="card">
                    <div class="card-header">
                      <label>Schedules table</label>
                    </div>

                    <div class="card-body table-responsive p-0">
                      <table class="table table-sm table-bordered">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                          </tr>
                        </thead>

                        <tbody>

                          <?php if (count($results_today_event) > 0) : ?>

                            <?php foreach ($results_today_event as $row) : ?>
                              <tr class="<?php
                                          if ($row->type == 'installation') {
                                            echo 'bg-primary';
                                          } else if ($row->type == 'service') {
                                            echo 'bg-warning';
                                          } else if ($row->type == 'payables') {
                                            echo 'bg-danger';
                                          } else if ($row->type == 'holiday') {
                                            echo 'bg-success';
                                          } else if ($row->type == 'meeting') {
                                            echo 'bg-secondary';
                                          }

                                          ?>">
                                <td><?php echo $row->title ?></td>
                                <td><?php echo str_replace("\n", "<br>", $row->description) ?></td>
                                <td><?php echo date_format(date_create($row->start), 'M d, Y h:i A') ?></td>
                                <td><?php echo date_format(date_create($row->end), 'M d, Y h:i A') ?></td>
                              </tr>
                            <?php endforeach ?>

                          <?php else : ?>
                            <tr>
                              <td class="text-center text-bold text-danger" colspan="4">NO SCHEDULES FOR TODAY</td>
                            </tr>
                          <?php endif ?>



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
              <h3><?php echo count($results_today_event) ?></h3>

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

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-wrench"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><a href="<?php echo site_url('tools') ?>">Registered Tools</a></span>
              <span class="info-box-number"><?php echo $tools_count ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

      </div>

      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $count_ctc ?></h3>

              <p>CTC Records</p>
            </div>
            <div class="icon">
              <i class="fas fa-users-cog"></i>
            </div>
            <a href="<?php echo site_url('covidsurvey-table') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $count_joborder_pending ?></h3>

              <p>Pending Job Orders</p>
            </div>
            <div class="icon">
              <i class="fas fa-tools"></i>
            </div>
            <a href="<?php echo site_url('joborder-list/pending') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $count_joborder_accepted ?></h3>

              <p>Accepted Job Orders</p>
            </div>
            <div class="icon">
              <i class="fas fa-tools"></i>
            </div>
            <a href="<?php echo site_url('joborder-list/accepted') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $count_jo_phone_support ?></h3>

              <p>Phone Support</p>
            </div>
            <div class="icon">
              <i class="fas fa-phone"></i>
            </div>
            <a href="<?php echo site_url('joborder-list/filed') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>