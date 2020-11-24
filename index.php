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
        }
    }else{
        listPosts();
    }
    
}

catch(Exception $e){
    $errorMessage = $e->getMessage();
    echo 'Erreur :' . $errorMessage . '\n';
}