<?php
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
            case 'logout' :
                logout();
                listPosts();
            break;
        }
    }else{
        listPosts();
    }
    
}

catch(Exception $e){
    $errorMessage = $e->getMessage();
    echo 'Erreur :' . $errorMessage . '\n';
}