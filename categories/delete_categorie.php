<?php
require_once("init.php");
?>

<div id="user_body">
    <h3 class="text_homePage">Liste des catégories</h3>

    <table class="table_user">
        <thead>
            <tr>
                <th>Id catégorie</th>
                <th>Nom catégorie</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $query = $db->prepare('SELECT * FROM categorie');
            $query->execute();
            $datas = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($datas as $element) :
            ?>
                <form action="?p=handle_delete_categorie" method="POST">
                    <tr>
                        <td><input type="text" name="id" value="<?= $element['id'] ?>"></td>
                        <td><?= $element['intitule'] ?></td>
                        <td><button type="submit"><i class="far fa-trash-alt fa-2x delete"></i></button></td>
                    </tr>
                </form>

            <?php endforeach; ?>

        </tbody>
    </table>
</div>