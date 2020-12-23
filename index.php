<?php
session_start();
require('controller/controller.php');

try{
    if(isset($_GET['action'])){
        switch($_GET['action']){
            case 'listPost' :
                listPosts();
            break;
            case 'post' :
                if(isset($_GET['id']) && $_GET['id'] > 0){
                    post();
                }
            break;
            case 'inscription' :
                inscription();               
            break;
            case 'create-user' :
                if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password'])){
                    createUser($_POST['pseudo'], $_POST['email'], $_POST['password']);
                }else{
                    echo 'Erreur : vous n\'avez pas remplit tout les champs';
                }
            break;
            case 'connection' :
                connection();
            break;
            case 'connect-user' :
                if(isset($_POST['pseudo']) && isset($_POST['password'])){
                    connectUser($_POST['pseudo'], $_POST['password']);
                }else{
                    echo 'Erreur : vous n\'avez pas remplit tout les champs';
                }                
            break;
            case 'profile' :
                profile();
            break;
            case 'logout' :
                session_unset();
                listPosts();
            break;
            case 'change-password' :
                changePassword();
            break;
            case 'new-password' :
                if(isset($_POST['password'])){
                    newPassword($_POST['password']);
                }else{
                    echo 'Veuillez remplir le champs pour modifier votre mot de passe';
                }
            break;
            case 'create-comment' :
                if(isset($_POST['comment'])){
                    createComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
                }else{
                    echo 'Veuillez écrire un commentaire pour pouvoir valider';
                }
            break;
            case 'change-comment' :
                changeComment();
            break;
            case 'new-comment' :
                if(isset($_POST['comment'])){
                    newComment($_GET['post-id'],$_GET['comment-id'], $_POST['comment']);
                }else{
                    echo 'Veuillez écrire un nouveau commentaire pour modifier votre commentaire';
                }
            break;
            case 'clear-comment' :
                if(isset($_GET['post-id']) && isset($_GET['comment-id'])){
                    clearComment($_GET['post-id'], $_GET['comment-id']);
                }                
            break;
            case 'new-post' :
                if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                    authentification();
                }else{
                    echo 'Vous n\'avez pas l\'autorisation d\'accéder à cette page';
                }
            break;
            case 'authentification' :
                if(isset($_POST['pseudo']) && isset($_POST['password'])){
                    checkAuthentification($_POST['pseudo'], $_POST['password']);
                }
            break;
            case 'create-post' :
                if(isset($_GET['user-id']) && isset($_POST['title']) && isset($_POST['content']))
                createPost($_GET['user-id'], $_POST['title'], $_POST['content']);
            break;
            case 'change-post' :
                changePost();
            break;
            case 'update-post' :
                if(isset($_POST['title']) && isset($_POST['content'])){
                    updatePost($_GET['id'], $_POST['title'], $_POST['content']);
                }
            break;
            case 'delete-post' :
                if(isset($_GET['id'])){
                    clearPost($_GET['id']);
                }                
            break;
            default :
                require('view/404.php');
        }
    }else{
        listPosts();
    }
    
}

catch(Exception $e){
    $errorMessage = $e->getMessage();
    echo 'Erreur :' . $errorMessage . '\n';
}