<?php
session_start();
require_once('../connect_to_db.php'); 
//require_once('../script.php');
$delai= $_POST['delai'];
$delai1= $_POST['delai1'];
$q1=mysql_query('select * from `date_essai`');
$num=mysql_num_rows($q1);
if($num==0){
$etat=mysql_query("INSERT INTO `helpservice`.`date_essai` (`id_delai`, `delai`, `delai_employe`, `type`) VALUES (NULL, '$delai', '$delai1', '0');
");
mysql_query("UPDATE `compte` SET `date_expiration` = '$delai' where choix=2;");
mysql_query("UPDATE `compte` SET `date_expiration` = '$delai1' where choix=1;");

}
else{
mysql_query("TRUNCATE TABLE `date_essai`" );
$etat=mysql_query("INSERT INTO `helpservice`.`date_essai` (`id_delai`, `delai`, `delai_employe`, `type`) VALUES (NULL, '$delai', '$delai1', '0');
");
mysql_query("UPDATE `compte` SET `date_expiration` = '$delai' where choix=2;");
mysql_query("UPDATE `compte` SET `date_expiration` = '$delai1' where choix=1;");
}
if($etat==true){
header("Location:delai_essai.php?err=1");
}
else{
header("Location:delai_essai.php?err=2");
}
?>
