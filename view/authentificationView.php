<?php $title = 'Authentification'?>

<?php ob_start()?>
<h1 class="text-center">Authentification</h1>
<form action = 'index.php?action=authentification' method = 'POST' class="flex flex-col items-start justify-between h-48 w-1/3 m-auto shadow-lg rounded-xl p-4">
    <label> 
        Votre pseudo : <input type='text' name='pseudo' class="border border-solid" />
    </label>
    <label>
        Votre mot de passe : <input type='password' name='password' class="border border-solid" />
    </label>
    <input type='submit' name="s'authentifier" class="self-center border border-solid border-blue-500 rounded-2xl p-1 bg-blue-500" />
</form>

<?php
$content = ob_get_clean();
require('view/template.php');
?>