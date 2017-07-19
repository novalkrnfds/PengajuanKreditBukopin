<?php

	include "controller/loginController.php";

	$login = new loginController();

	$menu	= @$_GET['menu'];
	$act 	= @$_GET['act'];
	$id 	= @$_GET['id'];

	if(@$_SESSION['level'] == '1'){
		if($menu == ''){
			include "view/1/home.php";
		} else {
			?> <script type="text/javascript">alert("Not Found"); window.location.href = "index.php";</script> <?php
		}
	} else if(@$_SESSION['level'] == '2'){

	} else if(@$_SESSION['level'] == '3') {
		if($menu == ''){
			include "view/3/home.php";
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
