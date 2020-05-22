<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">List of Service Reports</h1>
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
                            <label>Service Report Table</label>
                        </div>

                        <div class="card-body">
                            <table id="service_report_table" class="table table-bordered table-hover" style="width: 100%">
			            		<thead>
			            			<tr>
                                        <th>SR ID</th>
                                        <th>Customer Name</th>
                                        <th>Description</th>
                                        <th>Date Requested</th>
                                        <th>Date Implemented</th>
                                        <th>Received By</th>
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