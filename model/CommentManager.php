<?php
require_once('Manager.php');
class CommentManager extends Manager{
    //Récupère les commentaires du billet
    public function getComments($postId){
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($post_Id));
        return $comments;
    }

    //Ajoute un commentaire
    public function postComment($postId, $author, $comments){
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(:post_id, :author, :comment, NOW())');
        $affectedLines = $comments->execute(array(
            ':post_id' => $postId, 
            ':author' => $author, 
            ':comment' => $comment));
        return $affectedLines;
    }

    //Modifie un commentaire
    public function updateComment($commentId){
        $db = $this->dbConnect();
        $updateComment = $db->prepare('UPDATE comments SET comment = :comment, creation_date = NOW() WHERE id = ?');
        $updateComment->execute(array(':comment' => $comment));
        return $updateComment;
    }

    //Supprime un commentaire
    public function deleteComent($commentId){
        $db = $this->dbConnect();
        $deleteComment = $db->exec('DELETE FROM comments WHERE id = ?');
    }
}