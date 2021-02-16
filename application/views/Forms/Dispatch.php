<?php
defined('BASEPATH') or die('No direct script access allowed.');
?>

<div class="content-wrapper">
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Dispatch Form Details</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>

	<section class="content">
		<div class="container-fluid">

			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<?php echo form_open('DispatchFormController/addDispatchValidate',["id" => "New-form-dispatch"]) ?>
						<div class="card-header">
							Official Use
						</div>

						<div class="card-body">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
					        			<label>Dispatch Out</label>
								        <input class="form-control" type="time" name="dispatch_out" id="dispatch_out" placeholder="Select Time">
					        		 </div>

					        		 <div class="form-group">
					                    <label>Remarks</label>
						                    <textarea class="form-control" rows="3" name="remarks2" id="remarks2" placeholder="Enter Remarks"></textarea>
			               			 </div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<label>SR Number</label>
										<input class="form-control" type="text" name="sr_number" id="sr_number" placeholder="Enter SR No. here">
									</div>
								</div>
							</div>
							
							
							
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<div class="row">
								<div class="col-lg-6">
									<h4 class="card-title">Dispatch Details</h4>
								</div>
								<div class="col-lg-6">
									<h4 class="card-title">Assigned Technicians</h4>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
				                		<label>Dispatch Date</label>
							                <input class="form-control" id="dispatch_date" type="date" name="dispatch_date" placeholder="Select Date">
							                <div id="reset_dispatch_date" class="input-group-addon">
												<i class="fa fa-remove"></i>
											</div>
				            		</div>

						            <div class="form-group">
							        	<label>Time In</label>
								        	<div class="input-group">
								        		<input class="form-control" type="time" name="time_in" id="time_in" placeholder="Select Time">
								        		<div id="reset_time_in" class="input-group-addon">
													<i class="fa fa-remove"></i>
												</div>
								        	</div>   	
							        </div>
							         <div class="form-group">
					        			<label>Time Out</label>
								        	<div class="input-group">
								        		<input class="form-control" type="time" name="time_out" id="time_out" placeholder="Select Time">
								        		<div id="reset_time_out" class="input-group-addon">
													<i class="fa fa-remove"></i>
												</div>
								        	</div>
					        		 </div>

					            	 <div class="form-group">
							        	<label>Customer Name</label>
								        	<select name="customer_name" id="customer_name" class="form-control">
								        		<option value="">---Select Customer---</option>
								        		<?php foreach ($GetCustomer as $row): ?>
								        			<option value="<?php echo $row->CustomerID ?>"><?php echo $row->CompanyName." --- ".$row->CustomerID ?></option>
								        		<?php endforeach ?>
								        	</select>
							         </div>
							         <div class="form-group">
					                    <label>Concern</label>
						                    <textarea class="form-control" rows="3" name="remarks" id="remarks" placeholder="Enter Concern"></textarea>
			               			 </div>

					                 <div class="form-group">
					                	<label>Type of Service</label>
						                	<select name="service_type" id="service_type" class="form-control">
						                		<option value=""></option>
						                		<option value="Installation">Installation</option>
						                		<option value="Service">Service</option>
						                		<option value="Warranty">Warranty</option>
						                	</select>
					                 </div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label>Assigned Technician 1</label>
											<select name="assigned_tech1" id="assigned_tech1" class="form-control">
												<option value="">N/A</option>

												<?php foreach ($GetTech as $row): ?>
													<option value="<?php echo "ID Number: ".$row->id." ".$row->name ?>"><?php echo "ID Number: ".$row->id." --- ".$row->name ?></option>
												<?php endforeach ?>
											</select>
									</div>

									<div class="form-group">
										<label>Assigned Technician 2</label>
											<select name="assigned_tech2" id="assigned_tech2" class="form-control">
												<option value="">N/A</option>

												<?php foreach ($GetTech as $row): ?>
													<option value="<?php echo "ID Number: ".$row->id." ".$row->name ?>"><?php echo "ID Number: ".$row->id." --- ".$row->name ?></option>
												<?php endforeach ?>
											</select>
									</div>
									<div class="form-group">
										<label>Assigned Technician 3</label>
											<select name="assigned_tech3" id="assigned_tech3" class="form-control">
												<option value="">N/A</option>

												<?php foreach ($GetTech as $row): ?>
													<option value="<?php echo "ID Number: ".$row->id." ".$row->name ?>"><?php echo "ID Number: ".$row->id." --- ".$row->name ?></option>
												<?php endforeach ?>
											</select>
									</div>

									<div class="form-group">
										<label>Assigned Technician 4</label>
											<select name="assigned_tech4" id="assigned_tech4" class="form-control">
												<option value="">N/A</option>

												<?php foreach ($GetTech as $row): ?>
													<option value="<?php echo "ID Number: ".$row->id." ".$row->name ?>"><?php echo "ID Number: ".$row->id." --- ".$row->name ?></option>
												<?php endforeach ?>
											</select>
									</div>

									<div class="form-group">
										<label>Assigned Technician 5</label>
											<select name="assigned_tech5" id="assigned_tech5" class="form-control">
												<option value="">N/A</option>

												<?php foreach ($GetTech as $row): ?>
													<option value="<?php echo "ID Number: ".$row->id." ".$row->name ?>"><?php echo "ID Number: ".$row->id." --- ".$row->name ?></option>
												<?php endforeach ?>
											</select>
									</div>

									<div class="form-group">
										<label>Assigned Technician 6</label>
											<select name="assigned_tech6" id="assigned_tech6" class="form-control">
												<option value="">N/A</option>

												<?php foreach ($GetTech as $row): ?>
													<option value="<?php echo "ID Number: ".$row->id." ".$row->name ?>"><?php echo "ID Number: ".$row->id." --- ".$row->name ?></option>
												<?php endforeach ?>
											</select>
									</div>

									<div class="form-group">
										<label>Assigned Technician 7</label>
											<select name="assigned_tech7" id="assigned_tech7" class="form-control">
												<option value="">N/A</option>

												<?php foreach ($GetTech as $row): ?>
													<option value="<?php echo "ID Number: ".$row->id." ".$row->name ?>"><?php echo "ID Number: ".$row->id." --- ".$row->name ?></option>
												<?php endforeach ?>
											</select>
									</div>

									<div class="form-group">
										<label>Assigned Technician 8</label>
											<select name="assigned_tech8" id="assigned_tech8" class="form-control">
												<option value="">N/A</option>

												<?php foreach ($GetTech as $row): ?>
													<option value="<?php echo "ID Number: ".$row->id." ".$row->name ?>"><?php echo "ID Number: ".$row->id." --- ".$row->name ?></option>
												<?php endforeach ?>
											</select>
									</div>
									<div class="form-group">
										<label class="control-label">Is this with permit?</label>
											<select class="form-control" name="with_permit" id="with_permit">
												<option value="">---</option>
												<option>No</option>
												<option>Yes</option>
											</select>
									</div>
								</div>
							</div>
						</div>
							<div class="modal-footer justify-content-between">
					                <a href="<?php echo base_url('index.php/dispatchtable') ?>" class="btn btn-success btn-md">
					                	<i class="fa fa-table"></i>  Dispatch Forms</a>
					                <button type="submit" class="btn btn-primary btn-md">Add Record</button>
					                <?php echo form_close() ?>
				   			</div>
						</div>
					</div>
				</div>

				
			</div>
		</div>
	</section>
</div>


<div class="modal fade" id="msgdialog" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
      	<div id="modalappend" class="text-center">
      		
      	</div>
      	
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="msgdialog2" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
      	<div id="modalappend2" class="text-center">
      		
      	</div>
      	
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


</script>