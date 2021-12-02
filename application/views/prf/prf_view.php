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

  <thead>
    <tr>
      <th scope="col" colspan="5">Project Name:<?php echo set_value('project_name'); ?>
      </th>
      <th scope="col" colspan="5">Date Requested:<?php echo set_value('date_requested'); ?>
      </th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col" colspan="5">Project Activity:<?php echo set_value('project_activity'); ?>
      </th>
      <th scope="col" colspan="5">Date Issued:<?php echo set_value('date_issued'); ?>
      </th>
    </tr>
  </thead>
  <tbody>
  <thead>
    <tr>
    <th scope="col" colspan="10"></th>
    </tr>
  </thead>
    <thead>
    <tr>
    <th scope="col" colspan="4"></th>
        <th colspan="2" style="text-align: center;">Consumed</th>
        <th colspan="4" style="text-align: center;">Returns</th>
    </tr>
  </thead>
    <thead style="text-align: center;">
    <tr>
      <th scope="col">Indirect Items</th>
      <th scope="col">✔</th>
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
      <td scope="col">
      <?php echo set_value('checkbox'); ?>
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
        <td style="text-align: center;">
        <button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button>
        <br>
        <br>
        <button type="button" class="btn btn-danger"><i class="fas fa-ban"></i></button>
        <br>
        <br>
        <button type="button" class="btn btn-primary"><i class="fas fa-file-powerpoint"></i></button>
        <br>
        <br>
        <button type="button" class="btn btn-success"><i class="fas fa-check-square"></i></button>
        </td>
    </tr>
  </tbody>
</table>

<!-- direct items -->
<table class="table table-bordered">
  <tbody>
    <thead>
    <tr>
    <th scope="col" colspan="4"></th>
        <th colspan="2" style="text-align: center;">Consumed</th>
        <th colspan="4" style="text-align: center;">Returns</th>
    </tr>
  </thead>
    <thead style="text-align: center;">
    <tr>
      <th scope="col">Direct Items</th>
      <th scope="col">✔</th>
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
      <td scope="col">
      <?php echo set_value('checkbox'); ?>
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
        <td style="text-align: center;">
        <button type="button" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
        <br>
        <br>
        <button type="button" class="btn btn-danger btn-sm"><i class="fas fa-ban"></i></button>
        <br>
        <br>
        <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-file-powerpoint"></i></button>
        <br>
        <br>
        <button type="button" class="btn btn-success btn-sm"><i class="fas fa-check-square"></i></button>
        </td>
    </tr>
  </tbody>
</table>

<!-- tools -->
<table class="table table-bordered">
  <tbody>
    <thead>
    <tr>
    <th scope="col" colspan="4"></th>
        <th colspan="2" style="text-align: center;">Consumed</th>
        <th colspan="4" style="text-align: center;">Returns</th>
    </tr>
  </thead>
    <thead style="text-align: center;">
    <tr>
      <th scope="col">Tools</th>
      <th scope="col">✔</th>
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
      <td scope="col">
      <?php echo set_value('checkbox'); ?>
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
        <td style="text-align: center;">
        <button type="button" style="margin: 1%;" class="btn btn-warning"><i class="fas fa-edit"></i></button>
        <br>
        <br>
        <button type="button" class="btn btn-danger"><i class="fas fa-ban"></i></button>
        <br>
        <br>
        <button type="button" class="btn btn-primary"><i class="fas fa-file-powerpoint"></i></button>
        <br>
        <br>
        <button type="button" class="btn btn-success"><i class="fas fa-check-square"></i></button>
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