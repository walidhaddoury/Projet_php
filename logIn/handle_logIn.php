<?php 

require_once("init.php");

// check empty fields
if (empty($_POST['email']) || empty($_POST['password'])) {
    header('Location: ?p=logIn');
    die();
}

// check email
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
    header('Location: ?p=logIn');
    die();
}

// Vérification si l'adresse mail existe en BDD
$account = $AccountManager->getByEmail($_POST['email']);
if ($account === false) {
    header('Location: ?p=logIn');
    die();
}

// Vérification du mdp
$password = hash('sha256', $_POST['password']);
if ($account->password != $password) {
    header('Location: ?p=logIn');
    die();
}

$_SESSION['user'] = json_encode($account);

echo "<h3 class='text_homePage'>Bienvenue ".getUser()->username."</h3>";
die();
// header('Location: loggedin.php');




?>