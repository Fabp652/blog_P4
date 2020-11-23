<?php
class Manager{
    protected function dbConnect(){
        try{
            $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }

        catch(Exception $errorConnection){
            die('Erreur de connexion :' .$errorConnection->getMessage());
        }
    }
}