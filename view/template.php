<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="public/style.css" rel="stylesheet" />
    <link href="public/tailwind.css" rel="stylesheet" /> 
    <?php 
    if(isset($script)){
        echo $script;
    }
    ?>
    <title><?php echo $title; ?></title>
</head>

<body class="bg-gradient-to-b bg-fixed from-white to-gray-200">
    <nav class="lg:pr-20 lg:h-16 sticky w-full top-0 bg-white">
        <ul class='flex flex-wrap justify-center h-full items-center flex-col lg:flex-row lg:justify-end'>
            <li>
                <a href='index.php?action=listPost' class='font-medium lg:p-4 bg-gradient-to-t from-white to-white hover:from-blue-600 hover:to-blue-300 rounded-sm text-sm md:text-base'>Accueil</a>
            </li>
            <?php
            if(isset($_SESSION['pseudo'])){
                if($_SESSION['is_admin'] == '1'){
            ?>
            <li>
                <a href="index.php?action=new-post&amp;user-id=<?=$_SESSION['id']?>" class='font-medium lg:p-4 bg-gradient-to-t from-white to-white hover:from-blue-600 hover:to-blue-300 rounded-sm text-sm md:text-base'>Créer un billet</a>
            </li>
            <li>
                <a href="index.php?action=admin" class='font-medium lg:p-4 bg-gradient-to-t from-white to-white hover:from-blue-600 hover:to-blue-300 rounded-sm text-sm md:text-base'>Espace d'administration</a>
            </li>
            <?php
                }
            ?>
            <li>
                <a href='index.php?action=profile' class='font-medium lg:p-4 bg-gradient-to-t from-white to-white hover:from-blue-600 hover:to-blue-300 rounded-sm text-sm md:text-base'>Profil</a>
            </li>
            <li>
                <a href='index.php?action=logout' class='font-medium lg:p-4 bg-gradient-to-t from-white to-white hover:from-blue-600 hover:to-blue-300 rounded-sm text-sm md:text-base'>Déconnexion</a>
            </li>
            <?php
            }else{
            ?>
            <li>
                <a href='index.php?action=connection' class='font-medium lg:p-4 bg-gradient-to-t from-white to-white hover:from-blue-600 hover:to-blue-300 rounded-sm text-sm md:text-base'>Connexion</a>
            </li>
            <li>
                <a href='index.php?action=inscription' class='font-medium lg:p-4 bg-gradient-to-t from-white to-white hover:from-blue-600 hover:to-blue-300 rounded-sm text-sm md:text-base'>Inscription</a>
            </li>
            <?php
            }
            ?>
        </ul>
    </nav>
    <?php echo $content; ?>
</body>

</html>