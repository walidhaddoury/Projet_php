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


echo "  <div class='retour admin_body'>
            <h3 class='text_homePage'>La catégorie a bien été ajouté.</h3>
            <div class='button_div'>
                <button class='button_admin button_logout' OnClick=\"window.location.href='?p=logIn'\">Retour</button>
            </div>
        </div>";
die();

?>