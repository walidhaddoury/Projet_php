<?php 

require_once("init.php");

// check empty fields
if (empty($_POST['email']) || empty($_POST['username']) || empty($_POST['role'])) {
    header('Location: ?p=update_User');
    die();
}

$AccountManager->updateUser([
    'id' => intval($_POST['id']),
    'username' => $_POST['username'],
    'email' => $_POST['email'],
    'role' => ($_POST['role'] == "admin" ? 1 : 0)
]);

echo "<h3 class='text_homePage'>L'utilisateur a bien été modifié.</h3>";
die();

?>