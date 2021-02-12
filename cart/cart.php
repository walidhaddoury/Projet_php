<?php
require_once("init.php");
?>

<div id="user_body">

    <?php
    if (isset($_SESSION['cart'])) {
    ?>
        <h3 class="text_homePage">Liste des produits présents dans votre panier</h3>

        <table class="table_user product_delete">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix </th>
                    <th>Description</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $datas = $_SESSION['cart'];
                foreach ($datas as $element) :
                ?>
                    <form action="?p=handle_delete_product" method="POST">
                        <tr>
                            <td name="intitule"><?= json_decode($element)->intitule ?></td>
                            <td name="prix"><?= json_decode($element)->prix ?> €</td>
                            <td name="description"><?= json_decode($element)->description ?></td>
                            <td><button type="submit"><i class="far fa-trash-alt fa-2x delete"></i></button></td>
                        </tr>
                    </form>
                <?php endforeach;
                ?>

            </tbody>
        </table>
        <div class="button_div">
            <button class="button_admin button_logout" OnClick="window.location.href='?p=clear_cart'">Vider le panier</button>
            <button class="button_admin button_logout" OnClick="window.location.href='?p=cart'">Valider la commande</button>
        </div>
    <?php } else {
        echo "  <div class='retour admin_body'>
                <h3 class='text_homePage'>Panier vide.</h3>
                <div class='button_div'>
                    <button class='button_admin button_logout' OnClick=\"window.location.href='?p=product'\">Retour</button>
                </div>
            </div>";
    }
    ?>
</div>