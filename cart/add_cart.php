<?php

if (isset($_POST["id"])) {
        
    $productToAdd = $CartManager->addToCart($_POST['id']);

    if (isset($_SESSION['cart'])){
        array_push($_SESSION['cart'], json_encode($productToAdd));
    }
    else {
        $_SESSION['cart']=array();
        array_push($_SESSION['cart'], json_encode($productToAdd));
    }
    header('Location: ?p=product');
}