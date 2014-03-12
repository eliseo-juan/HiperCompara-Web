<?php
	include('../clases/connectDatabase.php');
	
	$id=$_GET['super_id'];
	if(empty($id))
		$cond="";
	else
		$cond="where super_id='$id'";
	
	$con=mysqli_connect("localhost","hmi","imh","hmi");

	// Check connection
	if (mysqli_connect_errno($con))
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	   
	$sql=mysqli_query($con, "SELECT * FROM offer $cond");
	while($row=mysqli_fetch_assoc($sql))
	{
		 $output[]=$row;
	}
	
	print(json_encode($output));// this will print the output in json
	mysqli_close($con);
?>