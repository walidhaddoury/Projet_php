<?php 

require_once("init.php");

// check empty fields
if (empty($_POST['id']) || empty($_POST['intitule'])) {
    header('Location: ?p=update_categorie');
    die();
}

$CategorieManager->updateCategorie([
    'id' => intval($_POST['id']),
    'intitule' => $_POST['intitule']
]);

echo "  <div class='retour admin_body'>
            <h3 class='text_homePage'>La catégorie a bien été modifié.</h3>
            <div class='button_div'>
                <button class='button_admin button_logout' OnClick=\"window.location.href='?p=logIn'\">Retour</button>
            </div>
        </div>";
die();
?>