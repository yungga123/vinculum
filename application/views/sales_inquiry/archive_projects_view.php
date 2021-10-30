<?php
defined('BASEPATH') or die('Access Denied'); ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">List of Archive Projects</h1>
	      </div><!-- /.col -->
	    </div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>

    <section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							Projects Table
                        </div>

						<div class="card-body">
							<div class="col-sm-12">
								<table id="archive_projects_table" class="table table-bordered table-hover div-service" style="width: 100%">
				            		<thead>
				            			<tr>
				            				<th>Project ID</th>
											<th>Customer Name</th>
											<th>Project Type</th>
											<th>Status</th>
											<th>Sales Incharge</th>
				            				<th>Branch</th>
                                            <th>Task</th>
											<th>Date of Task</th>
											<th>Archive Reason</th>
                                            <th>Operation</th>
				            			</tr>
				            		</thead>
			            		</table>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- Modal -->
<div class="modal fade modal_view_archive_project">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div id="modal_loading">

            </div>
            <div class="modal-header">
                <h5 class="modal-title"><b>Client Details</b><h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="table-client">
                        <thead>
                            <tr>
								<th>Client ID</th>
                                <th>Customer Name</th>
                                <th>Contact Person</th>
                                <th>Contact Number</th>
								<th>Email</th>
								<th>Location</th>
								<th>Website</th>
                                <th>Source</th>
								<th>Interest</th>
								<th>Type</th>
								<th>Notes</th>
                            </tr>
                        </thead>

                        <tbody id="tbody-archive-project">
							

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success text-bold" data-dismiss="modal"><i class="fas fa-check"></i> OKAY</button>
            </div>
        </div>
    </div>
</div>