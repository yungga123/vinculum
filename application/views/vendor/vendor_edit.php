<?php 
defined('BASEPATH') or die('Access Denied');

foreach($vendor_data as $row){

    $vendor_data_result = [
        'vendor_id_edit' => $row->id,
        'vendor_code_edit' => $row->vendor_code,
        'vendor_name_edit' => $row->name,
        'vendor_address_edit' => $row->address,
        'vendor_contact_number_edit' => $row->contact_number,
        'vendor_email_edit' => $row->email,
        'vendor_contact_person_edit' => $row->contact_person,
        'vendor_ranking_edit' => $row->supplier_ranking,
        'vendor_supplier_ranking_edit' => $row->supplier_ranking,
        'vendor_classification_edit' => $row->industry_classification,
        'vendor_terms_edit' => $row->terms_and_condition,
        'vendor_date_edit' => $row->date,
        'vendor_category_edit' => $row->vendor_category,
        'vendor_technical_person' => $row->vendor_technical_person,
        'vendor_technical_contact' => $row->vendor_technical_contact,
        'vendor_technical_email' => $row->vendor_technical_email,
        'vendor_bank_name' => $row->vendor_bank_name,
        'vendor_account_name' => $row->vendor_account_name,
        'vendor_account_number' => $row->vendor_account_number
    ];
}



