<?php 
ob_start();
session_start();
require_once('connect_to_db.php'); 
if (!isset($_SESSION['nom'])) { header ("Location:Help_connexion.php"); }
$menu=mysql_query("SELECT *
FROM `service`");
$id_ss="";
$pag="";

 if(isset($_REQUEST['idmn'])){
 $id_ss=$_REQUEST['idmn'];
 }
 if(isset($_REQUEST['pag'])){
 $pag=$_REQUEST['pag'];
 }
$ss_query=mysql_query("select * from ss_service where id_service=$id_ss");
$ss_ville=mysql_query("select * from ville order by nom_ville ASC");
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
		<a href="index.php">Home</a><span>/</span>
	</div>
</div>
<h2 class="title">Informations supplementaires pour l'annonce:</h2>

		<div class="contact_form"> 
				<div id="note"></div>
				<div id="fields">
                 <?php if(isset($_GET['err']) && $_GET['err']==1){
								 echo "<strong><h4>Vous devez choisir au moins une competence</strong></h4>";
								 }
						?>
	              			
					<form id="" action="Help_Autre_Annonce_valide.php" method="post">
						
					<table>
															  <tr>
						  <!--  <td colspan="4" class="subHeader">Etat civil</td>-->
							<td colspan="4" class="subHeader">
							<?php if(isset($_SESSION['statut']) && $_SESSION['statut']==1 && $pag=4){?>
							Domaines dans lesquels vous souhaitez postuler
							<?php }elseif(isset($_SESSION['statut']) && $_SESSION['statut']==2&& $pag=5){?>
							Domaines dans lesquels vous souhaitez obtenir de l&rsquo;aide
							<?php }?>
							</td> 
						  </tr>
						  <?php 
									$count=1;
		$i=0;
									
									while($row1 = mysql_fetch_array($ss_query)){
									if ($count%3!=0){
									if($i==0){?>
									<tr><td><input type="checkbox" name="ss_service[]" value="<?php echo $row1['id_ss_service']?>" id="<?php echo $row1['id_ss_service']?>" />&nbsp;&nbsp;&nbsp;<?php echo $row1['nom_ss_service']?>&nbsp;&nbsp;&nbsp;</td>
									<?php $count++;
						             $i++;}
									else{?>
											<td><input type="checkbox" name="ss_service[]" value="<?php echo $row1['id_ss_service']?>" id="<?php echo $row1['id_ss_service']?>" />&nbsp;&nbsp;&nbsp;<?php echo $row1['nom_ss_service']?>&nbsp;&nbsp;&nbsp;</td>
									  <?php $count++;$i++;}
									}
									else{?>
									<td><input type="checkbox" name="ss_service[]" value="<?php echo $row1['id_ss_service']?>" id="<?php echo $row1['id_ss_service']?>" />&nbsp;&nbsp;&nbsp;<?php echo $row1['nom_ss_service']?>&nbsp;&nbsp;&nbsp;</td></tr>
								<?php 	 $count++;}?>
								<?php }?>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
						  <tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						  </tr>
												</table>
											Ville:  <select name="ville" required >
									  <option></option>
										<?php while($row_ville = mysql_fetch_array($ss_ville)){?>
										<option value="<?php echo $row_ville["nom_ville"];?>"><?php echo $row_ville["nom_ville"];?></option>
										<?php }?>
									 		
												 </select><br /><label>Boite postale: </label> <input class="span5" type="text" name="code_postal" value="" placeholder="Boite postale *"  /><br />
	              			 <label>Titre: </label><input class="span8" type="text" name="titre" value="" placeholder="N'incluez que les informations principale dans le titre. Par exemple : Cherche une nounou pour bebe de 2 mois" required /><br />
							<label>Description:</label>
							<textarea  class="span8" name="contenu" placeholder="Gardez votre description simple mais assurez vous d'inclure toutes les informations pertinentes telles que les responsabilites et les qualifications:" required ></textarea>
							<label>Periode:</label>
							<textarea  class="span8" name="periode" placeholder="Pr&eacute;cisez la periode de travail par exemple -R&eacute;gulier(indiquez les jours de travail) -Occasionnelle(Date de debut)-Exceptionnelle(Date de debut et date de fin):" required ></textarea>
							<label>Salaire horaire </label>
							<input class="span8" type="text" name="salaire" value="" placeholder="Precisez le minium et le maximun exemple : 500 &agrave;1500 "  required/><br />
							<label>informations supplementaires:</label>
							<textarea  class="span8" name="autreinfos" placeholder="Pr&eacute;cisez d'autre infos" ></textarea>
							<input type="hidden" name="id_service" value="<?php echo $id_ss; ?>" />
							<input type="hidden" name="pag" value="<?php echo $pag; ?>" />
												
												<div class="clear"></div>
												<label>Veuillez noter que dans l&rsquo;int&eacute;r&ecirc;t de notre communaut&eacute;, les annonces sont revues
par nos soins avant d&rsquo;&ecirc;tre post&eacute;es.</label>	
<input type="submit"  class="redBtn1" value="Poster l'annonce" />
												<div class="clear"></div>
												<div class="clear"></div>
					</form>
				</div>
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

