<?php
@session_start();
include "model/LoginModel.php";
?>
	<link rel="stylesheet" type="text/css" href="assets/global/plugins/sweetalert/dist/sweetalert.css">
	<script src="assets/global/plugins/sweetalert/dist/sweetalert.min.js"></script>
<?php

class loginController{
	public $model;
	function __construct(){
		$this->model = new LoginModel();
	}

	function login(){
		$email = @$_POST['username'];
		$password = @$_POST['password'];
		$captcha = strtoupper($_POST['captcha']);
		$valid = true;

		if(md5($captcha) == $_SESSION['image_random_value']){
			$valid = true;
			$sql = $this->model->select($email, $password);
			$data = $this->model->fetch($sql);
			$cek = mysql_num_rows($sql);

			if($cek > 0){
				session_start();
				@$_SESSION['name'] 			= $data['name'];
				@$_SESSION['email'] 		= $data['email'];
				@$_SESSION['level'] 		= $data['level'];

				echo "<script type='text/javascript'>
						setTimeout(function () {
							swal({
								title: 'Login Berhasil',
								text:  'Mohon tunggu',
								type: 'success',
								timer: 3000,
								showConfirmButton: false
							});
						},10);
						window.setTimeout(function(){
							window.location.replace('index.php');
						} ,1000);
					</script>";
			}else{
				echo "<script type='text/javascript'>
					swal({
					  title: 'Error!',
					  text: 'Username / password tidak sesuai',
					  type: 'error',
					  confirmButtonText: 'Ok'
					});
				</script>";
			}
		} else {
			echo "<script type='text/javascript'>
				swal({
				  title: 'Error!',
				  text: 'Captcha tidak sesuai',
				  type: 'error',
				  confirmButtonText: 'Ok'
				});
			</script>";
		}
	}

	function logout(){
		session_destroy();
		?>
		<script type="text/javascript">
			window.location.href="login.php";
		</script>
		<?php
	}

	function __destruct(){

	}
}
?>
