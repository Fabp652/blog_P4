<?php
require_once('model/Manager.php');
class UsersManager extends Manager{
    public function insertUser($pseudo, $password, $email){
        $db = $this->dbConnect();
        $inscription = $db->prepare('INSERT INTO users(pseudo, pass, email, is_admin, inscription_date) VALUES(:pseudo, :pass, :email, :is_admin, CURDATE())');
        $inscription->execute(array(
            'pseudo' => $pseudo,
            'pass' => $password,
            'email' => $email,
            'is_admin' => '0'
        ));
        $inscription->closeCursor();
    }

    public function getPseudo($id){
        $db = $this->dbConnect();
        $user = $db->prepare('SELECT pseudo FROM users WHERE id = ?');
        $user->execute([$id]);
        $pseudo = $user->fetch();
        return $pseudo['pseudo'];
    }
    
    public function getUser($pseudo){
        $db = $this->dbConnect();
        $connection = $db->prepare('SELECT * FROM users WHERE pseudo = ?');
        $connection->execute([$pseudo]);
        $user = $connection->fetch();
        return $user;
    }

    public function updateUser($password){
        $db = $this->dbConnect();
        $update = $db->prepare('UPDATE users SET pass = :pass');
        $update->execute([
            'pass' => $password
        ]);
    }
}