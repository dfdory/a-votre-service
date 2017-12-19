<?php 
require_once('connect_to_db.php');
if (!isset($_SESSION['nom'])) { header ("Location:Help_deconnexion.php"); }
$id_cpt=" ";
if(isset($_GET['idsd'])){
 $id_cpt=$_GET['idsd'];}
 $id_msg=" ";
if(isset($_GET['idmsg'])){
 $id_msg=$_GET['idmsg'];}
 
 $query=mysql_query("select id_compte, nom_user ,prenom_user from compte where id_compte= $id_cpt");
 $row=mysql_fetch_array($query);
 if($id_msg!=0){$query1=mysql_query("select objet from messages where id_message= $id_msg");
 $row1=mysql_fetch_array($query1);}
 ?>
<form id="" action="Help_messagerie_valide.php" method="post">

<fieldset><legend>envoi de message</legend>
<label>A:</label><input name="destinataire" type="text" disabled value="<?php echo $row['prenom_user'].' '.$row['nom_user'];?>" />
<input type="hidden" name="idsd" value="<?php echo $id_cpt;?>" />
<input type="hidden" name="destinataire1" value="<?php echo $row['prenom_user'].' '.$row['nom_user'];?>" />
<label>objet</label>
<input name="objet" type="text" requiered placeholder="objet" value="<?php if($id_msg!=0){echo 'Re '.$row1['objet'];}?>">
<label>Message</label>
<textarea name="message" requiered placeholder="Message"></textarea>
<label>&nbsp;</label>
<button type="submit" class="redBtn1">envoyer</button>

</fieldset>
</form>