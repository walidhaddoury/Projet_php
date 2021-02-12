<?php 

require_once("init.php");

// check empty fields
if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['cPassword']) || empty($_POST['username']) || empty($_POST['role'])) {
    header('Location: ?p=add_User');
    die();
}


//check email
if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
     header('Location: ?p=add_User');
     die();
}

// check confirm password
if ($_POST['password'] !== $_POST['cPassword']) {
    header('Location: ?p=add_User');
    die();
}

// Controle que l'adresse mail n'existe pas déjà en BDD
if ($AccountManager->getByEmail($_POST['email']) !== false) {
    header('Location: ?p=add_User');
    die();
}

$AccountManager->add([
    'username' => $_POST['username'],
    'email' => $_POST['email'],
    'password' => hash('sha256', $_POST['password']),
    'role' => ($_POST['role'] == "admin" ? 1 : 0)
]);


echo "  <div class='retour admin_body'>
            <h3 class='text_homePage'>L'utilisateur a bien été ajouté.</h3>
            <div class='button_div'>
                <button class='button_admin button_logout' OnClick=\"window.location.href='?p=logIn'\">Retour</button>
            </div>
        </div>";
die();

?>