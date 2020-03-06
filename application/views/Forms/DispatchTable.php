<?php
defined('BASEPATH') or die('No direct script access allowed.');
?>
<div class="content-wrapper">
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="page-header m-0 text-dark">List of Dispatch Form</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<?php if($this->session->flashdata('msg')): ?>
					    	<p><?php echo $this->session->flashdata('msg'); ?></p>
							<?php endif; ?>
							<?php echo form_open() ?>
							<?php echo validation_errors('<div class="alert alert-danger alert-dismissable">
				        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>') ?>
							<?php echo form_close() ?>
							<div class="col-lg-12">
								<table width="100%" id="dispatchTable" class="table table-bordered table-hover div-service" style="font-size: 12px">
									<thead>
										<tr>
											<th>Dispatch ID</th>
											<th>Customer Name</th>
											<th>Contact Person</th>
											<th>Contact Number</th>
											<th>Dispatch Date</th>
											<th>Address</th>
											<th>Time In</th>
											<th>Time Out</th>
											<th>Concern</th>
											<th>Assigned Technician 1</th>
											<th>Assigned Technician 2</th>
											<th>Assigned Technician 3</th>
											<th>Assigned Technician 4</th>
											<th>Assigned Technician 5</th>
											<th>With Permit?</th>
											<th>Installation</th>
											<th>Repair/Service</th>
											<th>Warranty</th>
											<th>Dispatch Out</th>
											<th>SR Number</th>
											<th>Remarks</th>
											<th>Operation</th>
										</tr>
									</thead>
								</table>
							</div>
								
						</div>

						<div class="card-footer">
							<div class="row">
								<div class="col-lg-12">
									<div class="pull-right">
										<a class="btn btn-danger" href="<?php echo base_url('index.php/dispatchform') ?>">Go back to Dispatch Forms</a>
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

<!--  Update Dispatch -->
<div class="modal fade" id="modal-edit-dispatch">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
            	
              	<h1 class="modal-title Dispatch_ID">Update Dispatch</h1>
              	
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            	
            	<div class="row">
            		<div class="col-lg-12">
            			<div class="card">

            				<?php echo form_open('DispatchFormController/updateDispatchValidate',["id" => "update-form-dispatch"]) ?>
							<input type="hidden" class="form-control Dispatch_ID" name="dispatch_id">
							
		            		<div class="card-header">
		            			Official Use
		            		</div>

		            		<div class="card-body">
		            			<div class="row">
		            				<div class="col-lg-6">
										<div class="form-group">
						        			<label>Dispatch Out</label>
									        <input class="form-control DispatchOut_Edit" type="time" name="dispatch_out" id="dispatch_out" placeholder="Select Time">
						        		 </div>

						        		 <div class="form-group">
						                    <label>Remarks</label>
							                    <textarea class="form-control Remarks_Edit" rows="3" name="remarks2" id="remarks2" placeholder="Enter Remarks"></textarea>
				               			 </div>
									</div>

									<div class="col-lg-6">
										<div class="form-group">
											<label>SR Number</label>
											<input class="form-control SRNumber_Edit" type="text" name="sr_number" id="sr_number" placeholder="Enter SR No. here">
										</div>
									</div>
		            			</div>
		            			
		            		</div>
		            	</div>
            		</div>
				</div>

              	<div class="row">
					<div class="col-sm-6">
					<div class="modal-header">
	              	<h6 class="modal-title">Dispatch Details </h6>
	            	</div>

					<div class="card card-primary">
						<div class="card-body">
							
							<div class="form-group">
				                <label for="Dispatch Date">Dispatch Date</label>
				                <div class="input-group">
					                <input class="form-control DispatchDate_Edit" id="dispatch_date" type="date" name="dispatch_date" placeholder="Select Date">
					                <div id="reset_dispatch_date" class="input-group-addon">
										<i class="fa fa-remove"></i>
									</div>
								</div>
				            </div>
					
							<div class="form-group">
					        	<label>Time In</label>
					        	<input class="form-control TimeIn_Edit" type="time" name="time_in">
					  
					        </div>

							<div class="form-group">
					        	<label>Time Out</label>
					        	<input type="time" name="time_out" class="form-control TimeOut_Edit">
					        	
					        </div>

							<div class="form-group">
									<p>
										<label for="customer_name" class="control-label">Customer Name</label>
										<select id="customer_name" name="customer_name" class="form-control CustomerName_Edit">
											<option value="">---Please Select---</option>	
											<?php foreach ($customers_form_edit as $row): ?>
					        				<option value="<?php echo $row->CustomerID ?>" ><?php echo $row->CompanyName." --- ".$row->CustomerID ?></option>
					        		<?php endforeach ?>
										</select>
									</p>
							</div>

							<div class="form-group">
			                    <label for="remarks" class="control-label">Concern</label>
			                    <textarea class="form-control Concern_Edit" rows="3" name="remarks" id="remarks" placeholder="Enter Concern"></textarea>
			                </div>

			                <div class="form-group">
			                	<label for="service_type" class="control-label">Type Of Service</label>
			                	<select name="service_type" id="service_type" class="form-control TypeOfService_Edit">
			                		<option value=""></option>
				                	<option value="Installation">Installation</option>
				                	<option value="Service">Service</option>
				                	<option value="Warranty">Warranty</option>	
			                	</select>
			                </div>
						</div>
					</div>
				</div>

				<div class="col-sm-6">
					<div class="modal-header">
	              	<h6 class="modal-title">Dispatch Details </h6>
	            	</div>
					<div class="card card-primary">
						<div class="card-body">

							<div class="form-group">
								<label>Assigned Technician 1</label>
								<select name="assigned_tech1" id="assigned_tech1" class="form-control AssignedTechnicians1_Edit">
									<option value="">N/A</option>
									<?php foreach ($Technicians_Edit as $row): ?>
										<option value="<?php echo "ID Number: ".$row->id." ".$row->name ?>"><?php echo "ID Number: ".$row->id." --- ".$row->name ?></option>
									<?php endforeach ?>
								</select>
							</div>

							<div class="form-group">
								<label>Assigned Technician 2</label>
								<select name="assigned_tech2" id="assigned_tech2" class="form-control AssignedTechnicians2_Edit">
									<option value="">N/A</option>
									<?php foreach ($Technicians_Edit as $row): ?>
										<option value="<?php echo "ID Number: ".$row->id." ".$row->name ?>"><?php echo "ID Number: ".$row->id." --- ".$row->name ?></option>
									<?php endforeach ?>
								</select>
							</div>

							<div class="form-group">
								<label>Assigned Technician 3</label>
								<select name="assigned_tech3" id="assigned_tech3" class="form-control AssignedTechnicians3_Edit">
									<option value="">N/A</option>
									<?php foreach ($Technicians_Edit as $row): ?>
										<option value="<?php echo "ID Number: ".$row->id." ".$row->name ?>"><?php echo "ID Number: ".$row->id." --- ".$row->name ?></option>
									<?php endforeach ?>
								</select>
							</div>

							<div class="form-group">
								<label>Assigned Technician 4</label>
								<select name="assigned_tech4" id="assigned_tech4" class="form-control AssignedTechnicians4_Edit">
									<option value="">N/A</option>
									<?php foreach ($Technicians_Edit as $row): ?>
										<option value="<?php echo "ID Number: ".$row->id." ".$row->name ?>"><?php echo "ID Number: ".$row->id." --- ".$row->name ?></option>
									<?php endforeach ?>
								</select>
							</div>

							<div class="form-group">
								<label>Assigned Technician 5</label>
								<select name="assigned_tech5" id="assigned_tech5" class="form-control AssignedTechnicians5_Edit">
									<option value="">N/A</option>
									<?php foreach ($Technicians_Edit as $row): ?>
										<option value="<?php echo "ID Number: ".$row->id." ".$row->name ?>"><?php echo "ID Number: ".$row->id." --- ".$row->name ?></option>
									<?php endforeach ?>
								</select>
							</div>

							<div class="form-group">
								<label class="control-label">Is this with Permit?</label>
								<select class="form-control WithPermit_Edit" name="with_permit" id="with_permit">
									<option value="">---</option>
									<option>No</option>
									<option>Yes</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				</div>
            </div>
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Update Record</button>
            <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>

