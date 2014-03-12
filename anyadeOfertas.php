<?php
	include 'clases/connectDatabase.php';
	$condbPrice=new connectDatabase();
	
	$product_id=$_POST['product_id'];
	$init_data=$_POST['init_data'];
	$end_data=$_POST['end_data'];
	$porCent=$_POST['porCent'];
	session_start();
	$result=$condbPrice->addOffert($product_id, $init_data, $end_data, $porCent, $_SESSION["super_id"]);
	header('Location: lista_productos.php')
?>