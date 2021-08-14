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
		<!-- /.login-logo -->
		<?php echo form_error(
			'password',
			'
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Oops!</h5>',
			'</div>'
		) ?>
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="#" class="h1"><b>Vinculum </b>Technologies</a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Sign in to start your session</p>

				<?php echo form_open('LoginController/login_validate') ?>
				<div class="input-group mb-3">
					<input type="text" name="username" id="username" class="form-control" placeholder="Username" onfocus="sound()">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" name="password" id="password" class="form-control" placeholder="Password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-8">
						<button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#change_passModal">
							Change Password
						</button>
					</div>
					<!-- /.col -->
					<div class="col-4">
						<button type="submit" class="btn btn-primary btn-block">Sign In</button>
					</div>
					<!-- /.col -->
				</div>
				<?php echo form_close() ?>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.login-box -->

	<!-- Modal -->
	<div class="modal fade" id="change_passModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Change Password</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php echo form_open('LoginController/change_pass_validate', ["id" => "form_changepass"]) ?>
					<div class="form-group">
						<label for="change_user">Username</label>
						<input type="text" name="change_user" id="change_user" class="form-control" placeholder="Enter Username">
					</div>

					<div class="form-group">
						<label for="change_old_pass">Old Password</label>
						<input type="password" name="change_old_pass" id="change_old_pass" class="form-control" placeholder="Enter Old Password">
					</div>

					<div class="form-group">
						<label for="change_new_pass">New Password</label>
						<input type="password" name="change_new_pass" id="change_new_pass" class="form-control" placeholder="Enter New Password">
					</div>

					<div class="form-group">
						<label for="change_new_pass_confirm">Confirm New Password</label>
						<input type="password" name="change_new_pass_confirm" id="change_new_pass_confirm" class="form-control" placeholder="Confirm New Password">
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
			$('#form_changepass').submit(function(e) {
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