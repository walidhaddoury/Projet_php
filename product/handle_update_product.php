<?php 

require_once("init.php");

// check empty fields
if (empty($_POST['id']) || empty($_POST['intitule']) || empty($_POST['prix']) || empty($_POST['description'])) {
    header('Location: ?p=update_Product');
    die();
}

$ProductManager->updateProduct([
    'id' => intval($_POST['id']),
    'intitule' => $_POST['intitule'],
    'prix' => floatval($_POST['prix']),
    'description' => $_POST['description']
]);

echo "  <div class='retour admin_body'>
            <h3 class='text_homePage'>Votre produit a bien été modifié.</h3>
            <div class='button_div'>
                <button class='button_admin button_logout' OnClick=\"window.location.href='?p=logIn'\">Retour</button>
            </div>
        </div>";
die();

?>