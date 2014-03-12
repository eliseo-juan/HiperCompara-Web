<?php
	include '../clases/connectDatabase.php';
	$condbPrice=new connectDatabase();
	
	$name=$_POST['name'];
	$brand_id=$_POST['brand_id'];
	$category_id=$_POST['category_id'];
	$subcategory_id=$_POST['subcategory_id'];
	$description=$_POST['description'];
	$image=$_POST['image'];
	$unit=$_POST['unit'];
	$unit_type_id=$_POST['unit_type_id'];
	$result=$condbPrice->addProduct($name, $brand_id, $category_id, $subcategory_id, $description, $image, $unit, $unit_type_id);
	header('Location: index.php')
?>