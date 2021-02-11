<?php 

require_once("init.php");

$ProductManager->deleteCategorieProduct((intval($_POST['id'])));

$ProductManager->delete(intval($_POST['id']));


echo "<h3 class='text_homePage'>Votre produit a bien été supprimé.</h3>";
die();

?>