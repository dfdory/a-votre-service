<?php
require_once('connect_to_db.php');
if (!isset($_SESSION['nom'])) { header ("Location:Help_deconnexion.php"); }
$ss_ville=mysql_query("select * from ville"); 

$ss_service=mysql_query("SELECT *
FROM `service`"); 
$id="";
if(isset($_SESSION['id'])){$id=$_SESSION['id'];
$tof=mysql_query("select * from compte where id_compte = $id;");
$row=mysql_fetch_array($tof);}
?>
<h2>INFORMATIONS ET PARAMETRES !</h2>
<table class="table">
<th colspan="2">informations generale &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?page=10&pp=2">Modifier</a></th>
<tr><td>Nom:</td> <td><?php echo $row["nom_user"];?></td></tr>
<tr><td>Prenom:</td> <td><?php echo $row["prenom_user"];?></td></tr>
<tr><td>Email:</td> <td><?php echo $row["Email"];?></td></tr>
<tr><td>Code postal:</td> <td><?php echo $row["code_postal"];?></td></tr>
<tr><td>Ville:</td> <td><?php echo $row["ville"];?></td></tr>
<tr><td>Civilite:</td> <td><?php echo $row["civilite"];?></td></tr>
<tr><td>Date de naissance:</td> <td><?php echo $row["date_naiss"];?></td></tr>
<tr><td>Telephone:</td> <td><?php echo $row["num_tel"];?></td></tr>
</table>
<div class="clear"></div>
<table class="table">
	<th colspan="2">informations du compte</th>
	<tr><td>Membre depuis le </td><td><?php echo date('d M Y',$row["date_inscription"]);?></td></tr>
	
</table>