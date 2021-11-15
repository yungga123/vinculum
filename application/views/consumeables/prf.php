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
	  </div><!-- /.container-fluid -->
</div>
<section class="content">
<div class="container-fluid" style="background: white; margin-bottom: 1%;">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" colspan="4">Project Name:
      <input style="border: none; width: 75%;" type="text" name="project_activity">
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

  <div class="text">
  <tbody>
    <tr>
    <td scope="col">
    <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none;" required>
    </td>
      <td scope="col">
        <input type="checkbox">
      </td>
      <th scope="col">
        <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <select name="available" id="available">
          <option value="---">---</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td></td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none;" required>
    </td>
      <td scope="col">
      <input type="checkbox">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <select name="available" id="available" style="text-align: center;">
          <option value="---">---</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td></td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none;" required>
    </td>
      <td scope="col">
      <input type="checkbox">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <select name="available" id="available" style="text-align: center;">
          <option value="---">---</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td></td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none;" required>
    </td>
      <td scope="col">
      <input type="checkbox">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
          <select name="available" id="available" style="text-align: center;">
          <option value="---">---</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td></td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none;" required>
    </td>
      <td scope="col">
      <input type="checkbox">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <select name="available" id="available" style="text-align: center;">
          <option value="---">---</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td>
          <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td></td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none;" required>
    </td>
      <td scope="col">
      <input type="checkbox">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <select name="available" id="available" style="text-align: center;">
          <option value="---">---</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td></td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none;" required>
    </td>
      <td scope="col">
      <input type="checkbox">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <select name="available" id="available" style="text-align: center;">
          <option value="---">---</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td></td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none;" required>
    </td>
      <td scope="col">
      <input type="checkbox">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <select name="available" id="available" style="text-align: center;">
          <option value="---">---</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td></td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none;" required>
    </td>
      <td scope="col">
      <input type="checkbox">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <select name="available" id="available" style="text-align: center;">
          <option value="---">---</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td></td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none;" required>
    </td>
      <td scope="col">
      <input type="checkbox">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <select name="available" id="available" style="text-align: center;">
          <option value="---">---</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td></td>
    </tr>
    <tr>
    <td scope="col">
    <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none;" required>
    </td>
      <td scope="col">
      <input type="checkbox">
      </td>
      <th scope="col">
      <input type="number" name="quantity" style="width: 40px; height: auto;">
      </th>
        <td>
        <select name="available" id="available" style="text-align: center;">
          <option value="---">---</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td>
        <input type="number" name="quantity" style="width: 40px; height: auto; align: center;">
        </td>
        <td>
        <input type="text" class="form-control" id="validationTooltip05" placeholder="" style="border: none; width: 50px;" required>
        </td>
        <td></td>
    </tr>
  </tbody>
</table>

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
    <td scope="col"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col"td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col" colspan="2"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
  </tbody>
</table>

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
    <td scope="col"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col"td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col" colspan="2"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
    <td scope="col"></td>
      <td scope="col"></td>
      <th scope="col"></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
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
      <th scope="col" colspan="4">Prepared By:</th>
      <th scope="col" colspan="5">Person In Charge:</th>
    </tr>
  </thead>
  <thead>
    <tr>
      <th scope="col" colspan="4">Check By:</th>
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
        <th scope="col" colspan="9">Remarks:</th>
    </tr>
  </thead>
</table>
</div>
</div>