<?php $title='changement de mot de passe'?>
<?php ob_start() ?>

<h1 class="text-center text-3xl mb-2">Modification de votre mot de passe</h1>

<div class="bg-white w-full py-6 md:w-4/5 m-auto md:p-6 rounded-xl">
<form action='index.php?action=new-password' method='POST' class="flex flex-col items-start justify-around w-11/12 md:w-3/4 lg:w-1/2 m-auto md:shadow-lg md:rounded-xl md:p-4" >
    <label class="my-2 w-11/12 text-sm md:text-base md:w-4/5 lg:w-5/6 flex justify-between pt-2">
        Votre nouveau mot de passe : <input type='password' name='password' class="border border-solid focus:border-blue-800 focus:outline-none ml-2" />
    </label>
    <input type='submit' name='modifier' value="Modifier le mot de passe" class="font-medium self-center border border-solid border-blue-300 rounded-3xl py-2 px-3 bg-blue-300 cursor-pointer hover:bg-blue-400 text-sm md:text-base" />
</form>
</div>
<?php 
    $content = ob_get_clean();
    require('view/template.php');
?>