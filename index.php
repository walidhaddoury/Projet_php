<?php

$page = 'home';
$pages = array('home', 'logIn', 'signIn');

if (isset($_GET['p'])) {
    if (in_array($_GET['p'], $pages)) {
        $page = $_GET['p'];
    }
}


require_once realpath("header/header.php");
require_once realpath($page ."/" . $page . ".php");
require_once realpath("footer.php");
?>