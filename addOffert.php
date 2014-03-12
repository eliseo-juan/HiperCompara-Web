<?php
include('include/header.php');
?>

<?php 
	$producto=$_REQUEST['producto'];
?>

<div id="linea">
	<h1>A&Ntilde;ADIR OFERTA <?php echo $producto; ?></h1>
</div>
<div id="cuerpo">

<?php
include('include/menuIzquierda.php');
?>

<div id="contenido">
	<form name="anyade-ofertas" action="anyadeOfertas.php" method="post">
		<table id="articulos">
			<tr>
				<td><span>Producto: </span></td><td><select name="product_id"><?php
					session_start();
					$product=$conBBDD->getProducts($_SESSION["super_id"]);
					for($i=0;$i<sizeof($product);$i=$i+1){
						$actual=$product[$i];
						?><option value="<?php echo $actual['product_id']; ?>"><?php echo $actual['name']; ?></option><?php 
					}
				?></select><br></td><td></td>
			</tr>
			<tr>
				<td><span>Fecha Inicio: </span></td><td><input type="text" name="init_data" value="" /><br></td><td></td>
			</tr>
			<tr>
				<td><span>Fecha Fin: </span></td><td><input type="text" name="end_data" value="" /><br></td><td></td>
			</tr>
			<tr>
				<td><span>Reducci&oacute;n: </span></td><td><input type="text" name="porCent" value="" /><br></td><td></td>
			</tr>
			<tr>
				<td></td><td style="width:40%;" ><input type="submit" value="Salvar" /></form></td><td style="width:40%;" ><form name="cancela" action="lista_productos.php" method="post"><input type="submit" value="Cancelar" /></form></td>
			</tr>
		</table>
		<br>
</div>

<?php 
include('include/footer.php');
?>