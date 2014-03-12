<?php
include '../../clases/connectDatabase.php';
$conBBDD=new connectDatabase();
session_start();
include_once ("../products.php");
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
//El codigo anterior ya no es necesario pues el super_id se coge cuando se hace el login
$superid=$_SESSION["super_id"];
?>
<table id="products">
  	<?php printTableHeader() ?>
	<?php printTableContent($superid,$_REQUEST['search']) ?>
</table>
