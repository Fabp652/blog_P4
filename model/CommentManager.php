<?php
require_once('model/Manager.php');
class CommentManager extends Manager{
    //Récupère les commentaires du billet
    public function getComments($postId){
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, user_id, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        return $comments;
    }

    //Ajoute un commentaire
    public function postComment($postId, $userId, $comment){
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, user_id, comment, report, comment_date) VALUES(:post_id, :user_id, :comment, :report, NOW())');
        $addComment = $comments->execute(array(
            ':post_id' => $postId, 
            ':user_id' => $userId, 
            ':comment' => $comment,
            ':report' => 0));
        return $addComment;
    }

    //Modifie un commentaire
    public function updateComment($id, $comment){
        $db = $this->dbConnect();
        $updateQuery = $db->prepare('UPDATE comments SET comment = :comment, comment_date = NOW() WHERE id = :id');
        $updateComment = $updateQuery->execute(array(
            ':id' => $id,
            ':comment' => $comment            
        ));
        return $updateComment;
    }

    public function reportComment($id){
        $db = $this->dbConnect();
        $reportQuery = $db->prepare('UPDATE comments SET report = 1 WHERE id = ?');
        $reportComment = $reportQuery->execute([$id]);
        return $reportComment;
    }

    //Supprime un commentaire
    public function deleteComment($id){
        $db = $this->dbConnect();
        $deleteQuery = $db->prepare('DELETE FROM comments WHERE id = ?');
        $deleteComment = $deleteQuery->execute([$id]);
        return $deleteComment;
    }
}