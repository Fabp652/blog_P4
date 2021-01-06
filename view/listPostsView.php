<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h1 class="text-center">Billet simple pour l'Alaska</h1>
<p class="text-center">Bienvenue sur mon blog ! Vous trouverez ci-dessous les derniers chapitres publié : </p>

<?php
while ($blog = $posts->fetch()){
?>

<div class='flex flex-col items-center border-2 border-solid border-blue-500'>
    <h3 class="w-full text-center bg-blue-300 border-b-2 border-solid border-blue-500 py-2">
        <?=htmlspecialchars($blog['title']); ?>
    </h3>
    <p>
        <?=nl2br(htmlspecialchars($blog['content'])); ?>
    </p>
    <a href="index.php?action=post&amp;id=<?= $blog['id'] ?>" class="border border-solid border-blue-500 rounded-2xl p-1 mt-2 bg-blue-500">Commentaires</a>
    <p class='self-end'>Publié le <?= $blog['creation_date_fr']; ?></p>
</div>
<?php 
    if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == '1'){        
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