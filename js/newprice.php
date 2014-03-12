<?php
	include '../clases/connectDatabase.php';
	$condbPrice=new connectDatabase();
	
	session_start();
		
	$result=$condbPrice->setPrice($_POST['product_id'], $_SESSION["super_id"], $_POST['price']);
	echo $result;
?>