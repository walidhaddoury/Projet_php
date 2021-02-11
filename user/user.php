<?php
require_once("init.php");

$date = new DateTime(getUser()->created_at);
?>

<div id="user_body">
    <h3 class="text_homePage">Bonjour <?= getUser()->username ?></h3>

    <table class="table_user">
        <thead>
            <tr>
                <th>Nom d'utilisateur</th>
                <th>Adresse email</th>
                <th>Role</th>
                <th>Date création</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= getUser()->username ?></td>
                <td><?= getUser()->email ?></td>
                <td><?= getUser()->role == 0 ? 'User' : 'Admin' ?></td>
                <td><?= $date->format('d F Y') ?></td>
            </tr>
        </tbody>
    </table>

    <div class="div_user">
        <button class="button_user" OnClick="window.location.href='?p=logOut'">Deconnexion</button>
        <button class="button_user" OnClick="window.location.href='?p=handle_delete'">Supprimer le compte</button>
    </div>
</div>
