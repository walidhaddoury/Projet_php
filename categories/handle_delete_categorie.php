<?php 

require_once("init.php");

$CategorieManager->deleteCategorieProduct((intval($_POST['id'])));

$CategorieManager->delete(intval($_POST['id']));


echo "<h3 class='text_homePage'>La catégorie a bien été supprimé.</h3>";
die();

?>