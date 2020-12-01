<?php
require_once('model/Manager.php');
class UsersManager extends Manager{
    public function insertUser($pseudo, $password, $email){
        $db = $this->dbConnect();
        $inscription = $db->prepare('INSERT INTO users(pseudo, pass, email, inscription_date) VALUES(:pseudo, :pass, :email, CURDATE())');
        $inscription->execute(array(
            'pseudo' => $pseudo,
            'pass' => $password,
            'email' => $email
        ));
        echo 'inscription réussi';
        $inscription->closeCursor();
    }   
}