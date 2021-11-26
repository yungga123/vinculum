<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="page-header m-0 text-dark">Project Request Form</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
<form action="<?php echo site_url('ConsumeablesController/new_blank_order_summary');?>" method="post">
      <button type="submit" name="Submit" value="insert_data" class="btn btn-primary" style="float: right; margin-top: -30px;">SUBMIT</button>
	  </div><!-- /.container-fluid -->
</div>
<div class="container-fluid" style="background: white; margin-bottom: 1%; max-width: 100%; height: auto;">
<section class="content">
<table class="table table-bordered">

  <thead>
    <tr>
      <th scope="col" colspan="5">Project Name:
      <input style="float: right; width: 75%;" type="text" name="project_name" value="<?php echo set_value('project_name'); ?>" required>
      </th>
      <th scope="col" colspan="5">Date Requested:
      <input style="width: 75%; float: right;" type="date" name="date_requested" value="<?php echo set_value('date_requested'); ?>" required>
      </th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col" colspan="5">Project Activity:
      <input style="float: right; width: 75%;" type="text" name="project_activity" value="<?php echo set_value('project_activity'); ?>" required>
      </th>
      <th scope="col" colspan="5">Date Issued:
      <input style="width: 75%; float: right;" type="date" name="date_issued" value="<?php echo set_value('date_issued'); ?>" required>
      </th>
    </tr>
</form>
  </thead>
  <tbody>
  <thead>
    <tr>
    <th scope="col" colspan="10" style="background-color: gray;"></th>
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
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>                                                                                                                                                                            <td scope="col">
    <input type="text" name="indirect_items" id="indirect_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
        <input type="checkbox" name="checkbox" style="width: 100%;" required>
      </td>
      <th scope="col">
        <input type="number" name="quantity" style="width: 40px; height: auto;" required>
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;" required>
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;">
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;">
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="purchase_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
        </form>
    </tr>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="indirect_items" id="indirect_items" placeholder="" style="width: 100%;">
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;">
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;">
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="indirect_items" id="indirect_items" placeholder="" style="width: 100%;">
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  name="remarks3" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="indirect_items" id="indirect_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
      </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="indirect_items" id="indirect_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
          <input type="number" name="quantity3" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="indirect_items" id="indirect_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="indirect_items" id="indirect_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="indirect_items" id="indirect_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="indirect_items" id="indirect_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="indirect_items" id="indirect_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;" >
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;" >
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;" >
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto; align: center;" >
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto; align: center;" >
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="indirect_items" id="indirect_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;" >
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px;" >
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;" >
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto; align: center;" >
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto; align: center;" >
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
</form>
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
  <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="direct_items" id="direct_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="direct_items" id="direct_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="direct_items" id="direct_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="direct_items" id="direct_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="direct_items" id="direct_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="direct_items" id="direct_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="direct_items" id="direct_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="direct_items" id="direct_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="direct_items" id="direct_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="direct_items" id="direct_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="direct_items" id="direct_items" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
</form>
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
  <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="tools" id="tools" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="tools" id="tools" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="tools" id="tools" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="tools" id="tools" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="tools" id="tools" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="tools" id="tools" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="tools" id="tools" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="tools" id="tools" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="tools" id="tools" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="tools" id="tools" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
    </form>
    <form method="post" action="<?php echo site_url('RequisitionFormController/index');?>">
    <tr>
    <td scope="col">
    <input type="text" name="tools" id="tools" placeholder="" style="width: 100%;" >
    </td>
      <td scope="col">
      <input type="checkbox" name="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity2" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity3" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  name="remarks2" id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
        <td>
        <button type="submit" name="add_request" class="btn btn-success" style="float: right;">add request</button>
        </td>
    </tr>
</form>
  </tbody>
</div>
  <thead>
    <tr>
        <th scope="col" colspan="10" style="background-color: gray;"></th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col" colspan="5">Prepared By:
      <input style="width: 80%; float: right;" type="text" name="prepared_by" required>
      </th>
      <th scope="col" colspan="5">Person In Charge:
      <input style="float: right; width: 75%;" type="text" name="person_in_charge" required>
      </th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col" colspan="5">Check By:
      <input style="width: 80%; float: right;" type="text" name="check_by" required>
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
        <textarea name="remarks3" id="remarks" rows="4" style="width: 100%;"></textarea>
        </th>
    </tr>
  </thead>
</table>
</div>