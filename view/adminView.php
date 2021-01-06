<?php $title = 'Espace d\'administration'; ?>

<?php ob_start();?>
<h1 class="text-center">Espace d'administration</h1>
<h3 class="text-center">Commentaire(s) signalé(s)</h3>
<?php
while($report = $reportComments->fetch()){
?>
<p class="text-center"><?=getAuthor($report['user_id']) ?></p>
<p class="text-center"><?=$report['comment'] ?></p>
<a href="index.php?action=admin-clear-comment&amp;comment-id=<?=$report['id']?>" class="self-center border border-solid border-blue-500 rounded-2xl p-1 bg-blue-500">Supprimer</a>
<?php
}
?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>