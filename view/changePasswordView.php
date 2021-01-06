<?php $title='changement de mot de passe'?>
<?php ob_start() ?>

<h1 class="text-center">Modfication de votre mot de passe</h1>

<form action='index.php?action=new-password' method='POST' class="flex flex-col items-start justify-between h-48 w-1/3 m-auto shadow-lg rounded-xl p-4" >
    <label>
        Votre nouveau mot de passe : <input type='password' name='password' class="border border-solid" />
    </label>
    <input type='submit' name='modifier' class="self-center border border-solid border-blue-500 rounded-2xl p-1 bg-blue-500" />
</form>
<?php 
    $content = ob_get_clean();
    require('view/template.php');
?>