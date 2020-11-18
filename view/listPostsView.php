<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<p>Bienvenue sur mon blog ! Vous trouverez ci-dessous les derniers chapitres publié : </p>

<?php
while ($blog = $posts->fetch()){
?>

<div class='chapter'>
    <h3>
        <?php htmlspecialchars($blog['title']); ?>
        le <?php $blog['creation_date_fr']; ?>
    </h3>
    <p>
        <?php nl2br(htmlspecialchars($blog['content'])); ?>
        <a href="index.php?action=post&amp;id=<?php $blog['id'] ?>">Commentaires</a>
    </p>
</div>

<?php
}
$posts->closeCursor();

$content = ob_get_clean();

require('template.php');
?>