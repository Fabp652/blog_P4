<?php $title = 'Erreur'; ?>
TODO;
<?php ob_start();?>
<h1>ERREUR 404</h1>
<p>Une erreur à été détecté veuillez réessayer</p>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>