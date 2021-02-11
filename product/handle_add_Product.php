<?php 

require_once("init.php");

// check empty fields
if (empty($_POST['categorie']) || empty($_POST['intitule']) || empty($_POST['prix']) || empty($_POST['description'])) {
    header('Location: ?p=add_Product');
    die();
}

$idProduct = $ProductManager->add([
    'intitule' => $_POST['intitule'],
    'prix' => intval($_POST['prix']),
    'description' => $_POST['description']
]);

$idCategorie = $ProductManager->getIdCategorie($_POST['categorie']);

$ProductManager->addProductToCategorie([
    'idCategorie' => intval($idCategorie),
    'idProduct' => intval($idProduct)
]);

echo "<h3 class='text_homePage'>Votre produit a bien été créé.</h3>";
die();
