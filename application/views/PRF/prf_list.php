<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="form-group">

                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>Selections:</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="<?php echo site_url('prf-list') ?>/pending" class="btn btn-warning text-bold btn-xl btn-block <?php if ($this->uri->segment(2) == 'pending') {echo 'disabled';} ?>"><i class="fas fa-pause"></i> Pending Projects</a>
                                        <a href="<?php echo site_url('prf-list') ?>/ongoing" class="btn btn-success text-bold btn-xl btn-block <?php if ($this->uri->segment(2) == 'ongoing') {echo 'disabled';} ?>"><i class="fas fa-sync-alt"></i> Ongoing Projects</a>
                                        <a href="<?php echo site_url('prf-list') ?>/filed" class="btn btn-danger text-bold btn-xl btn-block <?php if ($this->uri->segment(2) == 'filed') {echo 'disabled';} ?>"><i class="fas fa-file"></i> Filed Projects</a>
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
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4>Data List:</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="prf_table" class="table table-bordered table-hover" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>PRF ID</th>
                                            <th>Project Name</th>
                                            <th>Project Branch</th>
                                            <th>Project Activity</th>
                                            <th>Date Requested</th>
                                            <?php if ($this->uri->segment(2) != "pending") : ?>
                                                <th>Sales Incharge</th>
                                                <th>PIC</th>
                                            <?php endif ?>

                                            <th>Requested By</th>
                                            <th>Prepared By</th>

                                            <?php if ($this->uri->segment(2) == "filed") : ?>
                                                <th>Return By</th>
                                                <th>Return Date</th>
                                                <th>Return Time</th>
                                            <?php endif ?>
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

<!-- Modal for PRF Items View -->
<div class="modal fade btn-view" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <b class="modal-title">
                    <h3>PRF ITEMS LIST</h3>
                </b>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <label>Direct Items</label>
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered table-sm text-center" id="table-direct">
                                    <thead>
                                        <tr>
                                            <th width="20%">No.</th>
                                            <th>Item Name</th>
                                            <th width="20%">Item Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody-direct">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <label>Indirect Items</label>
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered table-sm text-center" id="table-indirect">
                                    <thead>
                                        <tr>
                                            <th width="20%">No.</th>
                                            <th>Item Name</th>
                                            <th width="20%">Item Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody-indirect">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <label>Tools Items</label>
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered table-sm text-center" id="table-tools">
                                    <thead>
                                        <tr>
                                            <th width="20%">No.</th>
                                            <th>Item Name</th>
                                            <th width="20%">Item Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody-tools">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i> CLOSE</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for PRF Delete-->
<div class="modal fade" id="delete-prf" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Delete PRF</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('PRFController/delete_PRF', ["id" => "form-delete-prf"]) ?>
            <div class="modal-body text-center">
                <div class="form-group">
                    <label for="prf_form_id_del">Are you sure you want to delete?</label>
                    <input type="text" class="form-control col-6 offset-3 text-center text-bold" name="prf_form_id_del" id="prf_form_id_del" readonly>
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

<!-- Modal for PRF File-->
<div class="modal fade" id="file-prf" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <?php if ($this->uri->segment(2) == "ongoing") {
                $title = 'File PRF';
                $title_text = 'File';
            } else {
                $title = 'Pullout PRF';
                $title_text = 'Pullout';
            } ?>

            <div class="modal-header">
                <h5 class="modal-title"><b><?php echo $title; ?></b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('PRFController/PRF_status', ["id" => "form-prf-status"]) ?>
            <div class="modal-body text-center">
                <div class="form-group">
                    <label for="prf_form_id">Are you sure you want to <?php echo $title_text; ?>?</label>
                    <input type="text" class="form-control col-6 offset-3 text-center text-bold" name="prf_form_id" id="prf_form_id" readonly>
                    <input type="hidden" name="prf_status" value="<?php if ($this->uri->segment(2) == "pending") {
                                                                        echo 'ongoing';
                                                                    } elseif ($this->uri->segment(2) == "ongoing") {
                                                                        echo 'filed';
                                                                    } ?>">
                    <input type="hidden" name="prf_status1" id="prf_status1">
                    <input type="hidden" name="prf_sales" id="prf_sales">
                    <input type="hidden" name="prf_pic" id="prf_pic">
                    <input type="hidden" name="prf_prepared" id="prf_prepared">
                    <input type="hidden" name="prf_date_issued" id="prf_date_issued">

                    <input type="hidden" name="returned_by" id="returned_by">
                    <input type="hidden" name="date_return" id="date_return">
                    <input type="hidden" name="time_return" id="time_return">
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