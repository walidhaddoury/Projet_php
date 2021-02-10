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
                <th>Date création</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= getUser()->username ?></td>
                <td><?= getUser()->email ?></td>
                <td><?= $date->format('d F Y') ?></td>
            </tr>
        </tbody>
    </table>

    <div id="button_form">
        <button class="button"><a href="?p=logOut">Deconnexion</a></button>
        <button class="button"><a href="?p=handle_delete">Supprimer le compte</a></button>
    </div>
</div>
