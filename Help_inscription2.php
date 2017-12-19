<?php 
ob_start();
session_start();
require_once('connect_to_db.php'); 

$menu=mysql_query("SELECT *
FROM `service`");
$_session['ins']=1;
//require_once('script.php');
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
					<div class="fleft logo"><a href="index.php"><img src="images/logo.png" alt="Help Service" /></a></div>
					<!--menu-->
					<div class="navbar fright">
					<nav id="main_menu">
							<div class="menu_wrap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													
							<ul class="nav sf-menu">
                            <li ><a href="index.php">accueil</a></li>
                            
							<?php 
								while($row_menu = mysql_fetch_array($menu)){
								$id_menu =$row_menu['id_services'];
								$ss_menu=mysql_query("SELECT *FROM `ss_service` where id_service= $id_menu LiMIT 0, 5");
								?>
								
								<li class="sub-menu first"><a href="javascript:{}"><?php echo $row_menu['nom_services'];?></a>
									<ul><?php while($row_ssmenu = mysql_fetch_array($ss_menu)){?>
										<li><a href=""><span>-</span><?php echo $row_ssmenu['nom_ss_service'];?></a></li>
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
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table table-bordered" >
        
        <?php	if (isset($_GET['uio'])) { $mail = $_GET['uio']; } ?>
        <tr>
          <td class="liens_menu4"><div align="center">F&eacute;licitations <span class="texte_accueil">
		  <?php if ( isset($_GET['skjshlkjvsjkvcjhvjhsdkjyvhljlbkbysdjhxjchsgbvuyebvqkustqbusdbvkuqkstydubvkiukvuqqebiviuqvybiequiqudyqv']) and ($_GET['skjshlkjvsjkvcjhvjhsdkjyvhljlbkbysdjhxjchsgbvuyebvqkustqbusdbvkuqkstydubvkiukvuqqebiviuqvybiequiqudyqv']='1') ) { echo $_GET['xfcg']." ".$_GET['xfgh']." ".$_GET['rtyu']; }
				elseif ( isset($_GET['skjshlkjvsjkvcjhvjhsdkjyvhljlbkbysdjhxjchsgbvuyebvqkustqbusdbvkuqkstydubvkiukvuqqebiviuqvybiequiqudyqv']) and ($_GET['skjshlkjvsjkvcjhvjhsdkjyvhljlbkbysdjhxjchsgbvuyebvqkustqbusdbvkuqkstydubvkiukvuqqebiviuqvybiequiqudyqv']='2') ) { echo $_GET['rtyu']; } ?>
		  </span> votre inscription a &eacute;t&eacute; enregistr&eacute;e avec succ&egrave;s.<br />
          <br /> un mail de confirmation vous a &eacute;t&eacute; envoy&eacute; &agrave; l'adresse <span class="texte_accueil"><?php if ( isset($_GET['skjshlkjvsjkvcjhvjhsdkjyvhljlbkbysdjhxjchsgbvuyebvqkustqbusdbvkuqkstydubvkiukvuqqebiviuqvybiequiqudyqv']) and ($_GET['skjshlkjvsjkvcjhvjhsdkjyvhljlbkbysdjhxjchsgbvuyebvqkustqbusdbvkuqkstydubvkiukvuqqebiviuqvybiequiqudyqv']='1') ) { echo $_GET['uio']; } ?></span>.<br /><br /> 
            V&eacute;rifier votre mail et cliquez sur le lien d'activation de votre compte pour terminer votre inscription.<br /><br /> 
            NB. V&eacute;rifier que le message n'est pas arriv&eacute; dans vos spams. <br /><br /><br />Merci, <br /><br />Cordialement.</div></td>
        </tr>
       
        
       
    </table>
			<?php echo '<meta http-equiv="refresh" content="10; URL=index.php">';?>
		</div>		
		
		<!--//page_container-->
		
		<!--footer-->
		<!--//footer-->
	</div>
		<footer class="footer_bottom" id="footers">
			<div class="container content-list">
            <?php $menu1=mysql_query("SELECT *
FROM `service`");
								while($row_menu = mysql_fetch_array($menu1)){
								$id_menu =$row_menu['id_services'];
								$ss_menu=mysql_query("SELECT *FROM `ss_service` where id_service= $id_menu");
								?>
				<div class="span">
					<span><?php echo $row_menu['nom_services'];?></span><br/>
					<ul><?php while($row_ssmenu = mysql_fetch_array($ss_menu)){?>
						<li><a href=""><?php echo $row_ssmenu['nom_ss_service'];?></a></li>
						<?php } ?>
					</ul>
				</div>
                <?php }
							?>
				
			</div>
			<div class="container">
				<div class="span5">
					<h2 class="title">Nous contacter</h2>
					<form action="#" method="post">
						<input type="text" placeholder="Nom" />
						<input type ="text" placeholder="email" />
						<textarea value="Message" placeholder="Message"></textarea>
					</form>
				</div>
				<div class="copyright">Avotreservice &copy 2014 | R&eacute;alisation : <a href="www.bantoutelecom.com" target="_blank" >Bantou Telecom</a> | <a href="">Mentions l&eacute;gales</a></div>
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
   	 
   
  <?php mysql_close();//include("http://www.egrappler.com/analytics.php");?>		
</body>
</html>

