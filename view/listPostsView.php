<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<p>Bienvenue sur mon blog ! Vous trouverez ci-dessous les derniers chapitres publié : </p>

<?php
while ($blog = $posts->fetch()){
?>

<div class='chapter'>
    <h3>
        <?=htmlspecialchars($blog['title']); ?>
    </h3>
    <p>
        <?=nl2br(htmlspecialchars($blog['content'])); ?>
    </p>
    <a href="index.php?action=post&amp;id=<?= $blog['id'] ?>">Commentaires</a>
    <p class='date_post'>Publié le <?= $blog['creation_date_fr']; ?></p>
</div>
<?php 
    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){        
?> 
<a href="index.php?action=change-post&amp;id=<?= $blog['id']?>">Modifier</a>
<a href="index.php?action=delete-post&amp;id=<?= $blog['id']?>">Supprimer</a>
<?php
    }
}
$posts->closeCursor();

$content = ob_get_clean();

require('view/template.php');
?>