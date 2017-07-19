<?php
	session_start();
	error_reporting(0);

	if (empty($_SESSION['name']) AND empty($_SESSION['password'])){
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>e-SUBMISSION BANK BUKOPIN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="" />
        <meta content="Bukopin" name="@novalkrnfds" />
        <link rel="shortcut icon" href="assets/global/images/favicon.png">
        <link href="assets/global/css/style.css" rel="stylesheet">
        <link href="assets/global/css/ui.css" rel="stylesheet">
        <link href="assets/global/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/global/plugins/sweetalert/dist/sweetalert.css">
    </head>
    <body class="account separate-inputs" data-page="login">
        <!-- BEGIN LOGIN BOX -->
        <div class="container" id="login-block">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <div class="account-wall">
                        <!-- <i class="user-img icons-faces-users-03"></i> -->
                        <img src="assets/global/images/logo/Bank_Bukopin_logo.svg.png" style="width:100%">
                        <h1 class="m-t-20">  </h1>
                        <form class="form-signin" role="form" method="POST">
                            <div class="append-icon">
                                <input type="text" name="username" id="username" value="<?=$_POST['username'];?>" class="form-control form-white username" placeholder="Username" required>
                                <i class="icon-user"></i>
                            </div>
                            <div class="append-icon m-b-20">
                                <input type="password" name="password" class="form-control form-white password" placeholder="Password" required>
                                <i class="icon-lock"></i>
                            </div>
                            <div class="append-icon m-b-20">
                              <img src="assets/captcha/gambar.php">
                            </div>
                            <div class="append-icon m-b-20">
                                <input type="text"  maxlength="5" name="captcha" class="form-control form-white username" placeholder="Ketik seluruh teks yang ada di gambar" required>
                                <i class="icon-wrench"></i>
                            </div>
                            <input type="submit" name="login" id="submit-form" class="btn btn-lg btn-danger btn-block ladda-button" value="Login" data-style="expand-left">
                            <div class="clearfix">
                                <p class="pull-left m-t-20"><a href="register.php">Belum punya akun? Register disini.</a></p>
                            </div>
                        </form>
                    		<?php
                    			if(@$_POST['login']){
                    				include "controller/loginController.php";
                    				$main = new loginController();
                    				$main->login();
                    			}
                    		?>
                    </div>
                </div>
            <!-- </div>
            <p class="account-copyright">
                <span>Copyright © 2015 </span><span>THEMES LAB</span>.<span>All rights reserved.</span>
            </p> -->
        </div>
        <script src="assets/global/plugins/jquery/jquery-1.11.1.min.js"></script>
        <script src="assets/global/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
        <script src="assets/global/plugins/gsap/main-gsap.min.js"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/global/plugins/backstretch/backstretch.min.js"></script>
        <script src="assets/global/plugins/bootstrap-loading/lada.min.js"></script>
        <script src="assets/global/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="assets/global/plugins/jquery-validation/additional-methods.min.js"></script>
        <script src="assets/global/plugins/sweetalert/dist/sweetalert.min.js"></script>
        <!-- <script src="assets/global/js/pages/login-v1.js"></script> -->
    </body>
</html>

<?php
}else{
	header("location:index.php");
}
?>
