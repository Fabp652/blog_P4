<?php $title = 'Authentification'?>

<?php ob_start()?>
<h1>Authentification</h1>
<form action = 'index.php?action=authentification' method = 'POST'>
    <label>
        Votre pseudo : <input type='text' name='pseudo' />
    </label>
    <label>
        Votre mot de passe : <input type='password' name='password' />
    </label>
    <input type='submit' name="s'authentifier" />
</form>

<?php
$content = ob_get_clean();
require('view/template.php');
?>