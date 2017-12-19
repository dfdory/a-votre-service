<?php 
ob_start();
session_start();
require_once('../connect_to_db.php');
$ids="";
if(isset($_GET['idsd'])){$ids=$_GET['idsd'];}
$query=mysql_query("select * from annonce where id_annonces=$ids");

$row =mysql_fetch_array($query);
//$statut=$_SESSION['statut'];
//require_once('../script.php');
?>
<html>
	

<head>
<meta charset="utf-8" />
<title>A votre service: activez desactivez annonce</title>
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<meta name="description" content="">
<meta name="author" content="">
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
				<div class="span9"><h3>Détail de l'annonce</h3>
					<form id="" action="activer_annonce.php" method="post"> 
						
						<label>Ville:</label><input class="span8" type="text" name="ville" value="<?php echo $row['ville'];?>" disabled required /><br>
					   <label>Boite postale: </label> 
                       <input class="span8" type="text" name="code_postal" value="<?php echo $row['code_postale']; ?>"   required/><br>
					    <label>Titre: </label><input class="span8" type="text" name="titre" value="<?php echo $row['titre_annonce']; ?>" required /><br>
						<label>Description:</label>
							<textarea  class="span8" name="contenu" value="" required ><?php echo $row['contenu']; ?></textarea>
                            <label>Periode:</label>
							<textarea  class="span8" name="periode" value="" required ><?php echo $row['periode']; ?></textarea>
						<label>Salaire par heure</label>
							<input class="span8" type="text" name="salaire" value="<?php echo $row['salaire_horaire']; ?>"  required/><br />
						<label>Autre informations:</label>
							<textarea  class="span8" name="autreinfos" value="" ><?php echo $row['autre_infos']; ?></textarea><br>
						<input type="hidden" name="id_service" value="<?php echo $row['id_services']; ?>" />
                        <input type="hidden" name="id_deposant" value="<?php echo $row['id_compte']; ?>" />
                        <input type="hidden" name="id_annonce" value="<?php echo $row['id_annonces']; ?>" />
						<div class="clear"></div>
						<div class="item_description">
                            
							<input type="submit"  class="redBtn1" value="Activité" />
                            <a href="desactiver.php?id_SDS=<?php echo $row['id_annonces']; ?>&id_AAdc=<?php echo $row['id_compte']; ?>" class="redBtn11" >Désactivé</a>
                        </div>
						<div class="clear"></div>
					</form>
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