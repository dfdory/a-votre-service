<?php
ob_start();
session_start();
require_once('../connect_to_db.php'); 
$query_ann=mysql_query("select * from annonce order by date_jr DESC");
$i=1;
//require_once('../script.php');
?>
<html>
	<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>Liste des annonces</title>
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<meta name="description" content="service d'aide a la personne">
<meta name="author" content="Bantou telecom">
<!-- Stylesheets -->
<link href="../css2/prettyPhoto.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" id="camera-css"  href="../css2/camera.css" type="text/css" media="all">
<link href="../css2/bootstrap.css" rel="stylesheet">
<link href="../css2/site.css" rel="stylesheet">
<link href="../css2/site2.css" rel="stylesheet">
<link href="../css2/bootstrap-responsive.css" rel="stylesheet">

<!-- Font -->
<link href="../css/font.css" rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="container box_shadow">
		
		<!--header-->
		<div class="header">
			<div class="wrap">				
				<div class="container">
					<div class="fleft logo"><a href="index.php"><img src="../images/logo.png" alt="Help Service" /></a></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($_SESSION['email'])){?><?php echo $_SESSION['nom'];?></a>&nbsp;|&nbsp; <a href="../Help_deconnexion.php">Deconnexion!</a><?php }?>
					<!--menu-->
					
					<!--fin menu-->
					<div class="clear"></div>
				</div>
				
			</div>
		</div>
		<div class="page_container">
			<div class="separate"></div>
			<div class="row">
				<div class="span3">
					
					<ul class="param_list">
									  	
										<li class="selected"><a href="delai_essai.php">Gestion des délais</a></li>
										<li class="selected"><a href="liste_annonce.php">Gestion des annonces</a></li>
					</ul>
				</div>
				<div class="span12">
					<h3>Gestion des annonces</h3>
					<!-- bien vouloir placer votre tableau ici !! :) -->
                    <table  class="table tab-content"  width="100%">
  <tr>
    <th >Num</th>
    <th >Date publication</th>
    <th >Titre</th>
    <th >Auteur</th>
	<th >Emails</th>
    <th >Etat</th>
     <th >action</th>
  </tr>
  <?php while($row = mysql_fetch_array($query_ann)){ ?>
  <tr>
    <td><?php echo $i++;?></td>
    <td><?php echo date('d M Y', $row["date_jr"]);?></td>
    <td><?php echo $row["titre_annonce"];?></td>
     <td><?php $id =$row["id_compte"]; 
	 $name= mysql_query("select nom_user, prenom_user,Email from compte where id_compte=$id;");
	 $row1=mysql_fetch_array( $name);
	 echo $row1["nom_user"].'&nbsp;&nbsp;'.$row1["prenom_user"];?></td>
	 <td><?php echo $row1["Email"];?></td>
    <td><?php if($row["actif"]==0){echo 'D&eacute;sactiv&eacute;';}elseif($row["actif"]==1){echo 'Activ&eacute;';}?></td>
    <td><a href="detail_annonce.php?idsd=<?php echo $row["id_annonces"]; ?>">lire</a>&nbsp;</td>
  </tr>
  <?php } ?>
</table>

				</div>	
			</div>
		</div>	
	</div>
	<footer class="footer_bottom">
		<div class="container">
			<div class="copyright ">
                	Avotreservice &copy 2014 | R&eacute;alisation : 
                    <a href="http://www.bantoutelecom.com" target="_blank" >Bantou Telecom</a> 
                    | 
                    <a href="">Mentions l&eacute;gales</a>
                </div>
		</div>
	</footer>
</body>
</html>