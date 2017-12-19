<?php 
require_once('connect_to_db.php');
if (!isset($_SESSION['nom'])) { header ("Location:index.php?page=2"); }
$ids="";
if(isset($_GET['ida'])){$ids=$_GET['ida'];}
$query_ann=mysql_query("select id_annonces,titre_annonce,date_jr,actif from annonce where id_annonces = $ids;");
$row = mysql_fetch_array($query_ann);
$query1=mysql_query("select * from offre where id_annonces=$ids");
?>
 <h3>Liste des candidats</h3>
<table class="table">
<tr>
 	<th></th>
	<th><?php echo $row["titre_annonce"];?></th>
</tr>
<?php while($row1 = mysql_fetch_array($query1)){ $idc=$row1["id_comptes"];
$query2=mysql_query("select * from compte where id_compte=$idc");
$row2=mysql_fetch_array($query2);?>
<tr> 
<td colspan="2"><a href="Help_ser_list_profil_detail.php?mmd=<?php echo $row2['id_compte']?>"><?php echo $row2['nom_user'].' '.$row2['prenom_user'].' :'.$row2['ville'];?> </a></td>
</tr>
<?php } ?>
</table>
