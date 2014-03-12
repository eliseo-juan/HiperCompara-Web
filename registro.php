<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Hiper Compara</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" media="screen">
<!-- [if IE]><link href="css/IE.css" rel="stylesheet" type="text/css" media="screen" /><![endif]-->
<script type="text/javascript" language="JavaScript" src="js/jquery-1.10.2.js" ></script>
<script type="text/javascript" language="JavaScript" src="js/jquery-1.10.2.min.js" ></script>
<script type="text/javascript" language="JavaScript" src="js/funciones.js" ></script>
</head>
<body>
<div id="logo"><img src="image/logo2.png" title="Logo" alt="Logo" /></div>
<div id="adsense">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- HiperCompara -->
	<ins class="adsbygoogle"
	     style="display:inline-block;width:728px;height:90px"
	     data-ad-client="ca-pub-8608631373709662"
	     data-ad-slot="3756413013"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	
</div>
<script type="text/javascript">
</script>

<div id="linea">
	<h1>REGISTRO SUPERMERCADO</h1>
</div>
<div id="cuerpo">

<div id="registro-supermarket">
	<form name="login-supermarket" id="login-supermarket" action="js/registra.php" method="post">
		<table id="supermarket">
			<tr>
				<td><span>Nombre: </span></td><td><input type="text" id="name" name="name" value="" /></td>
			</tr>
			<tr>
				<td><span>Login: </span></td><td><input type="text" id="login_supermarket" name="login_supermarket" value="" /></td>
			</tr>
			<tr>
				<td><span>Password: </span></td><td><input type="password" id="pas" name="pas" value="" /></td>
			</tr>
			<tr>
				<td><span>Confirme Password: </span></td><td><input type="password" id="conpas" name="conpas" value="" /></td>
			</tr>
			<tr>
				<td><span>Pa&iacute;s: </span></td><td><input type="text" id="pais" name="pais" value="" /></td>
			</tr>
			<tr>
				<td><span>Ciudad: </span></td><td><input type="text" id="ciudad" name="ciudad" value="" /></td>
			</tr>
			<tr>
				<td><span>C&oacute;digo Postal: </span></td><td><input type="text" id="CP" name="CP" value="" /></td>
			</tr>
			<tr>
				<td><span>Direcci&oacute;n: </span></td><td><input type="text" id="direccion" name="direccion" value="" /></td>
			</tr>
			<tr>
				<td><span>Latitud: </span></td><td><input type="text" id="latitud" name="latitud" value="" /></td>
			</tr>
			<tr>
				<td><span>Longitud: </span></td><td><input type="text" id="longitud" name="longitud" value="" /></td>
			</tr>
			<!-- <tr>
				<td><span>Imagen: </span></td><td><input type="file" id="imagen" name="imagen" value="" /></td>
			</tr> -->
			<tr>
				<td><input type="submit" id="submit" name="submit" value="Salvar" /></form></td><td><form action="index.php"><input type="submit" value="Cancelar" /></form></td>
			</tr>
		</table>
</div>

<?php 
include('include/footer.php');
?>