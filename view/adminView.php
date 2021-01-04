<?php $title = 'Espace d\'administration'; ?>

<?php ob_start();?>
<h1>Espace d'administration</h1>
<h3>Commentaire(s) signalé(s)</h3>
<?php
while($report = $reportComments->fetch()){
?>
<p><?=getAuthor($report['user_id']) ?></p>
<p><?=$report['comment'] ?></p>
<a href="index.php?action=admin-clear-comment&amp;comment-id=<?=$report['id']?>">Supprimer</a>
<?php
}
?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>