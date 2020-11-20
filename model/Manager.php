<?php
namespace P4\Blog\Model;

class Manager{
    protected function dbConnect(){
        try{
            $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
            return $db;
        }

        catch(Exception $errorConnection){
            die('Erreur de connexion :' .$errorConnection->getMessage());
        }
    }
}