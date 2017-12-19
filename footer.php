<footer class="footer_bottom" id="footers">
			<div class="container content-list">
           
            <?php 
				$menu3 = mysql_query("SELECT * FROM `service`");
echo ("SELECT * FROM `service`");
	while($row_menu1 = mysql_fetch_array($menu3)){
	$id_menu1 =$row_menu1['id_services'];
								$ss_menu=mysql_query("SELECT *FROM `ss_service` where id_service= $id_menu1");
						
								?>
				<div class="span">
					<span class="copyright"><?php echo $row_menu1['nom_services'];?></span><br/>
					<ul>
<?php while($row_ssmenu = mysql_fetch_array($ss_menu)){?>
						<li><a href=""><?php echo $row_ssmenu['nom_ss_service'];?></a></li>
						<?php } ?>
					</ul>
				</div>
                <?php }
							?>
				
			</div>
			<div class="container" align="center">
				
				<div class="copyright">Avotreservice &copy 2014 | R&eacute;alisation : <a href="www.bantoutelecom.com" target="_blank" >Bantou Telecom</a> | <a href="">Mentions l&eacute;gales</a></div>
			</div>
		</footer>