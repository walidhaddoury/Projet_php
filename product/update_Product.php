<?php
require_once("init.php");
?>

<div id="user_body">
    <h3 class="text_homePage">Liste des produits</h3>

    <table class="table_user product_update">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prix </th>
                <th>Description</th>
                <th>Modifier</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $query = $db->prepare('SELECT * FROM product');
            $query->execute();
            $datas = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($datas as $element) :
            ?>
                <form action="?p=handle_update_product" method="POST">
                    <tr class="product_update">
                        <td><input class="id_block" name="id" type="text" value="<?= $element['id'] ?>" /></td>
                        <td><input name="intitule" type="text" value="<?= $element['intitule'] ?>" /></td>
                        <td><input name="prix" class="prix" type="text" value="<?= $element['prix'] ?>" /></td>
                        <td><input name="description" type="text" value="<?= $element['description'] ?>" /></td>
                        <td><button type='submit'><i class="fas fa-check fa-2x update"></i></button></td>
                    </tr>
                </form>
            <?php endforeach; ?>

        </tbody>
    </table>
    <div class="button_div">
        <button class="button_admin button_logout" OnClick="window.location.href='?p=logIn'">Retour</button>
    </div>
</div>