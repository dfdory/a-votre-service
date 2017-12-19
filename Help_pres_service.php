<?php 
ob_start();
session_start();
require_once('connect_to_db.php'); 
if (!isset($_SESSION['nom'])) { header ("Location:Help_connexion.php"); }
$menu=mysql_query("SELECT *
FROM `service`");
$pag="";
	
$request=mysql_query("SELECT *
FROM `service");
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>Service d'aide &agrave; la personne</title>
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<meta name="description" content="Vous rechercher de l'aide pour vos enfants, vos parents ou pour vous meme, un seul endroit www. Avotreservice.cm">
<meta name="author" content="Bantou telecom">
<!-- Stylesheets -->
<link href="css2/prettyPhoto.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" id="camera-css"  href="css2/camera.css" type="text/css" media="all">
<link href="css2/bootstrap.css" rel="stylesheet">
<link href="css2/site.css" rel="stylesheet">
<link href="css2/bootstrap-responsive.css" rel="stylesheet">

<!-- Font -->
<link href="css/font.css" rel='stylesheet' type='text/css'>



<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<body data-post="free-responsive-html5-businessportfolio-template-amazingbiz">
	<div class="container box_shadow">
		
		<!--header-->
		<div class="header">
			<div class="wrap">				
				<div class="container">
					<div class="fleft logo">
                    <a href="index.php"><img src="images/logo.png" alt="Help Service" /></a></div>
					<!--menu-->
					<div class="navbar fright">
					<nav id="main_menu">
							<div class="menu_wrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<?php if(isset($_SESSION['nom'])){?><?php echo $_SESSION['nom'];?></a>&nbsp;|&nbsp;<a href="Help_Annonce.php" title="Voir profil">Mon compte</a>&nbsp;|&nbsp; <a href="Help_deconnexion.php">Deconnexion!</a><?php }?>													
							
							<ul class="nav sf-menu">
                           <li><a href="index.php"><img src="images/home.jpg"></a></li>
                            
							<?php 
								while($row_menu = mysql_fetch_array($menu)){
								$id_menu =$row_menu['id_services'];
								$ss_menu=mysql_query("SELECT *FROM `ss_service` where id_service= $id_menu LiMIT 0, 5");
								?>
								
								<li class="sub-menu first"><a href="javascript:{}"><?php echo $row_menu['nom_services'];?></a>
									<ul><?php while($row_ssmenu = mysql_fetch_array($ss_menu)){?>
										<li><a href="Help_ser_list_profil.php?me=<?php echo $row_menu['id_services'];?>&ss_me=<?php echo $row_ssmenu['id_ss_service'];?>"><span>-</span><?php echo $row_ssmenu['nom_ss_service'];?></a></li>
									<?php } ?>
									</ul>
								</li>
								
							<?php }
							?>
							
							</ul>
								
							</div>
						</nav>
				</div>
					<!--fin menu-->
					<div class="clear"></div>
				</div>
				
			</div>
		</div>
        <!--//header-->
        
        
		
		 
		<!--page_container-->
		<div class="page_container">
        <?php
        if(isset($_GET['page'])&& $_GET['page']==4){include('content_service.php');}
		elseif(isset($_GET['page'])&& $_GET['page']==5){include('content_service.php');}
		elseif(isset($_GET['page'])&& $_GET['page']==6){include('help_ser_inscript_em.php');}
		elseif(isset($_GET['page'])&& $_GET['page']==7){include('Help_ser_inscript_suite.php');}
		?>
		</div>		
		
		<!--//page_container-->
		
		<!--footer-->
		<!--//footer-->
	</div>
		<footer class="footer_bottom" id="footers">
			<div class="container content-list">
            <?php $menu1=mysql_query("SELECT *
FROM `service`"); //var_dump( $menu1); echo mysql_error();exit;
								while($row_menu = mysql_fetch_array($menu1)){
								$id_menu =$row_menu['id_services'];
								$ss_menu=mysql_query("SELECT *FROM `ss_service` where id_service= $id_menu");
								?>
				<div class="span">
					<span class="copyright"><?php echo $row_menu['nom_services'];?></span><br/>
					<ul><?php while($row_ssmenu = mysql_fetch_array($ss_menu)){?>
						<li><a href="Help_ser_list_profil.php?me=<?php echo $row_menu['id_services'];?>&ss_me=<?php echo $row_ssmenu['id_ss_service'];?>"><?php echo $row_ssmenu['nom_ss_service'];?></a></li>
						<?php } ?>
					</ul>
				</div>
                <?php }
							?>
				
			</div>
			<div class="container">
				
				<div class="copyright ">
                	Avotreservice &copy 2014 | R&eacute;alisation : 
                    <a href="http://www.bantoutelecom.com" target="_blank" >Bantou Telecom</a> 
                    | 
                    <a href="">Mentions l&eacute;gales</a>
                </div>
			</div>
		</footer>

	<script src="js2/jquery.min.js"></script>
    <script type="text/javascript" src="js2/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js2/jquery.mobile.customized.min.js"></script>
    <script type="text/javascript" src="js2/camera.js"></script>
    <script src="js2/bootstrap.js"></script>
    <script src="js2/superfish.js"></script>
    <script type="text/javascript" src="js2/jquery.prettyPhoto.js"></script>
    <script src="js2/htweet.js" type="text/javascript"></script>
    <script type="text/javascript" src="js2/custom.js"></script>
   	 
   
  <?php 
  mysql_close();//include("http://www.egrappler.com/analytics.php");?>		
</body>
</html>

