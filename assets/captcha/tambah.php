<?php
	session_start();
	
	$nama = $_POST['nama'];
	$pesan = $_POST['pesan'];
	
	$captcha = $_POST['captcha'];
	$valid = 1;
	
	if(md5($captcha) != $_SESSION['image_random_value']){
		$valid = 0;
		echo "Maaf, kode captcha yang dimasukkan salah!!!";
	}
	
	if($valid == 1){
		//masukkan kedatabase..
		echo "Selamat, anda berhasil";
	}
?>