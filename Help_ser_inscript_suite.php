<?php 
$id_ss="";
//if (!isset($_SESSION['nom'])) { header ("Location:index.php?page=2"); }
 if(isset($_REQUEST['idmn'])){
 $id_ss=$_REQUEST['idmn'];
 
 }
 
 $ss_ville=mysql_query("select * from ville order by nom_ville ASC");

?>


<div class="breadcrumb">
				<div>
						<a href="index.php">Home</a><span>
						/</span>Etape 3
				</div>
			</div>
			<?php if(isset($_SESSION['statut']) && $_SESSION['statut']==1){$pag=$_SESSION['statut'];?><h2 class="title">Dites-nous en plus sur votre exp&eacute;rience</h2>&nbsp;<?php }
						elseif(isset($_SESSION['statut']) && $_SESSION['statut']==2){$pag=$_SESSION['statut'];?><h2 class="title">D&Eacute;posez une Annonce pour trouvez de l&rsquo;aide</h2>&nbsp;<?php }
						else{if(isset($_REQUEST['page'])&& $_REQUEST['page']==4){$pag=$_REQUEST['page']; ?><h2 class="title">Dites-nous en plus sur votre exp&eacute;rience</h2>
					<?php }elseif(isset($_REQUEST['page'])&& $_REQUEST['page']==5){$pag=$_REQUEST['page'];?><h2 class="title">D&Eacute;posez une Annonce pour trouvez de l&rsquo;aide</h2><?php }}?>
	<div class="contact_form"> 
				<div id="note"></div>
				<div id="fields">
				<?php if(isset($_SESSION['statut']) && $_SESSION['statut']==2){?>
				<form id="" action="Help_ser_incript_Annonce_valide.php" method="post">
					<select name="ville" required >
									  	<option > Ville</option>
										<?php while($row_ville = mysql_fetch_array($ss_ville)){?>
										<option value="<?php echo $row_ville["nom_ville"];?>"><?php echo $row_ville["nom_ville"];?></option>
										<?php }?>
									  </select><br /> <input class="span5" type="text" name="code_postal" value="" placeholder="Boite postale"/><br />
	              			 <label>Titre: </label><input class="span8" type="text" name="titre" value="" placeholder="N'incluez que les informations principale dans le titre. Par exemple : Cherche une nounou pour bebe de 2 mois" required /><br />
							<label>Description:</label>
							<textarea  class="span8" name="contenu" placeholder="Gardez votre description simple mais assurez vous d'inclure toutes les informations pertinentes telles que les responsabilites et les qualifications:" required ></textarea>
							<label>Periode:</label>
							<textarea  class="span8" name="periode" placeholder="Pr&eacute;cisez la periode de travail par exemple -R&eacute;gulier(indiquez les jours de travail) -Occasionnelle(Date de debut)-Exceptionnelle(Date de debut et date de fin):" required ></textarea>
							<label>Salaire horaire</label>
							<input class="span8" type="text" name="salaire" value="" placeholder="Precisez le minium et le maximun exemple : 500 &agrave;1500 "  required/><br />
							<label>Informations supplementaires:</label>
							<textarea  class="span8" name="autreinfos" placeholder="Pr&eacute;cisez d'autre infos" ></textarea>
							<input type="hidden" name="id_service" value="<?php echo $id_ss; ?>" />
							<input type="hidden" name="pag" value="<?php echo $pag; ?>" />
												
												<div class="clear"></div>
												<label>Veuillez noter que dans l&rsquo;int&eacute;r&ecirc;t de notre communaut&eacute;, les annonces sont revues
par nos soins avant d&rsquo;&ecirc;tre post&eacute;es.</label>
												<input type="submit"  class="redBtn1" value="Poster l'annonce" />
												<div class="clear"></div>
											</form>
                   <a href="Help_Annonce.php">Passer cette etape</a>
                   
			<?php	}elseif(isset($_SESSION['statut']) && $_SESSION['statut']==1){?>
            
				<form id="" action="Help_ser_incript_profil_valide.php" method="post">
					
							<label>Description de votre exp&eacute;rience et ce qui vous motives &agrave; le faire:</label>
							<textarea  class="span8" name="contenu" placeholder="D&eacute;crivez vos exp&eacute;riences pass&eacute;es,vos &eacute;ventuelles qualification, n'oubliez pas de pr&eacute;cisez quelles etaient les t&acirc;ches que vous avez accomplies:" required ></textarea>
							<label>Nombre d'ann&eacute;es d'exp&eacute;rience:</label>
							<select name="nbreAnnee">
								<option value="-1"> -1 ans</option>
								<option value="1"> 1 ans</option>
								<option value="2"> 2 ans</option>
								<option value="3"> 3 ans</option>
								<option value="4"> 4 ans</option>
								<option value="5"> 5 ans</option>
								<option value="6"> 6 ans</option>
								<option value="7"> 7 ans</option>
								<option value="8"> 8 ans</option>
								<option value="9"> 9 ans</option>
								<option value="10">10 ans</option>
								<option value="+10"> +10 ans</option>
								<option value="15"> 15 ans</option>
								<option value="+15"> +15 ans</option>
								<option value="20"> 20 ans</option>
							</select>
							<label>Salaire horaire</label>
							<input class="span8" type="text" name="salaire" value="" placeholder="Precisez le minium et le maximun exemple : 500 &agrave;1500 "  required/><br />
							
							<input type="hidden" name="id_service" value="<?php echo $id_ss; ?>" />
							<input type="hidden" name="pag" value="<?php echo $pag; ?>" />
												
												<div class="clear"></div>
												
												<input type="submit"  class="redBtn1" value="Completer" />
												<div class="clear"></div>
											</form>
											<a href="Help_Annonce.php">Passer cette etape</a>
			 <?php }?>
					
				</div>
			 </div>