<?php 
defined('BASEPATH') or die('Access Denied');

foreach($vendor_data as $row){

    $vendor_data_result = [
        'vendor_code_edit' => $row->vendor_code,
        'vendor_name_edit' => $row->name,
        'vendor_address_edit' => $row->address,
        'vendor_contact_number_edit' => $row->contact_number,
        'vendor_contact_person_edit' => $row->contact_person,
        'vendor_classification_edit' => $row->industry_classification,
        'vendor_terms_edit' => $row->terms_and_condition,
        'vendor_date_edit' => $row->date
    ];
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Update Vendor</h1>
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
                        <?php echo form_open('VendorController/update_vendor_validate',["id" => "modal-update-vendor"]) ?>
                            <div class="card-header">
                                <h3 class="card-title">Vendor Details</h3>
                                <div class="float-right">
                                    <button type="submit" class="btn btn-success">Update Vendor</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="vendor_code" class="control-label">Vendor Code</label>
                                                    <input type="text" id="vendor_code" name="vendor_code" class="form-control" placeholder="Enter Item Code" value="<?php echo $vendor_data_result['vendor_code_edit'] ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="vendor_name" class="control-label">Name</label>
                                                    <input type="text" id="vendor_name" name="vendor_name" class="form-control" placeholder="Enter Vendor Name" value="<?php echo $vendor_data_result['vendor_name_edit'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vendor_address" class="control-label">Address</label>
                                                    <input type="text" id="vendor_address" name="vendor_address" class="form-control" placeholder="Enter Vendor Address" value="<?php echo $vendor_data_result['vendor_address_edit'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="vendor_contact" class="control-label">Contact Number</label>
                                                    <input type="text" id="vendor_contact" name="vendor_contact" class="form-control" placeholder="Enter Vendor Contact Number" value="<?php echo $vendor_data_result['vendor_contact_number_edit'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="vendor_contact_person" class="control-label">Contact Person</label>
                                                    <input type="text" id="vendor_contact_person" name="vendor_contact_person" class="form-control" placeholder="Enter Vendor Contact Person" value="<?php echo $vendor_data_result['vendor_contact_person_edit'] ?>">
                                                </div>

                                                <div class="form-group">
                                                    <p>
                                                        <label for="vendor_classification">Industry Classification</label>

                                                        <select id="vendor_classification" name="vendor_classification" class="form-control" value="<?php echo $vendor_data_result['vendor_classification_edit'] ?>">
                                                            <option value="">---Please Select---</option>
                                                            <option <?php if ($vendor_data_result['vendor_classification_edit'] == "Distributor") { echo 'selected';} ?> >Distributor</option>
                                                            <option <?php if ($vendor_data_result['vendor_classification_edit'] == "Reseller") { echo 'selected';} ?> >Reseller</option>
                                                            <option <?php if ($vendor_data_result['vendor_classification_edit'] == "SI") { echo 'selected';} ?> >SI</option>
                                                            <option <?php if ($vendor_data_result['vendor_classification_edit'] == "Exclusive/Sole") { echo 'selected';} ?> >Exclusive/Sole</option>
                                                            <option <?php if ($vendor_data_result['vendor_classification_edit'] == "Partners") { echo 'selected';} ?> >Partners</option>
                                                        </select>
                                                    </p>
                                                </div>

                                                <div class="form-group">
                                                    <label for="vendor_terms">Terms and Condition</label>
                                                    <input type="text" id="vendor_terms" name="vendor_terms" class="form-control" placeholder="Enter Terms" value="<?php echo $vendor_data_result['vendor_terms_edit'] ?>">									      
                                                </div>

                                                <div class="form-group">
                                                    <label for="vendor_date">Date of Partnership</label>
                                                    <div class="input-group">
                                                        <input class="form-control" type="date" id="vendor_date" name="vendor_date" placeholder="Select Date" value="<?php echo $vendor_data_result['vendor_date_edit'] ?>">
                                                    </div>									      
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                            <?php foreach($brand_data as $row): ?>
                                                <div class="row add-brand">
                                                <input name="brand_data_id[]" type="hidden" value="<?php echo $row->id ?>">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="brand_name" class="control-label">Brand Name</label>
                                                            <input type="text" name="brand_name[]" class="form-control" placeholder="Enter Brand Name" value="<?php echo $row->brand_name ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <p>
                                                                <label for="brand_solutions">Solutions</label>

                                                                <select name="brand_solutions[]" class="form-control">
                                                                    <option value="">---Please Select---</option>
                                                                    <option <?php if ($row->solution == "CCTV") { echo 'selected';} ?> >CCTV</option>
                                                                    <option <?php if ($row->solution == "ACS") { echo 'selected';} ?> >ACS</option>
                                                                    <option <?php if ($row->solution == "Time Attendance") { echo 'selected';} ?> >Time Attendance</option>
                                                                    <option <?php if ($row->solution == "Gate Barrier") { echo 'selected';} ?> >Gate Barrier</option>
                                                                    <option <?php if ($row->solution == "Structured Cabling") { echo 'selected';} ?> >Structured Cabling</option>
                                                                </select>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <p>
                                                                <label for="brand_classification">Classification Level</label>

                                                                <select name="brand_classification[]" class="form-control" value="<?php echo $row->classification_level ?>">
                                                                    <option value="">---Please Select---</option>
                                                                    <option <?php if ($row->classification_level == "Distributor") { echo 'selected';} ?> >Distributor</option>
                                                                    <option <?php if ($row->classification_level == "Reseller") { echo 'selected';} ?> >Reseller</option>
                                                                    <option <?php if ($row->classification_level == "SI") { echo 'selected';} ?> >SI</option>
                                                                    <option <?php if ($row->classification_level == "Exclusive/Sole") { echo 'selected';} ?> >Exclusive/Sole</option>
                                                                    <option <?php if ($row->classification_level == "Partners") { echo 'selected';} ?> >Partners</option>
                                                                </select>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="brand_ranking" class="control-label">Brand Ranking</label>
                                                            <input type="text" name="brand_ranking[]" class="form-control" placeholder="Enter Ranking" value="<?php echo $row->ranking ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                            </div>
                                            <div class="card-footer">
                                                <div class="float-right">
                                                    <button type="button" class="btn btn-danger btn-sm delete-brand-btn"><i class="fas fa-times" aria-hidden="true"></i> DELETE FIELD</button>
                                                    <button type="button" class="btn btn-success btn-sm add-brand-btn"><i class="fas fa-plus" aria-hidden="true"></i> ADD FIELD</button>
                                                </div>
                                            </div>
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
