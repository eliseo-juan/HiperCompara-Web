<?php
include('header.php');
?>

<?php 
	$producto=$_REQUEST['producto'];
?>

<div id="linea">
	<h1>EDICI&Oacute;N DEL PRODUCTO <?php echo $producto; ?></h1>
</div>
<div id="cuerpo">

<?php
include('menuIzquierdaAdmin.php');
?>

<div id="contenido">
	<form name="edita-articulos" action="addproduct.php" method="post">
		<table id="articulos">
			<tr>
				<td><span>Nombre: </span></td><td style="text-align:left;"><input type="text" name="name" value="" /><br></td><td></td>
			</tr>
			<tr>
				<td><span>Marca: </span></td><td style="text-align:left;"><select name="brand_id"><?php
					$brand=$conBBDDAdmin->getBrand();
					for($i=0;$i<sizeof($brand);$i=$i+1){
						$actual=$brand[$i];
						?><option value="<?php echo $actual['id']; ?>"><?php echo $actual['name']; ?></option><?php 
					}
				?></select><br /></td><td></td>
			</tr>
			<tr>
				<td><span>Categoria: </span></td><td style="text-align:left;"><select id="category" name="category_id"><?php
					$categories=$conBBDDAdmin->getCategories();
					for($i=0;$i<sizeof($categories);$i=$i+1){
						$actual=$categories[$i];
						?><option value="<?php echo $actual['id']; ?>"><?php echo $actual['name']; ?></option><?php 
					}
				?></select><br></td><td></td>
			</tr>
			<tr>
				<td><span>Subcategoria: </span></td><td style="text-align:left;"><select id="subcategory_id" name="subcategory_id"><?php
					session_start();
					print_r($_SESSION['categoriesAux']);
					$categoriesAux=$_SESSION['categoriesAux'];
					if($categoriesAux=="")$categoriesAux=1;
					$subcategories=$conBBDDAdmin->getSubCategories($categoriesAux);
					for($i=0;$i<sizeof($subcategories);$i=$i+1){
						$actual=$subcategories[$i];
						?><option value="<?php echo $actual['id']; ?>"><?php echo $actual['name']; ?></option><?php 
					}?></select><br></td><td></td>
			</tr>
			<tr>
				<td><span>Descripci&oacute;n: </span><br></td><td colspan="2" style="text-align:left;"><textarea id="descripcion" rows="10" cols="0" ></textarea></td>
			</tr>
			<tr>
				<td><span>Imagen: </span></td><td style="text-align:left;"><input type="file" name="unit" value="" /><br></td><td></td>
			</tr>
			<tr>
				<td><span>Cantidad: </span></td><td style="text-align:left;"><input type="text" name="unit" value="" /><br></td><td></td>
			</tr>
			<tr>
				<td><span>Tipo de cantidad: </span></td><td style="text-align:left;"><select name="unit_type_id"><?php
					$unitType=$conBBDDAdmin->getUnitType();
					for($i=0;$i<sizeof($unitType);$i=$i+1){
						$actual=$unitType[$i];
						?><option value="<?php echo $actual['id']; ?>"><?php echo $actual['name']; ?></option><?php 
					}
				?></select><br></td><td></td>
			</tr>
			<tr>
				<td></td><td style="width:40%;" ><input type="submit" value="Salvar" /></form></td><td style="width:40%;" ><form name="cancela" action="index.php" method="post"><input type="submit" value="Cancelar" /></form></td>
			</tr>
		</table>
		<br>
</div>

<?php 
include('../include/footer.php');
?>