<?php

class AccountManager
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

    public function getByEmail($email)
    {
        $query = $this->_db->prepare('SELECT * FROM users WHERE email = :email'); // Get les mails de tous les utilisateurs 
        $query->bindValue(':email', $email); // on remplace :email par le contenu de $email
        $query->execute(); // la requete est executee
        $data = $query->fetch();
        if ($data === false) {
            return false;
        }
        $account = new Account(); // Creer une nouvelle instance de la Class Account
        $account->hydrate($data); // Injecte les infos dans la nouvelle instance
        return $account;
    }

    public function add($user)
    {
        if (count($user) === 3) {
            $query = $this->_db->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
            $query->execute([
                $user['username'],
                $user['email'],
                $user['password']
            ]); // la requete est executee
        }
        if (count($user) === 4) {
            $query = $this->_db->prepare('INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)');
            $query->execute([
                $user['username'],
                $user['email'],
                $user['password'],
                $user['role']
            ]); // la requete est executee
        }

        $id = $this->_db->lastInsertId();
        return $id;
    }

    // Suppression d'un utilisateur
    public function delete($id)
    {
        $query = $this->_db->prepare('DELETE FROM users WHERE id = :id');
        $query->bindValue(':id', $id); // on remplace :id par l'id de l'utilisateur
        $query->execute(); // la requete est executee
    }

    public function updateUser($user)
    {
        $query = $this->_db->prepare('UPDATE users SET username = :username, email = :email, role = :role WHERE id = :id');
        $query->bindValue(':id', $user['id']);
        $query->bindValue(':username', $user['username']);
        $query->bindValue(':email', $user['email']);
        $query->bindValue(':role', $user['role']);
        $query->execute(); // la requete est executee
    }
}
