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
        $password_hash = password_hash(htmlspecialchars($password, PASSWORD_DEFAULT));
        $newPseudo = htmlspecialchars($pseudo);
        $newEmail = htmlspecialchars($email);
        $usersManager = new UsersManager();
        $usersManager->insertUser($newPseudo, $password_hash, $newEmail);
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
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['pseudo'] = $user['pseudo'];
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

function logout(){
    session_start();
    $_SESSION = array();
    session_destroy();
}