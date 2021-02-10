<?php 
session_start();

require_once('db.php');
require_once('account/account.php');
require_once('account/account_manager.php');
require_once('account/getSession.php');

$AccountManager = new AccountManager($db);

?>