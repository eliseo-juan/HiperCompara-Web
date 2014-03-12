<?php
include('header.php');
?>
<div id="linea">
	<h1>GESTI&Oacute;N DE PRODUCTOS </h1>
</div>
<div id="cuerpo">

<?php
include('menuIzquierdaAdmin.php');
?>
<div id="contenido">
	<table id="products">
		<tr style='background: #487ff7;'>
			<th>id</th>
			<th>Art&iacute;culo</th>
			<th>Marca</th>
			<th>Herramientas</th>
		</tr>		
<?php
	$product=$conBBDDAdmin->getAllProduct();
	for($i=0;$i<sizeof($product);$i=$i+1){
		$class=$impar? 'class="listado-color"':'';
		$actual=$product[$i];
		echo "<tr $class >";
		echo "<td class=\"product_id\">".$actual["id"]."</td>";
		echo "<td>".$actual["name"]."</td>";
		echo "<td>".$actual["brand_name"]."</td>";
		echo "<td><form name=\"herramientas\" action=\"editar_productos.php\" method=\"post\"><input type=\"hidden\" name=\"producto\" value=\"1\" /><input class=\"boton_borrar\" type=\"submit\" value=\"\" /></form></td>";
		echo "</tr>";	
		$impar=!$impar;
	}
?>
	</table>
</div>
<?php 
include('../include/footer.php');
?>