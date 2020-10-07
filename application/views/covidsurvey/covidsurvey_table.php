<?php
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">COVID Contact Tracing</h1>
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
                            <b>Survey Table List</b>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered" id="table-covidsurvey">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Date</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Purpose</th>
                                        <th>Birthdate</th>
                                        <th>Complete Address</th>
                                        <th>Contact No.</th>
                                        <th>Gender</th>
                                        <th>Temperature</th>
                                        <th>Cold</th>
                                        <th>Fever</th>
                                        <th>Cough</th>
                                        <th>Short Breath</th>
                                        <th>Headache</th>
                                        <th>Muscle Pain</th>
                                        <th>Sore Throat</th>
                                        <th>Diarrhea.</th>
                                        <th>Loss of Smell</th>
                                        <th>Taste Disorder</th>
                                        <th>Exhaustion</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="card-footer">
                            <a href="<?php echo site_url('covidsurvey-export') ?>" class="btn btn-success text-bold float-right"><i class="fas fa-file-excel"></i> EXPORT TO EXCEL</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>