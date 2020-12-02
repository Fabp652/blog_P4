<?php $title = 'Page de connexion'?>

<?php ob_start()?>
<h1>Page de connexion</h1>
<form action = 'index.php?action=connect-user' method = 'POST'>
    <label>
        Votre pseudo : <input type='text' name='pseudo' />
    </label>
    <label>
        Votre mot de passe : <input type='password' name='password' />
    </label>
    <input type='submit' name='se connecter' />
</form>

<?php
$content = ob_get_clean();
require('view/template.php');
?>