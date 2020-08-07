<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pullout Scan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header text-bold">
                            Item Scan
                        </div>

                        <div class="card-body">
                            <?php echo form_open('PullOutsController/get_scan',["id" => "form-getscan"]) ?>
                            <div class="form-group">
                                <label for="scan_qty">Quantity</label>
                                <input type="text" name="scan_qty" id="scan_qty" class="form-control" placeholder="Enter quantity here." value="1">
                            </div>

                            <div class="form-group">
                                <label for="scan_code">Item Code</label>
                                <input type="text" name="scan_code" id="scan_code" class="form-control" placeholder="Make sure to focus here before scanning.">
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success text-bold float-right"><i class="fas fa-plus"></i> APPEND</button>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-header text-bold">
                            Scanned Items
                        </div>

                        <div class="card-body">
                            <?php echo form_open('PullOutsController/confirm_scan',["id" => "form-confirm-scan"]) ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="scan_customer">Select Customer</label>
                                        <select name="scan_customer" id="scan_customer" class="form-control">
                                            <option value="">--- Please Select Customer ---</option>
                                            <?php foreach ($results as $row) { ?>
                                                <option value="<?php echo $row->CustomerID ?>"><?php echo $row->CompanyName.' - '.$row->CustomerID ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>Item Code</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody id="scan-body">
                                    </tbody>
                                </table>
                            </div>
                            
                            <span class="text-bold float-right">Total Cost: <span id="scan_cost">0</span></span>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success text-bold float-right"><i class="fas fa-check"></i> PULLOUT</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-confirm-details" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Proceed with this?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-bordered">
                    <tbody id="sub_data">
                        <tr>
                            <td width="20%">Customer Name</td>
                            <td width="30%">Vinculum Technologies</td>
                            <td width="20%">Date: </td>
                            <td width="30%" colspan="2">07/07/2007</td>
                        </tr>
                        <tr>
                            <td colspan="5">Particulars</td>
                        </tr>
                        <tr>
                            <td>Item Code</td>
                            <td>Description</td>
                            <td>Quantity</td>
                            <td>Price</td>
                            <td>Total</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> NO</button>
                <button type="button" class="btn btn-success"><i class="fas fa-check"></i> YES</button>
            </div>
        </div>
    </div>
</div>