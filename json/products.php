<?php
	$name=$_GET['name'];
	if(empty($name))
		$cond="where id in (SELECT product_id FROM super_product)";
	else
		$cond="where name like '%$name%' AND id in (SELECT product_id FROM super_product)";
	
	$con=mysqli_connect("localhost","hmi","imh","hmi");

	// Check connection
	if (mysqli_connect_errno($con))
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  } 
	$sql=mysqli_query($con, "SELECT id, name, brand_id, category_id, unit_type_id, av_price FROM product $cond");
	while($row=mysqli_fetch_assoc($sql))
	{
		 $output[]=$row;
	}
	
	print(json_encode($output));// this will print the output in json
	mysqli_close($con);
?>