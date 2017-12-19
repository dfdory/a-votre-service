<?php 
require_once('connect_to_db.php');
if (!isset($_SESSION['nom'])) { header ("Location:deconnexion.php"); }
$ids="";
if(isset($_GET['idsd'])){$ids=$_GET['idsd'];}
$query=mysql_query("select * from annonce where id_annonces=$ids");

$row =mysql_fetch_array($query);
$statut=$_SESSION['statut'];
?>

 <h2>Detail de l'annonce</h2>
 <div>
 	<h4><?php echo $row['titre_annonce'];?></h4>
	Lieu: <?php echo $row['ville'].' '.$row['code_postale'];?><br />
	Periode: <?php echo $row['periode'];?><br />
	Salaire Horaire: <?php echo $row['salaire_horaire'];?><br />
	contenu: <p><?php echo $row['contenu'];?></p>
	Postee le: <?php echo date('d m y',$row['date_jr']);?><br />
	Infos supplementaire: <?php echo $row['autre_infos'];?><br />
	<?php if($statut==1) {?>
	<a href="Help_postuler.php?idsd=<?php echo $row['id_annonces'];?>"><div class="greenBtn1">Postulez </div></a>
	<?php }?>
 </div>