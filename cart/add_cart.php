<?php

if (isset($_POST["id"])) {

    // session_unset($_SESSION['cart']);
    // die;
    
    $productToAdd = $CartManager->addToCart($_POST['id']);

    if (isset($_SESSION['cart'])){
        // $_SESSION['cart'] = json_encode($productToAdd);
        array_push($_SESSION['cart'], json_encode($productToAdd));
    }
    else {
        $_SESSION['cart']=array();
        array_push($_SESSION['cart'], json_encode($productToAdd));
    }
    header('Location: ?p=product');
}

// pour vider le panier
// session_unset($_SESSION['cart']);



/*


function getCart() {
    return json_decode($_SESSION['cart']);
}


// pour vider le panier
session_unset($_SESSION['cart']);


$_SESSION['cart'] = json_encode($account);


$account = new Account(); // Creer une nouvelle instance de la Class Account
        $account->hydrateCart($data); // Injecte les infos dans la nouvelle instance
        return $account;


        if (isset($_SESSION['cart'])) {
            if (getUser()->role === "1") {
                require_once realpath("admin/admin.php");
            } else {
                require_once realpath("user/user.php");
            }
        } else 
        */
