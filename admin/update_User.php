<?php
require_once("init.php");
?>

<div id="user_body">
    <h3 class="text_homePage">Liste des Utilisateurs</h3>

    <table class="table_user admin_delete product_update">
        <thead>
            <tr>
                <th>Id</th>
                <th>Identifiant</th>
                <th>Email</th>
                <th>Role</th>
                <th>Date Création</th>
                <th>Modifier</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $query = $db->prepare('SELECT * FROM users');
            $query->execute();
            $datas = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($datas as $element) :
                $date = new DateTime($element['created_at']);
            ?>
                <form action="?p=handle_update_User" method="POST">
                    <tr class="product_update">
                        <td><input class="id_block" name="id" type="text" value="<?= $element['id'] ?>" /></td>
                        <td><input name="username" type="text" value="<?= $element['username'] ?>" /></td>
                        <td><input name="email" type="text" value="<?= $element['email'] ?>" /></td>
                        <td><input name="role" type="text" value="<?= $element['role'] == 0 ? 'User' : 'Admin' ?>" /></td>
                        <td><input class="id_block" name="email" type="text" value="<?= $date->format('d F Y') ?>" /></td>
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