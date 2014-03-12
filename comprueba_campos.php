<?php
	include 'clases/connectDatabase.php';
	$condbsuper=new connectDatabase();
	
	$Login=$_POST['login-super'];
	$Password=$_POST['pas'];
	
	$result=$condbsuper->getSuperMarket($Login, $Password);
	if ($result==""){
		header('Location: index.php');
	}else{
		if ($result=="admin"){
			header('Location: admin/index.php');
		}else{
			if ( ! session_id() ) @ session_start();
			$_SESSION["super_id"]=$result;
			header('Location: lista_productos.php');
		}
	}
?>