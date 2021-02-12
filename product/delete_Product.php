<?php
require_once("init.php");
?>

<div id="user_body">
    <h3 class="text_homePage">Liste des produits</h3>

    <table class="table_user product_delete">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prix </th>
                <th>Description</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $query = $db->prepare('SELECT * FROM product');
            $query->execute();
            $datas = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($datas as $element) :
            ?>
                <form action="?p=handle_delete_product" method="POST">
                    <tr>
                        <td><input type="text" name="id" value="<?= $element['id'] ?>"></td>
                        <td name="intitule"><?= $element['intitule'] ?></td>
                        <td name="prix"><?= $element['prix'] ?> €</td>
                        <td name="description"><?= $element['description'] ?></td>
                        <td><button type="submit"><i class="far fa-trash-alt fa-2x delete"></i></button></td>
                    </tr>
                </form>
            <?php endforeach; ?>

        </tbody>
    </table>
    <div class="button_div">
        <button class="button_admin button_logout" OnClick="window.location.href='?p=logIn'">Retour</button>
    </div>
</div>