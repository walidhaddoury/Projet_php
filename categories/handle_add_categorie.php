<?php 

require_once("init.php");

// check empty fields
if (empty($_POST['intitule'])) {
    header('Location: ?p=add_categorie');
    die();
}

if ($CategorieManager->checkCategorie($_POST['intitule'])) {
    header('Location: ?p=add_categorie');
    die();
}

$CategorieManager->add([
    'intitule' => $_POST['intitule']
]);


echo "<h3 class='text_homePage'>La catégorie a bien été créé.</h3>";
die();

?>