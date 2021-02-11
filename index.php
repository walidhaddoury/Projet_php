<?php

require_once("init.php");

$page = 'home';
$pages = array('home', 'logIn', 'signIn', 'handle_signIn', 'handle_logIn', 'product', 'logOut', 'handle_delete', 'categories', 'add_Product', 'handle_add_Product', 'add_categorie', 'add_User', 'update_categorie', 'handle_add_User', 'delete_categorie', 'handle_add_categorie', 'delete_Product', 'update_Product', 'delete_User', 'update_User', 'handle_delete_product', 'handle_update_product', 'handle_delete_categorie', 'handle_delete_User', 'handle_update_categorie');

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
        if (isset($_SESSION['user'])) {
            if (getUser()->role === "1") {
                require_once realpath("admin/admin.php");
            } else {
                require_once realpath("user/user.php");
            }
        } else {
            require_once realpath($page . "/" . $page . ".php");
        }
        break;
    case 'handle_delete':
        require_once realpath("account/" . $page . ".php");
        break;
    case 'add_Product':
        require_once realpath("product/" . $page . ".php");
        break;
    case 'handle_add_Product':
        require_once realpath("product/" . $page . ".php");
        break;
    case 'add_categorie':
        require_once realpath("categories/" . $page . ".php");
        break;
    case 'update_categorie':
        require_once realpath("categories/" . $page . ".php");
        break;
    case 'delete_categorie':
        require_once realpath("categories/" . $page . ".php");
        break;
    case 'add_User':
        require_once realpath("admin/" . $page . ".php");
        break;
    case 'update_User':
        require_once realpath("admin/" . $page . ".php");
        break;
    case 'delete_User':
        require_once realpath("admin/" . $page . ".php");
        break;
    case 'handle_add_Product':
        require_once realpath("product/" . $page . ".php");
        break;
    case 'handle_add_User':
        require_once realpath("admin/" . $page . ".php");
        break;
    case 'handle_delete_User':
        require_once realpath("admin/" . $page . ".php");
        break;
    case 'handle_add_categorie':
        require_once realpath("categories/" . $page . ".php");
        break;
    case 'handle_update_categorie':
        require_once realpath("categories/" . $page . ".php");
        break;
    case 'handle_delete_categorie':
        require_once realpath("categories/" . $page . ".php");
        break;
    case 'delete_Product':
        require_once realpath("product/" . $page . ".php");
        break;
    case 'update_Product':
        require_once realpath("product/" . $page . ".php");
        break;
    case 'handle_delete_product':
        require_once realpath("product/" . $page . ".php");
        break;
    case 'handle_update_product':
        require_once realpath("product/" . $page . ".php");
        break;
    default:
        require_once realpath($page . "/" . $page . ".php");
        break;
}

require_once realpath("footer.php");
