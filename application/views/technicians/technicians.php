<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Employees</h1>
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
						<div class="card-header">
							<label>Employee List</label>
						</div>

						<div class="card-body">
							<table id="technicians_table" class="table table-bordered table-hover" style="width: 100%">
			            		<thead>
			            			<tr>
			            				<th>Employee ID</th>
										<th>Name</th>
										<th>Position</th>
										<th>Birth Date</th>
										<th>Contact Number</th>
										<th>Address</th>
										<th>SSS No.</th>
										<th>TIN No.</th>
										<th>PAG-IBIG No.</th>
										<th>PhilHealth No.</th>
										<th>Employment Status</th>
										<th>Employment Validity</th>
										<th>Date Hired</th>
										<th>Daily rate</th>
										<th>PAG-Ibig Con.</th>
										<th>SSS Con.</th>
										<th>Phil-Health Con.</th>
										<th>Tax Rate</th>
										<th>VL Credit</th>
										<th>SL Credit</th>
										<th>Other Remarks</th>
			            				<th>Operation</th>
			            			</tr>
			            		</thead>

			            		<tbody>

									<?php foreach ($results as $row): 
										$birthdate = '';
										$validity = 'Permanent';
										$date_hired = '';

										if ($row->birthdate != '0000-00-00') {
											$birthdate = date_format(date_create($row->birthdate),'F d, Y');
										}

										if ($row->validity != '0000-00-00') {
											$validity = date_format(date_create($row->validity),'F d, Y');
										}

										if ($row->date_hired != '0000-00-00') {
											$date_hired = date_format(date_create($row->date_hired),'F d, Y');
										}
									?>
			            				<tr>
											
				            				<td><?php echo $row->id ?></td>
				            				<td><?php echo $row->name ?></td>
											<td><?php echo $row->position ?></td>
											<td><?php echo $birthdate ?></td>
											<td><?php echo $row->contact_number ?></td>
											<td><?php echo $row->address ?></td>
											<td><?php echo $row->sss_number ?></td>
											<td><?php echo $row->tin_number ?></td>
											<td><?php echo $row->pagibig_number ?></td>
											<td><?php echo $row->phil_health_number ?></td>
											<td><?php echo $row->status ?></td>
											<td><?php echo $validity ?></td>
											<td><?php echo $date_hired ?></td>
											<td><?php echo $row->daily_rate ?></td>
											<td><?php echo $row->pag_ibig_rate ?></td>
											<td><?php echo $row->sss_rate ?></td>
											<td><?php echo $row->phil_health_rate ?></td>
											<td><?php echo $row->tax ?></td>
											<td><?php echo $row->vl_credit ?></td>
											<td><?php echo $row->sl_credit ?></td>
											<td><?php echo $row->remarks ?></td>
				            				<td>
				            					<a href="<?php echo site_url('technicians-edit/'.$row->id) ?>" class="btn btn-warning btn-sm text-bold"><i class="fas fa-edit"></i> EDIT</a>

				            					<button class="btn btn-danger btn-sm text-bold btn-get-techid" data-toggle="modal" data-target=".modal_technician_delete"><i class="fas fa-trash"></i> DELETE</button>
				            				</td>
				            			</tr>
			            			<?php endforeach ?>
			            			
			            		</tbody>
			            	</table>
						</div>

						<div class="card-footer">
							<a href="<?php echo site_url('technicians-add') ?>" class="btn btn-success text-bold float-right"><i class="fas fa-plus"></i> ADD EMPLOYEE</a>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
</div>

<div class="modal fade modal_technician_delete" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body text-center">
				<p></p><label class="text-red" style="font-size: 20px;">Do you want to delete this technician??</label>

				<?php echo form_open('TechniciansController/delete_tech') ?>

				<div class="form-group">
					<label for="tech_id_del">Technician ID</label>
					<input class="form-control text-center text-bold" type="text" name="tech_id_del" id="tech_id_del" readonly>
				</div>

				<button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> YES</button>
	    		<button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> NO</button>
	    		<?php echo form_close() ?>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
