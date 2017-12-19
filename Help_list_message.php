<?php
require_once('connect_to_db.php');
if (!isset($_SESSION['nom'])) { header ("Location:Help_connexion.php"); }
 $id="";
if(isset($_SESSION['id'])){$id=$_SESSION['id'];}
$query_ann=mysql_query("select * from messages where id_recu_par=$id order by date_mess DESC");
$i=1;
$num=mysql_num_rows($query_ann);
?>
 <h3>Mes  messages</h3>
 <?php if($num==0){?><h4>Aucun message</h4><?php }else{?>
  <table class="table table-striped">
 <tr>
 	<th></th>
	<th>expediteur</th>
	<th>objet</th>
	<th>Date</th>
	</tr>
	<?php while($row = mysql_fetch_array($query_ann)){ if($row["etat"]==1){?>
	<tr>
		<td><h4><?php echo $i++;?></h4></td>
		<td><h4><?php echo $row["envoyer_nom"];?></h4></td>
		<td><h4><a href="Help_Annonce.php?pp=9&idsd=<?php echo $row["id_message"];?>"><?php echo $row["objet"];?></a></h4></td>
		<td><h4><?php echo date('d M Y', $row["date_mess"]);?></h4></td>
		
		
	</tr>
	<?php }else{?>
	<tr>
		<td><?php echo $i++;?></td>
		<td><?php echo $row["envoyer_nom"];?></td>
		<td><a href="Help_Annonce.php?pp=9&idsd=<?php echo $row["id_message"];?>"><?php echo $row["objet"];?></a></td>
		<td><?php echo date('d M Y', $row["date_mess"]);?></td>
		
		
	</tr>
	<?php 
	}} ?>
 </table>
 <?php } ?>