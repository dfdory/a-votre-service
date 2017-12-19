<?php
ob_start();
session_start();
require_once('connect_to_db.php'); 
$id="";
if(isset($_SESSION['id']))
{$id=$_SESSION['id'];

$tof=mysql_query("select * from compte where id_compte = $id;");
$row=mysql_fetch_array($tof);}
$password="";

if(isset($_POST["password"])&& $_POST["password"]==""){$password=$row["password"];}else{$password= addslashes($_POST["password"]);}

$civilite= addslashes($_POST["civilite"]);
$nom= addslashes($_POST["nom"]);
$prenom= addslashes($_POST["prenom"]);
$email =  addslashes($_POST["email"]);
$code_postal= addslashes($_POST["code_postal"]);
$ville= addslashes($_POST["ville"]);
$tel =  addslashes($_POST["tel"]);
$date_naiss=addslashes($_POST["date_naiss"]);
$etat=mysql_query("UPDATE `compte` SET `civilite` = '$civilite',
`nom_user` = '$nom',
`prenom_user` = '$prenom',
`Email` = '$email',
`password` = '$password',
`date_naiss` = '$date_naiss',
`num_tel` = '$tel',
`code_postal` = '$code_postal',
`ville` = '$ville' WHERE `compte`.`id_compte`=$id;
");

if($etat==true){ 
$_SESSION['email']=$email;
					$_SESSION['nom']=$nom;
					$_SESSION['prenom']=$prenom;
					
					
					$_SESSION['civilite']=$civilite;
					
					

header("Location:Help_Annonce.php?pp=1");
}
else{header("Location:Help_Annonce.php?pp=2");
}
?>