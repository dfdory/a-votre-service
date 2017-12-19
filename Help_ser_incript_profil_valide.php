<?php
ob_start();
session_start();
require_once('connect_to_db.php');
$id_compte=$_SESSION['id'];
$contenu=addslashes($_POST["contenu"]);
$nbreAnnee=addslashes($_POST["nbreAnnee"]);
$salaire=addslashes($_POST["salaire"]);
$id_service =  addslashes($_POST["id_service"]);
$etat=mysql_query("UPDATE `compte` SET `nbre_anne_exper` = '$nbreAnnee',
`description_tache` = '$contenu',
`estimation_paie` = '$salaire' WHERE `compte`.`id_compte` =$id_compte;");
if($etat==true){
header("Location:Help_Annonce.php");
}
else{
header("Location:Help_pres_service.php?page=7&idmn=$id_service");
}
?>