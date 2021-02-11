<?php

class ProductManager
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

    // ADD PRODUCT
    public function add($product)
    {
        $query = $this->_db->prepare('INSERT INTO product (intitule, prix, description) VALUES (?, ?, ?)');
        $query->execute([
            $product['intitule'],
            $product['prix'],
            $product['description']
        ]); // la requete est executee

        $id = $this->_db->lastInsertId();
        return $id;
    }


    // GET Categorie by name
    public function getIdCategorie($name)
    {
        $query = $this->_db->prepare('SELECT id FROM categorie WHERE intitule = :intitule');
        $query->bindValue(':intitule', $name);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_ASSOC);
        if ($data === false) {
            return false;
        }
        return $data['id'];
    }

    // ADD PRODUCT IN CATEGORIE
    public function addProductToCategorie($datas)
    {
        $query = $this->_db->prepare('INSERT INTO categorie_product (idCategorie, idProduct) VALUES (?, ?)');
        $query->execute([
            $datas['idCategorie'],
            $datas['idProduct']
        ]);
    }

    // Suppression d'un produit
    public function delete($id)
    {
        $query = $this->_db->prepare('DELETE FROM product WHERE id = :id');
        $query->bindValue(':id', $id); // on remplace :id par l'id de l'utilisateur
        $query->execute(); // la requete est executee
    }

    public function deleteCategorieProduct($id)
    {
        $query = $this->_db->prepare('DELETE FROM categorie_product WHERE idProduct = :idProduct');
        $query->bindValue(':idProduct', $id); // on remplace :id par l'id de l'utilisateur
        $query->execute(); // la requete est executee
    }

    public function updateProduct($product)
    {
        $query = $this->_db->prepare('UPDATE product SET intitule = :intitule, prix = :prix, description = :description WHERE id = :id');
        $query->bindValue(':id', $product['id']);
        $query->bindValue(':intitule', $product['intitule']);
        $query->bindValue(':prix', $product['prix']);
        $query->bindValue(':description', $product['description']);
        $query->execute(); // la requete est executee
    }
}
