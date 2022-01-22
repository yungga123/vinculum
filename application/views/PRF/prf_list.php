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