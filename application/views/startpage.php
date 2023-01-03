<?php
defined('BASEPATH') or die('Access Denied');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vinculum Technologies</title>

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
</head>

<body class="hold-transition login-page">

    <div class="login-box">
		
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="#" class="h1"><b>Welcome </b>User</a>
			</div>
			<div class="card-body">
                <a href="<?php echo site_url('login') ?>" class="btn btn-success btn-lg btn-block text-bold">LOGIN TO M.I.S.</a>
                <a href="#" class="btn btn-primary btn-lg btn-block text-bold" data-toggle="modal" data-target="#create_account_modal">CREATE ACCOUNT</a>
				<a href="<?php echo site_url('aflaform') ?>" class="btn btn-danger btn-lg btn-block text-bold">FILE A LEAVE</a>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>

    <div class="modal fade" id="create_account_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog modal-m" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Create Account</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo form_open('LoginController/create_account_validate', ["id" => "form_createaccount"]) ?>

                    <div class="form-group">
						<label for="CreateAccount_id">Employee ID</label>
						<input type="text" name="CreateAccount_id" id="CreateAccount_id" class="form-control" placeholder="Enter Employee ID">
					</div>

					<div class="form-group">
						<label for="CreateAccount_username">Username</label>
						<input type="text" name="CreateAccount_username" id="CreateAccount_username" class="form-control" placeholder="Enter Username">
					</div>

					<div class="form-group">
						<label for="CreateAccount_password">Password</label>
						<input type="password" name="CreateAccount_password" id="CreateAccount_password" class="form-control" placeholder="Enter Password">
					</div>

					<div class="form-group">
						<label for="CreateAccount_confirmpassword">Confirm Password</label>
						<input type="password" name="CreateAccount_confirmpassword" id="CreateAccount_confirmpassword" class="form-control" placeholder="Enter Confirm Password">
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-times"></i>
						CLOSE</button>
					<button type="submit" class="btn btn-success text-bold"><i class="fas fa-check"></i> SUBMIT</button>
				</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Toastr -->
    <script src="<?php echo base_url('assets/AdminLTE') ?>/plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/AdminLTE') ?>/dist/js/adminlte.min.js"></script>

    <script>
        $(document).ready(function() {
			$('#form_createaccount').submit(function(e) {
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
					"timeOut": "3000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				}

				$(':submit').attr('disabled', 'disabled');
				//ajax
				$.ajax({
					url: me.attr('action'),
					type: 'post',
					data: me.serialize(),
					dataType: 'json',
					success: function(response) {
						if (response.success == true) {
							$(':submit').removeAttr('disabled', 'disabled');

							toastr.success("Success! Password Changed.");
							me[0].reset();
						} else {
							$(':submit').removeAttr('disabled', 'disabled');

							toastr.error(response.errors);
						}
					}
				});
			});
		});
    </script>

</body>

</html>