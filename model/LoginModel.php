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

		function __destruct(){

		}
	}
?>