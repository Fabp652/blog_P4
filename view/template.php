<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <link href="public/style.css" rel="stylesheet" />
    <title><?php echo $title; ?></title>
</head>

<body>
<nav>
    <ul class='nav-content'>
        <li>
            <a href='index.php?action=listPost' class='nav-link'>Accueil</a>
        </li>
        <?php
        if(isset($_SESSION['pseudo'])){
        ?>
        <li>
            <a href='index.php?action=profile' class='nav-link'>Profil</a>
        </li>
        <li>
            <a href='index.php?action=logout' class='nav-link'>Déconnexion</a>
        </li>
        <?php
        }else{
            session_destroy();
        ?>
        <li>
            <a href='index.php?action=connection' class='nav-link'>Connexion</a>
        </li>
        <li>
            <a href='index.php?action=inscription' class='nav-link'>Inscription</a>
        </li>
        <?php
        }
        ?>
    </ul>
</nav>
    <?php echo $content; ?>
</body>

</html>