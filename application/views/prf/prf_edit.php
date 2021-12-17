<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="page-header m-0 text-dark">Project Request Form Edit
          <a href="<?php echo base_url('project_request_form'); ?>" class="btn btn-danger float-right">BACK</a>
          </h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <form action="" method="post">
        <button type="submit" name="Submit" value="insert_data" class="btn btn-warning" style="float: right; margin-top: -30px;">UPDATE</button>
    </div><!-- /.container-fluid -->
  </div>
  <div class="container-fluid" style="background: white; margin-bottom: 1%; max-width: 100%; height: auto;">
    <section class="content">
      <table class="table table-bordered">

        <thead>
          <tr>
            <th scope="col" colspan="5">Project Name:
              <input style="float: right; width: 75%;" type="text" name="project_name" value="<?=$project_request_form->project_name ?>">
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
          <table class="table table-bordered" id="employee_table">
            <thead>
              <tr>
                <th scope="col" colspan="4">
                  <button type="button" class="btn btn-success btn-sm text-bold add-item-btn" id="add" onclick="add_row();"><i class="fas fa-plus" aria-hidden="true"></i> ADD FIELD</button>
                </th>
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
                  <input type="text" name="indirect_items" placeholder="" style="width: 100%;">
                </td>
                <td scope="col">
                  <input type="checkbox" name="indirect_checkbox" value="1" style="width: 100%;">
                </td>
                <th scope="col">
                  <input type="number" name="quantity" style="width: 40px; height: auto;">
                </th>
                <td>
                  <input type="number" name="available" style="width: 40px; height: auto;">
                </td>
                <td>
                  <input type="number" name="quantity2" style="width: 40px; height: auto; text-align: center;">
                </td>
                <td>
                  <input type="text" name="remarks" placeholder="" style="width: 100px;">
                </td>
                <td>
                  <input type="number" name="quantity3" style="width: 40px; height: auto; text-align: center;">
                </td>
                <td>
                  <input type="text" name="remarks2" placeholder="" style="width: 100px;">
                </td>
                <td>
                  <input type="number" name="counted" style="width: 40px; height: auto;">
                </td>
                <td>
                  <a href="<?php echo site_url('RequisitionFormController/index'); ?>" name="purchase_request" class="btn btn-success btn-sm" style="float: right;">add request</a>
                </td>
              </tr>
            </tbody>
          </table>


          <!-- direct items -->
          <table class="table table-bordered" id="employee_table2">
            <tbody>
              <thead>
                <tr>
                  <th scope="col" colspan="4">
                    <button type="button" class="btn btn-success btn-sm text-bold add-item-btn" id="add2" onclick="add_row_direct()"><i class="fas fa-plus" aria-hidden="true"></i> ADD FIELD</button>
                  </th>
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
              <thead>
                <tr>
                  <td scope="col">
                    <input type="text" name="direct_items" placeholder="" style="width: 100%;">
                  </td>
                  <td scope="col">
                    <input type="checkbox" name="checkbox_direct" value="2" style="width: 100%;">
                  </td>
                  <th scope="col">
                    <input type="number" name="quantity_direct" style="width: 40px; height: auto;">
                  </th>
                  <td>
                    <input type="number" name="available_direct" style="width: 40px; height: auto;">
                  </td>
                  <td>
                    <input type="number" name="quantity2" style="width: 40px; height: auto;">
                  </td>
                  <td>
                    <input type="text" name="remarks" placeholder="" style="width: 100px;">
                  </td>
                  <td>
                    <input type="number" name="quantity3" style="width: 40px; height: auto;">
                  </td>
                  <td>
                    <input type="text" name="remarks2" placeholder="" style="width: 100px;">
                  </td>
                  <td>
                    <input type="number" name="counted" style="width: 40px; height: auto;">
                  </td>
                  <td>
                    <a href="<?php echo site_url('RequisitionFormController/index'); ?>" name="purchase_request" class="btn btn-success btn-sm" style="float: right;">add request</a>
                  </td>
                </tr>
              </thead>
          </table>

          <!-- tools -->
          <table class="table table-bordered" id="employee_table3">
            <tbody>
              <thead>
                <tr>
                  <th scope="col" colspan="4">
                    <div class="add_field">
                      <button type="button" class="btn btn-success btn-sm text-bold add-item-btn" id="add3" onclick="add_row_tools()"><i class="fas fa-plus" aria-hidden="true"></i> ADD FIELD</button>
                    </div>
                  </th>
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
                  <input type="text" name="tools" placeholder="" style="width: 100%;">
                </td>
                <td scope="col">
                  <input type="checkbox" name="tools_checkbox" value="3" style="width: 100%;">
                </td>
                <th scope="col">
                  <input type="number" name="quantity_tools" style="width: 40px; height: auto;">
                </th>
                <td>
                  <input type="number" name="available_tools" style="width: 40px; height: auto;">
                </td>
                <td>
                  <input type="number" name="quantity2" style="width: 40px; height: auto;">
                </td>
                <td>
                  <input type="text" name="remarks" placeholder="" style="width: 100px;">
                </td>
                <td>
                  <input type="number" name="quantity3" style="width: 40px; height: auto;">
                </td>
                <td>
                  <input type="text" name="remarks2" placeholder="" style="width: 100px;">
                </td>
                <td>
                  <input type="number" name="counted" style="width: 40px; height: auto;">
                </td>
                <td>
                  <a href="<?php echo site_url('RequisitionFormController/index'); ?>" name="purchase_request" class="btn btn-success btn-sm" style="float: right;">add request</a>
                </td>
              </tr>
            </tbody>
          </table>
        </tbody>

        <table class="table table-bordered">
          <hr>
          <thead>
            <tr>
              <th scope="col" colspan="5">Prepared By:
                <input style="width: 80%; float: right;" type="text" name="prepared_by">
              </th>
              <th scope="col" colspan="5">Person In Charge:
                <input style="float: right; width: 75%;" type="text" name="person_in_charge">
              </th>
            </tr>
          </thead>
          <thead>
            <tr>
              <th scope="col" colspan="5">Check By:
                <input style="width: 80%; float: right;" type="text" name="check_by">
              </th>
              <th scope="col" colspan="5"></th>
            </tr>
          </thead>
          <thead>
            <tr>
              <th scope="col" colspan="10" style="background-color: gray;"></th>
            </tr>
          </thead>
          <thead>
            <tr>
              <th scope="col" colspan="10">Remarks:<br>
                <textarea name="remarks3" rows="4" style="width: 100%;"></textarea>
              </th>
            </tr>
          </thead>
        </table>
    </section>
  </div>
  </form>

  <?php echo form_close(); ?>
  
