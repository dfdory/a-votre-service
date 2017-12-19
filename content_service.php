<div class="breadcrumb">
				<div>
				<a href="index.php">Home</a><span>/</span>Inscription : etape1
				</div>
			</div>
			<?php if(isset($_SESSION['statut']) && $_SESSION['statut']==1){$pag=$_SESSION['statut'];?><h3>Dites-nous en plus sur vous :</h3>&nbsp;<h4>Quel types de service proposez-vous?</h4><?php }
						elseif(isset($_SESSION['statut']) && $_SESSION['statut']==2){$pag=$_SESSION['statut'];?><h3>Dites-nous en plus sur vous :</h3>&nbsp;<h4>Quel type de service d&eacute;sirez vous?</h4><?php }
						else{if(isset($_REQUEST['page'])&& $_REQUEST['page']==4){$pag=$_REQUEST['page']; ?><h3>Quel types de service proposez-vous?</h3>
					<?php }elseif(isset($_REQUEST['page'])&& $_REQUEST['page']==5){$pag=$_REQUEST['page'];?><h3>Quel type de service d&eacute;sirez vous?</h3><?php }}?>
<div class="row">
                    <!-- portfolio_block -->
					
                    <div class="projects">  
					<?php while($row = mysql_fetch_array($request)){?>                                
                        <div class="span3 element category01 height_4column" data-category="category01">
                            <div class="hover_img"><a href="Help_pres_service.php?page=6&idmn=<?php echo $row['id_services'];?>&pag=<?php echo $pag;?>" >
                                <img src="images/portfolio/<?php echo $row['icon_services'];?>" alt="<?php echo $row['nom_services'];?>" /></a>
                            </div> 
                            <div class="item_description">
                              
                                <div class="descr"><a href="Help_pres_service.php?page=6&idmn=<?php echo $row['id_services'];?>&pag=<?php echo $pag;?>" ><?php echo $row['nom_services'];?></a></div>
                            </div>                                    
                        </div>
						<?php }?>
                     
                                                
                        <div class="clear"></div>
                    </div>   
                    <!-- //portfolio_block -->   
                </div>