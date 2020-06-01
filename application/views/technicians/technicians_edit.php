<?php
defined('BASEPATH') or die('Access Denied');

$tech_id_edit = '';
$tech_fname_edit = '';
$tech_mname_edit = '';
$tech_lname_edit = '';
$tech_position_edit = '';

foreach ($results as $row) {
	$tech_id_edit = $row->id;
	$tech_fname_edit = $row->firstname;
	$tech_mname_edit = $row->middlename;
	$tech_lname_edit = $row->lastname;
	$tech_position_edit = $row->position;
}
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Technicians Update</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-header">
							<label>Provide Technician Information</label>
						</div>

						<div class="card-body">
							<?php echo form_open('TechniciansController/editTechValidate',["id" => "form-edit-tech"]) ?>
							<div class="form-group">
								<label for="tech_id">Technician ID</label>
								<input class="form-control" type="text" name="tech_id" id="tech_id" readonly value="<?php echo $tech_id_edit ?>">
							</div>

							<div class="form-group">
								<label for="tech_fname">First Name</label>
								<input class="form-control" type="text" name="tech_fname" id="tech_fname" value="<?php echo $tech_fname_edit ?>">
							</div>

							<div class="form-group">
								<label for="tech_mname">Middle Name</label>
								<input class="form-control" type="text" name="tech_mname" id="tech_mname" value="<?php echo $tech_mname_edit ?>">
							</div>

							<div class="form-group">
								<label for="tech_lname">Last Name</label>
								<input class="form-control" type="text" name="tech_lname" id="tech_lname" value="<?php echo $tech_lname_edit ?>">
							</div>

							<div class="form-group">
								<label for="tech_position">Position</label>
								<input class="form-control" type="text" name="tech_position" id="tech_position" value="<?php echo $tech_position_edit ?>">
							</div>
						</div>

						<div class="card-footer">
							<button type="submit" class="btn btn-success text-bold float-right">CONFIRM</button>
							<a href="<?php echo site_url('technicians') ?>" class="btn btn-primary text-bold">TECHNICIANS TABLE</a>
							<?php echo form_close() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>