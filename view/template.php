<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <!-- <link href="public/style.css" rel="stylesheet" /> -->
    <link href="public/tailwind.css" rel="stylesheet" /> 
    <?php 
    if(isset($script)){
        echo $script;
    }
    ?>
    <title><?php echo $title; ?></title>
</head>

<body>
<nav>
    <ul class='flex justify-end'>
        <li>
            <a href='index.php?action=listPost' class='p-2 hover:bg-blue-500'>Accueil</a>
        </li>
        <?php
        if(isset($_SESSION['pseudo'])){
            if($_SESSION['is_admin'] == '1'){
        ?>
        <li>
            <a href="index.php?action=new-post&amp;user-id=<?=$_SESSION['id']?>" class='p-2 hover:bg-blue-500'>Créer un billet</a>
        </li>
        <li>
            <a href="index.php?action=admin" class='p-2 hover:bg-blue-500'>Espace d'administration</a>
        </li>
        <?php
            }
        ?>
        <li>
            <a href='index.php?action=profile' class='p-2 hover:bg-blue-500'>Profil</a>
        </li>
        <li>
            <a href='index.php?action=logout' class='p-2 hover:bg-blue-500'>Déconnexion</a>
        </li>
        <?php
        }else{
        ?>
        <li>
            <a href='index.php?action=connection' class='p-2 hover:bg-blue-500'>Connexion</a>
        </li>
        <li>
            <a href='index.php?action=inscription' class='p-2 hover:bg-blue-500'>Inscription</a>
        </li>
        <?php
        }
        ?>
    </ul>
</nav>
    <?php echo $content; ?>
</body>

</html>