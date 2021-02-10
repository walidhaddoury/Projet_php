<?php 

try {
    $db = new PDO('mysql:host=188.34.153.174;port=3306;dbname=groupe6', 'groupe6', 'Super-Groupe6');
}
catch (Exception $e) {
    die('Erreur MySQL, maintenance en cours.' . $e->getMessage());
}

?>