?>

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

                        <input type="hidden" name="vendor_code" value="<?php echo $vendor_data_result['vendor_code_edit'] ?>">
                        <input type="hidden" name="vendor_id" value="<?php echo $vendor_data_result['vendor_id_edit'] ?>">
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
                                                            <input type="text" id="vendor_name" name="vendor_name" class="form-control" placeholder="Enter Vendor Name" value="<?php echo $vendor_data_result['vendor_name_edit'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="vendor_contact" class="control-label">Contact Number</label>
                                                            <input type="text" id="vendor_contact" name="vendor_contact" class="form-control" placeholder="Enter Vendor Contact Number" value="<?php echo $vendor_data_result['vendor_contact_number_edit'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="vendor_contact_person" class="control-label">Contact Person</label>
                                                            <input type="text" id="vendor_contact_person" name="vendor_contact_person" class="form-control" placeholder="Enter Vendor Contact Person" value="<?php echo $vendor_data_result['vendor_contact_person_edit'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="vendor_address" class="control-label">Address</label>
                                                            <textarea type="text" rows="5" id="vendor_address" name="vendor_address" class="form-control" placeholder="Enter Vendor Address"><?php echo $vendor_data_result['vendor_address_edit'] ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="vendor_email" class="control-label">Email Address</label>
                                                            <input type="text" id="vendor_email" name="vendor_email" class="form-control" placeholder="Enter Vendor Email Address" value="<?php echo $vendor_data_result['vendor_email_edit'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <p>
                                                                <label for="vendor_classification">Supplier Ranking</label>

                                                                <select id="vendor_ranking" name="vendor_ranking" class="form-control">
                                                                    <option value="">---Please Select---</option>
                                                                    <option value="AA" <?php if ($vendor_data_result['vendor_ranking_edit'] == "AA") { echo 'selected';} ?> >AA --- Rank 1</option>
                                                                    <option value="BB" <?php if ($vendor_data_result['vendor_ranking_edit'] == "BB") { echo 'selected';} ?> >BB --- Rank 2</option>
                                                                    <option value="CC" <?php if ($vendor_data_result['vendor_ranking_edit'] == "CC") { echo 'selected';} ?> >CC --- Rank 3</option>
                                                                    <option value="DD" <?php if ($vendor_data_result['vendor_ranking_edit'] == "DD") { echo 'selected';} ?> >DD --- Rank 4</option>
                                                                    <option  value="EE"<?php if ($vendor_data_result['vendor_ranking_edit'] == "EE") { echo 'selected';} ?> >EE --- Rank 5</option>
                                                                </select>
                                                            </p>
                                                        </div>

                                                        <div class="form-group">
                                                            <p>
                                                                <label for="vendor_classification">Industry Classification</label>

                                                                <select id="vendor_classification" name="vendor_classification" class="form-control">
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
                                                            <p>
                                                                <label for="vendor_terms">Vendor Terms</label>

                                                                <select id="vendor_terms" name="vendor_terms" class="form-control">
                                                                    <option value="">---Please Select---</option>
                                                                    <option value="00" <?php if ($vendor_data_result['vendor_terms_edit'] == "00") { echo 'selected';} ?> >00 --- COD/Cash</option>
                                                                    <option value="01" <?php if ($vendor_data_result['vendor_terms_edit'] == "01") { echo 'selected';} ?> >01 --- Dated Check</option>
                                                                    <option value="02" <?php if ($vendor_data_result['vendor_terms_edit'] == "02") { echo 'selected';} ?> >02 --- 7 Days</option>
                                                                    <option value="03" <?php if ($vendor_data_result['vendor_terms_edit'] == "03") { echo 'selected';} ?> >03 --- 15 Days</option>
                                                                    <option value="04" <?php if ($vendor_data_result['vendor_terms_edit'] == "04") { echo 'selected';} ?> >04 --- 30 Days</option>
                                                                    <option value="05" <?php if ($vendor_data_result['vendor_terms_edit'] == "05") { echo 'selected';} ?> >05 --- 45 Days</option>
                                                                    <option value="06" <?php if ($vendor_data_result['vendor_terms_edit'] == "06") { echo 'selected';} ?> >06 --- 60 Days</option>
                                                                    <option value="07" <?php if ($vendor_data_result['vendor_terms_edit'] == "07") { echo 'selected';} ?> >07 --- 90 Days</option>
                                                                    <option value="08" <?php if ($vendor_data_result['vendor_terms_edit'] == "08") { echo 'selected';} ?> >08 --- 21 Days</option>
                                                                </select>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="vendor_date">Date of Partnership</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="date" id="vendor_date" name="vendor_date" placeholder="Select Date" value="<?php echo $vendor_data_result['vendor_date_edit'] ?>">
                                                                    </div>									      
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <p>
                                                                        <label for="vendor_category">Vendor Category</label>

                                                                        <select name="vendor_category" class="form-control">
                                                                            <option value="">---Please Select---</option>
                                                                            <option <?php if($vendor_data_result['vendor_category_edit'] == "Direct") { echo "selected"; } ?> >Direct</option>
                                                                            <option <?php if($vendor_data_result['vendor_category_edit'] == "Indirect") { echo "selected"; } ?> >Indirect</option>
                                                                            <option <?php if($vendor_data_result['vendor_category_edit'] == "Tools") { echo "selected"; } ?> >Tools</option>
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
                                                            <input type="text" name="vendor_technical_name" class="form-control" placeholder="Enter Technical Name" value="<?php echo $vendor_data_result['vendor_technical_person'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                                <label for="vendor_technical_contact">Contact Number</label>
                                                                <input type="text" name="vendor_technical_contact" class="form-control" placeholder="Enter Contact Number" value="<?php echo $vendor_data_result['vendor_technical_contact'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="vendor_technical_email" class="control-label">Email Address</label>
                                                            <input type="text" name="vendor_technical_email" class="form-control" placeholder="Enter Email Address" value="<?php echo $vendor_data_result['vendor_technical_email'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <label>Sales Details:</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="vendor_technical_name" class="control-label">Name</label>
                                                            <input type="text" name="vendor_technical_name" class="form-control" placeholder="Enter Technical Name" value="<?php echo $vendor_data_result['vendor_technical_person'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                                <label for="vendor_technical_contact">Contact Number</label>
                                                                <input type="text" name="vendor_technical_contact" class="form-control" placeholder="Enter Contact Number" value="<?php echo $vendor_data_result['vendor_technical_contact'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="vendor_technical_email" class="control-label">Email Address</label>
                                                            <input type="text" name="vendor_technical_email" class="form-control" placeholder="Enter Email Address" value="<?php echo $vendor_data_result['vendor_technical_email'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <label>Brand Details:</label>
                                            </div>
                                            <div class="card-body">
                                            
                                            <?php foreach($brand_data as $row): ?>
                                            <div class="col-sm-12 add-brand">
                                                <div class="row">
                                                    <input name="brand_data_id[]" type="hidden" value="<?php echo $row->id ?>">
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label for="brand_name" class="control-label">Brand Name</label>
                                                                <input type="text" name="brand_name[]" class="form-control" placeholder="Enter Brand Name" value="<?php echo $row->brand_name ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                    <label for="brand_products">Products</label>
                                                                    <input type="text" name="brand_products[]" class="form-control" placeholder="Enter Product" value="<?php echo $row->products ?>">
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
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="brand_contact_person" class="control-label">Contact Person</label>
                                                            <input type="text" name="brand_contact_person[]" class="form-control" placeholder="Enter Contact Person" value="<?php echo $row->brand_contact_person ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="brand_contact_number" class="control-label">Contact Number</label>
                                                            <input type="text" name="brand_contact_number[]" class="form-control" placeholder="Enter Contact Number" value="<?php echo $row->brand_contact_number ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="brand_email" class="control-label">Email Address</label>
                                                            <input type="text" name="brand_email[]" class="form-control" placeholder="Enter Email Address" value="<?php echo $row->brand_email ?>">
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
                                                            <input type="text" name="brand_technical_name[]" class="form-control" placeholder="Enter Technical Name" value="<?php echo $row->brand_technical_person ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="brand_technical_contact">Contact Number</label>
                                                            <input type="text" name="brand_technical_contact[]" class="form-control" placeholder="Enter Contact Number" value="<?php echo $row->brand_technical_contact ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="brand_technical_email" class="control-label">Email Address</label>
                                                                <input type="text" name="brand_technical_email[]" class="form-control" placeholder="Enter Email Address" value="<?php echo $row->brand_technical_email ?>">
                                                            </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <br>
                                            </div>
                                            <?php endforeach ?>
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
                    </div>
                </div>
            </div>
        </div>
     </section>
</div>
