<?php
ob_start();
session_start();
require_once('connect_to_db.php');

$ville=addslashes($_POST["ville"]);
$code_postal=addslashes($_POST["code_postal"]);
$titre=addslashes($_POST["titre"]);
$contenu=addslashes($_POST["contenu"]);
$periode=addslashes($_POST["periode"]);
$salaire=addslashes($_POST["salaire"]);
$autreinfos=addslashes($_POST["autreinfos"]);
$jour=mktime(date('H'),date('i'),05,date('m'),date('d'),date('Y'));
$id_deposant=$_SESSION['id'];
$id_service =  addslashes($_POST["id_service"]);
$actif=0;
$etat=mysql_query(" INSERT INTO `annonce` (`id_annonces`, `id_compte`, `contenu`, `titre_annonce`, `periode`, `code_postale`, `ville`, `salaire_horaire`, `autre_infos`, `actif`, `date_jr`, `id_services`) VALUES (NULL, '$id_deposant', '$contenu', '$titre', '$periode', '$code_postal', '$ville', '$salaire', '$autreinfos', '$actif', '$jour','$id_service');");
if($etat==true){
header("Location:Help_Annonce.php");
}
else{
header("Location:Help_pres_service.php?page=7&idmn=$id_service");
}
?>