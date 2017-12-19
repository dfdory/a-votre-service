<?php 
ob_start();
session_start();
require_once('connect_to_db.php'); 

$menu=mysql_query("SELECT *
FROM `service`");
$ss_ville=mysql_query("select * from ville"); 

$ss_service=mysql_query("SELECT *
FROM `service`"); 
$id_details=" ";
if(isset($_GET['mmd'])){
 $id_details=$_GET['mmd'];
 }

$query_profil=mysql_query("select * from compte where compte.id_compte=$id_details");
$query_ss_service=mysql_query("select * from compte_service where id_compte=$id_details");
$delai=$_SESSION['date_expir'];
$jj=mktime(date('H'),date('i'),05,date('m'),date('d'),date('Y'));
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
		<div class="breadcrumb">
				<div>
					<a href="index.php">Home</a><span>/</span><a href="Help_Autres_Annonce.php">Cr&eacute;ez maintenant une annonce</a><span>/</span>
				</div>
				
			</div>
	<div class="widget">
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
                                </div>
	<h2 class="title">D&eacute;tail </h2>
	<div>
								<?php 
								
								
								while($result = mysql_fetch_array($query_profil)){ 
								$nbrevue =$result['nbre_vue']+1;
								mysql_query("update compte set nbre_vue=$nbrevue where compte.id_compte=$id_details");?> 
								
								
	                       <table class="table table-striped table-bordered table-condensed">
 		<tr>
			<td rowspan="3">
            <?php if($result['photo']==""){ ?>
            
             <img src="images/profils/default_visage.jpg" />
            <?php } 
			else{
			?>
           <img src="images/profils/big_<?php echo $result['photo'];?>" />
			<?php }
			?>
            </td>
			<td><?php echo $result['prenom_user'];?>&nbsp;<?php echo $result['nom_user'];?></td>
			<td><?php if($jj<=$delai){echo $result['num_tel']; }
else{echo ' Non disponible';}?></td>
			<td><?php if($jj<=$delai){echo $result['Email']; }
else{echo ' Non disponible';} ?></td>
		</tr>
		<tr>
			<td>BP:
			<?php 
				if($result['code_postal']==""){ echo "pas de code postale &nbsp;";}
				else{echo $result['code_postal']."&nbsp;";}
			if($result['ville']==""){echo "pas de ville &nbsp;";}else{echo $result['ville'];}?> </td>
			<td><?php 
				if($result['date_naiss']==""){ echo "pas de date de naissance &nbsp;";}
				else{echo "Nee le &nbsp;".$result['date_naiss']."&nbsp;";}?></td>
			<td><?php 
				if($result['estimation_paie']==""){ echo "&agrave; negocier &nbsp;";}
				else{echo $result['estimation_paie']."&nbsp;";}?></td>
		</tr>
		 <tr>
			<td><?php 
				if($result['derniere_connexion']==""){ echo "non connect&eacute; &nbsp;";}
				else{echo  "Derniere connexion : &nbsp;". date('d M Y',  $result['derniere_connexion']) ."&nbsp;";}?></td>
			 <td><?php 
				if($result['nbre_anne_exper']==""){ echo "0";}
				else{echo $result['nbre_anne_exper']."&nbsp; ans d'experience";}?></td>
			<td><?php 
				if($result['date_inscription']==""){ echo "0";}
				else{echo "membre depuis  le &nbsp;". $result['date_inscription']."&nbsp;";}?></td> 
		 </tr>
		 <tr><td colspan="4"><h4>Domaines de competences:</h4>
		 <ul>
		 <?php 
		 while($result1 = mysql_fetch_array($query_ss_service)){
		  $id_ss=$result1["id_ss_service"];
		  $nm_ss=mysql_query("select nom_ss_service from ss_service where id_ss_service=$id_ss;");
		  	$row_ss= mysql_fetch_array($nm_ss);?>
			<li>-&nbsp;<?php echo $row_ss["nom_ss_service"];?></li>
			<?php
		  }?>
		
				
		</ul></td></tr>
		 <tr><td colspan="4"><h4>&Agrave; propos de <?php echo $result['prenom_user'];?>&nbsp;:</h4><?php 
				if($result['description_tache']==""){ echo "RAS";}
				else{echo $result['description_tache']."&nbsp;";}?></td></tr>
		 
</table>		
	<?php if($jj<=$delai){?><li><a href="Help_Annonce.php?pp=7&idsd=<?php echo $result['id_compte'];?>&idmsg=0"><div class="greenBtn1">Laissez un message </div></a></li><?php }
else{echo '<a href="Help_Annonce.php?&pp=10"> pour laisser un message veuillez payer votre abonnement mensuel</a>';}?>							
	
	<?php }
								?>
		</div>
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

