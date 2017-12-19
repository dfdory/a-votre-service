<?php
ob_start();
session_start();
require_once('connect_to_db.php'); 
$id_des=" ";
if(isset($_POST['idsd'])){
 $id_des=$_POST['idsd'];}
$objet= $_POST['objet'];
$destinataire= $_POST['destinataire1'];
$message= $_POST['message'];
$jour=mktime(date('H'),date('i'),05,date('m'),date('d'),date('Y'));
$id_exp=$_SESSION['id'];
$expediteur=$_SESSION['prenom'].' '.$_SESSION['nom']; 
$etat=mysql_query("INSERT INTO `messages` (`id_message`, `id_envoyer_par`, `envoyer_nom`, `id_recu_par`, `recu_nom`, `objet`, `message`, `date_mess`, `etat`, `hidden1`, `hidden2`) VALUES (NULL, '$id_exp', '$expediteur', '$id_des', '$destinataire', '$objet', '$message', '$jour', '1', '1', '1');");
if($etat==true){
header("Location:Help_Annonce.php");
}
else{
header("Location:Help_ser_list_profil_detail.php?mmd='".$id_des."'");
}
?>