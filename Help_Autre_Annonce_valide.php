<?php
ob_start();
session_start();
require_once('connect_to_db.php');
$domaineElem = "";
$id_compte=$_SESSION['id'];
$email_cpte=$_SESSION['email'];
$statut=$_SESSION['statut'];
$id_service =  addslashes($_POST["id_service"]);
$pag =  addslashes($_POST["pag"]);
if(isset($_POST["ss_service"]) && $_POST["ss_service"]!=''){
$domaineElem = $_POST["ss_service"];
}
else{
	header("Location:Help_Autres_Annonce_suite.php?idmn=$id_service&pag=$pag&err=1");
	}

$code_postal= addslashes($_POST["code_postal"]);
$ville= addslashes($_POST["ville"]);


$titre=addslashes($_POST["titre"]);
$contenu=addslashes($_POST["contenu"]);
$periode=addslashes($_POST["periode"]);
$salaire=addslashes($_POST["salaire"]);
$autreinfos=addslashes($_POST["autreinfos"]);
$jour=mktime(date('H'),date('i'),05,date('m'),date('d'),date('Y'));
$id_deposant=$_SESSION['id'];
$actif=0;

$etat=mysql_query(" INSERT INTO `annonce` (`id_annonces`, `id_compte`, `contenu`, `titre_annonce`, `periode`, `code_postale`, `ville`, `salaire_horaire`, `autre_infos`, `actif`, `date_jr`, `id_services`) VALUES (NULL, '$id_deposant', '$contenu', '$titre', '$periode', '$code_postal', '$ville', '$salaire', '$autreinfos', '$actif', '$jour','$id_service');");
if($etat==true){
		foreach ($domaineElem as $value) {
											$domaine1 = $value;
											$query2=mysql_query("INSERT INTO `compte_service` (`id_compte_service` ,`id_ss_service`,`id_compte`,`choix`)VALUES(NULL,'$domaine1', '$id_compte','$statut');");
												if($query2==true){
													$i++;
												}
												else{
												$i--;
												}
										}
										if($i>0){
								header("Location:Help_Annonce.php?page=10&idmn=$id_service");}
								elseif($i<=0){
								header("Location:Help_Autres_Annonce_suite.php?idmn=$id_service&pag=$pag&err=1");}
}
else{header("Location:Help_Autres_Annonce.php?page=11&idmn=$id_service");}
?>