<?php 
 require_once('connect_to_db.php');
 if (!isset($_SESSION['nom'])) { header ("Location:index.php?page=2"); }
 $id="";
if(isset($_SESSION['id'])){$id=$_SESSION['id'];}
$query_ann=mysql_query("select id_annonces,titre_annonce,date_jr,actif from annonce where id_compte = $id and actif = 1 order by date_jr ASC;");


$i=1;	
$num=mysql_num_rows($query_ann);
?>
 <h3>Toutes mes  Candidatures</h3>
 <?php if($num==0){?><h4>Aucunes Candidatures </h4><?php }else{?>
 <table class="table">
 <tr>
 	<th></th>
	<th>Publi&eacute;e le</th>
	<th>Titre</th>
	<th>Nbre de candidature</th>
	<th>Action</th>
	</tr>
	<?php while($row = mysql_fetch_array($query_ann)){ $id=$row["id_annonces"];
	$query1=mysql_query("select * from offre where id_annonces=$id");
	$num=mysql_num_rows($query1);?>
	<tr>
		<td><?php echo $i++;?></td>
		<td><?php echo date('d M Y', $row["date_jr"]);?></td>
		<td><?php echo $row["titre_annonce"];?></td>
		<td><?php echo $num;?></td>
		
		<td><a href="Help_Annonce.php?pp=6&ida=<?php echo $id;?>">lire</a>&nbsp;<!--/&nbsp;<a href="">supprimer</a>--></td>
	</tr>
	<?php } ?>
 </table>
 <?php } ?>