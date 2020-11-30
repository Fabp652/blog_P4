<?php
require('model/Manager.php');
class InscriptionManager extends Manager{
    public function validPseudo(){
        if(isset($_POST['pseudo'])){
            $db->dbConnect();
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $query = $db->prepare('SELECT count(*) AS ko FROM users WHERE pseudo LIKE ?');
            $query->execute([$pseudo]);
            $ko = $query->fetchcolumn();
            if($ko == 1){
                echo 'Le pseudo existe déjà veuillez en choisir un autre';
                exit(0);
            }
        }
    }

    public function validPass(){
        if(isset($_POST['pass']) && isset($_POST['validPass'])){
            $db->dbConnect();
            $pass = htmlspecialchars($_POST['pass']);
            $validPass = htmlspecialchars($_POST['validPass']);
            if($pass != $validPass){
                echo 'Les mots de passe rentrés ne correspondent pas';
                exit(0);
            }
            else{
                $passHash = password_hash($pass, PASSWORD_DEFAULT);
            }
        }
    }

    public function validEmail(){
        if(isset($_POST['email'])){
            $db->dbConnect();
            $email = htmlspecialchars($_POST['email']);
            if(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}[a-z]{2,4}$#', $email)){
                $validEmail = $email;
            }else{
                echo 'L\'adresse email n\'est pas valide';
            }
        }
    }

    public function inscriptionUser(){
        $db->dbConnect();
        $inscription = $db->prepare('INSERT INTO users(pseudo, pass, email, inscription_date) VALUES(:pseudo, :pass, :email, CURDATE())');
        $inscription->execute(array(
            'pseudo' => $pseudo,
            'pass' => $passHash,
            'email' => $email
        ));
        return 'inscription réussi';
        $inscription->closeCursor();
    }
}