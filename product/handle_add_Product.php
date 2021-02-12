<?php 

require_once("init.php");

// check empty fields
if (empty($_POST['categorie']) || empty($_POST['intitule']) || empty($_POST['prix']) || empty($_POST['description'])) {
    header('Location: ?p=add_Product');
    die();
}


$idCategorie = $ProductManager->getIdCategorie($_POST['categorie']);

if (!$idCategorie) {
    echo"  <div class='retour admin_body'>
    <h3 class='text_homePage'>Votre produit n'a pas pu etre ajouté, la catégorie n'existe pas.</h3>
            <div class='button_div'>
                <button class='button_admin button_logout' OnClick=\"window.location.href='?p=logIn'\">Retour</button>
            </div>
        </div>";
    die();
}

$idProduct = $ProductManager->add([
    'intitule' => $_POST['intitule'],
    'prix' => floatval($_POST['prix']),
    'description' => $_POST['description']
]);


$ProductManager->addProductToCategorie([
    'idCategorie' => intval($idCategorie),
    'idProduct' => intval($idProduct)
]);

echo "  <div class='retour admin_body'>
            <h3 class='text_homePage'>Votre produit a bien été créé.</h3>
            <div class='button_div'>
                <button class='button_admin button_logout' OnClick=\"window.location.href='?p=logIn'\">Retour</button>
            </div>
        </div>";
die();
