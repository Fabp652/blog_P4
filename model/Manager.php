<?php
class Manager{
    const DB_HOST = 'mysql:host=localhost;dbname=blog;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = 'root';

    protected function dbConnect(){
        try{
            $db = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
            return $db;
        }

        catch(Exception $errorConnection){
            die('Erreur de connexion :' .$errorConnection->getMessage());
        }
    }
}