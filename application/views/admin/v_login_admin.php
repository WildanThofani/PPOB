<!doctype html>
<html class="fixed">

<head>

	<!-- Basic -->
	<meta charset="UTF-8">

	<meta name="keywords" content="HTML5 Admin Template" />
	<meta name="description" content="Porto Admin - Responsive HTML5 Template">
	<meta name="author" content="okler.net">

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Web Fonts  -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/stylesheets/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/stylesheets/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/stylesheets/theme-custom.css">
	<script src="<?= base_url() ?>assets/vendor/jquery/jquery.js"></script>
	<!-- Head Libs -->
	<script src="<?= base_url() ?>assets/vendor/modernizr/modernizr.js"></script>

</head>

<body>
	<!-- start: page -->
	<section class="body-sign">
		<div class="center-sign">
			<a href="/" class="logo pull-left" style="text-decoration:none; margin-top:30px;">
				<span style="font-size:30px">PPOB ADMIN</span>
			</a>

			<div class="panel panel-sign">
				<div class="panel-title-sign mt-xl text-right">
					<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
				</div>
				<div class="panel-body">
					<div id="pesan" class="alert alert-warning"></div>
					<form action="#" id="signIn" method="post">
						<div class="form-group mb-lg">
							<label>Username</label>
							<div class="input-group input-group-icon">
								<input name="username" type="text" class="form-control input-lg" id="username" placeholder="Username" />
								<span class="input-group-addon">
									<span class="icon icon-lg">
										<i class="fa fa-user"></i>
									</span>
								</span>
							</div>
						</div>
						<div class="form-group mb-lg">
							<div class="input-group input-group-icon">
								<input name="password" id="password" type="password" placeholder="Password" class="form-control input-lg" />
								<span class="input-group-addon">
									<span class="icon icon-lg">
										<i class="fa fa-lock"></i>
									</span>
								</span>
							</div>
						</div>
						<?php if ($this->session->flashdata('pesan') != null) : ?>
							<div class="alert alert-danger"><?= $this->session->flashdata('pesan'); ?></div>
						<?php endif ?>
						<div class="row">
							<div class="col-sm-8">
								<div class="checkbox-custom checkbox-default">
									<input id="RememberMe" name="rememberme" type="checkbox" />
									<label for="RememberMe">Remember Me</label>
								</div>
							</div>
							<div class="col-sm-4 text-right">
								<button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
								<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
							</div>
						</div>

						<span class="mt-lg mb-lg line-thru text-center text-uppercase">
							<span>or</span>
						</span>

						<div class="mb-xs text-center">
							<a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
							<a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
						</div>

						<p class="text-center">Don't have an account yet? <a href="#regis" data-toggle="modal" data-torget="#regis">Sign Up!</a>

					</form>
				</div>
			</div>

			<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
		</div>
	</section>
	</div>
	<!-- end: page -->

	<!-- Vendor -->

	<script src="<?= base_url() ?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
	<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.js"></script>
	<script src="<?= base_url() ?>assets/vendor/nanoscroller/nanoscroller.js"></script>
	<script src="<?= base_url() ?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?= base_url() ?>assets/vendor/magnific-popup/magnific-popup.js"></script>
	<script src="<?= base_url() ?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="<?= base_url() ?>assets/javascripts/theme.js"></script>

	<!-- Theme Custom -->
	<script src="<?= base_url() ?>assets/javascripts/theme.custom.js"></script>

	<!-- Theme Initialization Files -->
	<script src="<?= base_url() ?>assets/javascripts/theme.init.js"></script>

	<script>

		$("#signIn").submit((e) => {
			e.preventDefault();
			let dataLogin = $("#signIn").serialize();
			$("#pesan").html("Loading ...... ");
			$.ajax({
				url: "<?= base_url() ?>index.php/login_admin/loginAdmin",
				type: "post",
				data: dataLogin,
				dataType: "json",
				success: function(hasil) {
					if (hasil['status'] == 1) {
						$("#pesan").html("Anda berhasil login");
						setTimeout(function() {
							location.href = "<?= base_url() ?>index.php/dashboard_admin";
						}, 3000);
					} else {
						$("#pesan").html("Username atau Password tidak cocok");
					}
				}
			});
		});
	</script>
</body>

</html>
