<?php
ob_start();
session_start(); 
require_once('connect_to_db.php');

$id		= $_GET['sdhfjsscvzaayuighdfghddd'];

$tab	= $_GET['lishnfuiqhlsmqsdlhqmsldh'];
 $jour=mktime(date('H'),date('i'),05,date('m'),date('d'),date('Y'));
if ($tab=='1') { 

	mysql_query("UPDATE `compte` SET `actif` = '1' WHERE `code_act` = '$id' LIMIT 1 ;"); 
	 
	$verif_query=sprintf("SELECT * FROM compte WHERE code_act ='$id'"); 
	$verif = mysql_query("SELECT * FROM compte WHERE code_act ='$id'"); //($verif_query, $dbprotect) or die(mysql_error());
	$r_ir = mysql_fetch_array($verif);
	$utilisateur = mysql_num_rows($verif); 
		if ($utilisateur) {	// On test s'il y a un utilisateur correspondant
		
				$_SESSION["authentification"]="ok"; // enregistrement de la session 
				mysql_query("UPDATE `compte` SET `derniere_connexion` = '$jour' WHERE `compte`.`id_compte` =$id;");
		$_SESSION['email']=$r_ir['Email'];
		$_SESSION['nom']=$r_ir['nom_user'];
		$_SESSION['prenom']=$r_ir['prenom_user'];
		$_SESSION['id']=$r_ir['id_compte'];
		$_SESSION['statut']=$r_ir['choix'];
		$_SESSION['civilite']=$r_ir['civilite'];
		$_SESSION['date_ins']=$r_ir['date_inscription'];
		$_SESSION['date_expir']=$r_ir['date_expiration'];
		$_SESSION['code_act']=$r_ir['code_act'];
		$_SESSION['actif']=$r_ir['actif'];
		$_SESSION['tps'] =1800;//1 minutes
	    $_SESSION['time'] = time();
				
				
				if($_SESSION['statut']==1){
					header("Location:Help_pres_service.php?page=4");
				}
				elseif($_SESSION['statut']==2){
				header("Location:Help_pres_service.php?page=5");
				}// ("Refresh: 10;URL=welcome.php"); }
			} else { header("Location:Help_inscription.php?err=1"); }	
			
			
	
	} 
//mysql_close();


?>