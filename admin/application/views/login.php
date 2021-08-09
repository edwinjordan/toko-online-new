<?php
$cek_kadaluarsa = $this->cilinaya_model->get_table('detail_pengiriman');
foreach ($cek_kadaluarsa as $kadaluarsa) {
	$a = ((abs(strtotime($kadaluarsa['tanggal_konfirmasi']) - strtotime(date("Y-m-d")))) / (60 * 60 * 24));
	if ($a >= 4) {
		$cek_kirim = $this->cilinaya_model->get_table_where('detail_order', array('id_detail_order' => $kadaluarsa['id_detail_order']));
		if ($cek_kirim[0]['status_kirim'] == 0) {
			$this->cilinaya_model->update_table('detail_pengiriman', array('status_kadaluarsa' => 1), array('id_detail_pengiriman' => $kadaluarsa['id_detail_pengiriman']));
		}
	}
}

?>

<html>

<head>
	<title>LOGIN</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<!-- bootstrap 3.0.2 -->
	<link href="<?php echo base_url("assets/css/"); ?>/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!-- font Awesome -->
	<link href="<?php echo base_url("assets/css/"); ?>/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- Ionicons -->
	<link href="<?php echo base_url("assets/css/"); ?>/ionicons.min.css" rel="stylesheet" type="text/css" />
	<!-- Morris chart -->
	<link href="<?php echo base_url("assets/css/"); ?>/morris/morris.css" rel="stylesheet" type="text/css" />
	<!-- jvectormap -->
	<link href="<?php echo base_url("assets/css/"); ?>/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
	<!-- Date Picker -->
	<link href="<?php echo base_url("assets/css/"); ?>/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
	<!-- fullCalendar -->
	<!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
	<!-- Daterange picker -->
	<link href="<?php echo base_url("assets/css/"); ?>/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
	<!-- iCheck for checkboxes and radio inputs -->
	<link href="<?php echo base_url("assets/css/"); ?>/iCheck/all.css" rel="stylesheet" type="text/css" />
	<!-- bootstrap wysihtml5 - text editor -->
	<!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
	<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link href="<?php echo base_url("assets/css/"); ?>/view_login.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url("assets/css/"); ?>/style.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url("assets"); ?>/js/jquery.alerts.js" type="text/javascript"></script>
	<link href="<?php echo base_url("assets"); ?>/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
	<div class="view-login clearfix">
		<div class="col-lg-12">
			<section class="panel">
				<header class="panel-heading" style="text-align: center;">
					Login Admin Online Shop
				</header>
				<div class="panel-body">
					<form role="form" class="form-horizontal" method="POST" action="<?php echo base_url("welcome/check_login"); ?>">
						<div class="form-group">
							<label class="col-lg-2 col-sm-2 control-label" for="inputEmail1">Username</label>
							<div class="col-lg-10">
								<input type="text" placeholder="Username" id="username" name="username" class="form-control">
								<p class="help-block"></p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 col-sm-2 control-label" for="inputPassword1">Password</label>
							<div class="col-lg-10">
								<input type="password" placeholder="Password" id="inputPassword1" name="pass" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<button class="btn btn-danger" type="submit" id="login">Sign in</button>
							</div>
						</div>
					</form>
				</div>
			</section>
		</div>
	</div>
</body>

</html>
<script>
	$(document).ready(function() {
		function validateEmail(email) {
			var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(email);
		}
		$("#login").click(function() {
			var username = $("#username").val()
			var pass = $("#inputPassword1").val()
			if (username == "") {
				jAlert('Username Anda Tidak Boleh Kosong !', 'ERROR');
				return false;
			} else if (pass == "") {
				jAlert('Password Anda Tidak Boleh Kosong !', 'ERROR');
				return false;
			}
		});
	});
</script>