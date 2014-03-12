<?php
	include 'clases/connectDatabase.php';
	$condbsuper=new connectDatabase();
	
	$product=$_POST['producto'];
	if ( ! session_id() ) @ session_start();
	$super=$_SESSION["super_id"];
	
	$result=$condbsuper->addProductSuper($product,$super);
	if ($result==-1){
		header('Location: fallo.php');
	}else{
		header('Location: anyadir_productos_super.php');
	}
?>