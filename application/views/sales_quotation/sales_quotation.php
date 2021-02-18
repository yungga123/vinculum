<?php
defined('BASEPATH') or die('Access Denied');
?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-lg-12">
              <h1 class="page-header">Sales Quotation Form</h1>
          </div>

        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <?php echo form_open('SalesQuotationController/salesquotationValidate',["id" => "form-add-salesquotation"]) ?>
            <div class="card">
              <div class="card-header">
                Consultant Information
              </div>

              <div class="card-body">
                
                <div class="row">
                  
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Consultant Name</label>
                       <select name="quotation_sales_name" id="quotation_sales_name" class="form-control">
                          <option value="">N/A</option>

                          <?php foreach ($GetSales as $row): ?>
                            <option value="<?php echo $row->id ?>"><?php echo $row->lastname. ", " .$row->firstname. " " .$row->middlename  ?>
                            </option>
                          <?php endforeach ?>
                        </select>
                         
                      </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="quotation_sales_email">Consultant Email Address</label>
                      <input class="form-control" type="text" name="quotation_sales_email" id="quotation_sales_email" placeholder="Enter Email Address (@vinculumtechnologies, @Gmail @yahoo, @etc...)">
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <div class="card">
              
              <div class="card-header">
                Customer Details
              </div>

              <div class="card-body">
                <div class="row">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="quotation_customer_name">Customer Name</label>
                      <input class="form-control" type="text" name="quotation_customer_name" id="quotation_customer_name" placeholder="Enter Full Name (Last Name, First Name Middle Name)">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="quotation_contact_person">Contact Person</label>
                      <input class="form-control" type="text" name="quotation_contact_person" id="quotation_contact_person" placeholder="Contact Person Name">
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="quotation_contact_number">Contact Number</label>
                      <input class="form-control" type="text" name="quotation_contact_number" id="quotation_contact_number" placeholder="Network/Landline Number">
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="quotation_email">E-mail Address</label>
                      <input class="form-control" type="text" name="quotation_email" id="quotation_email" placeholder="Enter Email @Gmail, @yahoo, @etc">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="quotation_customer_location">Location</label>
                      <input class="form-control" type="text" name="quotation_customer_location" id="quotation_customer_location" placeholder="Customer Full Address (Lot no., Block No., Street no., Subdivision, Barangay, Municipality) ">
                    </div>
                  </div>

                </div>
              </div>

            </div>

            <div class="card">

              <div class="card-header">
                Project Details
              </div>

              <div class="card-body">
                <div class="row">

                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="quotation_reference_no">Reference No.</label>
                      <input class="form-control" type="text" name="quotation_reference_no" id="quotation_reference_no" placeholder="Quotation Number">
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group">
                      <label class="control-label" for="quotation_project_type">Type of Project</label>
                      <select class="form-control" name="quotation_project_type" id="quotation_project_type">
                        <option value="">---</option>
                        <option>Residential</option>
                        <option>Commercial</option>
                        <option>Industrial</option>
                        <option>Government</option>
                        <option>Walk-In</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="quotation_Subject">Subject</label>
                      <input class="form-control" type="text" name="quotation_Subject" id="quotation_Subject" placeholder="CCTV Ins., FDAS, ACS & Biometrics, Supply Only, Etc...">
                    </div>
                  </div>
                
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="quotation_warranty">Warranty Covered</label>
                      <input class="form-control" type="text" name="quotation_warranty" id="quotation_warranty" placeholder="Enter Warranty Covered Details">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="quotation_promo">Promo</label>
                      <input class="form-control" type="text" name="quotation_promo" id="quotation_promo" placeholder="Enter Promo Details">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-8">
                    <label for="quotation_payment">Payment Mode</label>
                    <textarea class="form-control" type="text" name="quotation_payment" id="quotation_payment" placeholder="Enter Payment Details">Cash or Check Through Bank Deposit(100% Pre-Payment). To 'Vinculum Tech Enterprise' Account Number:000-020667-432
                    </textarea>
                  </div>

                  <div class="col-sm-3">
                    <label for="quotation_discount">Discount</label>
                    <input class="form-control" name="quotation_discount" id="quotation_discount" placeholder="Enter Discount Amount">
        
                  </div>

                  <div class="col-sm-1">
                    <label for="quotation_vat">Vat Inclusive</label>
                      <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="quotation_vat" value=".12">
                              Vat 12%
                          </label>
                      </div>
                  </div>

                </div>

              </div>
            
            </div>

            <div class="card">
              
              <div class="card-header">
                Item Description
              </div>

              <div class="card-body">
                <div class="row add-item">

                  <div class="col-sm-5">
                    <div class="form-group">
                      <label for="quotation_item_description"> Description </label>
                      <textarea class="form-control" type="text" name="quotation_item_description[]" placeholder="Item Specification, Description"></textarea>
                    </div>
                  </div>

                  <div class="col-sm-1">
                    <div class="form-group">
                      <label for="quotation_item_qty"> Qty </label>
                      <input class="form-control" type="text" name="quotation_item_qty[]" placeholder="Item Qty">
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <div class="form-group">
                      <label class="control-label" for="quotation_item_unit">Unit</label>
                      <select class="form-control" name="quotation_item_unit[]">
                        <option value="">---</option>
                        <option>Meter</option>
                        <option>Pcs</option>
                        <option>Set</option>
                        <option>Pair</option>
                        <option>Roll</option>
                        <option>Package</option>
                        <option>Box</option>
                        <option>Lot</option>
                        <option>Year</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="quotation_item_amount"> Amount </label>
                      <input class="form-control" type="text" name="quotation_item_amount[]" placeholder="Item Price">
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <div class="form-group">
                      <label class="control-label" for="quotation_availability">Availability</label>
                      <select class="form-control" name="quotation_availability[]">
                        <option value="">---</option>
                        <option>Order Basis</option>
                        <option>Available</option>
                        <option>5-7 Days</option>
                        <option>30-45 Days</option>
                        <option>45-60 Days</option>
                      </select>
                    </div>
                  </div>

                </div>
              </div>
              
  
              <div class="card-footer">
                <div class="float-right">
                  <button type="button" class="btn btn-sm btn-danger text-bold delete-item-btn">DELETE INPUT</button>
                  <button type="button" class="btn btn-sm btn-success text-bold add-item-btn">ADD ITEM</button>
                </div>

                <div class="float-left">  
                  <button type="submit" class="btn btn-sm btn-success text-bold">SUBMIT</button>
                </div>
              
              </div>
              
            </div>
              <?php echo form_close() ?>
          </div> 
        </div>
              
      </div>
    </section> 
  </div>
