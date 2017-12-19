<?php
$ville= addslashes($_POST["ville"]);
$id_service =  addslashes($_POST["service"]);
header("Location:help_search_content.php?page=13&idmn=$id_service&dfdv=$ville");

?>

			
								