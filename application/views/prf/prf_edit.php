<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="page-header m-0 text-dark">Project Request Form Edit</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <form id="add_field" action="<?php echo site_url('PrfController/prf_data_input'); ?>" method="post">
        <button type="submit" name="Submit" value="insert_data" class="btn btn-warning" style="float: right; margin-top: -30px;">UPDATE</button>
    </div><!-- /.container-fluid -->
  </div>
  <div class="container-fluid" style="background: white; margin-bottom: 1%; max-width: 100%; height: auto;">
    <section class="content">
      <table class="table table-bordered" style="text-align:center;" id="employee_table">
        <thead>
          <tr>
            <th scope="col" colspan="5">Project Name:
              <input style="float: right; width: 75%;" type="text" name="project_name" value="<?php echo set_value('project_name'); ?>">
            </th>
            <th scope="col" colspan="5">Date Requested:
              <input style="width: 75%; float: right;" type="date" name="date_requested" value="<?php echo set_value('date_requested'); ?>">
            </th>
          </tr>
        </thead>
        <thead>
          <tr>
            <th scope="col" colspan="5">Project Activity:
              <input style="float: right; width: 75%;" type="text" name="project_activity" value="<?php echo set_value('project_activity'); ?>">
            </th>
            <th scope="col" colspan="5">Date Issued:
              <input style="width: 75%; float: right;" type="date" name="date_issued" value="<?php echo set_value('date_issued'); ?>">
            </th>
          </tr>
        </thead>
        <tbody>
          <thead>
            <tr>
              <th scope="col" colspan="10" style="background-color: gray;"></th>
            </tr>
          </thead>
          <table class="table table-bordered" style="text-align:center;" id="employee_table1">
            <thead>
              <tr>
                <th scope="col" colspan="4" style="text-align:left;">
                  <button type="button" class="btn btn-success btn-sm text-bold add-item-btn" id="add" onclick="add_row();"><i class="fas fa-plus" aria-hidden="true"></i> ADD FIELD</button>
                </th>
                <th colspan="2" style="text-align: center;">Consumed</th>
                <th colspan="4" style="text-align: center;">Returns</th>
              </tr>
            </thead>
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
                  <input type="text" name="indirect_items" value="<?php echo set_value('indirect_items'); ?>">
                </td>
                <td scope="col">
                  <input type="checkbox" name="indirect_checkbox" value="<?php echo set_value('indirect_checkbox'); ?>">
                </td>
                <th scope="col">
                  <input type="number" name="quantity" value="<?php echo set_value('quantity'); ?>" style="width: 50px;">
                </th>
                <td>
                  <input type="number" name="available" value="<?php echo set_value('available'); ?>" style="width: 50px;">
                </td>
                <td>
                  <input type="number" name="quantity2" value="<?php echo set_value('quantity2'); ?>" style="width: 50px;">
                </td>
                <td>
                  <input type="text" name="remarks" value="<?php echo set_value('remarks'); ?>">
                </td>
                <td>
                  <input type="number" name="quantity3" value="<?php echo set_value('quantity3'); ?>" style="width: 50px;">
                </td>
                <td>
                  <input type="text" name="remarks2" value="<?php echo set_value('remarks2'); ?>">
                </td>
                <td>
                  <input type="number" name="counted" value="<?php echo set_value('counted'); ?>" style="width: 50px;">
                </td>
              </tr>
            </tbody>
          </table>

          <!-- direct items -->
          <table class="table table-bordered" style="text-align:center;" id="employee_table2">
            <tbody>
              <thead>
                <tr>
                  <th scope="col" colspan="4" style="text-align:left;">
                    <button type="button" class="btn btn-success btn-sm text-bold add-item-btn" id="add" onclick="add_row_direct();"><i class="fas fa-plus" aria-hidden="true"></i> ADD FIELD</button>
                  </th>
                  <th colspan="2" style="text-align: center;">Consumed</th>
                  <th colspan="4" style="text-align: center;">Returns</th>
                </tr>
              </thead>
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
                  <input type="text" name="direct_items" value="<?php echo set_value('direct_items'); ?>">
                </td>
                <td scope="col">
                  <input type="checkbox" name="direct_checkbox" value="<?php echo set_value('direct_checkbox'); ?>">
                </td>
                <th scope="col">
                  <input type="number" name="quantity_direct" value="<?php echo set_value('quantity_direct'); ?>" style="width:50px;">
                </th>
                <td>
                  <input type="number" name="available_direct" value="<?php echo set_value('available_direct'); ?>" style="width:50px;">
                </td>
                <td>
                  <input type="number" name="quantity2" value="<?php echo set_value('quantity2'); ?>" style="width:50px;">
                </td>
                <td>
                  <input type="text" name="remarks" value="<?php echo set_value('remarks'); ?>">
                </td>
                <td>
                  <input type="number" name="quantity3" value="<?php echo set_value('quantity3'); ?>" style="width:50px;">
                </td>
                <td>
                  <input type="text" name="remarks2" value="<?php echo set_value('remarks2'); ?>">
                </td>
                <td>
                  <input type="number" name="counted" value="<?php echo set_value('counted'); ?>" style="width:50px;">
                </td>
              </tr>
            </tbody>
          </table>

          <!-- tools -->
          <table class="table table-bordered" style="text-align:center;" id="employee_table3">
            <tbody>
              <thead>
                <tr>
                  <th scope="col" colspan="4" style="text-align:left;">
                    <button type="button" class="btn btn-success btn-sm text-bold add-item-btn" id="add" onclick="add_row_tools();"><i class="fas fa-plus" aria-hidden="true"></i> ADD FIELD</button>
                  </th>
                  <th colspan="2" style="text-align: center;">Consumed</th>
                  <th colspan="4" style="text-align: center;">Returns</th>
                </tr>
              </thead>
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
                  <input type="text" name="tools" value="<?php echo set_value('tools'); ?>">
                </td>
                <td scope="col">
                  <input type="checkbox" name="tools_checkbox" value="<?php echo set_value('tools_checkbox'); ?>">
                </td>
                <th scope="col">
                  <input type="number" name="quantity_tools" value="<?php echo set_value('quantity_tools'); ?>" style="width:50px;">
                </th>
                <td>
                  <input type="number" name="available_tools" value="<?php echo set_value('available_tools'); ?>" style="width:50px;">
                </td>
                <td>
                  <input type="number" name="quantity2" value="<?php echo set_value('quantity2'); ?>" style="width:50px;">
                </td>
                <td>
                  <input type="text" name="remarks" value="<?php echo set_value('remarks'); ?>">
                </td>
                <td>
                  <input type="number" name="quantity3" value="<?php echo set_value('quantity3'); ?>" style="width:50px;">
                </td>
                <td>
                  <input type="text" name="remarks2" value="<?php echo set_value('remarks2'); ?>">
                </td>
                <td>
                  <input type="number" name="counted" value="<?php echo set_value('counted'); ?>" style="width:50px;">
                </td>
              </tr>
            </tbody>
          </table>

  <table class="table table-bordered" style="text-align:left;">

  <thead>
      <tr>
        <th scope="col" colspan="10" style="background-color: gray;"></th>
      </tr>
    </thead>
    
    <thead>
      <tr>
        <th scope="col" colspan="5">Prepared By:
          <input type="text" style="width:80%; float:right;" name="prepared_by"><?php echo set_value('prepared_by'); ?></input>
        </th>
        <th scope="col" colspan="5">Person In Charge:
          <input type="text" style="width:80%; float:right;" name="person_in_charge"><?php echo set_value('person_in_charge'); ?></input>
        </th>
      </tr>
    </thead>
    <thead>
      <tr>
        <th scope="col" colspan="5">Check By:
          <input type="text" style="width:80%; float:right;" name="check_by"><?php echo set_value('check_by'); ?></input>
        </th>
        <th scope="col" colspan="5"></th>
      </tr>
    </thead>
    
    <thead>
      <tr>
        <th scope="col" colspan="10">Remarks:<br>
          <textarea name="remarks3" rows="4" style="width:100%;"><?php echo set_value('remarks3'); ?></textarea>
        </th>
      </tr>
    </thead>
  </table>
