<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">List of Project Reports</h1>
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
							Project Report Table
						</div>

						<div class="card-body">
							<table id="projectReport_table" class="table table-bordered table-hover table-sm" style="width: 100%">
			            		<thead>
			            			<tr>
			            				<th>Project ID</th>
										<th>Project Name</th>
										<th>Customer Name</th>
			            				<th>Project Description</th>
			            				<th>Date Requested</th>
			            				<th>Date Implemented</th>
										<th>Date Finished</th>
										<th>Prepared By</th>
										<th>Checked By</th>
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



<!-- Modal -->
<div class="modal fade modal-projectreport-del" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <label class="text-bold text-danger" style="font-size: 25px">Do you want to delete this project report?</label>
        <?php echo form_open('ProjectReportController/deleteProjectReport',["id" => "form-del-projectreport"]) ?>
        <div class="form-group">
        	<label for="del_pr_id">Project ID</label>
        	<input class="form-control text-bold text-center" type="text" name="del_pr_id" id="del_pr_id" value="" readonly>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> No</button>
        <button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> Yes</button>
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>