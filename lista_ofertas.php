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
	$superid=1;
	$_SESSION["super_id"]=$superid;
}*/	
?>
<script type="text/javascript">
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
<div id="contenido">
	<table id="products">
		 <tr style='background: #487ff7;'>
			<td>id</td>
			<td>Art&iacute;culo</td>
			<td>Marca</td>
			<td>Precio(&euro;)</td>
			<td>Descuento (%)</td>
			<td>Desde</td>
			<td>Hasta</td>
		</tr>
		<?php
			session_start();
			$offert=$conBBDD->getOffert($_SESSION['super_id'],$search);
			for($i=0;$i<sizeof($offert);$i=$i+1){
				$class=$impar? 'class="listado-color"':'';
				$actual=$offert[$i]; ?>
				<tr $class >
					<td class="product_id"><?php echo $actual["product_id"]; ?></td>
					<td><?php echo $actual["name_product"]; ?></td>
					<td><?php echo $actual["name_brand"]; ?></td>
					<td class="precio"><?php echo $actual["new_price"]; ?></td>
					<td><?php echo $actual["percentage"]; ?></td>
					<td><?php echo $actual["start_date"]; ?></td>
					<td><?php echo $actual["end_date"]; ?></td>
				</tr>
		<?php
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