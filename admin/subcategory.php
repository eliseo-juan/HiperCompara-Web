<?php
	include '../clases/connectDatabase.php';
	$condbPrice=new connectDatabase();
		
	$subcategories=$condbPrice->getSubCategories($_POST['category']);
	for($i=0;$i<sizeof($subcategories);$i=$i+1){
		$actual=$subcategories[$i];
		?><option value="<?php echo $actual['id']; ?>"><?php echo $actual['name']; ?></option><?php 
	}
	session_start();
	$_SESSION['categoriesAux']=$_POST['category'];
?>