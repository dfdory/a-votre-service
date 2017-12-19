 <?php 
 require_once('connect_to_db.php');
 if (!isset($_SESSION['nom'])) { header ("Location:Help_connexion.php"); }
 $id="";
if(isset($_SESSION['id'])){$id=$_SESSION['id'];}
$query_ann=mysql_query("select id_annonces,titre_annonce,date_jr,actif from annonce where id_compte = $id;");

$i=1;
 ?>
 <h3>Toutes mes  Annonces</h3>
 <table class="table">
 <tr>
 	<th></th>
	<th>Date publication</th>
	<th>Titre</th>
	<th>Situation</th><th>Nbre <br />candidature</th>
	<th>Action</th></tr>
	<?php while($row = mysql_fetch_array($query_ann)){ ?>
	<tr>
		<td><?php echo $i++;?></td>
		<td><?php echo date('d M Y', $row["date_jr"]);?></td>
		<td><?php echo $row["titre_annonce"];?></td>
		<td><?php if($row["actif"]==0){echo 'inactif';}elseif($row["actif"]==1){echo 'actif';}?></td>
		<td><?php echo '0';?></td>
		<td><a href="Help_Annonce.php?pp=4&idsd=<?php echo $row['id_annonces'];?>">lire</a>&nbsp;/&nbsp;<a href="help_supp.php?idsd=<?php echo $row['id_annonces'];?>">supprimer</a></td>
	</tr>
	<?php } ?>
 </table>