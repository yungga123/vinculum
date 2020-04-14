<?php
defined('BASEPATH') or die('Access Denied');

$data = array();

foreach ($results as $row) {

	$installationDate = '';
	if ($row->InstallationDate != '0000-00-00') {
		$installationDate = date_format(date_create($row->InstallationDate),'F d, Y');
	}
	$data = [
		'id' => $row->CustomerID,
		'customer_name' => $row->CompanyName,
		'contact_person' => $row->ContactPerson,
		'address' => $row->Address,
		'contact_number' => $row->ContactNumber,
		'email_add' => $row->EmailAddress,
		'website' => $row->Website,
		'installation_date' => $installationDate,
		'interest' => $row->Interest,
		'type' => $row->Type,
		'notes' => $row->Notes
	];
}
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Customer Details</h1>
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
							<label>Customer Information</label>
						</div>

						<div class="card-body">
							<div class="row">
								<div class="col-sm-6">
										<div class="form-group">
										<label>Customer ID</label>
										<input class="form-control text-bold" type="text" readonly value="<?php echo $data['id'] ?>">
									</div>

									<div class="form-group">
										<label>Customer Name</label>
										<input class="form-control text-bold" type="text" readonly value="<?php echo $data['customer_name'] ?>">
									</div>

									<div class="form-group">
										<label>Contact Person</label>
										<input class="form-control text-bold" type="text" readonly value="<?php echo $data['contact_person'] ?>">
									</div>

									<div class="form-group">
										<label>Address</label>
										<input class="form-control text-bold" type="text" readonly value="<?php echo $data['address'] ?>">
									</div>

									<div class="form-group">
										<label>Contact Number</label>
										<input class="form-control text-bold" type="text" readonly value="<?php echo $data['contact_number'] ?>">
									</div>

									<div class="form-group">
										<label>Email Address</label>
										<input class="form-control text-bold" type="text" readonly value="<?php echo $data['email_add'] ?>">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Website</label>
										<input class="form-control text-bold" type="text" readonly value="<?php echo $data['website'] ?>">
									</div>

									<div class="form-group">
										<label>Installation Date</label>
										<input class="form-control text-bold" type="text" readonly value="<?php echo $data['installation_date'] ?>">
									</div>

									<div class="form-group">
										<label>Interest</label>
										<input class="form-control text-bold" type="text" readonly value="<?php echo $data['interest'] ?>">
									</div>

									<div class="form-group">
										<label>Customer Type</label>
										<input class="form-control text-bold" type="text" readonly value="<?php echo $data['type'] ?>">
									</div>

									<div class="form-group">
										<label>Notes</label>
										<input class="form-control text-bold" type="text" readonly value="<?php echo $data['notes'] ?>">
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
							<label>Customer Files</label>
						</div>

						<div class="card-body">
							<?php if ($files): ?>
								<?php for ($i=0; $i < count($files); $i++) { ?>

									<p><a href="<?php echo base_url('customer_files/'.$data['id'].'/'.$files[$i]) ?>" target="_blank"><?php echo $files[$i] ?></a></p>
									
								<?php } ?>
							<?php else: ?>
								<label class="text-danger">This Customer has no files yet.</label>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>