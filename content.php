<?php
	session_start();
	include "controller/loginController.php";
	//include "controller/homeController.php";
	?>
		<link rel="stylesheet" type="text/css" href="assets/js/vendor/sweetalert/dist/sweetalert.css">
		<script src="assets/js/vendor/sweetalert/dist/sweetalert.min.js"></script>
	<?php

	$login = new loginController();
	//$home  = new homeController();

	$menu	= @$_GET['menu'];
	$act 	= @$_GET['act'];
	$id 	= @$_GET['id'];

	$id_nasabah = $_SESSION['id_nasabah'];

	if(@$_SESSION['level'] == '1'){
		if($menu == ''){
			include "view/1/home.php";
		} else {
			?> <script type='text/javascript'> setTimeout(function () { swal({ title: 'Error!', text:  'Not Found', type: 'error', timer: 3000, showConfirmButton: false }); },10); window.setTimeout(function(){
                    window.location.replace('index.php'); } ,2000); </script><?php
		}
	} else if(@$_SESSION['level'] == '2'){
		if($menu == ''){
			include "view/2/home.php";
		} else if($menu == 'view_detail') {
			include "view/2/viewdetail.php";
		} else if($menu = 'setting'){
			include "view/2/setting.php";
		} else {
			?> <script type='text/javascript'> setTimeout(function () { swal({ title: 'Error!', text:  'Not Found', type: 'error', timer: 3000, showConfirmButton: false }); },10); window.setTimeout(function(){
                    window.location.replace('index.php'); } ,2000); </script><?php
		}	
	} else if(@$_SESSION['level'] == '3') {
		if($menu == ''){
			if($id != ''){
				include "view/3/home.php";
				//$home->main($id_nasabah);
			} else {
				echo "<script type='text/javascript'>window.location.href = 'index.php?id=".$_SESSION['id_nasabah']."';</script>";
				include "view/3/home.php";
			}
		} else if($menu == 'apply_credit'){
			include "view/3/apply_credit.php";
		} else if($menu == 'setting'){
			include "view/3/setting.php";
		} else {
			?> <script type="text/javascript">alert("Not Found"); window.location.href = "index.php";</script> <?php
		}
	} else {
		?>
		<script type="text/javascript">
		alert("You not allowed to access this page");
		window.location.replace('login.php');
		</script>
		<?php
	}
