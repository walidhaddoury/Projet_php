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
                <th>Modifier</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $query = $db->prepare('SELECT * FROM users');
            $query->execute();
            $datas = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($datas as $element):
                $date = new DateTime($element['created_at']);
        ?>
            <tr>
                <td><?= $element['id'] ?></td>
                <td><?= $element['username'] ?></td>
                <td><?= $element['email'] ?></td>
                <td><?= $element['role'] == 0 ? 'User' : 'Admin' ?></td>
                <td><?= $date->format('d F Y') ?></td>
                <td><button OnClick="window.location.href='?p=delete_Product'"><i class="fas fa-check fa-2x update"></i></button></td>
            </tr>
        
        <?php endforeach; ?>

        </tbody>
    </table>
</div>
