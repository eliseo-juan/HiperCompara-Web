<?php
function printTableHeader()
{
	echo "<tr style='background: #487ff7;'>
			<th>id</th>
			<th>Art&iacute;culo</th>
			<th>Marca</th>
			<th>Precio(&euro;)</th>
			<th>Herramientas</th>
		</tr>";
}

function printTableContent($superid,$search="",$subcat="")
{	

global $conBBDD;

	$product=$conBBDD->getProducts($superid,$search,$subcat);
	for($i=0;$i<sizeof($product);$i=$i+1){
		$class=$impar? 'class="listado-color"':'';
		
		/*$actual=$category[$i];
		echo "<li>";
		echo "	<a href=\"#\" class=\"itemMenuIzquierda\">".$actual["name"]."</a>";
		echo "	<ul class=\"subMenuIzquierda\">";
		echo "	</ul>";
		echo "</li>";*/
		$actual=$product[$i];
		echo "<tr $class >";
		echo "<td class=\"product_id\">".$actual["product_id"]."</td>";
		echo "<td>".$actual["name"]."</td>";
		echo "<td>".$actual["brand_name"]."</td>";
		echo "<td class=\"precio\">".$actual["price"]."</td>";
/* 		echo "<td><form name=\"herramientas\" action=\"editar_productos.php\" method=\"post\"><input class=\"boton_editar\" type=\"submit\" value=\"\" /><input type=\"hidden\" name=\"producto\" value=\"1\" /><input class=\"boton_borrar\" type=\"submit\" value=\"\" /></form></td>"; */
		echo "<td><form name=\"herramientas\" action=\"editar_productos.php\" method=\"post\"><input type=\"hidden\" name=\"producto\" value=\"1\" /><input class=\"boton_borrar\" type=\"submit\" value=\"\" /></form></td>";
		echo "</tr>";	
		$impar=!$impar;
	}

	
}










?>