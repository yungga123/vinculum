<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Sales Dispatch Form Details</h1>
				</div>
			</div>
		</div>
	</div>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<label>Dispatch Details</label>
						</div>
						<div class="card-body">
							<div class="panel-body">
							<?php echo form_open("SalesDispatchController/validate_sales_dispatch",["id" => "form-salesdispatch"]) ?>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
						                <label>Dispatch Date</label>
						                <input class="form-control" id="dispatch_date" type="date" name="dispatch_date" placeholder="Select Date">
						            </div>

						            <div class="form-group">
							        	<label>Pre-Technical Sales</label>
						        		<select class="form-control" name="assigned_sales" id="assigned_sales">

						        			<option value="">---</option>

						        			<?php foreach ($results as $row): ?>
						        				<option><?php echo $row->name ?></option>
						        			<?php endforeach ?>
						        			
						        		</select>
							        </div>
								</div>
								<div class="col-md-6">

									<div class="form-group">
							        	<label class="control-label">Dispatch Time</label>
						        		<input class="form-control" type="time" name="dispatch_time" id="dispatch_time">
							        </div>

									<div class="form-group">
							        	<label>Location</label>
						        		<input class="form-control" type="text" name="address" id="address" placeholder="Enter Location">
							        </div>
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
						<div class="card-body">
							<div class="row">
						        		<div class="col-md-6">
						        			<div class="form-group">
						        				<label class="control-label">Customer 1</label>
						        				<input class="form-control" type="text" name="customer_1" id="customer_1" placeholder="Enter Customer Name">
						        			</div>
						        		</div>

						        		<div class="col-md-2">
						        			<div class="form-group">
						        				<label class="control-label" for="purpose_1">Purpose</label>

						        				<select class="form-control" name="purpose_1" id="purpose_1">
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
						        				<input class="form-control" type="time" name="time_in_1" id="time_in_1" placeholder="Select Time">
						        			</div>
						        		</div>

						        		<div class="col-md-2">
						        			<div class="form-group">
						        				<label class="control-label" for="time_out_1">Time out</label>
						        				<input class="form-control" type="time" name="time_out_1" id="time_out_1" placeholder="Select Time">
						        			</div>
						        			
						        		</div>

						        	</div>
						        

						        <div class="row">
						        	<div class="col-md-6">
					        			<div class="form-group">
					        				<label class="control-label" for="customer_2">Customer 2</label>
					        				<input class="form-control" type="text" name="customer_2" id="customer_2" placeholder="Enter Customer Name">
					        			</div>
					        			
					        		</div>

					        		<div class="col-md-2">
					        			<div class="form-group">
					        				<label class="control-label" for="purpose_2">Purpose</label>

					        				<select class="form-control" name="purpose_2" id="purpose_2">
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
					        				<input class="form-control" type="time" name="time_in_2" id="time_in_2" placeholder="Select Time">
					        			</div>
					        			
					        		</div>

					        		<div class="col-md-2">
					        			<div class="form-group">
					        				<label class="control-label" for="time_out_2">Time out</label>
					        				<input class="form-control" type="time" name="time_out_2" id="time_out_2" placeholder="Select Time">
					        			</div>
					        			
					        		</div>
						        </div>

						        <div class="row">
						        	<div class="col-md-6">
					        			<div class="form-group">
					        				<label class="control-label" for="customer_3">Customer 3</label>
					        				<input class="form-control" type="text" name="customer_3" id="customer_3" placeholder="Enter Customer Name">
					        			</div>
					        			
					        		</div>

					        		<div class="col-md-2">
					        			<div class="form-group">
					        				<label class="control-label" for="purpose_3">Purpose</label>

					        				<select class="form-control" name="purpose_3" id="purpose_3">
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
					        				<input class="form-control" type="time" name="time_in_3" id="time_in_3" placeholder="Select Time">
					        			</div>
					        			
					        		</div>

					        		<div class="col-md-2">
					        			<div class="form-group">
					        				<label class="control-label" for="time_out_3">Time out</label>
					        				<input class="form-control" type="time" name="time_out_3" id="time_out_3" placeholder="Select Time">
					        			</div>
					        			
					        		</div>
						        </div>

						        <div class="row">
						        	<div class="col-md-6">
					        			<div class="form-group">
					        				<label class="control-label" for="customer_4">Customer 4</label>
					        				<input class="form-control" type="text" name="customer_4" id="customer_4" placeholder="Enter Customer Name">
					        			</div>
					        			
					        		</div>

					        		<div class="col-md-2">
					        			<div class="form-group">
					        				<label class="control-label" for="purpose_4">Purpose</label>

					        				<select class="form-control" name="purpose_4" id="purpose_4">
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
					        				<input class="form-control" type="time" name="time_in_4" id="time_in_4" placeholder="Select Time">
					        			</div>
					        			
					        		</div>

					        		<div class="col-md-2">
					        			<div class="form-group">
					        				<label class="control-label" for="time_out_4">Time out</label>
					        				<input class="form-control" type="time" name="time_out_4" id="time_out_4" placeholder="Select Time">
					        			</div>
					        		</div>
						        </div>
							</div>
							
								<div class="modal-footer justify-content-between">
					                <a class="btn btn-primary" href="<?php echo site_url('salesdispatch-table') ?>">Sales Dispatch List</a>
					                <button type="submit" class="btn btn-success">Submit</button>
					                <?php echo form_close() ?>
				                </div>
							
					</div>
				</div>
			</div>
		</div>
	</section>

		
	</div>
</div>