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
      <button type="submit" name="save" value="savedata" class="btn btn-success" style="float: right; margin-top: -30px;">Add Input</button>
	  </div><!-- /.container-fluid -->
</div>
<form method="post" action="<?= base_url() ?>ConsumeablesController/savedata">
<section class="content">
<div class="container-fluid" style="background: white; margin-bottom: 1%;">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" colspan="4">Project Name:
      <input style="border: hidden; width: 75%;" type="text" name="project_activity">
      </th>
      <th scope="col" colspan="5">Date Request:
      <input style="border: none; width: 75%;" type="text" name="date_request">
      </th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col" colspan="4">Project Activity:
      <input style="border-style: none; width: 73%;" type="text" name="project_activity">
      </th>
      <th scope="col" colspan="5">Date Issued:
      <input style="border: none; width: 75%;" type="text" name="date_issued">
      </th>
    </tr>
  </thead>
  <tbody>
  <thead>
    <tr>
    <th scope="col" colspan="9" style="background-color: gray;"></th>
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
    <input type="text" id="indirect_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
        <input type="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
        <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="indirect_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="indirect_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="indirect_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
      </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="indirect_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
          <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="indirect_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="indirect_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="indirect_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="indirect_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="indirect_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;" required>
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;" required>
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;" required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;" required>
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;" required>
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="indirect_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;" required>
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px;" required>
      </th>
        <td>
        <input type="number" name="available" style="width: 40px; height: auto;" required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;" required>
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;" required>
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
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
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="direct_items" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
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
    <input type="text" id="tools" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" id="tools" placeholder="" style="width: 100%;" required>
    </td>
      <td scope="col">
      <input type="checkbox" style="width: 100%;">
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
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto;">
        </td>
        <td>
        <input type="text"  id="remarks" placeholder="" style="width: 100px;"  required>
        </td>
        <td>
        <input type="number" name="counted" style="width: 40px; height: auto;">
        </td>
    </tr>
  </tbody>
</div>
  <thead>
    <tr>
        <th scope="col" colspan="9" style="background-color: gray;"></th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col" colspan="4">Prepared By:
      <input style="border: none; width: 75%;" type="text" name="project_activity">
      </th>
      <th scope="col" colspan="5">Person In Charge:
      <input style="border: none; width: 70%;" type="text" name="project_activity">
      </th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col" colspan="4">Check By:
      <input style="border: none; width: 75%;" type="text" name="project_activity">
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
        <textarea id="remarks" rows="4" style="width: 100%;"></textarea>
        </th>
    </tr>
  </thead>
</table>
</div>
</form>