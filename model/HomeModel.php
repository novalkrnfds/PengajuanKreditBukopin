<?php
	class HomeModel{

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

		function select($id){
			$query = "SELECT
                    a.id_kredit,
                  	a.id_nasabah,
                  	a.permohonan,
                  	a.jangka_waktu,
                  	b.nama,
                  	c.status
                FROM tb_kredit as a
                INNER JOIN tb_nasabah as b
                    ON a.id_nasabah = b.id_nasabah
                INNER JOIN tb_status_validasi as c
                    ON a.id_marketing = c.id_marketing
                WHERE b.id_nasabah = '$id'";

			return $this->execute($query);
		}

		function __destruct(){

		}
	}
?>
