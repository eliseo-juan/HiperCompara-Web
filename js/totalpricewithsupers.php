<?php
	include '../clases/connectDatabaseWithSupers.php';
	$condbPrice=new connectDatabase();
	
	$ids=$_GET['ids'];
	$supers=$_GET['supers'];
	$ids=explode(" ",$ids);
	$supers=explode(" ",$supers);
	$supers=implode("','",$supers);
	$result=$condbPrice->getTotalPrice($ids,$supers);
	$price_total=$result[0];
	$name_super=$result[1];
       $str='{"prices":[]}';
	$arr = json_decode($str, true);
	$ptotal=json_encode($price_total,JSON_FORCE_OBJECT);
	$nsuper=json_encode($name_super,JSON_FORCE_OBJECT);
	$nlat=json_encode($result[2],JSON_FORCE_OBJECT);
	$nlon=json_encode($result[3],JSON_FORCE_OBJECT);
	print_r("[$ptotal,$nsuper,$nlat,$nlon]");

?>