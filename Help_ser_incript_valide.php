<?php
ob_start();
session_start();
require_once('connect_to_db.php');
$domaineElem="";
//avec compte
if(isset($_SESSION['email'])){
$id_compte=$_SESSION['id'];
$email_cpte=$_SESSION['email'];
$statut=$_SESSION['statut'];
$code_postal= addslashes($_POST["code_postal"]);
$ville= addslashes($_POST["ville"]);
$tel =  addslashes($_POST["tel"]);
$id_service =  addslashes($_POST["id_service"]);
$pag =  addslashes($_POST["pag"]);
$date_naiss=addslashes($_POST["date_naiss"]);
if(isset($_POST["ss_service"]) && $_POST["ss_service"]!=''){
$domaineElem = $_POST["ss_service"];
}
else{
	header("Location:Help_pres_service.php?page=6&idmn=$id_service&err=1");
	}
$i=0;
 $domaine = "";
 $query1=mysql_query("UPDATE `compte` SET `date_naiss` = '$date_naiss',
`num_tel` = '$tel',
`code_postal` = '$code_postal',
`ville` = '$ville',
`id_services` = '$id_service' WHERE `id_compte` =$id_compte and `Email`='$email_cpte';");


	if($query1==true){
		foreach ($domaineElem as $value) {
											$domaine1 = $value;
											$query2=mysql_query("INSERT INTO `compte_service` (`id_compte_service` ,`id_ss_service`,`id_compte`,`choix`)VALUES(NULL,'$domaine1', '$id_compte','$statut');");
												if($query2==true){
													$i++;
												}
												else{
												$i--;
												}
										}//fin foreach
								if($i>0){
								header("Location:Help_pres_service.php?page=7&idmn=$id_service");
								}
								elseif($i<=0){
								header("Location:Help_pres_service.php?page=6&idmn=$id_service&err=1");
								}
	}
	
	
	
	else{
		header("Location:Help_pres_service.php?page=6&idmn=$id_service&err=1");
	}
	
 
}
//pas de compte
else{
$choix= "";
$civilite= addslashes($_POST["civilite"]);
$nom= addslashes($_POST["nom"]);
$prenom= addslashes($_POST["prenom"]);
$email =  addslashes($_POST["email"]);
$password= addslashes($_POST["password"]);
$date_inscription=date("d/M/Y");
$derniere_connexion=date("d/M/Y");
$code_postal= addslashes($_POST["code_postal"]);
$ville= addslashes($_POST["ville"]);
$tel =  addslashes($_POST["tel"]);
$id_service =  addslashes($_POST["id_service"]);
$date_naiss=addslashes($_POST["date_naiss"]);
$domaineElem = $_POST["ss_service"];
$pag =  addslashes($_POST["pag"]);
if($pag==4){
$choix=1;
}elseif($pag==5){
$choix=2;}

 $domaine = "";
 
 $verif=mysql_query("SELECT * FROM `compte` WHERE `Email` = '$email'");

	$num=mysql_num_rows($verif);
	if($num==0){
		$etat = mysql_query("INSERT INTO `compte` (`id_compte`, `civilite`, `nom_user`, `prenom_user`, `Email`, `password`, `date_naiss`, `derniere_connexion`, `num_tel`,`code_postal`,`ville` ,`photo`, `choix`, `nbre_anne_exper`, `description_tache`, `estimation_paie`, `date_inscription`, `id_services`) VALUES (NULL, '$civilite', '$nom', '$prenom', '$email', '$password', '$date_naiss', '$derniere_connexion', '$tel','$code_postal', '$ville', NULL, '$choix', NULL, NULL, NULL, '$date_inscription', $id_service);");
			
			if($etat==true){
			$_SESSION['mail']=$email;
			$_SESSION['nom']=$nom;
			$_SESSION['prenom']=$prenom;
			
			
			$_SESSION['civilite']=$civilite;
			$sql_id =mysql_query("SELECT * FROM `compte` WHERE `Email` = '$email'");
			
				$result = mysql_fetch_array($sql_id);
				$id_compte=$result['id_compte'];
				$statut= $result['choix'];
					$_SESSION['id']=$id_compte;	
					$_SESSION['statut']=$statut;			
								
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
								header("Location:Help_pres_service.php?page=7&idmn=$id_service");}
								elseif($i<=0){
								header("Location:Help_pres_service.php?page=6&idmn=$id_service");}
			
			}
			else{
			header("Location:Help_pres_service.php?page=6&idmn=$id_service");
			}
	}
	else{
		header("Location:Help_inscription.php?err=2");
		//echo ("SELECT * FROM `compte` WHERE `Email` = '$email'");
	}


}
?>