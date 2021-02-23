<?php
defined('BASEPATH') or die('Access Denied');

$quotation_details_result = array();
$quotation_items_results = array();

foreach ($quotation_details as $row) {
	$quotation_details_result = [
		'quotation_reference_no' => $row->quotation_ref,
		'quotation_customer_name' => $row->customer_name,
		'quotation_contact_person' => $row->contact_person,
		'quotation_contact_number' => $row->contact_number,
		'quotation_email' => $row->email,
		'quotation_customer_location' => $row->customer_location,
		'quotation_project_type' => $row->project_type,
		'quotation_Subject' => $row->subject,
		'quotation_sales_name' => $row->prepared_by,
		'quotation_sales_email' => $row->prepared_email,
		'quotation_date_created' => $row->Date_created,
		'quotation_warranty' => $row->warranty_covered,
		'quotation_promo' => $row->promo,
		'quotation_payment' => $row->payment_mode,
		'quotation_discount' => $row->discount,
		'quotation_vat' => $row->vat
	];

}

foreach ($quotation_items as $row) {
	$quotation_items_results = [
		'quotation_item_id' => $row->ID,
		'quotation_item_description' => $row->description,
		'quotation_item_qty' => $row->qty,
		'quotation_item_unit' => $row->unit,
		'quotation_item_availabity' => $row->availability,
		'quotation_item_amount' => $row->amount
	];
}

