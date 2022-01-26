<?php defined('BASEPATH') or die('Access Denied'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo $vendor_title ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
     <!-- /.content-header -->

     <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <?php echo form_open('VendorController/register_new_vendor',["id" => "modal-add-vendor"]) ?>
                            <div class="card-header">
                                <h3 class="card-title">Vendor Details</h3>
                                <div class="float-right">
                                    <button type="submit" class="btn btn-success"><?php echo $vendor_button_title ?></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="vendor_name" class="control-label">Name</label>
                                                            <input type="text" id="vendor_name" name="vendor_name" class="form-control" placeholder="Enter Vendor Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="vendor_contact" class="control-label">Contact Number</label>
                                                            <input type="text" id="vendor_contact" name="vendor_contact" class="form-control" placeholder="Enter Vendor Contact Number">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="vendor_contact_person" class="control-label">Contact Person</label>
                                                            <input type="text" id="vendor_contact_person" name="vendor_contact_person" class="form-control" placeholder="Enter Vendor Contact Person">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="vendor_address" class="control-label">Address</label>
                                                            <textarea type="text" rows="5" id="vendor_address" name="vendor_address" class="form-control" placeholder="Enter Vendor Address"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="vendor_email" class="control-label">Email Address</label>
                                                            <input type="text" id="vendor_email" name="vendor_email" class="form-control" placeholder="Enter Vendor Email Address">
                                                        </div>

                                                        <div class="form-group">
                                                            <p>
                                                                <label for="vendor_classification">Supplier Ranking</label>

                                                                <select id="vendor_ranking" name="vendor_ranking" class="form-control">
                                                                    <option value="">---Please Select---</option>
                                                                    <option value="AA">AA --- Rank 1</option>
                                                                    <option value="BB">BB --- Rank 2</option>
                                                                    <option value="CC">CC --- Rank 3</option>
                                                                    <option value="DD">DD --- Rank 4</option>
                                                                    <option value="EE">EE --- Rank 5</option>
                                                                </select>
                                                            </p>
                                                        </div>

                                                        <div class="form-group">
                                                            <p>
                                                                <label for="vendor_classification">Industry Classification</label>

                                                                <select id="vendor_classification" name="vendor_classification" class="form-control">
                                                                    <option value="">---Please Select---</option>
                                                                    <option>Distributor</option>
                                                                    <option>Reseller</option>
                                                                    <option>SI</option>
                                                                    <option>Exclusive/Sole</option>
                                                                    <option>Partners</option>
                                                                </select>
                                                            </p>
                                                        </div>

                                                        <div class="form-group">
                                                            <p>
                                                                <label for="vendor_terms">Vendor Terms</label>

                                                                <select id="vendor_terms" name="vendor_terms" class="form-control">
                                                                    <option value="">---Please Select---</option>
                                                                    <option value="00">00 --- COD/Cash</option>
                                                                    <option value="01">01 --- Dated Check</option>
                                                                    <option value="02">02 --- 7 Days</option>
                                                                    <option value="03">03 --- 15 Days</option>
                                                                    <option value="04">04 --- 30 Days</option>
                                                                    <option value="05">05 --- 45 Days</option>
                                                                    <option value="06">06 --- 60 Days</option>
                                                                    <option value="07">07 --- 90 Days</option>
                                                                </select>
                                                            </p>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="vendor_date">Date of Partnership</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="date" id="vendor_date" name="vendor_date" placeholder="Select Date">
                                                                    </div>									      
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <p>
                                                                        <label for="vendor_category">Vendor Category</label>

                                                                        <select name="vendor_category" class="form-control">
                                                                            <option value="">---Please Select---</option>
                                                                            <option>Direct</option>
                                                                            <option>Indirect</option>
                                                                            <option>Tools</option>
                                                                        </select>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label>Vendor Technical Support Details:</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="vendor_technical_name" class="control-label">Name</label>
                                                            <input type="text" name="vendor_technical_name" class="form-control" placeholder="Enter Technical Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                                <label for="vendor_technical_contact">Contact Number</label>
                                                                <input type="text" name="vendor_technical_contact" class="form-control" placeholder="Enter Contact Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="vendor_technical_email" class="control-label">Email Address</label>
                                                            <input type="text" name="vendor_technical_email" class="form-control" placeholder="Enter Email Address">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                 <!-- Sales Info -->
                                <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label>Sales Info:</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="vendor_sales_name" class="control-label">Name</label>
                                                            <input type="text" name="vendor_sales_name" class="form-control" placeholder="Enter Sales Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                                <label for="vendor_sales_contact">Contact Number</label>
                                                                <input type="text" name="vendor_sales_contact" class="form-control" placeholder="Enter Contact Number" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="vendor_sales_email" class="control-label">Email Address</label>
                                                            <input type="text" name="vendor_sales_email" class="form-control" placeholder="Enter Email Address" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <label>Brand Details:</label>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-sm-12 add-brand">
                                                    <div class="row">
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="brand_name" class="control-label">Brand Name</label>
                                                                    <input type="text" name="brand_name[]" class="form-control" placeholder="Enter Brand Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                        <label for="brand_products">Products</label>
                                                                        <input type="text" name="brand_products[]" class="form-control" placeholder="Enter Products">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <p>
                                                                        <label for="brand_classification">Classification Level</label>

                                                                        <select name="brand_classification[]" class="form-control">
                                                                            <option value="">---Please Select---</option>
                                                                            <option>Distributor</option>
                                                                            <option>Reseller</option>
                                                                            <option>SI</option>
                                                                            <option>Exclusive/Sole</option>
                                                                            <option>Partners</option>
                                                                        </select>
                                                                    </p>
                                                                </div>
                                                                </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="brand_ranking" class="control-label">Brand Ranking</label>
                                                                    <input type="text" name="brand_ranking[]" class="form-control" placeholder="Enter Ranking">
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="brand_contact_person" class="control-label">Contact Person</label>
                                                                <input type="text" name="brand_contact_person[]" class="form-control" placeholder="Enter Contact Person">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="brand_contact_number" class="control-label">Contact Number</label>
                                                                <input type="text" name="brand_contact_number[]" class="form-control" placeholder="Enter Contact Number">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="brand_email" class="control-label">Email Address</label>
                                                                <input type="text" name="brand_email[]" class="form-control" placeholder="Enter Email Address">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <label>Brand Technical Support Details:</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="brand_technical_name" class="control-label">Name</label>
                                                                <input type="text" name="brand_technical_name[]" class="form-control" placeholder="Enter Technical Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="brand_technical_contact">Contact Number</label>
                                                                <input type="text" name="brand_technical_contact[]" class="form-control" placeholder="Enter Contact Number">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="brand_technical_email" class="control-label">Email Address</label>
                                                                    <input type="text" name="brand_technical_email[]" class="form-control" placeholder="Enter Email Address">
                                                                </div>
                                                        </div>
                                                    </div>

                                            <!-- Sales Info -->
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label>Sales Info:</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="vendor_sales_name" class="control-label">Name</label>
                                                            <input type="text" name="brand_vendor_sales_name" class="form-control" placeholder="Enter Sales Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                                <label for="vendor_sales_contact">Contact Number</label>
                                                                <input type="text" name="brand_vendor_sales_contact" class="form-control" placeholder="Enter Contact Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="vendor_sales_email" class="control-label">Email Address</label>
                                                            <input type="text" name="brand_vendor_sales_email" class="form-control" placeholder="Enter Email Address">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <hr>
                                                <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="float-right">
                                            <button type="button" class="btn btn-danger btn-sm delete-brand-btn"><i class="fas fa-times" aria-hidden="true"></i> DELETE FIELD</button>
                                            <button type="button" class="btn btn-success btn-sm add-brand-btn"><i class="fas fa-plus" aria-hidden="true"></i> ADD FIELD</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
     </section>
</div>
