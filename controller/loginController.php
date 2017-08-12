<?php
@session_start();
include "model/LoginModel.php";
?>
	<link rel="stylesheet" type="text/css" href="assets/js/vendor/sweetalert/dist/sweetalert.css">
	<script src="assets/js/vendor/sweetalert/dist/sweetalert.min.js"></script>
<?php

class loginController{
	public $model;
	function __construct(){
		$this->model = new LoginModel();
	}

	function login(){
		$email = @$_POST['email'];
		$password = @$_POST['password'];

		$sql = $this->model->select($email, $password);
		$data = $this->model->fetch($sql);
		$cek = mysql_num_rows($sql);

		if($cek > 0){
			session_start();
			@$_SESSION['name'] 			= $data['name'];
			@$_SESSION['email'] 		= $data['email'];
			@$_SESSION['level'] 		= $data['level'];
			@$_SESSION['id_nasabah'] 	= $data['id_nasabah'];
			@$_SESSION['id'] 			= $data['id'];
			@$_SESSION['id_marketing'] 	= $data['id_marketing'];

			echo "<script type='text/javascript'>
					setTimeout(function () {
						swal({
							title: 'Login Berhasil',
							text:  'Mohon tunggu',
							type: 'success',
							timer: 3000,
							showConfirmButton: false
						});
					},10);";
					if($data['id_nasabah'] != null){
						echo "window.setTimeout(function(){
							window.location.replace('index.php?id=".$data['id_nasabah']."');
						} ,1000);";
					} else {
						echo "window.setTimeout(function(){
							window.location.replace('index.php');
						} ,1000);";
					}
			echo	"</script>";
		} else{
			echo "<script type='text/javascript'>
				swal({
				  title: 'Error!',
				  text: 'Username / password tidak sesuai',
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

	function register(){
		$name = @$_POST['name'];
		$email = @$_POST['email'];
		$password = @$_POST['password'];

		$sql = $this->model->register($email, $password, $name);
		if($sql){
			echo "<script type='text/javascript'>
					setTimeout(function () {
						swal({
							title: 'Register Berhasil',
							text:  'Mohon tunggu anda akan dialihkan kehalaman login',
							type: 'success',
							timer: 6000,
							showConfirmButton: false
						});
					},10);
					window.setTimeout(function(){
						window.location.replace('login.php');
					} ,3000);
				</script>";
		} else {
			echo "<script type='text/javascript'>
					setTimeout(function () {
						swal({
							title: 'Register Gagal',
							text:  'Silahkan cek kembali data anda',
							type: 'error',
							timer: 3000,
							showConfirmButton: false
						});
					},10);
				</script>";
		}
	}

	function __destruct(){

	}
}
?>
