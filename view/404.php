<?php $title = 'Erreur'; ?>
<?php ob_start();?>
<div class="flex flex-col items-center">
    <h1 class="text-7xl my-2">ERREUR 404</h1>
    <p class="text-lg my-2">Une erreur à été détecté veuillez réessayer</p>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>