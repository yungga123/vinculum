<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Project Request Form</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="form-group">
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
                                            <th>Requested By</th>
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

<!-- Modal for Generate P.O. -->
<div class="modal fade btn-view" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <b class="modal-title"><h3>PRF ITEMS LIST</h3></b>
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

                                <table class="table table-bordered table-xl text-center" id="table-direct">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Item Name</th>
                                            <th>Item Qty</th>
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

                                <table class="table table-bordered table-xl text-center" id="table-indirect">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Item Name</th>
                                            <th>Item Qty</th>
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

                                <table class="table table-bordered table-xl text-center" id="table-tools">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Item Name</th>
                                            <th>Item Qty</th>
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