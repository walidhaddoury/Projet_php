<?php
echo '<pre>';
print_r($_SESSION['cart']);
echo '</pre>';
die;

unset($_SESSION['cart'][array_search($_POST['id'], $_SESSION['cart'])]);
// $product = $CartManager->addToCart($_POST['id']);
//unset($_SESSION['cart'][$_POST['id']]);

header('Location: ?p=cart')

?>