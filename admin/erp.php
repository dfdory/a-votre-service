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
<title>erp:A votre service: activez desactivez annonce</title>
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
					<div class="fleft logo"><a href="index.php"><img src="../images/logo.png" alt="Help Service" /></a></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php if(isset($_SESSION['email'])){?><?php echo $_SESSION['nom'];?></a>&nbsp;|&nbsp; <a href="../Help_deconnexion.php">Deconnexion!</a><?php }?>
					<!--menu-->
					
					<!--fin menu-->
					<div class="clear"></div>
				</div>
				
			</div>
		</div>
        <!--//header-->
		<div class="container">
			<div class="div-content box-content">
				<div class="div-content-left innerDIV gest-left">
					<a href="delai_essai.php">
						<div class="delay-box">
							<span>
								<h3>Gestion des délai</h3><br/>
								
							</span>
						</div>
					</a>
				</div>
				<div class="div-content-right innerDIV gest-right">
					<a href="liste_annonce.php">
						<div class="annonce-box">
							<span>
								<h3>Gestion des annonces</h3><br/>
								
							</span>
						</div>
					</a>
				</div>
			</div>
		</div>
        
        
		
		 
		<!--page_container-->
		
		
		<!--//page_container-->
		
		<!--footer-->
		<!--//footer-->
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