<?php 
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pending Requisitions</h1>
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
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-sm" id="table_pending_request" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Req No.</th>
                                        <th>Date Added</th>
                                        <th>Requested By</th>
                                        <th>Processed By</th>
                                        <th>Approved By</th>
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