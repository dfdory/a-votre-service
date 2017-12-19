 <?php 
 require_once('connect_to_db.php');
 if (!isset($_SESSION['nom'])) { header ("Location:Help_connexion.php"); }
 $id="";
if(isset($_SESSION['id'])){$id=$_SESSION['id'];}
$query_ann=mysql_query("select id_annonces,titre_annonce,date_jr,actif from annonce where actif=1 order by date_jr desc;");
//echo ("select id_annonces,titre_annonce,date_jr,actif where id_compte = $id;");
$i=1;
$num=mysql_num_rows($query_ann);
 ?>
 <h3>Toutes les  Annonces</h3>
 <?php if($num==0){?><h4>Aucunes Annonces </h4><?php }else{?>
 <table class="table">
 <tr>
 	<th></th>
	<th>Date publication</th>
	<th>Titre</th>
	<th>Situation</th>
	<th>Action</th></tr>
	<?php while($row = mysql_fetch_array($query_ann)){ ?>
	<tr>
		<td><?php echo $i++;?></td>
		<td><?php echo date('d M Y', $row["date_jr"]);?></td>
		<td><?php echo $row["titre_annonce"];?></td>
		<td><?php if($row["actif"]==0){echo 'Expiree';}elseif($row["actif"]==1){echo 'En regle';}?></td>
		
		<td><a href="Help_Annonce.php?pp=4&idsd=<?php echo $row["id_annonces"];?>">lire</a>&nbsp;<!--/&nbsp;<a href="">supprimers</a>--></td>
	</tr>
	<?php } ?>
 </table>
 <?php } ?>