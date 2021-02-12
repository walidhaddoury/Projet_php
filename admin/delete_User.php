<?php
require_once("init.php");
?>

<div id="user_body">
    <h3 class="text_homePage">Liste des Utilisateurs</h3>

    <table class="table_user admin_delete">
        <thead>
            <tr>
                <th>Id</th>
                <th>Identifiant</th>
                <th>Email</th>
                <th>Role</th>
                <th>Date Création</th>
                <th>Supprimer</th>
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
                <form action="?p=handle_delete_User" method="POST">
                    <tr>
                        <td><input type="text" name="id" value="<?= $element['id'] ?>"></td>
                        <td><?= $element['username'] ?></td>
                        <td><?= $element['email'] ?></td>
                        <td><?= $element['role'] == 0 ? 'User' : 'Admin' ?></td>
                        <td><?= $date->format('d F Y') ?></td>
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