foreach ($quotation_getsales as $row) {
	$quotation_getsales_results = [
		'quotation_sales_id' => $row->id,
		'quotation_sales_firstname' => $row->firstname,
		'quotation_sales_lastname' => $row->lastname,
		'quotation_sales_middlename' => $row->middlename,
	];
}

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
		             <?php echo form_open('SalesQuotationController/SalesQuotationUpdateValidate',["id" => "form-update-salesquotation"]) ?>
		             <input type="hidden" name="quotation_date_created" value="<?php echo $quotation_details_result['quotation_date_created'] ?>">
		             <input type="hidden" name="quotation_id" value="<?php echo $quotation_details_result['quotation_reference_no'] ?>">
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
		                          				
		                          				<?php foreach ($quotation_getsales as $row): ?>
			                            			<option value="<?php echo $row->id ?>"
			                            				<?php if ($quotation_details_result['quotation_sales_name'] == $row->id) { echo 'selected';} ?> >
			                            				<?php echo $row->id. "--" .$row->lastname. ", " .$row->firstname. " " .$row->middlename  ?>
			                            			</option>
		                          				<?php endforeach ?>
		                        			</select>
		                      		</div>
		                  		</div>

		                		<div class="col-sm-6">
		                    		<div class="form-group">
		                    			<label for="quotation_sales_email">Consultant Email Address</label>
		                    			<input class="form-control" type="text" name="quotation_sales_email" id="quotation_sales_email" placeholder="Enter Email Address (@vinculumtechnologies, @Gmail @yahoo, @etc...)" value="<?php echo $quotation_details_result['quotation_sales_email'] ?>">
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
		                      			<label>Customer Name</label>
		                      				<input class="form-control CustomerName_Edit" type="text" name="quotation_customer_name" id="quotation_customer_name" placeholder="Enter Full Name (Last Name, First Name Middle Name)" value="<?php echo $quotation_details_result['quotation_customer_name'] ?>" >
		                    		</div>
		                  		</div>

			                	<div class="col-sm-6">
			                    	<div class="form-group">
				                      <label for="quotation_contact_person">Contact Person</label>
				                      <input class="form-control" type="text" name="quotation_contact_person" id="quotation_contact_person" placeholder="Contact Person Name" value="<?php echo $quotation_details_result['quotation_contact_person'] ?>">
			                    	</div>
			                  	</div>

			                  	<div class="col-sm-3">
			                    	<div class="form-group">
			                      		<label for="quotation_contact_number">Contact Number</label>
			                      		<input class="form-control" type="text" name="quotation_contact_number" id="quotation_contact_number" placeholder="Network/Landline Number" value="<?php echo $quotation_details_result['quotation_contact_number'] ?>">
			                    	</div>
			                  	</div>

			                  	<div class="col-sm-3">
			                    	<div class="form-group">
			                      		<label for="quotation_email">E-mail Address</label>
			                      		<input class="form-control" type="text" name="quotation_email" id="quotation_email" placeholder="Enter Email @Gmail, @yahoo, @etc" value="<?php echo $quotation_details_result['quotation_email'] ?>">
			                    	</div>
			                  	</div>

			                  	<div class="col-sm-6">
			                    	<div class="form-group">
			                      		<label for="quotation_customer_location">Location</label>
			                      		<input class="form-control" type="text" name="quotation_customer_location" id="quotation_customer_location" placeholder="Customer Full Address (Lot no., Block No., Street no., Subdivision, Barangay, Municipality) " value="<?php echo $quotation_details_result['quotation_customer_location'] ?>">
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
		                      			<input class="form-control" type="text" name="quotation_reference_no" id="quotation_reference_no" placeholder="Quotation Number" value="<?php echo $quotation_details_result['quotation_reference_no'] ?>">
		                    		</div>
		                  		</div>
				                <div class="col-sm-4">
				                   	<div class="form-group">
				                      	<label class="control-label" for="quotation_project_type">Type of Project</label>
				                      		<select class="form-control" name="quotation_project_type" id="quotation_project_type">
 													<?php if ($quotation_details_result['quotation_project_type'] == "Residential"): ?>
							                       <option>Residential</option>
							                       <option>Commercial</option>
							                       <option>Industrial</option>
							                       <option>Government</option>
							                       <option>Walk-In</option>

							                       <?php elseif ($quotation_details_result['quotation_project_type'] == "Commercial"): ?>
							                       <option>Commercial</option>
							                       <option>Residential</option>
							                       <option>Industrial</option>
							                       <option>Government</option>
							                       <option>Walk-In</option>

							                   		<?php elseif ($quotation_details_result['quotation_project_type'] == "Industrial"): ?>
							                       <option>Industrial</option>
							                       <option>Residential</option>
							                       <option>Commercial</option>
							                       <option>Government</option>
							                       <option>Walk-In</option>

							                       <?php elseif ($quotation_details_result['quotation_project_type'] == "Government"): ?>
							                       <option>Government</option>
							                       <option>Residential</option>
							                       <option>Commercial</option>
							                       <option>Industrial</option>
							                       <option>Walk-In</option>

							                       <?php elseif ($quotation_details_result['quotation_project_type'] == "Walk-In"): ?>
							                       <option>Walk-In</option>
							                       <option>Residential</option>
							                       <option>Commercial</option>
							                       <option>Industrial</option>
							                       <option>Government</option>
							                		<?php endif ?>


				                      			</select>
				                    </div>
				                  </div>
			                  	<div class="col-sm-4">
			                    	<div class="form-group">
			                      		<label for="quotation_Subject">Subject</label>
			                     		 <input class="form-control" type="text" name="quotation_Subject" id="quotation_Subject" placeholder="CCTV Ins., FDAS, ACS & Biometrics, Supply Only, Etc..." value="<?php echo $quotation_details_result['quotation_Subject'] ?>">
			                    	</div>
			                  	</div>
		                	</div>

		                	<div class="row">
		                  		<div class="col-sm-6">
		                    		<div class="form-group">
		                      			<label for="quotation_warranty">Warranty Covered</label>
		                      			<input class="form-control" type="text" name="quotation_warranty" id="quotation_warranty" placeholder="Enter Warranty Covered Details" value="<?php echo $quotation_details_result['quotation_warranty'] ?>">
		                    		</div>
		                  		</div>
		                  		<div class="col-sm-6">
		                    		<div class="form-group">
		                      			<label for="quotation_promo">Promo</label>
		                      			<input class="form-control" type="text" name="quotation_promo" id="quotation_promo" placeholder="Enter Promo Details" value="<?php echo $quotation_details_result['quotation_promo'] ?>">
		                    		</div>
		                  		</div>
		                	</div>

		                	<div class="row">
		                  		<div class="col-sm-8">
		                    		<label for="quotation_payment">Payment Mode</label>
		                    			<textarea class="form-control" type="text" name="quotation_payment" id="quotation_payment" placeholder="Enter Payment Details"><?php echo $quotation_details_result['quotation_payment'] ?></textarea>
		                  		</div>
		                  		<div class="col-sm-3">
		                    		<label for="quotation_discount">Discount</label>
			                    		<?php if($quotation_details_result['quotation_discount'] == ""): ?>
			                    			<input class="form-control" name="quotation_discount" id="quotation_discount" placeholder="Enter Quotation Discount" value="0">
			                        	<?php else: ?>
			                        		<input class="form-control" name="quotation_discount" id="quotation_discount" placeholder="Enter Quotation Discount" value="<?php echo $quotation_details_result['quotation_discount'] ?>">
			                        	<?php endif ?>
		                  		</div>
		                  		<div class="col-sm-1">
		                    		<label for="quotation_vat">Vat Inclusive</label>
		                      			<div class="form-check">
		                        			<label class="form-check-label">
		                        				<?php if ($quotation_details_result['quotation_vat'] == '.12'): ?>
		                            			<input checked="checked" type="checkbox" class="form-check-input" name="quotation_vat" value=".12">
		                              				Vat 12%
		                              			<?php else: ?>
		                              			<input type="checkbox" class="form-check-input" name="quotation_vat" value=".12">
		                              				Vat 12%
		                              			<?php endif ?>
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
		              		<?php foreach ($quotation_items as $row): ?>
		                	<div class="row add-item">
		                		<input type="hidden" name="quotation_item_id[]" value="<?php echo $row->ID ?>">
		                  		<div class="col-sm-5">
		                    		<div class="form-group">
		                      			<label for="quotation_item_description"> Description </label>
		                      			<textarea class="form-control" type="text" name="quotation_item_description[]" placeholder="Item Specification, Description"><?php echo $row->description ?></textarea>
		                    		</div>
		                  		</div>
		                  		<div class="col-sm-1">
		                    		<div class="form-group">
		                      			<label for="quotation_item_qty"> Qty </label>
		                      				<input class="form-control" type="text" name="quotation_item_qty[]" placeholder="Item Qty" value="<?php echo $row->qty ?>">
		                    		</div>
		                  		</div>
			                  	<div class="col-sm-2">
			                    	<div class="form-group">
				                    	<label class="control-label" for="quotation_item_unit">Unit</label>
				                      		<select class="form-control" name="quotation_item_unit[]">

				                      			<?php if($row->unit == "Meter"): ?>
						                        <option>Meter</option>
						                        <option>Pcs</option>
						                        <option>Set</option>
						                        <option>Pair</option>
						                        <option>Roll</option>
						                        <option>Package</option>
						                        <option>Box</option>
						                        <option>Lot</option>
						                        <option>Year</option>

						                        <?php elseif($row->unit == "Pcs"): ?>
						                        <option>Pcs</option>
						                        <option>Meter</option>
						                        <option>Set</option>
						                        <option>Pair</option>
						                        <option>Roll</option>
						                        <option>Package</option>
						                        <option>Box</option>
						                        <option>Lot</option>
						                        <option>Year</option>

						                        <?php elseif($row->unit == "Set"): ?>
						                        <option>Set</option>
						                        <option>Meter</option>
						                        <option>Pcs</option>
						                        <option>Pair</option>
						                        <option>Roll</option>
						                        <option>Package</option>
						                        <option>Box</option>
						                        <option>Lot</option>
						                        <option>Year</option>

						                        <?php elseif($row->unit == "Pair"): ?>
						                        <option>Pair</option>
						                        <option>Meter</option>
						                        <option>Pcs</option>
						                        <option>Set</option>
						                        <option>Roll</option>
						                        <option>Package</option>
						                        <option>Box</option>
						                        <option>Lot</option>
						                        <option>Year</option>

						                       	<?php elseif($row->unit == "Roll"): ?>
						                        <option>Roll</option>
						                        <option>Meter</option>
						                        <option>Pcs</option>
						                        <option>Set</option>
						                        <option>Pair</option>
						                        <option>Package</option>
						                        <option>Box</option>
						                        <option>Lot</option>
						                        <option>Year</option>

						                        <?php elseif($row->unit == "Package"): ?>
						                        <option>Package</option>
						                        <option>Meter</option>
						                        <option>Pcs</option>
						                        <option>Set</option>
						                        <option>Pair</option>
						                        <option>Roll</option>
						                        <option>Box</option>
						                        <option>Lot</option>
						                        <option>Year</option>

						                        <?php elseif($row->unit == "Box"): ?>
						                        <option>Box</option>
						                        <option>Meter</option>
						                        <option>Pcs</option>
						                        <option>Set</option>
						                        <option>Pair</option>
						                        <option>Roll</option>
						                        <option>Package</option>
						                        <option>Lot</option>
						                        <option>Year</option>

						                        <?php elseif($row->unit == "Lot"): ?>
						                        <option>Lot</option>
						                        <option>Meter</option>
						                        <option>Pcs</option>
						                        <option>Set</option>
						                        <option>Pair</option>
						                        <option>Roll</option>
						                        <option>Package</option>
						                        <option>Box</option>
						                        <option>Year</option>

						                        <?php elseif($row->unit == "Year"): ?>
						                        <option>Year</option>
						                        <option>Meter</option>
						                        <option>Pcs</option>
						                        <option>Set</option>
						                        <option>Pair</option>
						                        <option>Roll</option>
						                        <option>Package</option>
						                        <option>Box</option>
						                        <option>Lot</option>

						                        <?php else: ?>
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

						                    	<?php endif ?>
				                      		</select>
			                    	</div>
			                  	</div>
			                  	<div class="col-sm-2">
			                    	<div class="form-group">
			                      		<label for="quotation_item_amount"> Amount </label>
			                      		<input class="form-control" type="text" name="quotation_item_amount[]" placeholder="Item Price" value="<?php echo $row->amount ?>">
			                    	</div>
			                  	</div>
			                  	<div class="col-sm-2">
			                    	<div class="form-group">
			                      		<label class="control-label" for="quotation_availability">Availability</label>
			                      			<select class="form-control" name="quotation_availability[]">
						                    	<?php if ($row->availability =="Order Basis" ): ?>
						                        <option>Order Basis</option>
						                        <option>Available</option>
						                        <option>5-7 Days</option>
						                        <option>30-45 Days</option>
						                        <option>45-60 Days</option>

						                        <?php elseif ($row->availability =="Available" ): ?>
						                        <option>Available</option>
						                        <option>Order Basis</option>
						                        <option>5-7 Days</option>
						                        <option>30-45 Days</option>
						                        <option>45-60 Days</option>

						                        <?php elseif ($row->availability =="5-7 Days" ): ?>
						                        <option>5-7 Days</option>
						                        <option>30-45 Days</option>
						                        <option>45-60 Days</option>s
						                        <option>Order Basis</option>
						                        <option>Available</option>
						                        

						                        <?php elseif ($row->availability =="30-45 Days" ): ?>
						                        <option>30-45 Days</option>
						                        <option>45-60 Days</option>
						                        <option>Order Basis</option>
						                        <option>Available</option>
						                        <option>5-7 Days</option>
						                        
						                        

						                        <?php elseif ($row->availability =="45-60 Days" ): ?>
						                        <option>45-60 Days</option>
						                        <option>30-45 Days</option>
						                        <option>5-7 Days</option>
						                        <option>Order Basis</option>
						                        <option>Available</option>
						                        
						                        
						                    	<?php endif ?>
			                      			</select>
			                    	</div>
			                  	</div>
		                	</div>
		                	<?php endforeach ?>
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