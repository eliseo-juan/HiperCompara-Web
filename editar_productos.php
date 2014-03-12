<?php
include('include/header.php');
?>

<?php 
	$producto=$_POST['producto'];
?>

<div id="linea">
	<h1>EDICI&Oacute;N DEL PRODUCTO <?php echo $producto; ?></h1>
</div>
<div id="cuerpo">

<?php
include('include/menuIzquierda.php');
?>

<div id="contenido">
	<form name="edita-articulos" action="lista_productos.php" method="post">
		<table id="articulos">
			<tr>
				<td><span>Nombre: </span></td><td><input type="text" <?php if ($producto<>"NUEVO"){ ?>value="Leche Entera"<?php } ?> /><br></td><td></td>
			</tr>
			<tr>
				<td><span>Marca: </span></td><td><input type="text" <?php if ($producto<>"NUEVO"){ ?>value="Puleva"<?php } ?> /><br></td><td></td>
			</tr>
			<tr>
				<td><span>Precio: </span></td><td><input type="text" <?php if ($producto<>"NUEVO"){ ?>value="4.95 &euro;"<?php } ?> /><br></td><td></td>
			</tr>
			<tr>
				<td><span>Descripci&oacute;n: </span><br></td><td colspan="2"><textarea id="descripcion" rows="10" cols="0" ></textarea></td>
			</tr>
			<tr>
				<td></td><td style="width:40%;" ><input type="submit" value="Salvar" /></td><td style="width:40%;" ><input type="submit" value="Cancelar" /></td>
			</tr>
		</table>
		<br>
	</form>
</div>

<?php
include('include/menuDerecha.php');
?>

<?php 
include('include/footer.php');
?>