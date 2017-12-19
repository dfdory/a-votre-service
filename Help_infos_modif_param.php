<?php
require_once('connect_to_db.php');
if (!isset($_SESSION['nom'])) { header ("Location:Help_deconnexion.php"); }
$ss_ville=mysql_query("select * from ville"); 

$ss_service=mysql_query("SELECT *
FROM `service`"); 
$id="";
if(isset($_SESSION['id'])){$id=$_SESSION['id'];
$tof=mysql_query("select * from compte where id_compte = $id;");
$row=mysql_fetch_array($tof);}
?>
<h2>INFORMATIONS ET PARAMETRES !</h2>
<form id="" action="Help_infos_modif_param_valide.php" method="post"> <h3>Inscrivez-vous gratuitement !</h3>
						
						<select name="civilite" required >
									  	<option value="<?php echo $row["civilite"];?>"><?php echo $row["civilite"];?></option>
										<?php if($row["civilite"]=="Madame"){?><option value="Monsieur">Monsieur</option><?php }
											  elseif($row["civilite"]=="Monsieur"){?><option value="Madame">Madame</option><?php }?>
										
										
									  </select><br>
									  <input class="span4" type="text" name="nom" value="<?php echo $row["nom_user"];?>" placeholder="Nom (required)" required/><br>
									  <input class="span4" type="text" name="prenom" value="<?php echo $row["prenom_user"];?>" placeholder="Prenom (required)"  required/><br>
                                        <input class="span4" type="email" name="email" value="<?php echo $row["Email"];?>" placeholder="Email (required)" required/><br>
										<input class="span4" type="text" name="code_postal" value="<?php echo $row["code_postal"];?>" placeholder="Prenom (required)"  required/><br>
										<input class="span4" type="text" name="ville" value="<?php echo $row["ville"];?>" placeholder="Prenom (required)"  required/><br>
										<input class="span4" type="text" name="date_naiss" value="<?php echo $row["date_naiss"];?>" placeholder="Prenom (required)"  required/><br>
										<input class="span4" type="text" name="tel" value="<?php echo $row["num_tel"];?>" placeholder="Prenom (required)"  required/><br>
										<input class="span4" type="password" name="password" value="" placeholder="password" /><br><div class="clear"></div>
                                        <div class="item_description">
                               
								
<input type="submit"  class="redBtn1" value="Sauvegarder" />

                              
                            </div>
                                        <div class="clear"></div>
					</form>