<?php 

class ProductManager {

    private $_db;

    function __construct($db) { // initialise la BDD
        $this->setDb($db);
    }

    function setDb(PDO $db) { // Initialise dans la class
        $this->_db = $db;
    }

    public function getByCategorie($categorie) {
        $query = $this->_db->prepare('SELECT * FROM categorie C, produit P, categori_product CP 
                                      WHERE C.id = CP.idCategorie AND CP.idProduct = P.id');
        $query->execute(); // la requete est executee
        $data = $query->fetch();
        if ($data === false) { return false; }
        $account = new Account(); // Creer une nouvelle instance de la Class Account
        $account->hydrate($data); // Injecte les infos dans la nouvelle instance
        return $account;
    }

    public function add($user) {
        $query = $this->_db->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)'); 
        $query->execute([
            $user['username'],
            $user['email'],
            $user['password']
        ]); // la requete est executee
        
        $id = $this->_db->lastInsertId();
        return $id;
    }

    // Suppression d'un utilisateur
    public function delete($id) {
        $query = $this->_db->prepare('DELETE FROM users WHERE id = :id');
        $query->bindValue(':id', $id); // on remplace :id par l'id de l'utilisateur
        $query->execute(); // la requete est executee
    }    
}

?>