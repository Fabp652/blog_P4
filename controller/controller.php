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

function getAuthor($userId){
    $usersManager = new UsersManager();
    $author = $usersManager->getPseudo($userId);
    return $author;
}

function inscription(){
    require('view/inscriptionView.php');
}

function createUser($pseudo, $email, $password){;
    if(preg_match('#[A-Za-z0-9._-]{4,}#', $pseudo) && preg_match('#[A-Za-z0-9._-]{4,}#', $password) && preg_match('#^[A-Za-z0-9._-]+@[a-z0-9._-]{2,}[a-z]{2,4}$#', $email)){
        $password_hash = password_hash(htmlspecialchars($password), PASSWORD_BCRYPT, ['salt']);
        $newPseudo = htmlspecialchars($pseudo);
        $newEmail = htmlspecialchars($email);
        $usersManager = new UsersManager();
        $usersManager->insertUser($newPseudo, $password_hash, $newEmail);
        require('view/connexionView.php');
    }else{
        header('Location:index.php?action=inscription');
        echo 'Veuillez remplir tous les champs obligatoires pour vous inscrire';
    }
}

function connection(){
    require('view/connexionView.php');
}

function connectUser($pseudo, $password){
    if(preg_match('#[A-Za-z0-9._-]{4}#', $pseudo) && preg_match('#[A-Za-z0-9._-]{4}#', $password)){
        $getPseudo = htmlspecialchars($pseudo);
        $usersManager = new UsersManager();
        $user = $usersManager->getUser($getPseudo);
        if($getPseudo == $user['pseudo']){
            $goodPassword = password_verify(htmlspecialchars($password), $user['pass']);
            if($goodPassword){
                $_SESSION['id'] = $user['id'];
                $_SESSION['pseudo'] = $getPseudo;
                $_SESSION['password'] = htmlspecialchars($password);
                $_SESSION['email'] = $user['email'];
                $_SESSION['is_admin'] = $user['is_admin'];
                require('view/profileUserView.php');
            }else{
                header('Location:index.php?action=connection');
                echo 'Le pseudo ou le mot de passe que vous avez rentré n\'est pas correct';
            }   
        }else{
            header('Location:index.php?action=connection');
            echo 'Le pseudo ou le mot de passe que vous avez rentré n\'est pas correct';            
        }
    }else{
        header('Location:index.php?action=connection');
        echo 'Veuillez renseigner tous les champs pour vous connectez';
    }
}

function profile(){
    require('view/profileUserView.php');
}



function changePassword(){
    require('view/changePasswordView.php');
}

function newPassword($userId, $password){
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $usersManager = new UsersManager();
    $updatePassword = $usersManager->updateUser($userId, $password_hash);
    if($updatePassword == false){
        header('Location:index.php?action=error-404');
    }
    else{
        header('Location:index.php?action=profile');
    }
}

function createComment($postId, $userId, $comment){
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postComment($postId, $userId, $comment);
    if ($affectedLines == false) {
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
    if(isset($_GET['user_id']) && $_GET['user_id'] == $_SESSION['id']){
        $changeComment = $commentManager->updateComment($commentId, $comment);
        if ($changeComment === false) {
            throw new Exception('Impossible de modifier le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }
    else{
        header('Location:index.php?action=error-404');
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

function authentification(){
    require('view/authentificationView.php');
}

function checkAuthentification($pseudo, $password){
    if($pseudo === $_SESSION['pseudo'] && $password === $_SESSION['password']){
        require('view/newPostView.php');
    }else{
        echo 'Le pseudo ou le mot de passe n\'est pas correct';
    }
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

function changePost(){
    require('view/changePostView.php');
}

function updatePost($id, $title, $content){
    $postManager = new PostsManager;
    $updatePost = $postManager->updatePost($id, $title, $content);
    if ($updatePost === false){
        throw new Exception('Impossible de modifier le billet !');
    }
    else{
        header('Location:index.php?action=listPost');
    }
}

function clearPost($id){
    $postManager = new PostsManager;
    $deletePost = $postManager->deletePost($id);
    if($deletePost === false){
        throw new Exception('Impossible de supprimer le billet !');
    }
    else{
        header('Location:index.php?action=listPost');
    }
}

function admin(){
    $commentManager = new CommentManager;
    $reportComments = $commentManager->getReportComments();
    require('view/adminView.php');
}

function report($commentId){
    $commentManager = new CommentManager;
    $reportComment = $commentManager->reportComment($commentId);
    if($reportComment == true){
        echo 'Commentaire signaler !';
    }else{
        echo 'Erreur : le commentaire n\'a pas pus être signaler';
    }
}

function adminClearComment($commentId){
    $commentManager = new CommentManager;
    $deleteComment = $commentManager->deleteComment($commentId);
    if($deleteComment === false){
        throw new Exception('Impossible de supprimer le billet !');
    }else{
        header('Location:index.php?action=admin');
    }
}