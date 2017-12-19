<?php
require_once('connect_to_db.php');
//if (!isset($_SESSION['nom'])) { header ("Location:index.php?page=2"); }
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
<div class="breadcrumb">
	<div>
		<a href="index.php">Home</a><span>/</span>Etape 2
	</div>
</div>
	<h2 class="title">Informations supplementaires</h2>
	<?php if(isset($_SESSION['email'])){?>
		<div class="contact_form"> 
				<div id="note"></div>
				<div id="fields">
					<form id="" action="Help_ser_incript_valide.php" method="post">
					<?php if(isset($_GET['err']) && $_GET['err']==1){
								 echo "<strong><h4>Vous devez choisir au moins une competence</strong></h4>";
								 }
						?>
	              			 
							
							 Ville: <select name="ville" required >
									  	 <option > </option>
										<?php while($row_ville = mysql_fetch_array($ss_ville)){?>
										<option value="<?php echo $row_ville["nom_ville"];?>"><?php echo $row_ville["nom_ville"];?></option>
										<?php }?>
									  </select><br /><input class="span5" type="text" name="code_postal" value="" placeholder="Boite postale " /><br />
							<input class="span5" type="tel" name="tel" value="" placeholder="tel *"  required/><br />
							<input class="span5" type="date" name="date_naiss" value="" placeholder="Date de naissance *"  required/>
							<input type="hidden" name="id_service" value="<?php echo $id_ss; ?>" />
							<input type="hidden" name="pag" value="<?php echo $pag; ?>" />
												<!--<input class="span7" type="text" name="subject" value="" placeholder="Subject" />
												<textarea name="message" id="message" class="span8" placeholder="Message"></textarea>-->
												
												
												<table>
															  <tr>
						  <!--  <td colspan="4" class="subHeader">Etat civil</td>-->
							<td colspan="4" class="subHeader">
							<?php if(isset($_SESSION['statut']) && $_SESSION['statut']==1 && $pag=4){?>
							Domaine de comp&eacute;tence
							<?php }elseif(isset($_SESSION['statut']) && $_SESSION['statut']==2&& $pag=5){?>
							Domaine de comp&eacute;tence
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
									<td><input type="checkbox" name="ss_service[]" value="<?php echo $row1['id_ss_service']?>" id="<?php echo $row1['id_ss_service']?>"/>&nbsp;&nbsp;&nbsp;<?php echo $row1['nom_ss_service']?>&nbsp;&nbsp;&nbsp;</td></tr>
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
												<div class="clear"></div>
												<input type="reset" class="contact_btn" value="Annuler" />
												<input type="submit" class="contact_btn" value="Valider" />
												<div class="clear"></div>
											</form>
				</div>
			 </div>
	<?php }else{?>
	<abbr>NB:</abbr> Si vous avez un compte veuillez vous connectez avant de poursuivre.
		<div class="contact_form"> 
				<div id="note"></div>
				<div id="fields">
                <?php if(isset($_GET['err']) && $_GET['err']==1){
								 echo "<strong><h4>Vous devez choisir au moins une competence</strong></h4>";
								 }
						?>
	              			 
					<form id="" action="Help_ser_incript_valide.php" method="post">
					<select name="civilite" required >
												<option>civilite</option>
												<option value="Madame">Madame</option>
												<option value="Monsieur">Monsieur</option>
											  </select><br>
											  <input class="span7" type="text" name="nom" value="" placeholder="Nom *" required/>
											  <input class="span7" type="text" name="prenom" value="" placeholder="Prenom *"  required/>
												<input class="span7" type="email" name="email" value="" placeholder="Email *" required/>
												<input class="span7" type="password" name="password" value="" placeholder="password *" required/>	                                       <input class="span7" type="text" name="code_postal" value="" placeholder="Boite postale "/>
												<input class="span7" type="text" name="ville" value="" placeholder="Ville *"  required/>
												<input class="span7" type="tel" name="tel" value="" placeholder="tel *"  required/>
												<input class="span7" type="date" name="date_naiss" value="" placeholder="Date de naissance *"  required/>
												<!--<input class="span7" type="text" name="subject" value="" placeholder="Subject" />
												<textarea name="message" id="message" class="span8" placeholder="Message"></textarea>-->
												
												<input type="hidden" name="id_service" value="<?php echo $id_ss; ?>" />
												<input type="hidden" name="pag" value="<?php echo $pag; ?>" />
												<table>
															  <tr>
						  <!--  <td colspan="4" class="subHeader">Etat civil</td>-->
							<td colspan="4" class="subHeader">
							<?php if(isset($_SESSION['statut']) && $_SESSION['statut']==1 && $pag==4){?>
							Domaines dans lesquels vous souhaitez postuler
							<?php }
							elseif(isset($_SESSION['statut']) && $_SESSION['statut']==2&& $pag==5){?>
							Domaines dans lesquels vous souhaitez obtenir de l&rsquo;aide
							<?php }elseif($pag==4){?>
							Domaines dans lesquels vous souhaitez postuler
							<?php }elseif($pag==5){?>
							Domaines dans lesquels vous souhaitez obtenir de l&rsquo;aide
							<?php }
							?>
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
												<div class="clear"></div>
												<input type="reset" class="contact_btn" value="Annuler" />
												<input type="submit" class="contact_btn" value="Valider" />
												<div class="clear"></div>
											</form>
				</div>
			 </div>	 
	<?php }?>
	
