<?php 
ob_start();
session_start();
require_once('connect_to_db.php');
$id="";
if(isset($_SESSION['id'])){$id=$_SESSION['id'];} 
$ttt = time();
$cod_act = mt_rand(100, 999) ; $cod_users = $cod_act."".$ttt."1" ;
if ( (isset($_FILES['photo']['name'])) AND ($_FILES['photo']['name'] != "") ) 
		{
			$extension_tof = strtolower( substr(strrchr($_FILES['photo']['name'], '.') ,1) );
			$nomtof = "tof_".md5($cod_users).".".$extension_tof;
			$extensions_tofs = array( 'jpg' , 'jpeg' , 'png' );
			$image_sizes = getimagesize($_FILES['photo']['tmp_name']);
			if (!( in_array($extension_tof,$extensions_tofs) ) )
			 {
			 	$erreur2 = "&nbsp; &nbsp; Veuillez entrer un fichier *.jpeg *.jpg *.png";
					header("Location:index.php?page=10&msg=");
			}
			else{
				 $resultat = move_uploaded_file($_FILES['photo']['tmp_name'],"images/profils/".$nomtof);
				 $etat=	mysql_query("UPDATE `compte` SET `photo` = '$nomtof' WHERE `compte`.`id_compte`=$id;
");
	include("redim_image.php");
			if ( ($extension_tof=="png") OR ($extension_tof=="PNG") ) {
					$source = imagecreatefrompng("images/profils/".$nomtof); }
					else {
					$source = imagecreatefromjpeg("images/profils/".$nomtof); }


					$redimOK = fctredimimage(150,112.5,'images/profils/','big_'.$nomtof,'images/profils/',$nomtof);
					$redimOK1 = fctredimimage(58,43.5,'images/profils/','small_'.$nomtof,'images/profils/',$nomtof);
					$redimOK2 = fctredimimage(30,22.5,'images/profils/','small2_'.$nomtof,'images/profils/',$nomtof);
					if ($redimOK == 0) 
					{
						$largeur_source = imagesx($source);
						$hauteur_source = imagesy($source);
						
						$destination = imagecreatetruecolor($largeur_source, $hauteur_source); // On crée la miniature vide
						
							// Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
						
						$largeur_destination = imagesx($destination);
						$hauteur_destination = imagesy($destination);
	
							// On crée la miniature
						imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);
						
						// On enregistre la miniature "
						imagejpeg($destination, "images/profils/big_".$nomtof);
						
					}
					if ($redimOK1 == 0) 
					{
						$largeur_source = imagesx($source);
						$hauteur_source = imagesy($source);
						
						$destination1 = imagecreatetruecolor($largeur_source, $hauteur_source); // On crée la miniature vide
						
							// Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
						
						$largeur_destination1 = imagesx($destination1);
						$hauteur_destination1 = imagesy($destination1);
	
							// On crée la miniature
						imagecopyresampled($destination1, $source, 0, 0, 0, 0, $largeur_destination1, $hauteur_destination1, $largeur_source, $hauteur_source);
						
						// On enregistre la miniature "
						imagejpeg($destination, "images/profils/small_".$nomtof);
						
					}
					if ($redimOK2 == 0) 
					{
						$largeur_source = imagesx($source);
						$hauteur_source = imagesy($source);
						
						$destination1 = imagecreatetruecolor($largeur_source, $hauteur_source); // On crée la miniature vide
						
							// Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
						
						$largeur_destination1 = imagesx($destination1);
						$hauteur_destination1 = imagesy($destination1);
	
							// On crée la miniature
						imagecopyresampled($destination1, $source, 0, 0, 0, 0, $largeur_destination1, $hauteur_destination1, $largeur_source, $hauteur_source);
						
						// On enregistre la miniature "
						imagejpeg($destination, "images/profils/small2_".$nomtof);
						
					}
			}
			header("Location:Help_Annonce.php?msg=4");
		}
		else{
		header("Location:Help_Annonce.php?msg=6");
		}
?>