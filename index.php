<?php 
ob_start();
session_start();
require_once('connect_to_db.php'); 

$menu=mysql_query("SELECT *
FROM `service`");
//http://www.sciences.ch/dwnldbl/divers/AdbIllustrator.pdf ///if(isset($_SESSION['prenom'])){echo $_SESSION['prenom']; }else{echo "pas de session";}
/*$tt =date('j-M-Y');
echo $tt;
$date = date_create_from_format('j-M-Y', $tt);
echo date_format($date, 'Y-m-d');*/
//require_once('script.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title>Service d'aide &agrave; la personne</title>
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<meta name="description" content="Vous rechercher de l'aide pour vos enfants, vos parents ou pour vous meme, un seul endroit www.Avotreservice.cm">
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
		<div class="container">
				<!--slider-->
				<div id="main_slider">
					<div class="camera_wrap" id="camera_wrap_1">
							<div data-src="images/slider/slide1.jpg">
								<div class="camera_caption fadeIn">
									<div class="slide_descr">Trouvez un prestataire<br/>pres de chez vous en quelques clics</div>
								</div>
							</div>
							<div data-src="images/slider/slide2.jpg">
								<div class="camera_caption fadeIn">
									<div class="slide_descr">Simplifiez-vous la vie au quotidien<br/></div>
								</div>
							</div>
							<div data-src="images/slider/slide3.jpg">
								<div class="camera_caption2 fadeIn">
									<!--<div class="slide_descr">Your Lead-Generation Partner<br/>With a Vision</div>-->
								</div>
							</div>
							
						</div><!-- #camera_wrap_1 -->
						<div class="clear"></div>	
					<div class="main_connexion"><div align="left" class="redBtn2 light_con_box">
							<a href="Help_connexion.php">Connexion</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="Help_inscription.php">Inscrivez vous maintenant!</a>	</div>
							<div class="main_slider_form">
								<form id="" action="Help_inscription_valide.php" method="post"> <h3>Inscrivez-vous gratuitement !</h3>
									<p><input type="radio" name="choix" value="1" class="choix" style="margin-top:-3px;" required>Je propose de l'aide &nbsp;&nbsp;
									<input type="radio" name="choix" value="2" class="choix" style="margin-top:-3px;" required>Je cherche de l'aide
									</p>
									<select name="civilite" required >
										
										<option value="Mademoiselle">Mademoiselle</option>
										<option value="Madame">Madame</option>
										
										<option value="Monsieur">Monsieur</option>
									</select><br>
									  <input class="span4" type="text" name="nom" value="" placeholder="Nom*" required/><br>
									  <input class="span4" type="text" name="prenom" value="" placeholder="Prenom*"  required/><br>
									  <input class="span4" type="email" name="email" value="" placeholder="Email*" required/><br>
									  <input class="span4" type="password" name="password" value="" placeholder="password*" required/><br><div class="clear"></div>
									<div class="item_description">
										<input type="submit"  class="redBtn1" value="S'inscrire Gratuitement" />
									</div>
									  <div class="clear"></div>
								</form>
							</div>
					</div>
				
				<!--<img src="images/slider/slide1.jpg">-->
					<div class="clear"></div>
						
				</div>
				<!--//slider-->
</div>
<div id="howItWorks" class="howItWorksContent clearfix">

			<div class="row">
                    <!-- portfolio_block -->
					
                    <div class="projects">
						<div class="head-desc desc-first">
							<span >
								<h4 class="title2">CE QUE NOUS OFFRONS :</h4>
							</span>
						</div>					
					
					<div class="service2">&nbsp;</div>   
					<div class="container content-list2">
            <?php  $menu1=mysql_query("SELECT *FROM `service`");
								while($row_menu = mysql_fetch_array($menu1)){
								$id_menu =$row_menu['id_services'];
								$ss_menu=mysql_query("SELECT *FROM `ss_service` where id_service= $id_menu");
								?>
				<div class="span">
					<span><article><span><div class="dd"><?php echo $row_menu['nom_services'];?></div></span></article></span><br/>
					
				</div>
				
                <?php }
							?>
			</div>
			<div class="service2">&nbsp;</div>
			
			
					<div class="clear"></div>                              
                        
						
						 
                                                
                        <div class="clear"></div>
                    </div>  
					
                    <!-- //portfolio_block -->   
                </div>
				
			
                    
						<section class="working">
				<div class="head-desc">
					<span >
						<h4 class="title2">COMMENT CA MARCHE : </h4>
					</span>
				</div>
				<div class="all-tabs">
					<div class="head-tabs">
						<div class="help">
							<div class="titre">
								<span>Besoin d&rsquo;aide ?</span>
							</div>
						</div>
						<div class="job-help">
							<div class="titre">
								<span>Vous cherchez un emploi ?</span>
							</div>
						</div>
					</div>
					<div class="content">
						<div class="help-side">
							<div class="line-one">
								<div>
									<figure>
										<img src="images2/6.png" />
									</figure>
									<span class="textH">INSCRIVEZ-VOUS</span><br/>
									<div>
										<span class="textF">Cr&eacute;ez un compte, c&rsquo;est simple et rapide</span>
									</div>
								</div>
							</div>
							<div class="sepa-img left">
								<img src="images/arrow-left.png" />A
 							</div>
							<div class="line-twos">
								<div>
									<figure>
										<img src="images2/6.png" />
									</figure>
									<span class="textH">D&eacute;poser une annonce</span><br/>
									<div>
										<span class="textF">R&eacute;ponse sous quelques jours
										</span>
									</div>
								</div>
							</div>
							<div class="sepa-img right">
								<img src="images/arrow-right.png" />
 							</div>
							<div class="line-three line">
								<div>
									<figure>
										<img src="images2/6.png" />
									</figure>
									<span class="textH">Consultez les profils </span><br/>
									<div>
										<span class="textF">
											S&eacute;lectionnez ceux qui correspondent &agrave; vos attentes
										</span>
									</div>
								</div>
							</div>
							<div class="sepa-img left">
								<img src="images/arrow-left.png" />
 							</div>
							<div class="line-four line">
								<div>
									<figure>
										<img src="images2/6.png" />
									</figure>
									<span class="textH">Trouvez un intervenant</span><br/>
									<div>
										<span class="textF">
											Faites passer les entretiens et trouvez votre aide parfaite pour le quotidien
										</span>
									</div>
								</div>
							</div>
							<div class="last-line line" >
								<div class="button">
									<span><a href="Help_inscription.php">Trouvez de l&rsquo;aide </a></span>
								</div>
							</div>
						</div>
						<div class="job-help-side">
							<div class="line-one line">
								<div>
									<figure>
										<img src="images2/6.png" />
									</figure>
									<span class="textH">INSCRIVEZ-VOUS</span><br/>
									<div>
										<span class="textF">Cr&eacute;ez un compte, c&rsquo;est simple et rapide</span>
									</div>
								</div>
							</div>
							<div class="sepa-img right">
								<img src="images/arrow-right.png" />
 							</div>
							<div class="line-twos">
								<div>
									<figure>
										<img src="images2/6.png" />
									</figure>
									<span class="textH">Cr&eacute;ez un profil</span><br/>
									<div>
										<span class="textF">D&eacute;crivez vos comp&eacute;tences
											Sortez du lot avec une photo et des documents
										</span>
									</div>
								</div>
							</div>
							<div class="sepa-img left">
								<img src="images/arrow-left.png" />
 							</div>
							<div class="line-three line">
								<div>
									<figure>
										<img src="images2/6.png" />
									</figure>
									<span class="textH">Consultez les offres</span><br/>
									<div>
										<span class="textF">
											De nouvelles annonces sont post&eacute;es r&eacute;guli&egrave;rement !
										</span>
									</div>
								</div>
							</div>
							<div class="sepa-img right">
								<img src="images/arrow-right.png" />
 							</div>
							<div class="line-four line">
								<div>
									<figure>
										<img src="images2/6.png" />
									</figure>
									<span class="textH">Trouvez un emploi</span><br/>
									<div>
										<span class="textF">
											Postulez aux offres qui vous correspondent et voil&agrave; !
										</span>
									</div>
								</div>
							</div>
							<div class="last-line line" >
								<div class="button">
									<span><a href="Help_inscription.php">Trouvez un emploi </a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<div class="separate">
				
			</div>
			<section class="description">
				<div class="head-desc">
					<span >
						<h4 class="title2">QUI SOMMES NOUS ? </h4>
					</span>
				</div>
				<div class="prestation">
					<div class="imgPres">
						<img src="images/apropos (4).png" />
					</div>
					<div class="textPres">
						<span><p style="text-align: justify;">
	<span style="font-size:13px;"><span style="color: rgb(102, 102, 102); font-family: 'Trebuchet Ms'; line-height: 20px; text-indent: 5px;">Avotreservice.cm est une plateforme qui met en relation des personnes recherchant de l&#39;aide &agrave; domicile avec des prestataires capables de leur apporter des solutions dans les domaines suivants: Auxillaire de vie, Aide m&eacute;nag&egrave;re, Garde d&rsquo;Enfants, Cours particuliers, Jardinage/Bricolage.</span></span></p></span>
    
    					
                        <div class="">
                            <h2 class="title1">Nous contacter</h2>
                            <div class="contact_form"> 
            <div id="note"></div>
                <div id="fields">
                    <div class="page_container">
                        <form action="HelpContact.php" method="post">
                      
                            <input class="span4" type="text" placeholder="Nom*" name="name" required />
                            <input class="span4" type="text" placeholder="Sujet*" name="sujet" required />
                             <input class="span4" type ="email" placeholder="Email*" name="email" required/>
                             
                             <textarea class="span6" value="Message" placeholder="Message" name="message" required></textarea>
                             <div class="clear"></div>
                                                <input type="reset" class="contact_btn" value="Annuler" />
                                                <input type="submit" class="contact_btn" value="envoyer" />
                                                <div class="clear"></div>
                        </form>
                     </div>
                </div>
        </div>
						</div>
					</div>
                    
				</div>
                
			</section>
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

