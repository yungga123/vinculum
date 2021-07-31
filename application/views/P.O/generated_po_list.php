<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1 class="m-0 text-dark">Generated P.O</h1>
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
							P.O. List
							<!--
							<a href="<?php echo site_url('vendor-add') ?>" class="btn btn-success float-right"> <i class="fas fa-plus"></i> ADD VENDOR</a>
							-->
						</div>
						<div class="card-body">
							<div class="col-sm-12">
								<table id="PO_list" class="table table-bordered table-hover" style="width: 100%">
				            		<thead>
				            			<tr>
				            				<th>PO ID</th>
											<th>Supplier ID</th>
											<th>Date Created</th>
											<th>Operation</th>
				            			</tr>
				            		</thead>
			            		</table>
							</div>
						</div>
						<div class="card-footer">
                            <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target=".btn-accepted"> <i class="fas fa-file"></i> Generate P.O.</a>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- Modal for Generate P.O. -->
<div class="modal fade btn-accepted" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <b class="modal-title">Requisition List</b>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <?php echo form_open('POController/generate_po',["id" => "form-accept-generatepo-req"]) ?>
                <div class="modal-body text-center">
                    <table class="table table-bordered table-xl" id="table-reqitems">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Requisition ID</th>
                                <th>Dated Added</th>
                                <th>Requested By</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($requisition_list as $row): ?>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input" name="reqid[]" value="<?php echo $row->id ?>">                
                                </td>
                                <td>
                                    <?php echo $row->id ?>
                                </td>
                                <td>
                                    <?php echo ($row->date != '0000-00-00 00:00:00') ? date_format(date_create($row->date),'M d, Y h:ia') : 'None'; ?>
                                </td>
                                <td>
                                    <?php echo $row->lastname.", ".$row->firstname." ".$row->middlename ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> CLOSE</button>
                    <button type="submit" class="btn btn-success text-bold"><i class="fas fa-edit"></i> CREATE</button>
                </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- Modal for View-->
<div class="modal fade modal_view_items">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div id="modal_loading">

            </div>
            <div class="modal-header">
                <h5 class="modal-title"><b>Items List</b><h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-m" id="table-items">
                        <thead>
                            <tr>
								<th>No.</th>
                                <th>Description</th>
                                <th>Qty</th>
                                <th>Unit</th>
                                <th>Cost</th>
                                <th>Total Cost</th>
                                <th>Date Needed</th>
                                <th>Purpose</th>
                            </tr>
                        </thead>

                        <tbody id="tbody-items">
							

                        </tbody>
                    </table>

					<div class="text-right">
                    	<b>Total Price: <span id="req_total_price" class="text-danger"></span></b>
					</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success text-bold" data-dismiss="modal"><i class="fas fa-check"></i> OKAY</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Delete-->
<div class="modal fade" id="delete-po" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Delete Vendor</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <?php echo form_open('POController/delete_po',["id" => "modal-po-vendor"]) ?>
            <div class="modal-body text-center">
                <div class="form-group">
                  <label for="po_id_del">Are you sure you want to delete?</label>
                  <input type="text" class="form-control col-6 offset-3 text-center text-bold" name="po_id_del" id="po_id_del" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> NO</button>
                <button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> YES</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>