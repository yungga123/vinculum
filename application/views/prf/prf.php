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
      <form id="add_field" action="<?php echo site_url('PrfController/prf_data_input'); ?>" method="post">
        <button type="submit" name="Submit" value="insert_data" class="btn btn-primary" style="float: right; margin-top: -30px;">SUBMIT</button>
    </div><!-- /.container-fluid -->
  </div>
  <div class="container-fluid" style="background: white; margin-bottom: 1%; max-width: 100%; height: auto;">
    <section class="content">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" colspan="5">Project Name:
              <div class="dropdown">
                <button class="btn btn-whtie dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" style="border:solid">
                  ---Select Project Name---
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <label for="project_name" class="btn btn-secondary dropdown-toggle">---select project name---</label>
                  <?php foreach ($query as $row) : ?>
                    <select name="project_name" id="project_name" class="form-control" value="">
                      <option><?php echo $row->customer_name; ?></option>
                    </select>
                  <?php endforeach ?>
                </div>
              </div>
            </th>
            <th scope="col" colspan="5">Branch Name:
              <div class="dropdown">
                <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" style="border:solid">
                  ---Select Branch Name---
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <label for="branch_name">---select project name---</label>
                  <?php foreach ($fetchnewclient as $row) : ?>
                    <select name="branch_name" id="project_name" class="form-control" value="">
                      <option><?php echo $row->customer_name; ?></option>
                    </select>
                  <?php endforeach ?>
                </div>
              </div>
            </th>
            <th scope="col" colspan="5">Date Requested:
              <input style="float: right; width: 75%;" type="date" name="date_requested" value="<?php echo set_value('date_requested'); ?>">
            </th>
          </tr>
        </thead>
        <thead>
          <tr>
            <th scope="col" colspan="5">Project Activity:
              <div class="dropdown">
                <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" style="border:solid">
                  ---Select Project Name---
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <label for="project_activity">---select project name---</label>
                  <?php foreach ($fetchprojectreportdescription as $row) : ?>
                    <select name="project_name" id="project_activity" class="form-control" value="">
                      <option><?php echo $row->description; ?></option>
                    </select>
                  <?php endforeach ?>
                </div>
              </div>
            </th>
            <th scope="col" colspan="5">
            </th>
            <th scope="col" colspan="5">Date Issued:
              <input style="width: 75%; float: right;" type="date" name="date_issued" value="<?php echo set_value('date_issued'); ?>">
            </th>
          </tr>
        </thead>
        <tbody>
          <thead>
            <tr>
              <th scope="col" colspan="15" style="background-color: gray;"></th>
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
                <th scope="col">On Stock</th>
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
                <td>
                  <div class="dropdown">
                    <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" style="border:solid">
                      ---Indirect Items---
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <label for="branch_name">---select project name---</label>
                      <?php foreach ($fetchitemname as $row) : ?>
                        <select name="branch_name" id="project_name" class="form-control" value="">
                          <option><?php echo $row->itemName; ?></option>
                        </select>
                      <?php endforeach ?>
                    </div>
                  </div>
                </td>
                <td scope="col">
                  <input type="checkbox" name="indirect_checkbox" style="width: 100%;">
                </td>
                <th scope="col">
                  <input type="number" name="quantity" style="width: 40px; height: auto;">
                </th>
                <td>
                  <?php echo $row->stocks; ?>
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
                  <th scope="col">On Stock</th>
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
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" style="border:solid">
                        ---Direct Items---
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <label for="branch_name">---select project name---</label>
                        <?php foreach ($fetchitemname as $row) : ?>
                          <select name="branch_name" id="project_name" class="form-control" value="">
                            <option><?php echo $row->itemName; ?></option>
                          </select>
                        <?php endforeach ?>
                      </div>
                    </div>
                  </td>
                  <td scope="col">
                    <input type="checkbox" name="checkbox_direct" style="width: 100%;">
                  </td>
                  <th scope="col">
                    <input type="number" name="quantity_direct" style="width: 40px; height: auto;">
                  </th>
                  <td>
                    <?php echo $row->stocks; ?>
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
                  <th scope="col">On Stock</th>
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
                <td>
                  <div class="dropdown">
                    <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" style="border:solid">
                      ---Tools---
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <label for="branch_name">---select project name---</label>
                      <?php foreach ($fetchitemname as $row) : ?>
                        <select name="branch_name" id="project_name" class="form-control" value="">
                          <option><?php echo $row->itemName; ?></option>
                        </select>
                      <?php endforeach ?>
                    </div>
                  </div>
                </td>
                <td scope="col">
                  <input type="checkbox" name="tools_checkbox" value="3" style="width: 100%;">
                </td>
                <th scope="col">
                  <input type="number" name="quantity_tools" style="width: 40px; height: auto;">
                </th>
                <td>
                  <?php echo $row->quantity; ?>
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
              </tr>
            </tbody>
          </table>
        </tbody>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col" colspan="10" style="background-color: gray;"></th>
            </tr>
          </thead>
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
              <th scope="col" colspan="10">Remarks:<br>
                <textarea name="remarks3" rows="4" style="width: 100%;"></textarea>
              </th>
            </tr>
          </thead>
        </table>
    </section>
  </div>
  </form>


  <script>
    //INDIRECT ITEMS FUNCTION
    function add_row() {
      $rowno = $("#employee_table tr").length;
      $rowno = $rowno + 1;
      $("#employee_table tr:last").after("<tr id='row" + $rowno + "'><td><center><label>Indirect Items</label></center><input type='text' name='name[]' placeholder=''></td><td><label>✔</label><input type='checkbox' name='checkbox'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Available</label><input type='number' name='available' placeholder='' style='width: 50%;'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Remarks</label><input type='text' name='name[]' placeholder='' style='width: 100%;'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Remarks</label><input type='text' name='name[]' placeholder='' style='width: 100%;'></td><td><label>Counted</label><input type='number' name='counted' placeholder='' style='width: 50%;'></td><td><input type='button' class='btn btn-danger btn-sm text-bold add-item-btn' value='DELETE' onclick=delete_row('row" + $rowno + "')></td></tr>");
    }

    function delete_row(rowno) {
      $('#' + rowno).remove();
    }

    //DIRECT ITEMS FUNCTION
    function add_row_direct() {
      $rowno = $("#employee_table2 tr").length;
      $rowno = $rowno + 1;
      $("#employee_table2 tr:last").after("<tr id='row" + $rowno + "'><td><center><label>Direct Items</label></center><input type='text' name='name[]' placeholder=''></td><td><label>✔</label><input type='checkbox' name='checkbox'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Available</label><input type='number' name='available' placeholder='' style='width: 50%;'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Remarks</label><input type='text' name='name[]' placeholder='' style='width: 100%;'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Remarks</label><input type='text' name='name[]' placeholder='' style='width: 100%;'></td><td><label>Counted</label><input type='number' name='counted' placeholder='' style='width: 50%;'></td><td><input type='button' class='btn btn-danger btn-sm text-bold add-item-btn' value='DELETE' onclick=delete_row('row" + $rowno + "')></td></tr>");
    }

    function delete_row(rowno) {
      $('#' + rowno).remove();
    }

    //TOOLS FUNCTION
    function add_row_tools() {
      $rowno = $("#employee_table3 tr").length;
      $rowno = $rowno + 1;
      $("#employee_table3 tr:last").after("<tr id='row" + $rowno + "'><td><center><label>Tools</label></center><input type='text' name='name[]' placeholder=''></td><td><label>✔</label><input type='checkbox' name='checkbox'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Available</label><input type='number' name='available' placeholder='' style='width: 50%;'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Remarks</label><input type='text' name='name[]' placeholder='' style='width: 100%;'></td><td><label>Quantity</label><input type='number' name='quantity' placeholder='' style='width: 50%;'></td><td><label>Remarks</label><input type='text' name='name[]' placeholder='' style='width: 100%;'></td><td><label>Counted</label><input type='number' name='counted' placeholder='' style='width: 50%;'></td><td><input type='button' class='btn btn-danger btn-sm text-bold add-item-btn' value='DELETE' onclick=delete_row('row" + $rowno + "')></td></tr>");
    }

    function delete_row(rowno) {
      $('#' + rowno).remove();
    }
  </script>