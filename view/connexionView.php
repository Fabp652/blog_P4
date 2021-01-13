<?php $title = 'Connexion'?>

<?php ob_start()?>
<h1 class="text-center text-white text-4xl pt-20 mb-2">Connexion</h1>
<div class="bg-white w-4/5 m-auto p-10 rounded-t-xl">
<form action = 'index.php?action=connect-user' method = 'POST' class="flex flex-col items-start justify-between h-48 w-1/2 m-auto shadow-lg rounded-xl p-4">
    <label class="my-2 w-4/5 flex justify-between pt-2">
        Votre pseudo : <input type='text' name='pseudo' class="border border-solid focus:border-blue-800 focus:outline-none" />
    </label>
    <label class="my-2 w-4/5 flex justify-between">
        Votre mot de passe : <input type='password' name='password' class="border border-solid focus:border-blue-800 focus:outline-none" />
    </label>
    <input type='submit' name='connect' value="Se connecter" class="self-center border border-solid border-blue-300 rounded-3xl py-2 px-3 bg-blue-300 cursor-pointer hover:bg-blue-400" />
</form>
</div>
<?php
$content = ob_get_clean();
require('view/template.php');
?>