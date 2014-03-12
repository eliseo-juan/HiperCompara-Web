<?php
	include '../clases/connectDatabaseWithSuperOffers.php';
	$condbPrice=new connectDatabase();
	
	$ids=$_GET['ids'];
	$offers=$_GET['offers'];
	$super=$_GET['super'];
	$ids=explode(" ",$ids);
	$offers=explode(" ",$offers);
	$result=$condbPrice->getTotalPriceWithOffers($ids,$super,$offers);
	$price_total=array($result[0]);
	$name_super=array($result[1]);
	$result[2]=array($result[2]);
	$result[3]=array($result[3]);
	$ptotal=json_encode($price_total,JSON_FORCE_OBJECT);
	$nsuper=json_encode($name_super,JSON_FORCE_OBJECT);
	$nlat=json_encode($result[2],JSON_FORCE_OBJECT);
	$nlon=json_encode($result[3],JSON_FORCE_OBJECT);
	print_r("[$ptotal,$nsuper,$nlat,$nlon]");

?>