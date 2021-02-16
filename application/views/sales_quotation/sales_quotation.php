<?php
defined('BASEPATH') or die('Access Denied');
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/summernote/summernote-bs4.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- DataTables Responsive -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-re  sponsive/css/responsive.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/toastr/toastr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style type="text/css">
    @media print {
      .table-bordered td, .table-bordered th {
        border: 1px solid #000000 !important;
      }

      .table thead th {
        vertical-align: bottom !important;
        border-bottom: 2px solid #000000 !important;
      }
    }
    
  </style>

  
</head>


<body>
  
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



<!-- jQuery -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/chart.js/Chart.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/toastr/toastr.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE/') ?>dist/js/adminlte.js"></script>

