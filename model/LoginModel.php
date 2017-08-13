<?php
	class LoginModel{

		function __construct(){
			$connect = mysql_connect("localhost","root","");
			$db = mysql_select_db("db_bukopin");
		}

		function execute($query){
			return mysql_query($query);
		}

		function fetch($var){
			return mysql_fetch_array($var);
		}

		function select($email, $password){
			$md5pass = md5($email."bukopin".$password);

			$query = "SELECT * FROM user_login WHERE email = '$email' AND password = '$md5pass'";
			return $this->execute($query);
		}

		function register($email, $password, $name){
			$md5pass = md5($email."bukopin".$password);

			$insertNasabah = mysql_query("insert into tb_nasabah values ('', '$name', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '' ,'')");
			$getId = mysql_insert_id();

			$query = "insert into user_login values ('', '$name', '$email', '$md5pass', 3, '$getId', NULL)";
			return $this->execute($query);
		}

		function __destruct(){

		}
	}
?>
