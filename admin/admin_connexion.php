<?php
ob_start();
session_start();
require_once('../connect_to_db.php'); 
$email =  addslashes($_POST["email"]);
$password= md5(addslashes($_POST["password"]));
$ir = mysql_query("SELECT * FROM `admin_users` WHERE `email_admin` = '$email' and mot_passe='$password'");
echo ("SELECT * FROM `admin_users` WHERE `email_admin` = '$email' and mot_passe='$password'");
 $jour=mktime(date('H'),date('i'),05,date('m'),date('d'),date('Y'));
		$num=mysql_num_rows($ir);
		if($num!=0){
		$r_ir = mysql_fetch_array($ir);
		//$id=$r_ir['id_admin'];
		
		$_SESSION['email']=$r_ir['email_admin'];
		$_SESSION['nom']=$r_ir['nom_admin'];
		
		$_SESSION['id']=$r_ir['id_admin'];
		$_SESSION['tps'] =1800;//1 minutes
	    $_SESSION['time'] = time();
		/*
		mysql_query("UPDATE `compte` SET `derniere_connexion` = '$jour' WHERE `compte`.`id_compte` =$id;");
		$_SESSION['statut']=$r_ir['choix'];
		$_SESSION['civilite']=$r_ir['civilite'];
		$_SESSION['date_ins']=$r_ir['date_inscription'];
		$_SESSION['date_expir']=$r_ir['date_expiration'];*/
		header("Location:erp.php");
		}
		else{
		header("Location:index.php?err=1&page=2");
		}
?>