<?php 

require_once("init.php");

$AccountManager->delete(intval($_POST['id']));


echo "<h3 class='text_homePage'>L'utilisateur a bien été supprimé.</h3>";
die();

?>