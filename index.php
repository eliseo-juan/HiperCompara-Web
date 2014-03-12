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
<?php
if ( ! session_id() ) @ session_start();
$_SESSION["super_id"]=-1;
?>
<div id="linea">
	<h1>HOME</h1>
</div>
<div id="cuerpo">
	<br /><br />
	<div id="login">
		<table>
			<tr>
			<form id="formulario" name="Formulario" action="comprueba_campos.php" method="post">
				<td><span>Nombre: </span></td><td><input type="text" id="login-super" name="login-super" value="" /></td>
			</tr>
			<tr>
				<td><span>Contrase&ntilde;a: </span></td><td><input type="password" id="pas" name="pas" value="" /></td>
			</tr>
			<tr>
				<td><input type="submit" value="Login" /></form></td><td>
					<form id="registro" name="registro" action="registro.php" method="post">
						<input type="submit" value="Registrarse" />
					</form>
				</td>
			</tr>
		</table>
	</div>
<?php 
include('include/footer.php');
?>