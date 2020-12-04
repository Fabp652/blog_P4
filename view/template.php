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
            <a href='index.php?action=listPost' class='nav-link'>Acceuil</a>
        </li>
        <?php
        //if($_SESSION['id'] != 'null' && $_SESSION['pseudo'] != 'null'){
        ?>
        <li>
            <a href='index.php?action=logout' class='nav-link'>Déconnexion</a>
        </li>
        <?php
        //}else{
            //var_dump($_SESSION['id'], $_SESSION['pseudo']);die();
        ?>
        <li>
            <a href='index.php?action=connection' class='nav-link'>Connexion</a>
        </li>
        <li>
            <a href='index.php?action=inscription' class='nav-link'>Inscription</a>
        </li>
        <?php
        //}
        ?>
    </ul>
</nav>
    <?php echo $content; ?>
</body>

</html>