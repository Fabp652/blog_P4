<?php $title='changement de mot de passe'?>
<?php ob_start() ?>

<h1 class="text-center text-white text-4xl pt-20 mb-2">Modfication de votre mot de passe</h1>

<div class="bg-white w-4/5 m-auto p-10 rounded-t-xl">
<form action='index.php?action=new-password' method='POST' class="flex flex-col items-start justify-around h-40 w-1/2 m-auto shadow-lg rounded-xl p-4" >
    <label>
        Votre nouveau mot de passe : <input type='password' name='password' class="border border-solid focus:border-blue-800 focus:outline-none ml-2" />
    </label>
    <input type='submit' name='modifier' value="Modifier le mot de passe" class="font-medium self-center border border-solid border-blue-300 rounded-3xl py-2 px-3 bg-blue-300 cursor-pointer hover:bg-blue-400" />
</form>
</div>
<?php 
    $content = ob_get_clean();
    require('view/template.php');
?>