<script>
  //INDIRECT ITEMS
  function add_row() {
    $rowno = $("#employee_table tr").length;
    $rowno = $rowno + 1;
    $("#employee_table tr:last").after("<tr id='row" + $rowno + "'><td><label>Indirect Items</label><input type='text' name='name[]' placeholder=''></td><td><label>✔</label><input type='checkbox' name='checkbox'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Available</label><input type='number' name='available' placeholder='' style='width: 50%;'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Remarks</label><input type='text' name='name[]' placeholder='' style='width: 100%;'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Remarks</label><input type='text' name='name[]' placeholder='' style='width: 100%;'></td><td><label>Counted</label><input type='number' name='counted' placeholder='' style='width: 50%;'></td><td><input type='button' class='btn btn-danger btn-sm text-bold add-item-btn' value='DELETE' onclick=delete_row('row" + $rowno + "')></td></tr>");
  }

  function delete_row(rowno) {
    $('#' + rowno).remove();
  }

  //DIRECT ITEMS
  function add_row_direct() {
    $rowno = $("#employee_table2 tr").length;
    $rowno = $rowno + 1;
    $("#employee_table2 tr:last").after("<tr id='row" + $rowno + "'><td><label>Direct Items</label><input type='text' name='name[]' placeholder=''></td><td><label>✔</label><input type='checkbox' name='checkbox'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Available</label><input type='number' name='available' placeholder='' style='width: 50%;'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Remarks</label><input type='text' name='name[]' placeholder='' style='width: 100%;'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Remarks</label><input type='text' name='name[]' placeholder='' style='width: 100%;'></td><td><label>Counted</label><input type='number' name='counted' placeholder='' style='width: 50%;'></td><td><input type='button' class='btn btn-danger btn-sm text-bold add-item-btn' value='DELETE' onclick=delete_row('row" + $rowno + "')></td></tr>");
  }

  function delete_row(rowno) {
    $('#' + rowno).remove();
  }

  //TOOLS
  function add_row_tools() {
    $rowno = $("#employee_table3 tr").length;
    $rowno = $rowno + 1;
    $("#employee_table3 tr:last").after("<tr id='row" + $rowno + "'><td><label>Tools</label><input type='text' name='name[]' placeholder=''></td><td><label>✔</label><input type='checkbox' name='checkbox'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Available</label><input type='number' name='available' placeholder='' style='width: 50%;'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Remarks</label><input type='text' name='name[]' placeholder='' style='width: 100%;'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Remarks</label><input type='text' name='name[]' placeholder='' style='width: 100%;'></td><td><label>Counted</label><input type='number' name='counted' placeholder='' style='width: 50%;'></td><td><input type='button' class='btn btn-danger btn-sm text-bold add-item-btn' value='DELETE' onclick=delete_row('row" + $rowno + "')></td></tr>");
  }

  function delete_row(rowno) {
    $('#' + rowno).remove();
  }
</script>