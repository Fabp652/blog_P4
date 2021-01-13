<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="public/tailwind.config.js"></script>
    <link href="public/style.css" rel="stylesheet" />
    <link href="public/tailwind.css" rel="stylesheet" /> 
    <?php 
    if(isset($script)){
        echo $script;
    }
    ?>
    <title><?php echo $title; ?></title>
</head>

<body>
    <nav class="pr-20 h-16 fixed w-full top-0">
        <ul class='flex justify-end h-full items-center'>
            <li>
                <a href='index.php?action=listPost' class='font-medium p-4 bg-gradient-to-t hover:from-blue-600 hover:to-blue-300 rounded-sm'>Accueil</a>
            </li>
            <?php
            if(isset($_SESSION['pseudo'])){
                if($_SESSION['is_admin'] == '1'){
            ?>
            <li>
                <a href="index.php?action=new-post&amp;user-id=<?=$_SESSION['id']?>" class='font-medium p-4 bg-gradient-to-t hover:from-blue-600 hover:to-blue-300 rounded-sm'>Créer un billet</a>
            </li>
            <li>
                <a href="index.php?action=admin" class='font-medium p-4 bg-gradient-to-t hover:from-blue-600 hover:to-blue-300 rounded-sm'>Espace d'administration</a>
            </li>
            <?php
                }
            ?>
            <li>
                <a href='index.php?action=profile' class='font-medium p-4 bg-gradient-to-t hover:from-blue-600 hover:to-blue-300 rounded-sm'>Profil</a>
            </li>
            <li>
                <a href='index.php?action=logout' class='font-medium p-4 bg-gradient-to-t hover:from-blue-600 hover:to-blue-300 rounded-sm'>Déconnexion</a>
            </li>
            <?php
            }else{
            ?>
            <li>
                <a href='index.php?action=connection' class='font-medium p-4 bg-gradient-to-t hover:from-blue-600 hover:to-blue-300 rounded-sm'>Connexion</a>
            </li>
            <li>
                <a href='index.php?action=inscription' class='font-medium p-4 bg-gradient-to-t hover:from-blue-600 hover:to-blue-300 rounded-sm'>Inscription</a>
            </li>
            <?php
            }
            ?>
        </ul>
    </nav>
    <?php echo $content; ?>
    <!-- <div class="absolute top-0 right-0 bottom-0 left-0 bg-black opacity-50 index h-full "></div> -->
</body>

</html>