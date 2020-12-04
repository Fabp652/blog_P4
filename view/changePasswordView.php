<?php $title='changement de mot de passe'?>
<?php ob_start() ?>

<h1>Modfication de votre mot de passe</h1>

<form action='index.php?action=new-password' method='POST' >
    <label>
        Votre nouveau mot de passe : <input type='password' name='password' />
    </label>
    <input type='submit' name='modifier' />
</form>
<?php 
    $content = ob_get_clean();
    require('view/template.php');
?>