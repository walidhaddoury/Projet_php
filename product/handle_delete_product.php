<?php 

require_once("init.php");

$ProductManager->deleteCategorieProduct((intval($_POST['id'])));

$ProductManager->delete(intval($_POST['id']));


echo "  <div class='retour admin_body'>
            <h3 class='text_homePage'>Votre produit a bien été supprimé.</h3>
            <div class='button_div'>
                <button class='button_admin button_logout' OnClick=\"window.location.href='?p=logIn'\">Retour</button>
            </div>
        </div>";
die();

?>