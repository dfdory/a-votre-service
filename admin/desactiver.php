<?php
ob_start();
session_start();
require_once('../connect_to_db.php');
$id_annonce=addslashes($_GET["id_SDS"]);
$id_deposant=addslashes($_GET["id_AAdc"]);
$actif=0;
$etat=mysql_query("update `annonce` set`actif`=$actif where id_annonces=$id_annonce and `id_compte`=$id_deposant");
if($etat==true){
	 header("Location:liste_annonce.php");
	 }
	else{header("Location:detail_annonce.php?idsd='".$id_annonce."'");
	}
?>