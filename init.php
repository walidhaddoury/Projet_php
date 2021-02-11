<?php
session_start();

require_once('db.php');
require_once('account/account.php');
require_once('account/account_manager.php');
require_once('account/getSession.php');


require_once('product/product_manager.php');

require_once('categories/categorie_manager.php');

$ProductManager = new ProductManager($db);
$AccountManager = new AccountManager($db);
$CategorieManager = new CategorieManager($db);

?>