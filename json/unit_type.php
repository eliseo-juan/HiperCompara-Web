<?php

	$con=mysqli_connect("localhost","hmi","imh","hmi");

	// Check connection
	if (mysqli_connect_errno($con))
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	   
	$sql=mysqli_query($con, "SELECT * FROM unit_type");
	while($row=mysqli_fetch_assoc($sql))
	{
		 $output[]=$row;
	}
	
	print(json_encode($output));// this will print the output in json
	mysqli_close($con);
?>