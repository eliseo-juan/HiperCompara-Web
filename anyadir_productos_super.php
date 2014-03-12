<?php
include('include/header.php');
include('include/products.php');

/*if(!empty($_REQUEST['super']))
{
	$superid=$_REQUEST['super'];
	$_SESSION["super_id"]=$superid;
}
else
{
	$_SESSION["super_id"]=$superid;
}*/
$subcat=$_REQUEST['subcat'];	
?>
<script type="text/javascript">
/*
function reloadTable(search)
{
    jQuery.ajax({
        url: 'include/ajax/productsSearcher.php',
        data: 'search='+search,
        success: function(valores)
		{ 
        	jQuery("#contenido").html(valores);
        }
            
    });
}
onkeyup="reloadTable(this.value);"
*/
</script>

<div id="linea">
	<h1>Productos</h1>
</div>
<div id="cuerpo">

<?php
include('include/menuIzquierda.php');
?>
<div id="searcher"> 
	<input class="busqueda" type="text" 
			 value=""
			 name="searcher"
			 onclick="if(this.value=='Search')this.value=''"
			  />
</div>
<?php 
if ( ! session_id() ) @ session_start();
$superid=$_SESSION["super_id"];
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
		$product=$conBBDD->getProductsWithOutSuper($superid);
		for($i=0;$i<sizeof($product);$i=$i+1){
			$class=$impar? 'class="listado-color"':'';
		
			$actual=$product[$i];
			echo "<tr $class >";
			echo "<td class=\"product_id\">".$actual["id"]."</td>";
			echo "<td>".$actual["name"]."</td>";
			echo "<td>".$actual["brand_name"]."</td>";
			echo "<td><form name=\"herramientas\" action=\"anyada_productos.php\" method=\"post\"><input type=\"hidden\" id=\"producto\" name=\"producto\" value=\"".$actual["id"]."\" /><input type=\"submit\" value=\"A&ntilde;adir\" /></form></td>";
			echo "</tr>";	
			$impar=!$impar;
	}
	?>
	</table>
</div>

<?php
include('include/menuDerecha.php');
?>

<?php 
include('include/footer.php');
?>