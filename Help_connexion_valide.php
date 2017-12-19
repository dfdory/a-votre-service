<?php
ob_start();
session_start();
require_once('connect_to_db.php'); 
$email =  addslashes($_POST["email"]);
$password= md5(addslashes($_POST["password"]));
$ir = mysql_query("SELECT * FROM `compte` WHERE `Email` = '$email' and password='$password'");
//echo ("SELECT * FROM `compte` WHERE `Email` = '$email' and password='$password'");
 $jour=mktime(date('H'),date('i'),05,date('m'),date('d'),date('Y'));
		$num=mysql_num_rows($ir);
		if($num!=0){
		
			
			$r_ir = mysql_fetch_array($ir);
			
			$id=$r_ir['id_compte'];
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
			if($r_ir['actif']==1){
					//echo $_SESSION['actif'].' '.$_SESSION['email'].''.$_SESSION['nom'];
					header("Location:Help_Annonce.php");
			}
			elseif($r_ir['actif']==0){header("Location:Help_non_actif.php");}
		
		}
		else{
		header("Location:Help_connexion.php?err=1");
		}
?>