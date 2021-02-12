<?php

$array = array();

foreach($_SESSION['cart'] as $element) {
    if (json_decode($element)->id !== $_POST['id']) {
        array_push($array, $element);
    }
}

// print_r(count($_SESSION['cart']));
// die;

$_SESSION['cart'] = $array;

if (count($_SESSION['cart']) === 0) {
    unset($_SESSION['cart']);
}

header('Location: ?p=cart');