</div>
</form>

<script>
  //INDIRECT ITEMS FUNCTION
  function add_row() {
    $rowno = $("#employee_table1 tr").length;
    $rowno = $rowno + 1;
    $("#employee_table1 tr:last").after("<tr id='row" + $rowno + "'><td><label>Indirect Items</label><input type='text' name='name[]' placeholder=''></td><td><label>✔</label><input type='checkbox' name='checkbox'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Available</label><input type='number' name='available' placeholder='' style='width: 50%;'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Remarks</label><input type='text' name='name[]' placeholder='' style='width: 100%;'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Remarks</label><input type='text' name='name[]' placeholder='' style='width: 100%;'></td><td><label>Counted</label><input type='number' name='counted' placeholder='' style='width: 50%;'></td><td><input type='button' class='btn btn-danger btn-sm text-bold add-item-btn' value='DELETE' onclick=delete_row('row" + $rowno + "')></td></tr>");
  }

  function delete_row(rowno) {
    $('#' + rowno).remove();
  }

  //DIRECT ITEMS FUNCTION
  function add_row_direct() {
    $rowno = $("#employee_table2 tr").length;
    $rowno = $rowno + 1;
    $("#employee_table2 tr:last").after("<tr id='row" + $rowno + "'><td><label>Direct Items</label><input type='text' name='name[]' placeholder=''></td><td><label>✔</label><input type='checkbox' name='checkbox'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Available</label><input type='number' name='available' placeholder='' style='width: 50%;'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Remarks</label><input type='text' name='name[]' placeholder='' style='width: 100%;'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Remarks</label><input type='text' name='name[]' placeholder='' style='width: 100%;'></td><td><label>Counted</label><input type='number' name='counted' placeholder='' style='width: 50%;'></td><td><input type='button' class='btn btn-danger btn-sm text-bold add-item-btn' value='DELETE' onclick=delete_row('row" + $rowno + "')></td></tr>");
  }

  function delete_row(rowno) {
    $('#' + rowno).remove();
  }

  //TOOLS FUNCTION
  function add_row_tools() {
    $rowno = $("#employee_table3 tr").length;
    $rowno = $rowno + 1;
    $("#employee_table3 tr:last").after("<tr id='row" + $rowno + "'><td><label>Tools</label><input type='text' name='name[]' placeholder=''></td><td><label>✔</label><input type='checkbox' name='checkbox'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Available</label><input type='number' name='available' placeholder='' style='width: 50%;'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Remarks</label><input type='text' name='name[]' placeholder='' style='width: 100%;'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Remarks</label><input type='text' name='name[]' placeholder='' style='width: 100%;'></td><td><label>Counted</label><input type='number' name='counted' placeholder='' style='width: 50%;'></td><td><input type='button' class='btn btn-danger btn-sm text-bold add-item-btn' value='DELETE' onclick=delete_row('row" + $rowno + "')></td></tr>");
  }

  function delete_row(rowno) {
    $('#' + rowno).remove();
  }
</script>