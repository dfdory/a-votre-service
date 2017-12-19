<?php
ob_start();
session_start();
require_once('../connect_to_db.php');

$code_postal= addslashes($_POST["code_postal"]);
$id_service =  addslashes($_POST["id_service"]);
$titre=addslashes($_POST["titre"]);
$contenu=addslashes($_POST["contenu"]);
$periode=addslashes($_POST["periode"]);
$salaire=addslashes($_POST["salaire"]);
$autreinfos=addslashes($_POST["autreinfos"]);
$id_deposant=addslashes($_POST["id_deposant"]);
$id_service=addslashes($_POST["id_service"]);
$id_annonce=addslashes($_POST["id_annonce"]);
$actif=1;
$etat=mysql_query("update `annonce` set
`contenu`='$contenu', 
`titre_annonce`='$titre',
 `periode`='$periode', 
 `code_postale`='$code_postal', 
  `salaire_horaire`='$salaire', 
  `autre_infos`='$autreinfos', 
  `actif`=$actif where id_annonces=$id_annonce and `id_compte`=$id_deposant");
  
  if($etat==true){
	 header("Location:liste_annonce.php");
	 }
	else{header("Location:detail_annonce.php?idsd='".$id_annonce."'");
	}
?>