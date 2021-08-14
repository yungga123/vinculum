<?php
defined('BASEPATH') or die('Access Denied');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application for Leave of Absence</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE') ?>/plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE') ?>/dist/css/adminlte.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE') ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-sm-8 offset-sm-2 text-center">
                <h1>APPLICATION FOR LEAVE OF ABSENCE</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card">
                    <div class="card-body">
                        <?php echo form_open('LeaveController/leave_form_validate',["id" => "form-leave"]) ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="date_application">Date of Application</label>
                                    <input type="date" class="form-control" name="date_application" id="date_application" value="<?php echo date('Y-m-d') ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="type_of_leave">Type of Leave</label>
                                    <select class="form-control" name="type_of_leave" id="type_of_leave">
                                            <option value="">--- PLEASE SELECT ---</option>
                                            <option>Vacation Leave</option>
                                            <option>Sick Leave</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label for="employee">Select Employee</label>
                            <select class="form-control select2bs4" name="employee" id="employee">
                                <option value="">--- PLEASE SELECT ---</option>
                                <?php foreach ($results as $row) { ?>
                                <option value="<?php echo $row->id ?>"><?php echo $row->firstname.' '.$row->middlename.' '.$row->lastname.' -- '.$row->id ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" class="form-control" name="start_date" id="start_date">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" class="form-control" name="end_date" id="end_date">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="reason">Reason</label>
                            <textarea class="form-control" name="reason" id="reason" rows="3" placeholder="Please Enter a Valid Reason"></textarea>
                        </div>

                    </div>
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="card row">
                    <div class="card-body col-sm-6 offset-sm-3">
                        <button type="submit" class="btn btn-success btn-lg btn-block text-bold"><i class="fas fa-check-circle"></i> SUBMIT YOUR APPLICATION</button>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="leave_confirm" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="text-bold text-success" style="font-size: 28px;">SUCCESSFULLY FILED AFLA REQUEST!</p>
                    <p>The HR Personnel will validate the request and will call you for the confirmation.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success text-bold" data-dismiss="modal"><i class="fas fa-check"></i> OKAY</button>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="<?php echo base_url('assets/AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Toastr -->
    <script src="<?php echo base_url('assets/AdminLTE') ?>/plugins/toastr/toastr.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url('assets/AdminLTE') ?>/plugins/select2/js/select2.full.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/AdminLTE') ?>/dist/js/adminlte.min.js"></script>

    <script>
        $(document).ready(function(){

            //Initialize Select2 Elements
            $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            });

            $('#form-leave').submit(function(e) {
                e.preventDefault();
                var me = $(this);

                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
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

                $(':submit').attr('disabled','disabled');
                //ajax
                $.ajax({
                    url: me.attr('action'),
                    type: 'post',
                    data: me.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == true) {
                            $(':submit').removeAttr('disabled','disabled');
                            toastr.success('Successfully Filed!');
                            $('#leave_confirm').modal();
                            me[0].reset();
                        } else {
                            $(':submit').removeAttr('disabled','disabled');

                            toastr.error(response.errors);
                        }

                    }
                });
            });

        });
    </script>
</body>

</html>