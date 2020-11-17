<?php
 require_once('Manager.php');
class PostsManager extends Manager{
    //Récupère les billets et les affiches
    public function getPosts(){
        $db = $this->dbConnect();
        $posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
        return $posts;
    }

    //Récupère un billet et l'affiche
    public function getPost($postId){
        $db = $this->dbConnect();
        $post = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $post->execute(array($postId));
        $post->fetch();
        return $post;
    }

    //Ajoute un billet
    public function addPost($title, $content){
        $db = $this->dbConnect();
        $add = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(:title,:content,NOW())');
        $add->execute(array(
            ':title' => $title,
            ':content' => $content
        ));
        return $add;
    }

    //Met à jour un billet existant
    public function updatePost($title, $content){
        $db = $this->dbConnect();
        $update = $db->prepare('UPDATE posts SET title = :title, content = :content, creation_date = NOW() WHERE id = ?');
        $update->execute(array(
            ':title' => $title,
            ':content' => $content
        ));
        return $update;
    }

    //Supprime un billet
    public function deletePost($postId){
        $db = $this->dbConnect();
        $delete = $db->exec('DELETE FROM posts WHERE id = ?');
    }
}