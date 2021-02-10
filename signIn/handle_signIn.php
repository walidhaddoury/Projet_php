<?php 

require_once("init.php");

// check empty fields
if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['cPassword']) || empty($_POST['username'])) {
    header('Location: ?p=signIn');
    die();
}


//check email
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
     header('Location: ?p=signIn');
     die();
}

// check confirm password
if ($_POST['password'] !== $_POST['cPassword']) {
    header('Location: ?p=signIn');
    die();
}

// Controle que l'adresse mail n'existe pas déjà en BDD
if ($AccountManager->getByEmail($_POST['email']) !== false) {
    header('Location: ?p=signIn');
    die();
}

$id = $AccountManager->add([
    'username' => $_POST['username'],
    'email' => $_POST['email'],
    'password' => hash('sha256', $_POST['password']),
]);

echo "C BON ça MARCHE !";
die();
// header('Location: signIn.php?success=true&user_id=' . $id);

?>