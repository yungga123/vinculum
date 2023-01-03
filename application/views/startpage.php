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
				<a href="<?php echo site_url('aflaform') ?>" class="btn btn-danger btn-lg btn-block text-bold">FILE A LEAVE</a>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>


    <!-- jQuery -->
    <script src="<?php echo base_url('assets/AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('assets/AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Toastr -->
    <script src="<?php echo base_url('assets/AdminLTE') ?>/plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/AdminLTE') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>