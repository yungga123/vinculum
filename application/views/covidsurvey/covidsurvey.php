<?php
defined('BASEPATH') or die('Access Denied');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
        body {
            background: #d2d9e0;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center" style="font-size: 30px">
                    <b>Covid Survey</b>
                </div>
            </div>
        </div>

        <!-- BirthDate -->
        <div class="row mt-4">
            <div class="col-sm-4 offset-sm-4">
                <div class="card">
                    <div class="card-header"><b>Please Enter your Birthdate</b></div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="bdate">Birthdate</label>
                            <input type="date" name="bdate" id="bdate" class="form-control" aria-describedby="helpbdate">
                            <small id="helpbdate" class="text-muted">Please enter your exact birthdate.</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- General Info -->
        <div class="row">
            <div class="col-sm-4 offset-sm-4">
                <div class="card">
                    <div class="card-header">
                        <b>Please enter your details.</b>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter your last name.">
                        </div>
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter your first name.">
                        </div>
                        <div class="form-group">
                            <label for="mname">Middle Name</label>
                            <input type="text" name="mname" id="mname" class="form-control" placeholder="Enter your middle name.">
                        </div>
                        <div class="form-group">
                            <label for="address">Complete Address</label>
                            <textarea class="form-control" name="address" id="address" cols="3" placeholder="Enter your complete address"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact Number</label>
                            <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter your contact number">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gender -->
        <div class="row">
            <div class="col-sm-4 offset-sm-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>What is your gender?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="Male">
                                <label class="form-check-label">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="Female">
                                <label class="form-check-label">Female</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="Other">
                                <label class="form-check-label">Other</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="Prefer not to say">
                                <label class="form-check-label">Prefer not to say</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-header">
                        <b>Do you experience any of the below symptoms?</b>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th width="20%"></th>
                                    <th width="20%" class="text-success">No</th>
                                    <th width="20%" class="text-primary">Slight</th>
                                    <th width="20%" class="text-warning">Medium</th>
                                    <th width="20%" class="text-danger">Heavy</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Cold</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="cold" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="cold" value="Slight"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="cold" value="Medium"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="cold" value="Heavy"></td>
                                </tr>
                                <tr>
                                    <td>Fever</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="fever" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="fever" value="Slight"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="fever" value="Medium"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="fever" value="Heavy"></td>
                                </tr>
                                <tr>
                                    <td>Cough</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="cough" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="cough" value="Slight"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="cough" value="Medium"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="cough" value="Heavy"></td>
                                </tr>
                                <tr>
                                    <td>Shortness of breath</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="shortbreath" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="shortbreath" value="Slight"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="shortbreath" value="Medium"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="shortbreath" value="Heavy"></td>
                                </tr>
                                <tr>
                                    <td>Headache</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="headache" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="headache" value="Slight"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="headache" value="Medium"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="headache" value="Heavy"></td>
                                </tr>
                                <tr>
                                    <td>Muscle pain</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="musclepain" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="musclepain" value="Slight"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="musclepain" value="Medium"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="musclepain" value="Heavy"></td>
                                </tr>
                                <tr>
                                    <td>Sore throat</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="sorethroat" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="sorethroat" value="Slight"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="sorethroat" value="Medium"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="sorethroat" value="Heavy"></td>
                                </tr>
                                <tr>
                                    <td>Diarrhea</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="diarrhea" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="diarrhea" value="Slight"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="diarrhea" value="Medium"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="diarrhea" value="Heavy"></td>
                                </tr>
                                <tr>
                                    <td>Olfactory disorders (loss of smell)</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="odisorder" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="odisorder" value="Slight"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="odisorder" value="Medium"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="odisorder" value="Heavy"></td>
                                </tr>
                                <tr>
                                    <td>Taste disorders</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="tdisorder" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="tdisorder" value="Slight"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="tdisorder" value="Medium"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="tdisorder" value="Heavy"></td>
                                </tr>
                                <tr>
                                    <td>Exhaustion</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="exhaustion" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="exhaustion" value="Slight"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="exhaustion" value="Medium"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="exhaustion" value="Heavy"></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/AdminLTE/') ?>dist/js/adminlte.min.js"></script>
</body>

</html>