<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <link href="public/style.css" rel="stylesheet" />
    <title><?php echo $title; ?></title>
</head>

<body>
<nav>
    <ul>
        <li>
            <a href='index.php?action=listPost'>Acceuil</a>
        </li>
        <li>
            <a href='index.php?action=connection'>Connexion</a>
        </li>
        <li>
            <a href='index.php?action=inscription'>Inscription</a>
        </li>
    </ul>
</nav>
    <?php echo $content; ?>
</body>

</html>