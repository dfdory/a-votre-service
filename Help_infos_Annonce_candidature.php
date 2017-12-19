<?php 
 require_once('connect_to_db.php');
 if (!isset($_SESSION['nom'])) { header ("Location:Help_connexion.php"); }
 $id="";
if(isset($_SESSION['id'])){$id=$_SESSION['id'];}
$query_ann=mysql_query("SELECT annonce.id_annonces, annonce.titre_annonce, annonce.date_jr, offre.date_jr AS jour
FROM annonce, offre, compte
WHERE compte.id_compte =$id
AND offre.id_comptes = compte.id_compte
AND annonce.id_annonces = offre.id_annonces
ORDER BY offre.date_jr");
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
	<th>Postul&eacute;e le</th>
	</tr>
	<?php while($row = mysql_fetch_array($query_ann)){ ?>
	<tr>
		<td><?php echo $i++;?></td>
		<td><?php echo date('d M Y', $row["date_jr"]);?></td>
		<td><?php echo $row["titre_annonce"];?></td>
		<td><?php echo date('d M Y', $row["jour"]);?></td>
		
		<!--<td><a href="?page=10&pp=4&idsd=<?php //echo $row["id_annonces"];?>">lire</a>&nbsp;<!--/&nbsp;<a href="">supprimer</a></td>-->
	</tr>
	<?php } ?>
 </table>
 <?php } ?>