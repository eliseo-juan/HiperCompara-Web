<?php
	include '../clases/connectDatabase.php';
	$condbsuper=new connectDatabase();
	
	$Nombre=$_POST['name'];
	$Login=$_POST['login_supermarket'];
	$Password=$_POST['pas'];
	$Pais=$_POST['pais'];
	$Ciudad=$_POST['ciudad'];
	$CP=$_POST['CP'];
	$Direccion=$_POST['direccion'];
	$Latitud=$_POST['latitud'];
	$Longitud=$_POST['longitud'];	

	$result=$condbsuper->addSuperMarket($Nombre, $Login, $Password, $Pais, $Ciudad, $CP, $Direccion, $Latitud, $Longitud);
	if ($result==-1){
		header('Location: ../fallo.php');
	}else{
		if ( ! session_id() ) @ session_start();
		$_SESSION["super_id"]=$result;
		header('Location: ../lista_productos.php');
	}
?>