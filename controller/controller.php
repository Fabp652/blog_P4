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
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $newPseudo = $pseudo;
        $newEmail = $email;
        $usersManager = new UsersManager();
        $usersManager->insertUser($newPseudo, $password_hash, $newEmail);
    }    
}