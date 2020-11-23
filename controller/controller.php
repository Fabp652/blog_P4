<?php
require_once('model/PostsManager.php');
require_once('model/CommentManager.php');

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