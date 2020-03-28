<?php
defined('BASEPATH') or die('No direct script access allowed.');
?>



<div class="content-wrapper">
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Sales Dispatch Table</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<table width="100%" id="salesdispatchTable" class="table table-bordered table-hover div-service" style="font-size: 12px">
								<thead>
									<tr>
										<th>Dispatch ID</th>
										<th>Pre-Technical Sales</th>
										<th>Dispatch Date</th>
										<th>Dispatch Time</th>
										<th>Location</th>
										<th>Customer 1</th>
										<th>Contact Number 1</th>
										<th>Purpose 1</th>
										<th>Time In 1</th>
										<th>Time Out 1</th>
										<th>Customer 2</th>
										<th>Contact Number 2</th>
										<th>Purpose 2</th>
										<th>Time In 2</th>
										<th>Time Out 2</th>
										<th>Customer 3</th>
										<th>Contact Number 3</th>
										<th>Purpose 3</th>
										<th>Time In 3</th>
										<th>Time Out 3</th>
										<th>Customer 4</th>
										<th>Contact Number 4</th>
										<th>Purpose 4</th>
										<th>Time In 4</th>
										<th>Time Out 4</th>
										<th>Operation</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<div class="modal fade" id="modal-edit-salesdispatch">
	<div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
            	<h1 class="modal-title sales_dispatchID_edit">Update Sales Dispatch</h1>
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
        	</div>
        	<div class="modal-body">
        		<div class="row">
							<div class="col-md-12">

								<?php echo form_open("SalesDispatchController/update_validate_sales_dispatch",["id" => "form_updatesalesdispatch"]) ?>
								<input type="hidden" class="form-control sales_dispatchID_edit" name="sales_dispatchID" >

								<div class="row">
								<div class="col-md-6">
								<div class="form-group">
					                <label>Dispatch Date</label>
					                <input class="form-control dispatch_date_edit" id="dispatch_date" type="date" name="dispatch_date" placeholder="Select Date">
					            </div>

					            <div class="form-group">
						        	<label>Pre-Technical Sales</label>
					        		<select class="form-control assigned_sales_edit" name="assigned_sales" id="d_sales">

					        			<option value="">---</option>
					        			<?php foreach ($sales_rep as $row): ?>
										<option><?php echo $row->name ?></option>
										<?php endforeach ?>
					        		
					        			
					        			
					        		</select>
						        </div>
							</div>
							<div class="col-md-6">

								<div class="form-group">
						        	<label class="control-label">Dispatch Time</label>
					        		<input class="form-control dispatch_time_edit" type="time" name="dispatch_time" id="dispatch_time" value="">
						        </div>

								<div class="form-group">
						        	<label>Location</label>
					        		<input class="form-control address_edit" type="text" name="address" id="address" placeholder="Enter Location" value="">
						        </div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
							<div class="col-md-12">
						        	<div class="row">
						        		<div class="col-md-4">
						        			<div class="form-group">
						        				<label class="control-label">Customer 1</label>
						        				<input class="form-control customer_1_edit" type="text" name="customer_1" id="customer_1" placeholder="Enter Customer Name" value="">
						        			</div>
						        		</div>

						        		<div class="col-md-2">
						        			<div class="form-group">
						        				<label class="control-label">Contact Number</label>
						        				<input class="form-control contact_1_edit" type="text" name="contact_1" id="contact_1" placeholder="Enter Contact Number" value="">
						        			</div>
						        		</div>

						        		<div class="col-md-2">
						        			<div class="form-group">
						        				<label class="control-label" for="purpose_1">Purpose</label>

						        				<select class="form-control purpose_1_edit" name="purpose_1" id="purpose_1">
						        					<option value="">---</option>
						        					<option>After Sales Support</option>
						        					<option>Ocular/Site Visit</option>
						        					<option>Meeting</option>
						        					<option>Payment Collection</option>
						        					<option>Saturation</option>
						        				</select>
						        			</div>
						        		</div>
						        		

						        		<div class="col-md-2">
						        			<div class="form-group">
						        				<label class="control-label" for="time_in_1">Time In</label>
						        				<input class="form-control time_in_1_edit" type="time" name="time_in_1" id="time_in_1" placeholder="Select Time" value="">
						        			</div>
						        		</div>

						        		<div class="col-md-2">
						        			<div class="form-group">
						        				<label class="control-label" for="time_out_1">Time out</label>
						        				<input class="form-control time_out_1_edit" type="time" name="time_out_1" id="time_out_1" placeholder="Select Time" value="">
						        			</div>
						        			
						        		</div>

						        	</div>
						        

						        <div class="row">
						        	<div class="col-md-4">
					        			<div class="form-group">
					        				<label class="control-label" for="customer_2">Customer 2</label>
					        				<input class="form-control customer_2_edit" type="text" name="customer_2" id="customer_2" placeholder="Enter Customer Name" value="">
					        			</div>
					        			
					        		</div>

					        		<div class="col-md-2">
						        			<div class="form-group">
						        				<label class="control-label">Contact Number</label>
						        				<input class="form-control contact_2_edit" type="text" name="contact_2" id="contact_2" placeholder="Enter Contact Number" value="">
						        			</div>
						        		</div>

					        		<div class="col-md-2">
					        			<div class="form-group">
					        				<label class="control-label" for="purpose_2">Purpose</label>

					        				<select class="form-control purpose_2_edit" name="purpose_2" id="purpose_2">
					        					<option value="">---</option>
					        					<option>After Sales Support</option>
						        				<option>Ocular/Site Visit</option>
						        				<option>Meeting</option>
						        				<option>Payment Collection</option>
						        				<option>Saturation</option>
					        				</select>
					        			</div>
					        		</div>

					        		<div class="col-md-2">
					        			<div class="form-group">
					        				<label class="control-label" for="time_in_2">Time In</label>
					        				<input class="form-control time_in_2_edit" type="time" name="time_in_2" id="time_in_2" placeholder="Select Time" value="">
					        			</div>
					        			
					        		</div>

					        		<div class="col-md-2">
					        			<div class="form-group">
					        				<label class="control-label" for="time_out_2">Time out</label>
					        				<input class="form-control time_out_2_edit" type="time" name="time_out_2" id="time_out_2" placeholder="Select Time" value="">
					        			</div>
					        			
					        		</div>
						        </div>

						        <div class="row">
						        	<div class="col-md-4">
					        			<div class="form-group">
					        				<label class="control-label" for="customer_3">Customer 3</label>
					        				<input class="form-control customer_3_edit" type="text" name="customer_3" id="customer_3" placeholder="Enter Customer Name" value="">
					        			</div>
					        			
					        		</div>

					        		<div class="col-md-2">
						        			<div class="form-group">
						        				<label class="control-label">Contact Number</label>
						        				<input class="form-control contact_3_edit" type="text" name="contact_3" id="contact_3" placeholder="Enter Contact Number" value="">
						        			</div>
						        		</div>

					        		<div class="col-md-2">
					        			<div class="form-group">
					        				<label class="control-label" for="purpose_3">Purpose</label>

					        				<select class="form-control purpose_3_edit" name="purpose_3" id="purpose_3">
					        					<option value="">---</option>	
					        					<option>After Sales Support</option>
						        				<option>Ocular/Site Visit</option>
						        				<option>Meeting</option>
						        				<option>Payment Collection</option>
						        				<option>Saturation</option>
					        				</select>
					        			</div>
					        		</div>

					        		<div class="col-md-2">
					        			<div class="form-group">
					        				<label class="control-label" for="time_in_3">Time In</label>
					        				<input class="form-control time_in_3_edit" type="time" name="time_in_3" id="time_in_3" placeholder="Select Time" value="">
					        			</div>
					        			
					        		</div>

					        		<div class="col-md-2">
					        			<div class="form-group">
					        				<label class="control-label" for="time_out_3">Time out</label>
					        				<input class="form-control time_out_3_edit" type="time" name="time_out_3" id="time_out_3" placeholder="Select Time" value="">
					        			</div>
					        			
					        		</div>
						        </div>

						        <div class="row">
						        	<div class="col-md-4">
					        			<div class="form-group">
					        				<label class="control-label" for="customer_4">Customer 4</label>
					        				<input class="form-control customer_4_edit" type="text" name="customer_4" id="customer_4" placeholder="Enter Customer Name" value="">
					        			</div>
					        			
					        		</div>

					        		<div class="col-md-2">
						        			<div class="form-group">
						        				<label class="control-label">Contact Number</label>
						        				<input class="form-control contact_4_edit" type="text" name="contact_4" id="contact_4" placeholder="Enter Contact Number" value="">
						        			</div>
						        		</div>

					        		<div class="col-md-2">
					        			<div class="form-group">
					        				<label class="control-label" for="purpose_4">Purpose</label>

					        				<select class="form-control purpose_4_edit" name="purpose_4" id="purpose_4">
					        					<option value="">---</option>
					        					<option>After Sales Support</option>
						        				<option>Ocular/Site Visit</option>
						        				<option>Meeting</option>
						        				<option>Payment Collection</option>
						        				<option>Saturation</option>
					        				</select>
					        			</div>
					        		</div>

					        		<div class="col-md-2">
					        			<div class="form-group">
					        				<label class="control-label" for="time_in_4">Time In</label>
					        				<input class="form-control time_in_4_edit" type="time" name="time_in_4" id="time_in_4" placeholder="Select Time" value="">
					        			</div>
					        			
					        		</div>

					        		<div class="col-md-2">
					        			<div class="form-group">
					        				<label class="control-label" for="time_out_4">Time out</label>
					        				<input class="form-control time_out_4_edit" type="time" name="time_out_4" id="time_out_4" placeholder="Select Time" value="">
					        			</div>
					        		</div>
						        </div>
							</div>
						</div>	
        	</div>
        	<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              			<button type="submit" class="btn btn-success pull-right">Submit</button>
              			<?php echo form_close() ?>			
			</div>
    	</div>
	</div>
</div>