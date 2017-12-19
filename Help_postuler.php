<?php
ob_start();
session_start();
require_once('connect_to_db.php');
$ids="";
if(isset($_GET['idsd'])){$ids=$_GET['idsd'];} 
 $id="";
if(isset($_SESSION['id'])){$id=$_SESSION['id'];}
$jour=mktime(date('H'),date('i'),05,date('m'),date('d'),date('Y'));
$etat=mysql_query("INSERT INTO `offre` (
`id_offre` ,
`id_annonces` ,
`id_comptes` ,
`date_jr`
)
VALUES (
NULL , '$ids', '$id', '$jour'
);
 ");
 if($etat==true){header("Location:Help_Annonce.php");}
 else{header("Location:Help_Annonce.php?pp=4&ids='".$ids."'");}
?>
