<?php 
require_once('connect_to_db.php');
$ids="";
if(isset($_GET['idsd'])){$ids=$_GET['idsd'];}
mysql_query("delete from annonce where id_annonces=$ids");
header("Location:Help_Annonce.php?pp=3");
?>