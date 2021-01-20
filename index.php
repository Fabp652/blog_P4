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
                }else{
                    header('Location:index.php?action=error-404');
                }
            break;
            case 'inscription' :
                inscription();               
            break;
            case 'create-user' :
                if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['validPass'])){
                    createUser($_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['validPass']);
                }else{
                    header('Location:index.php?action=error-404');
                }
            break;
            case 'connection' :
                connection();
            break;
            case 'connect-user' :
                if(isset($_POST['pseudo']) && isset($_POST['password'])){
                    connectUser($_POST['pseudo'], $_POST['password']);
                }else{
                    header('Location:index.php?action=error-404');
                }                
            break;
            case 'profile' :
                if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
                    profile();
                }
                else{
                    header('Location:index.php?action=error-404');
                }
            break;
            case 'logout' :
                session_unset();
                listPosts();
            break;
            case 'change-password' :
                if(isset($_SESSION['id'])){
                    changePassword();
                }
                else{
                    header('Location:index.php?action=error-404');
                }               
            break;
            case 'new-password' :
                if(isset($_POST['password'])){
                    newPassword($_SESSION['id'], $_POST['password']);
                }else{
                    header('Location:index.php?action=error-404');
                }
            break;
            case 'create-comment' :
                if(isset($_POST['comment'])){
                    createComment($_GET['id'], $_SESSION['id'], $_POST['comment']);
                }else{
                    echo 'Veuillez écrire un commentaire pour pouvoir valider';
                }
            break;
            case 'change-comment' :
                if(isset($_SESSION['id'])){
                    changeComment();
                }
                else{
                    header('Location:index.php?action=error-404');
                }
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
                if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == '1'){
                    authentification();
                }else{
                    header('Location:index.php?action=error-404');
                }
            break;
            case 'authentification' :
                if(isset($_POST['pseudo']) && isset($_POST['password'])){
                    checkAuthentification($_POST['pseudo'], $_POST['password']);
                }
                else{
                    header('Location:index.php?action=error-404');
                }
            break;
            case 'create-post' :
                if(isset($_GET['user-id']) && isset($_POST['title']) && isset($_POST['content'])){
                    createPost($_GET['user-id'], $_POST['title'], $_POST['content']);
                }
                else{
                    header('Location:index.php?action=error-404');
                }
            break;
            case 'change-post' :
                if(isset($_GET['id']) && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1){
                    changePost();
                }
                else{
                    header('Location:index.php?action=error-404');
                }                
            break;
            case 'update-post' :
                if(isset($_POST['title']) && isset($_POST['content'])){
                    updatePost($_GET['id'], $_POST['title'], $_POST['content']);
                }
                else{
                    header('Location:index.php?action=error-404');
                }
            break;
            case 'delete-post' :
                if(isset($_GET['id']) && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1){
                    clearPost($_GET['id']);
                }
                else{
                    header('Location:index.php?action=error-404');
                }                
            break;
            case 'admin' :
                if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1){
                    admin();
                }else{
                    header('Location:index.php?action=error-404');
                }
            break;
            case 'report' :
                if(isset($_GET['comment-id'])){
                    report($_GET['comment-id']);
                }else{
                    header('Location:index.php?action=error-404');
                }                
            break;
            case 'admin-clear-comment' :
                if(isset($_GET['comment-id'])){
                    adminClearComment($_GET['comment-id']);
                }else{
                    header('Location:index.php?action=error-404');
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