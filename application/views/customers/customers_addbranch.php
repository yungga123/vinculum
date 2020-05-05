<?php 
defined('BASEPATH') or die('Access Denied');    
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Customer Branch Adding</h1>
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
                        <div class="card-header text-bold">
                            Customer Information
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2 offset-sm-5">
                                    <div class="form-group text-center">
                                        <label for="CustomerID">Customer ID</label>
                                        <input type="text" name="CustomerID" id="CustomerID" class="form-control text-center" value="<?php echo $this->uri->segment('2') ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <?php foreach ($results as $row) { ?>
                            
                            <?php
                            $installationDate = '';
                            if ($row->InstallationDate != '0000-00-00') {
                                $installationDate = date_format(date_create($row->InstallationDate),'F d, Y');
                            } 
                            ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="CompanyName">Customer Name</label>
                                        <input type="text" name="CompanyName" id="CompanyName" class="form-control" readonly value="<?php echo $row->CompanyName ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="ContactPerson">Contact Person</label>
                                        <input type="text" name="ContactPerson" id="ContactPerson" class="form-control" value="<?php echo $row->ContactPerson ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="Address">Address</label>
                                        <input type="text" name="Address" id="Address" class="form-control" value="<?php echo $row->Address ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="ContactNumber">Contact Number</label>
                                        <input type="text" name="ContactNumber" id="ContactNumber" class="form-control" <?php echo $row->ContactNumber ?> readonly>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="EmailAddress">Email Address</label>
                                        <input type="text" name="EmailAddress" id="EmailAddress" class="form-control" value="<?php echo $row->EmailAddress ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Website">Website</label>
                                        <input type="text" name="Website" id="Website" class="form-control" value="<?php echo $row->Website ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="InstallationDate">Installation Date</label>
                                        <input type="text" name="InstallationDate" id="InstallationDate" class="form-control" value="<?php echo $installationDate ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="Interest">Interest</label>
                                        <input type="text" name="Interest" id="Interest" class="form-control" value="<?php echo $row->Interest ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="Type">Type</label>
                                        <input type="text" name="Type" id="Type" class="form-control" value="<?php echo $row->Type ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="Notes">Notes</label>
                                        <input type="text" name="Notes" id="Notes" class="form-control" value="<?php echo $row->Notes ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-bold">
                            Please Provide Information
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php echo form_open('CustomersController/customer_addbranch_validate',["id" => "form-customer-addbranch"]) ?>
                                    <input type="hidden" value="<?php echo $this->uri->segment(2) ?>">
                                    <div class="form-group">
                                        <label for="branch_contact">Branch Contact</label>
                                        <input type="text" name="branch_contact" id="branch_contact" class="form-control" aria-describedby="helpId">
                                        <small id="helpId" class="text-muted">Please enter branch contact.</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="branch_address">Branch Address</label>
                                        <input type="text" name="branch_address" id="branch_address" class="form-control" aria-describedby="helpId">
                                        <small id="helpId" class="text-muted">Please enter branch address.</small>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="additional_notes">Additional Notes</label>
                                        <input type="text" name="additional_notes" id="additional_notes" class="form-control" aria-describedby="helpId">
                                        <small id="helpId" class="text-muted">You can enter additional notes here. "OPTIONAL".</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success text-bold float-right"><i class="fas fa-check"></i> CONFIRM</button>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>