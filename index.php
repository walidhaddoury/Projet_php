<?php

require_once("init.php");

$page = 'home';
$pages = array('home', 'logIn', 'signIn', 'handle_signIn', 'handle_logIn', 'product');

if (isset($_GET['p'])) {
    if (in_array($_GET['p'], $pages)) {
        $page = $_GET['p'];
    }
}


require_once realpath("header/header.php");

switch ($page) {
    case 'handle_signIn':
        require_once realpath("signIn/" . $page . ".php");
        break;
    case 'handle_logIn':
        require_once realpath("logIn/" . $page . ".php");
        break;
    case 'logIn':
        if (isset($_SESSION['user'])){
            require_once realpath("user/user.php");
        }else {
            require_once realpath($page ."/" . $page . ".php");
        }
        break;
    default:
        require_once realpath($page ."/" . $page . ".php");
        break;
}

require_once realpath("footer.php");
