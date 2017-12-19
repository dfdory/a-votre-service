<?php
ob_start();
session_start();
require_once('connect_to_db.php'); 
$choix = "";
	if(isset($_POST["choix"])){
		
    $choix= addslashes($_POST["choix"]);

	}
$civilite= addslashes($_POST["civilite"]);
$nom= addslashes($_POST["nom"]);
$prenom= addslashes($_POST["prenom"]);
$email =  addslashes($_POST["email"]);
$password= md5(addslashes($_POST["password"]));
$date_inscription= mktime(date('H'),date('i'),05,date('m'),date('d'),date('Y'));
//mktime(date('H'),date('i'),05,date('m'),date('d'),date('Y'));
$derniere_connexion=mktime(date('H'),date('i'),05,date('m'),date('d'),date('Y'));
$actif=0;
$ttt = time();
$cod_act = mt_rand(1000000, 9999999) ; $code_act = $cod_act."".$ttt."1" ;
$verif=mysql_query("SELECT * FROM `compte` WHERE `Email` = '$email'");
$query_delai=mysql_query("SELECT * FROM `date_essai`");
$row=mysql_fetch_array($query_delai);
$delai_expi="";
//$datejr=mktime(date('H'),date('i'),05,date('m'),date('d'),date('Y'));
if($choix==1){
	if($row['delai_employe']==0) {$delai_expi= $date_inscription +(12*30*24*60*60);}else{$delai_expi= $date_inscription + $row['delai_employe'];}
	}
elseif($choix==2){if($row['delai_employe']==0) {$delai_expi= $date_inscription +(6*30*24*60*60);}else{$delai_expi= $date_inscription + $row['delai'];}
}



$num=mysql_num_rows($verif);
		if($num==0){
			$etat = mysql_query("INSERT INTO `compte` (`id_compte`, `civilite`, `nom_user`, `prenom_user`, `Email`, `password`, `date_naiss`, `derniere_connexion`, `num_tel`,`code_postal`,`ville` ,`photo`, `choix`, `nbre_anne_exper`, `description_tache`, `estimation_paie`, `date_inscription`, `date_expiration`,`id_services`,`prenium`,`code_act`,`actif`) VALUES (NULL, '$civilite', '$nom', '$prenom', '$email', '$password', NULL, '$derniere_connexion', NULL, NULL, NULL, NULL, '$choix', NULL, NULL, NULL, '$date_inscription','$delai_expi', NULL,0,'$code_act','$actif');");
if($etat==true){
           //$_SESSION['email']=$email;
			
			if($choix==1)
			{
				$lien = "http://www.avotreservice.cm/Help_inscription4.php?lkqyshqdjafhzudhofhnzj=jjj&likjsdfkshskdfs=5&lishnfuiqhlsmqsdlhqmsldh=1&hdfgdhf=4&sdhfjsscvzaayuighdfghddd=$code_act";
include("mail_ins.php");
header("Location:Help_inscription2.php?uio=$email&skjshlkjvsjkvcjhvjhsdkjyvhljlbkbysdjhxjchsgbvuyebvqkustqbusdbvkuqkstydubvkiukvuqqebiviuqvybiequiqudyqv=1&xfcg=$civilite&rtyu=$nom&xfgh=$prenom");

			}
			elseif($choix==2)
			{
				$lien = "http://www.avotreservice.cm/Help_inscription4.php?lkqyshqdjafhzudhofhnzj=jjj&likjsdfkshskdfs=5&lishnfuiqhlsmqsdlhqmsldh=1&hdfgdhf=4&sdhfjsscvzaayuighdfghddd=$code_act";
//header("Location:index.php?page=5");}
include("mail_ins.php");
header("Location:Help_inscription2.php?uio=$email&skjshlkjvsjkvcjhvjhsdkjyvhljlbkbysdjhxjchsgbvuyebvqkustqbusdbvkuqkstydubvkiukvuqqebiviuqvybiequiqudyqv=1&xfcg=$civilite&rtyu=$nom&xfgh=$prenom");
			}
			
		}//fin etat =true
		else{
		//etat=false
			header("Location:Help_inscription.php?err=1");

		}
	}// num=0
	else{
	//num different de 0
	header("Location:Help_inscription.php?err=2");
	}
	
?>