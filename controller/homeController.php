<?php
  session_start();
  include "model/HomeModel.php";

  class homeController{
  	public $model;
  	function __construct(){
  		$this->model = new HomeModel();
  	}

    function main(){
      $nasabah = $id;
      $sql = $this->model->select($_SESSION['id_nasabah']);
			$data = $this->model->fetch($sql);
    }

  	function __destruct(){

  	}
?>
