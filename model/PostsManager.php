<?php
require_once('model/Manager.php');
class PostsManager extends Manager{
    //Récupère les billets et les affiches
    public function getPosts(){
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
        return $req;
    }

    //Récupère un billet et l'affiche
    public function getPost($postId){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    //Ajoute un billet
    public function addPost($userId, $title, $content){
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(user_id, title, content, creation_date) VALUES(:user_id, :title,:content,NOW())');
        $add = $req->execute(array(
            ':user_id' => $userId,
            ':title' => $title,
            ':content' => $content
        ));
        return $add;
    }

    //Met à jour un billet existant
    public function updatePost($postId, $title, $content){
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title = :title, content = :content, creation_date = NOW() WHERE id = :id');
        $update = $req->execute(array(
            ':id' =>$postId,
            ':title' => $title,
            ':content' => $content
        ));
        return $update;
    }

    //Supprime un billet
    public function deletePost($postId){
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = ?');
        $delete = $req->execute([$postId]);
        return $delete;
    }
}