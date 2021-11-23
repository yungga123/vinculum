<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="page-header m-0 text-dark">PRF View</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
<form action="<?php echo site_url('ConsumeablesController/new_blank_order_summary');?>" method="post">
      <button type="submit" name="Submit" value="insert_data" class="btn btn-success" style="float: right; margin-top: -30px;">Add Input</button>
	  </div><!-- /.container-fluid -->
</div>
<div class="container-fluid" style="background: white; margin-bottom: 1%; max-width: 100%; height: auto;">
<section class="content">
<table class="table table-bordered">

  <thead>
    <tr>
      <th scope="col" colspan="4">Project Name:<?php echo set_value('project_name'); ?>
      </th>
      <th scope="col" colspan="5">Date Requested:<?php echo set_value('date_requested'); ?>
      </th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col" colspan="4">Project Activity:<?php echo set_value('project_activity'); ?>
      </th>
      <th scope="col" colspan="5">Date Issued:<?php echo set_value('date_issued'); ?>
      </th>
    </tr>
  </thead>
  <tbody>
  <thead>
    <tr>
    <th scope="col" colspan="9"></th>
    </tr>
  </thead>
    <thead>
    <tr>
    <th scope="col" colspan="4"></th>
        <th colspan="2" style="text-align: center;">Consumed</th>
        <th colspan="3" style="text-align: center;">Returns</th>
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
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('counted'); ?>
        </td>
    </tr>
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
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('counted'); ?>
        </td>
    </tr>
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
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('counted'); ?>
        </td>
    </tr>
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
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('counted'); ?>
        </td>
    </tr>
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
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('counted'); ?>
        </td>
    </tr>
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
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('counted'); ?>
        </td>
    </tr>
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
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('counted'); ?>
        </td>
    </tr>
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
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('counted'); ?>
        </td>
    </tr>
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
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('counted'); ?>
        </td>
    </tr>
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
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('counted'); ?>
        </td>
    </tr>
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
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
        </td>
        <td>
        <?php echo set_value('quantity'); ?>
        </td>
        <td>
        <?php echo set_value('remarks'); ?>
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
    <thead>
    <tr>
    <th scope="col" colspan="4"></th>
        <th colspan="2" style="text-align: center;">Consumed</th>
        <th colspan="3" style="text-align: center;">Returns</th>
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
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
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
        <th colspan="3" style="text-align: center;">Returns</th>
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
    <input type="text" id="tools" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" >
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
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  >
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
  </tbody>
</div>
  <thead>
    <tr>
        <th scope="col" colspan="9"></th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col" colspan="4">Prepared By:<?php echo set_value('prepared_by'); ?>
      </th>
      <th scope="col" colspan="5">Person In Charge:<?php echo set_value('person_in_charge'); ?>
      </th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col" colspan="4">Check By:<?php echo set_value('check_by'); ?>
      </th>
      <th scope="col" colspan="5"></th>
    </tr>
  </thead>
  <thead>
    <tr>
        <th scope="col" colspan="9"></th>
    </tr>
  </thead>
  <thead>
    <tr>
        <th scope="col" colspan="9">Remarks:<br>
        <?php echo set_value('remarks'); ?>
        </th>
    </tr>
  </thead>
</table>
</div>
</form>