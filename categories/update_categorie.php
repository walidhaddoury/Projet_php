<?php
require_once("init.php");
?>

<div id="user_body">
    <h3 class="text_homePage">Liste des produits</h3>

    <table class="table_user product_update">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom catégorie</th>
                <th>Modifier</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $query = $db->prepare('SELECT * FROM categorie');
            $query->execute();
            $datas = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($datas as $element) :
            ?>
                <form action="?p=handle_update_categorie" method="POST">
                    <tr>
                        <td><input name="id" type="text" value="<?= $element['id'] ?>" /></td>
                        <td><input name="intitule" type="text" value="<?= $element['intitule'] ?>" /></td>
                        <td><button type='submit'><i class="fas fa-check fa-2x update"></i></button></td>
                    </tr>

                <?php endforeach; ?>
                </form>

        </tbody>
    </table>
</div>