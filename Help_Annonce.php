<?php 
ob_start();
session_start();
require_once('connect_to_db.php'); 

$menu=mysql_query("SELECT *
FROM `service`");
if (!isset($_SESSION['nom'])) { header ("Location:Help_connexion.php"); }

$ss_ville=mysql_query("select * from ville"); 

$ss_service=mysql_query("SELECT *
FROM `service`"); 
$id="";
if(isset($_SESSION['id'])){$id=$_SESSION['id'];
$tof=mysql_query("select * from compte where id_compte = $id;");}
$statut=$_SESSION['statut'];
//echo $statut;
$delai=$_SESSION['date_expir'];
$jj=mktime(date('H'),date('i'),05,date('m'),date('d'),date('Y'));
//echo date('d m y H:i:s',$delai) ;
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
		<?php if($statut==2){
?>
				

                <div class="breadcrumb">
					<div>
						<a href="index.php">Home</a><span>/</span><a href="Help_Autres_Annonce_suite.php">Cr&eacute;ez maintenant <em>une annonce</em></a>
						<br/>
					</div>
				
				</div>
				<div class="widget"><h4>Chercher</h4>
                                	<form class="form-search" action="help_search.php" method="post">
									<select name="service" required >
									  	
										<?php while($row_service = mysql_fetch_array($ss_service)){?>
										<option value="<?php echo $row_service["id_services"];?>"><?php echo $row_service["nom_services"];?></option>
										<?php }?>
									  </select>
                                        <select name="ville" required >
									  	
										<?php while($row_ville = mysql_fetch_array($ss_ville)){?>
										<option value="<?php echo $row_ville["nom_ville"];?>"><?php echo $row_ville["nom_ville"];?></option>
										<?php }?>
									  </select>
                                        <button type="submit" class="redBtn1">c'est parti! &diams;</button>
                                     </form>
                                     <div align="center"><?php if($jj>=$delai){?><a href="?page=10&pp=10"> <img src="images/non_paye.png" /></a><?php }?></div>
				</div>
						
				<div class="row">
							    <div class="span3 ">
									  <?php if(isset($_SESSION['email'])){?>Bonjour &nbsp;<?php echo $_SESSION['prenom'];} 
									  
									  $rowtof=mysql_fetch_array($tof); 
									  $ville=$rowtof["ville"];
									 
									  if($rowtof["photo"]==""){
									  ?><div class="tof cadre2"><h4>Ajouter une photo <br />de profil</h4><form action="Help_tof.php" enctype="multipart/form-data" method="post">
									  <input name="photo" type="file" value="Parcourir mon ordinateur"/><input type="submit" value="OK" />
									  </form></div><?php }else{?> <div class="cadre2"><img src="images/profils/<?php echo $rowtof["photo"];?>" /></div><?php }?>	
                                      <div >
									  <ul class="param_list">
									  	<li class="selected"><a href="Help_Annonce.php">Mon Compte<img  src="./images2/project.png"class="compte"/></a></li>
										
										<?php if($jj<=$delai){?><li class="two"><a href="?page=10&pp=8">Mes Messages<img src="./images2/mesg.png" class="msg"/></a></li><?php }?>										
										<li class="three"><a href="?page=10&pp=5">Mes Candidatures <img  src="./images2/candidat.png" class="cand" /></a></li>
										<!--<li><a href="#">Mes photos</a></li>-->
										<li  class="for"><a href="?page=10&pp=1">Informations et parametres<img src="./images2/advanced.png"  class="param"/></a></li>
									  </ul>
									  </div>
                                      <div class="cadre2">
									  <h4>Vous allez faire passer un entretien ?</h4>

											<span>
											N'oubliez pas de :
											<ul class="list-unforget">
												<li>Demander une copie de la carte d'identit&eacute;</li>
												<li>V&eacute;rifier les dipl&ocirc;mes</li>
												<li>Contacter les r&eacute;f&eacute;rences</li>
											</ul>
                                          
										</span>
                                        </div>
									  </div>
							    <div class="span9 ">
									 <?php 
									 if(isset($_REQUEST['pp'])&& $_REQUEST['pp']==1){include('Help_infos_parametre.php');}
									 elseif(isset($_REQUEST['pp'])&& $_REQUEST['pp']==2){include('Help_infos_modif_param.php');}
									  elseif(isset($_REQUEST['pp'])&& $_REQUEST['pp']==3){include('Help_infos_Annonce.php');}
									  elseif(isset($_REQUEST['pp'])&& $_REQUEST['pp']==4){include('Help_infos_Annonce_detail.php');}
									  elseif(isset($_REQUEST['pp'])&& $_REQUEST['pp']==5){include('Help_infos_candidature.php');}
									  elseif(isset($_REQUEST['pp'])&& $_REQUEST['pp']==6){include('Help_infos_candidature_detail.php');}
									   elseif(isset($_REQUEST['pp'])&& $_REQUEST['pp']==7){include('Help_messagerie.php');}
									   elseif(isset($_REQUEST['pp'])&& $_REQUEST['pp']==8){include('Help_list_message.php');}
									    elseif(isset($_REQUEST['pp'])&& $_REQUEST['pp']==9){include('Help_list_message_detail.php');}
										 elseif(isset($_REQUEST['pp'])&& $_REQUEST['pp']==10){include('Help_espace_paiement.php');}
									 else{?>
									  <h2 class="title">Bienvenue sur A votre Service !</h2>
										  <p><h4>
										  	Que vous cherchez de l&rsquo;aide pour vos enfants, parents, animaux ou votre maison, vous &ecirc;tes au bon endroit ! Ceci est votre tableau de bord. Vous pourrez y g&eacute;rer les informations de votre compte, lire vos messages et cr&eacute;er des annonces.
										  </h4>
									  </p>
									  <div class="span3 main_slider_form cadre1">
									  	<h3>Intervenant pres de chez vous</h3>
										<h4>Intervenants autour de <?php echo $rowtof["ville"];?></h4><?php
										$inter=mysql_query("select * from compte where id_compte != $id and  `ville` LIKE '$ville' and choix=1;");
										$num=mysql_num_rows($inter);
										if($num==0){?><p>Malheureusement, aucun membre ne correspond &agrave; vos crit&egrave;res de recherche. Nous recherchons en permanence de nouveaux intervenants, revenez donc v&eacute;rifier r&eacute;guli&egrave;rement.</p>

<p>Si vous avez fait une recherche avanc&eacute;e, essayez d&rsquo;&eacute;largir vos crit&egrave;res.</p> <?php }
										else{
											while($row_inter= mysql_fetch_array($inter)){?>
												<ul class="list-unforget">
													<li><a href="?page=9&mmd=<?php echo $row_inter['id_compte'];?>"><?php echo $row_inter["nom_user"];?></a></li>
												</ul>
											<?php }
										}?>
									</div>
									  <div class="span3 main_slider_form cadre1">
										  <h3>Vos Annonces</h3>
										  <h4>D&eacute;poser une annonce pour trouver de l&rsquo;aide</h4>
										  	<a href="Help_Autres_Annonce.php"><div class="redBtn1">D&eacute;posez </div></a>
											<a href="?page=10&pp=3">voir toutes mes annonces</a>
									  </div>
									  <?php }?>
									  <!--<div class="span3 offset4 main_slider_form"><h4>Vos Messages</h4></div>
									  </div>-->
							</div>
							</div>
	<?php } elseif($statut==1) {?>
	
	   <div class="breadcrumb">
					<div>
						<a href="index.php">Home</a><span></span><!--<a href="?page=11">Cr&eacute;ez maintenant <em>une annonce</em></a>-->
						<br/>
					</div>
				
				</div>
				<div class="widget"><h4>Chercher</h4>
                                	<form class="form-search" action="help_search.php" method="post">
									<select name="service" required >
									  	
										<?php while($row_service = mysql_fetch_array($ss_service)){?>
										<option value="<?php echo $row_service["id_services"];?>"><?php echo $row_service["nom_services"];?></option>
										<?php }?>
									  </select>
                                        <select name="ville" required >
									  	
										<?php while($row_ville = mysql_fetch_array($ss_ville)){?>
										<option value="<?php echo $row_ville["nom_ville"];?>"><?php echo $row_ville["nom_ville"];?></option>
										<?php }?>
									  </select>
                                        <button type="submit" class="redBtn1">c'est parti! &diams;</button>
                                     </form>
                                     <div align="center"><?php if($jj>=$delai){?><a href="?page=10&pp=10"> <img src="images/non_paye.png" /></a><?php }?></div>
				</div>
	<div class="row">
		<div class="span3">
									  <?php if(isset($_SESSION['email'])){?>Bonjour &nbsp;<?php echo $_SESSION['prenom'];} 
									  
									  $rowtof=mysql_fetch_array($tof); 
									  $ville=$rowtof["ville"];
									 
									  if($rowtof["photo"]==""){
									  ?><div class="tof cadre2"><h4>Ajouter une photo <br />de profil</h4><form action="Help_tof.php" enctype="multipart/form-data" method="post">
									  <input name="photo" type="file" value="Parcourir mon ordinateur"/><input type="submit" value="OK" />
									  </form></div><?php }else{?>  <div class="cadre2"><img src="images/profils/<?php echo $rowtof["photo"];?>" /></div><?php }?>	
									  <ul class="param_list">
									  	<li><a href="Help_Annonce.php">Mon Compte <img  src="./images2/project.png"class="compte"/></a></li>
										<?php if($jj<=$delai){?><li><a href="?page=10&pp=8">Mes Messages <img  src="./images2/mesg.png"class="msg"/></a></li><?php }?>
										<li><a href="?page=10&pp=6">Mes Candidatures<img  src="./images2/candidat.png"class="cand"/></a></li>
										<li><a href="?page=10&pp=3">mes annonces<img  src="./images2/project.png"class="Profil_ann"/></a></li>
										<li><a href="?page=10&pp=5">voir toutes les annonces <img  src="./images2/project.png"class="Profil_ann"/></a></li>
						
										<li><a href="?page=10&pp=1">Informations et parametres</a></li>
									  </ul>
									  
									  
									  </div>
		<div class="span9">
									 <?php 
									 if(isset($_REQUEST['pp'])&& $_REQUEST['pp']==1){include('Help_infos_parametre.php');}
									 elseif(isset($_REQUEST['pp'])&& $_REQUEST['pp']==2){include('Help_infos_modif_param.php');}
									elseif(isset($_REQUEST['pp'])&& $_REQUEST['pp']==3){include('Help_infos_Annonce_em.php');}
									  elseif(isset($_REQUEST['pp'])&& $_REQUEST['pp']==4){include('Help_infos_Annonce_detail.php');}
									  elseif(isset($_REQUEST['pp'])&& $_REQUEST['pp']==5){include('Help_infos_Annonce_em_tous.php');}
									  elseif(isset($_REQUEST['pp'])&& $_REQUEST['pp']==6){include('Help_infos_Annonce_candidature.php');}
									  elseif(isset($_REQUEST['pp'])&& $_REQUEST['pp']==7){include('Help_messagerie.php');}
									  elseif(isset($_REQUEST['pp'])&& $_REQUEST['pp']==8){include('Help_list_message.php');}
									   elseif(isset($_REQUEST['pp'])&& $_REQUEST['pp']==9){include('Help_list_message_detail.php');}
									   elseif(isset($_REQUEST['pp'])&& $_REQUEST['pp']==10){include('Help_espace_paiement.php');}
									 else{?>
									  <h2 class="title">Bienvenue sur A votre Service !</h2>
										  <p><h4>
										  	Vous cherchez un emploi dans les services &agrave; la personne ? Vous &ecirc;tes au bon endroit ! Ceci est votre tableau de bord. Vous pourrez y g&eacute;rer les informations de votre compte, lire vos messages et vos profils en ligne.
										  </h4>
									  </p>
									  <div class="span3 main_slider_form cadre1">
									  	<h3>Mes statiques </h3><h5>(Des 7 derniers jours)</h5>
										<?php
									$jr=mktime(date('H'),date('i'),05,date('m'),date('d'),date('Y'))-(7*24*60*60);
										$inter=mysql_query("select * from compte where id_compte != $id and  `ville` LIKE '$ville' and choix=2 and  `date_inscription`>=$jr;");
										$inter1=mysql_query("select * from messages where id_recu_par=$id and date_mess>=$jr;");
										
										$row_inter= mysql_num_rows($inter);
										$row_inter1= mysql_num_rows($inter1);?>
											<ul class="list-unforget">
												<li><?php echo $row_inter;?> nouvelle(s) famille(s) proche de chez toi</li> 															 												<li><?php echo $row_inter1;?> nouveau(x) message(s)</li>
											</ul>
											
									</div>
									  <div class="span3 main_slider_form cadre1">
										  <h3>Mon profil</h3>
										  <h4>Votre profil</h4>
										  	<a href="Help_pres_service.php?page=7"><div class="redBtn1">Ajouter un profil </div></a>
											
									  </div>
									  <?php }?>
									 
							</div>
	</div>
	<?php } ?>
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

