<?php

class CartManager
{
    private $_db;

    function __construct($db)
    { // initialise la BDD
        $this->setDb($db);
    }

    function setDb(PDO $db)
    { // Initialise dans la class
        $this->_db = $db;
    }

    public function addToCart($id)
    {
        $query = $this->_db->prepare('SELECT * FROM product WHERE id = :id'); // Get les mails de tous les utilisateurs 
        $query->bindValue(':id', $id); // on remplace :email par le contenu de $email
        $query->execute(); // la requete est executee
        $data = $query->fetch(PDO::FETCH_ASSOC);
        if ($data === false) {
            return false;
        }
        $product = new Cart(); // Creer une nouvelle instance de la Class Account
        $product->hydrateCart($data); // Injecte les infos dans la nouvelle instance
        return $product;
    }

    public function removeFromCart($id){
    }
}
