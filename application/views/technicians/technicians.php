<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Technicians</h1>
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
							<label>Technicians List</label>
						</div>

						<div class="card-body">
							<table id="technicians_table" class="table table-bordered table-hover" style="width: 100%">
			            		<thead>
			            			<tr>
			            				<th>ID</th>
			            				<th>Name</th>
			            			</tr>
			            		</thead>

			            		<tbody>

			            			<?php foreach ($results as $row): ?>
			            				<tr>
				            				<td><?php echo $row->id ?></td>
				            				<td><?php echo $row->name ?></td>
				            			</tr>
			            			<?php endforeach ?>
			            			
			            		</tbody>
			            	</table>
						</div>

						<div class="card-footer">
							<button class="btn btn-success text-bold float-right" data-toggle="modal" data-target=".modal_addtech"><i class="fas fa-plus"></i> ADD TECHNICIAN</button>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
</div>


<div class="modal fade modal_addtech" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class="fas fa-hard-hat"></i> Add Technician</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open('TechniciansController/addTechValidate',["id" => "form-add-tech"]) ?>
				<div class="form-group">
					<label for="tech_id">Technician ID</label>
					<input class="form-control" type="text" name="tech_id" id="tech_id">
				</div>

				<div class="form-group">
					<label for="tech_fname">First Name</label>
					<input class="form-control" type="text" name="tech_fname" id="tech_fname">
				</div>

				<div class="form-group">
					<label for="tech_mname">Middle Name</label>
					<input class="form-control" type="text" name="tech_mname" id="tech_mname">
				</div>

				<div class="form-group">
					<label for="tech_lname">Last Name</label>
					<input class="form-control" type="text" name="tech_lname" id="tech_lname">
				</div>
			</div>

			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default text-bold" data-dismiss="modal">CLOSE</button>
				<button type="submit" class="btn btn-primary text-bold">CONFIRM</button>
				<?php echo form_close() ?>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>