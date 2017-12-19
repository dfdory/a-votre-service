<?php 
require_once('connect_to_db.php');
if (!isset($_SESSION['nom'])) { header ("Location:Help_deconnexion.php"); }
$ids="";
if(isset($_GET['idsd'])){$ids=$_GET['idsd'];}
mysql_query("UPDATE `messages` SET `etat` = '0' WHERE `messages`.`id_message` =$ids;");
$query=mysql_query("select * from messages where  id_message=$ids");

$row =mysql_fetch_array($query);
$statut=$_SESSION['statut'];
?>
<h2><?php echo $row['objet'];?></h2>
<table class="table">
	<tr>
		<th><?php echo $row['envoyer_nom'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('d M Y', $row["date_mess"]);?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&Agrave;: Moi</th>
	</tr>
		
	<tr>
		<td><?php echo $row['message'];?></td>
	</tr>
	
</table>
<a href="Help_Annonce.php?pp=7&idsd=<?php echo $row['id_envoyer_par'];?>&idmsg=<?php echo $row['id_message']; ?>"><div class="greenBtn1">Repondre </div></a>