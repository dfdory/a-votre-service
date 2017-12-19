<?php
$hosname_dbprotect = "localhost:8889"; // nom du serveur
$database_dbprotect = "helpservice"; // nom de la base de données
$username_dbprotect = "root"; // nom d'utilisateur
$password_dbprotect = ""; // mot de passe
$dbprotect = mysql_pconnect($hosname_dbprotect, $username_dbprotect, $password_dbprotect) or trigger_error(mysql_error(),E_USER_ERROR);

mysql_connect("localhost","root","");

mysql_select_db($database_dbprotect);

?>
