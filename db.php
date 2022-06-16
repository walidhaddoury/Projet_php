<?php 

try {
    $db = new PDO('mysql:host=192.168.56.102;port=3306;dbname=groupe6', 'apache', 'root');
}
catch (Exception $e) {
    die('Erreur MySQL, maintenance en cours.' . $e->getMessage());
}

?>
