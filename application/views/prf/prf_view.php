<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="page-header m-0 text-dark">Project Request Form View</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="container-fluid" style="background: white; margin-bottom: 1%; max-width: 100%; height: auto;">
    <section class="content">
      <table class="table table-bordered">
        <thead style="text-align: center;">
          <tr>
            <th scope="col">Indirect Items No.</th>
            <th scope="col">Operations</th>
            <th>Quantity</th>
            <th>Available</th>
            <th>Quantity</th>
            <th>Remarks</th>
            <th>Quantity</th>
            <th>Remarks</th>
            <th>Counted</th>
          </tr>
        </thead>

        <tbody>
          <!-- indirect items -->
          <tr>
            <td scope="col">
              <?php echo set_value('indirect_items'); ?>
            </td>
            <td scope="col" style="text-align: center">
              <a href="<?php echo site_url('PrfController/edit'); ?>" class="btn btn-warning btn-sm" name="edit"><i class="fas fa-edit"></i></a>
              <br>
              <br>
              <button type="button" class="btn btn-primary btn-sm"><i class="fab fa-searchengin"></i></button>
            </td>
            <th scope="col">
              <?php echo set_value('quantity'); ?>
            </th>
            <td>
              <?php echo set_value('available'); ?>
            </td>
            <td>
              <?php echo set_value('quantity2'); ?>
            </td>
            <td>
              <?php echo set_value('remarks'); ?>
            </td>
            <td>
              <?php echo set_value('quantity3'); ?>
            </td>
            <td>
              <?php echo set_value('remarks2'); ?>
            </td>
            <td>
              <?php echo set_value('counted'); ?>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- direct items -->
      <table class="table table-bordered">
        <tbody>
          <thead style="text-align: center;">
            <tr>
              <th scope="col">Direct Items No.</th>
              <th scope="col">Operations</th>
              <th>Quantity</th>
              <th>Available</th>
              <th>Quantity</th>
              <th>Remarks</th>
              <th>Quantity</th>
              <th>Remarks</th>
              <th>Counted</th>
            </tr>
          </thead>
          <tr>
            <td scope="col">
              <?php echo set_value('direct_items'); ?>
            </td>
            <td style="text-align: center;">
              <a href="<?php echo site_url('PrfController/edit_prf'); ?>" class="btn btn-warning btn-sm" name="edit"><i class="fas fa-edit"></i></a>
              <br>
              <br>
              <button type="button" class="btn btn-primary btn-sm"><i class="fab fa-searchengin"></i></button>
            </td>
            <th scope="col">
              <?php echo set_value('quantity'); ?>
            </th>
            <td>
              <?php echo set_value('available'); ?>
            </td>
            <td>
              <?php echo set_value('quantity2'); ?>
            </td>
            <td>
              <?php echo set_value('remarks'); ?>
            </td>
            <td>
              <?php echo set_value('quantity3'); ?>
            </td>
            <td>
              <?php echo set_value('remarks2'); ?>
            </td>
            <td>
              <?php echo set_value('counted'); ?>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- tools -->
      <table class="table table-bordered">
        <tbody>
          <thead style="text-align: center;">
            <tr>
              <th scope="col">Tools No.</th>
              <th scope="col">Operations</th>
              <th>Quantity</th>
              <th>Available</th>
              <th>Quantity</th>
              <th>Remarks</th>
              <th>Quantity</th>
              <th>Remarks</th>
              <th>Counted</th>
            </tr>
          </thead>
          <tr>
            <td scope="col">
              <?php echo set_value('tools'); ?>
            </td>
            <td style="text-align: center;">
              <a href="<?php echo site_url('PrfController/edit_prf'); ?>" class="btn btn-warning btn-sm" name="edit"><i class="fas fa-edit"></i></a>
              <br>
              <br>
              <button type="button" class="btn btn-primary btn-sm"><i class="fab fa-searchengin"></i></button>
            </td>
            <th scope="col">
              <?php echo set_value('quantity'); ?>
            </th>
            <td>
              <?php echo set_value('available'); ?>
            </td>
            <td>
              <?php echo set_value('quantity2'); ?>
            </td>
            <td>
              <?php echo set_value('remarks'); ?>
            </td>
            <td>
              <?php echo set_value('quantity3'); ?>
            </td>
            <td>
              <?php echo set_value('remarks2'); ?>
            </td>
            <td>
              <?php echo set_value('counted'); ?>
            </td>
          </tr>
        </tbody>
  </div>
  <thead>
    <tr>
      <th scope="col" colspan="10"></th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col" colspan="5">Prepared By:<?php echo set_value('prepared_by'); ?>
      </th>
      <th scope="col" colspan="5">Person In Charge:<?php echo set_value('person_in_charge'); ?>
      </th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col" colspan="5">Check By:<?php echo set_value('check_by'); ?>
      </th>
      <th scope="col" colspan="5"></th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col" colspan="10"></th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col" colspan="10">Remarks:<br>
        <?php echo set_value('remarks3'); ?>
      </th>
    </tr>
  </thead>
  </table>
</div>