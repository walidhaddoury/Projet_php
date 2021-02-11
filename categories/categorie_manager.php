<?php

class CategorieManager
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

    public function add($categorie)
    {
        $query = $this->_db->prepare('INSERT INTO categorie (intitule) VALUE (?)');
        $query->execute([
            $categorie['intitule']
        ]); // la requete est executee

        $id = $this->_db->lastInsertId();
        return $id;
    }


    // Check if the categorie exist
    public function checkCategorie($name) {
        $query = $this->_db->prepare('SELECT * FROM categorie WHERE intitule = :intitule');
        $query->bindValue(':intitule', $name);
        $query->execute();
        $data = $query->fetch();

        if ($data === false) { return false; }
        return $data;
    }

    // Suppression d'un produit
    public function delete($id) {
        $query = $this->_db->prepare('DELETE FROM categorie WHERE id = :id');
        $query->bindValue(':id', $id); // on remplace :id par l'id de l'utilisateur
        $query->execute(); // la requete est executee
    }    

    public function deleteCategorieProduct($id) {
        $query = $this->_db->prepare('DELETE FROM categorie_product WHERE idCategorie = :idCategorie');
        $query->bindValue(':idCategorie', $id); // on remplace :id par l'id de l'utilisateur
        $query->execute(); // la requete est executee
    } 

    public function updateCategorie($categorie)
    {
        $query = $this->_db->prepare('UPDATE categorie SET intitule = :intitule WHERE id = :id');
        $query->bindValue(':id', $categorie['id']);
        $query->bindValue(':intitule', $categorie['intitule']);
        $query->execute(); // la requete est executee
    }
}
