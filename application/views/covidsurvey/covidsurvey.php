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
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/') ?>plugins/toastr/toastr.min.css">
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
            <div class="col-md-12">
                <div class="text-center" style="font-size: 30px">
                    <b>COVID-19 Contact Tracing</b>
                </div>
            </div>
        </div>

        <?php echo form_open('CovidSurveyController/validate', ["id" => "form-submit"]) ?>
        <!-- I am customer/visitor -->
        <div class="row mt-4">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label>Please select what best suites for you.</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="taker" value="Customer">
                                    I am a customer
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="taker" value="Visitor">
                                    I am a visitor
                                </label>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- BirthDate -->
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    
                    <div class="card-header"><b>Please Enter your Birthdate</b></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <select class="form-control" name="bdate_month" id="bdate_month">
                                    <option value="">Month</option>
                                    <option value="01">Jan</option>
                                    <option value="02">Feb</option>
                                    <option value="03">Mar</option>
                                    <option value="04">Apr</option>
                                    <option value="05">May</option>
                                    <option value="06">Jun</option>
                                    <option value="07">Jul</option>
                                    <option value="08">Aug</option>
                                    <option value="09">Sep</option>
                                    <option value="10">Oct</option>
                                    <option value="11">Nov</option>
                                    <option value="12">Dec</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <select class="form-control" name="bdate_day" id="bdate_day">
                                    <option value="">Day</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <select class="form-control" name="bdate_year" id="bdate_year">
                                    <option value="">Year</option>
                                    <?php for ($i = 1900; $i < 2021; $i++) { ?>
                                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- General Info -->
        <div class="row">
            <div class="col-md-4 offset-md-4">
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
                            <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter your complete address"></textarea>
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
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>What is your gender?</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gender" value="Male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gender" value="Female">
                                    Female
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gender" value="Other">
                                    Other
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gender" value="Prefer not to say">
                                    Prefer not to say
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Temperature -->
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="temp">Indicate your temperature</label>
                            <input type="text" name="temp" id="temp" class="form-control" placeholder="Enter temperature here in celsius.">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Symptoms -->
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header">
                        <b>Do you experience any of the below symptoms?</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-borderless table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th width="34%"></th>
                                    <th width="33%" class="text-success">No</th>
                                    <th width="33%" class="text-danger">Yes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Cold</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="cold" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="cold" value="Yes"></td>
                                </tr>
                                <tr>
                                    <td>Fever</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="fever" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="fever" value="Yes"></td>
                                </tr>
                                <tr>
                                    <td>Cough</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="cough" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="cough" value="Yes"></td>
                                </tr>
                                <tr>
                                    <td>Shortness of breath</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="shortbreath" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="shortbreath" value="Yes"></td>
                                </tr>
                                <tr>
                                    <td>Headache</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="headache" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="headache" value="Yes"></td>
                                </tr>
                                <tr>
                                    <td>Muscle pain</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="musclepain" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="musclepain" value="Yes"></td>
                                </tr>
                                <tr>
                                    <td>Sore throat</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="sorethroat" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="sorethroat" value="Yes"></td>
                                </tr>
                                <tr>
                                    <td>Diarrhea</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="diarrhea" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="diarrhea" value="Yes"></td>

                                </tr>
                                <tr>
                                    <td>Olfactory disorders (loss of smell)</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="odisorder" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="odisorder" value="Yes"></td>
                                </tr>
                                <tr>
                                    <td>Taste disorders</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="tdisorder" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="tdisorder" value="Yes"></td>
                                </tr>
                                <tr>
                                    <td>Exhaustion</td>
                                    <td><input class="form-control form-control-sm" type="radio" name="exhaustion" value="No"></td>
                                    <td><input class="form-control form-control-sm" type="radio" name="exhaustion" value="Yes"></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <!-- Agreement -->
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header">
                        <b><i class="fas fa-pen"></i> Important Note</b>
                    </div>
                    <div class="card-body">
                        <p>We will not, in any circumstances, share your personal information with other individuals or organizations without your permission, including public organizations, corporations or individuals, except when applicable by law.</p>
                        <p><b>Please check "I agree" to proceed.</b></p>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="notes" value="1">
                                <b class="text-success">I agree</b>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success btn-block text-bold"><i class="fas fa-check"></i> SUBMIT</button>
                    </div>
                </div>
            </div>
            
        </div>
        <?php echo form_close() ?>
    </div>

    <div class="modal loading-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="d-flex justify-content-center mt-4">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <br>
                    <label style="font-size: 28px;" class="text-success">LOADING... PLEASE WAIT...</label>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/AdminLTE/') ?>dist/js/adminlte.min.js"></script>
    <!-- Toastr -->
    <script src="<?php echo base_url('assets/AdminLTE/') ?>plugins/toastr/toastr.min.js"></script>

    <script>
        $('#form-submit').submit(function(e) {
            e.preventDefault();
            var me = $(this);

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            $(':submit').attr('disabled', 'disabled');
            $('.loading-modal').modal();

            //ajax
            $.ajax({
                url: me.attr('action'),
                type: 'post',
                data: me.serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success == true) {
                        toastr.success("Success! Thank you for your time.");
                        me[0].reset();
                        $(':submit').removeAttr('disabled', 'disabled');
                        $('.loading-modal').modal('hide');
                    } else {
                        $(':submit').removeAttr('disabled', 'disabled');
                        $('.loading-modal').modal('hide');
                        toastr.error(response.errors);
                    }

                }
            });
        });
    </script>
</body>

</html>