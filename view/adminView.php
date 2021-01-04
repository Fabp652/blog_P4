<?php $title = 'Espace d\'administration'; ?>

<?php ob_start();?>
<h1>Espace d'administration</h1>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>