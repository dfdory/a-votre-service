<?php
ob_start();
session_start();
//require_once('../script.php');
?>
<html>
	<!DOCTYPE html>
<html lang="en">

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
				<div class="span9"><h3>Gestion des délais</h3>
                date du jour en seconde:
<?php 
 echo mktime(date('H'),date('i'),05,date('m'),date('d'),date('Y'));
if(isset ($_GET['err']) && $_GET['err']==1){echo 'enregistrement ok';} 
elseif(isset ($_GET['err']) && $_GET['err']==2){echo 'enregistrement pas ok';}
?>
					<form action="save_delai.php" method="post"> 
						
						<label>Delai 1</label><br>
						<input  type="text" name="delai" value="" placeholder="delai pour les chercheurs d'aides"  required/><br>
						<label>Delai 2</label><br>
						<input type="text" name="delai1" value="" placeholder="delai pour les chercheurs d'emploi"  required/><br>
						<div class="clear"></div>
						<div class="item_description">
                            <input type="submit"  class="redBtn1" value="Ok" />
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