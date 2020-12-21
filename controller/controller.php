<?php
require_once('model/PostsManager.php');
require_once('model/CommentManager.php');
require_once('model/UsersManager.php');

//Appelle getPosts pour avoir et afficher la liste des billets
function listPosts(){
    $postsManager = new PostsManager();
    $posts = $postsManager->getPosts();

    require('view/listPostsView.php');
}

//Appelle getPost() pour avoir et afficher le billet sélectionner et getComment pour les commentaires
function post(){
    $postManager = new PostsManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/postView.php');
}

function inscription(){
    require('view/inscriptionView.php');
}

function createUser($pseudo, $email, $password){;
    if(preg_match('#[a-z0-9._-]{4}#', $pseudo) && preg_match('#[a-z0-9._-]{4}#', $password) && preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}[a-z]{2,4}$#', $email)){
        $password_hash = password_hash(htmlspecialchars($password), PASSWORD_DEFAULT);
        $newPseudo = htmlspecialchars($pseudo);
        $newEmail = htmlspecialchars($email);
        $usersManager = new UsersManager();
        $usersManager->insertUser($newPseudo, $password_hash, $newEmail);
        require('view/connexionView.php');
    }else{
        echo 'Veuillez remplir tous les champs obligatoires pour vous inscrire';
    }
}

function connection(){
    require('view/connexionView.php');
}

function connectUser($pseudo, $password){
    if(preg_match('#[a-z0-9._-]{4}#', $pseudo) && preg_match('#[a-z0-9._-]{4}#', $password)){
        $getPseudo = htmlspecialchars($pseudo);
        $usersManager = new UsersManager();
        $user = $usersManager->getUser($getPseudo);
        if($getPseudo == $user['pseudo']){
            $goodPassword = password_verify(htmlspecialchars($password), $user['pass']);
            if($goodPassword){
                $_SESSION['id'] = $user['id'];
                $_SESSION['pseudo'] = $getPseudo;
                $_SESSION['email'] = $user['email'];
                require('view/profileUserView.php');
            }else{
                echo 'Le pseudo ou le mot de passe que vous avez rentré n\'est pas correct';
            }   
        }else{
            echo 'Le pseudo ou le mot de passe que vous avez rentré n\'est pas correct';            
        }
    }else{
        echo 'Veuillez renseigner tous les champs pour vous connectez';
    }
}

function profile(){
    require('view/profileUserView.php');
}



function changePassword(){
    require('view/changePasswordView.php');
}

function newPassword($password){
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $usersManager = new UsersManager();
    $usersManager->updateUser($password_hash);
    echo 'Mot de passe modifier';
}

function createComment($postId, $pseudo, $comment){
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postComment($postId, $pseudo, $comment);
    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function changeComment(){
    require('view/changeCommentView.php');
}

function newComment($postId, $commentId, $comment){
    $commentManager = new CommentManager();
    $changeComment = $commentManager->updateComment($commentId, $comment);
    if ($changeComment === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function clearComment($postId, $commentId){
    $commentManager = new CommentManager;
    $clearComment = $commentManager->deleteComment($commentId);
    if ($clearComment === false) {
        throw new Exception('Impossible de supprimer le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function newPost(){
    require('view/newPostView.php');
}

function createPost($userId, $title, $content){
    $postManager = new PostsManager;
    $createPost = $postManager->addPost($userId, $title, $content);
    if ($createPost === false) {
        throw new Exception('Impossible de créer le billet !');
    }
    else {
        header('Location: index.php?action=listPost');
    }
}