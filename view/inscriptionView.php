<?php $title = 'inscription' ?>

<?php ob_start() ?>
<h1 class="text-center text-3xl mb-2">Inscription</h1>
<div class="bg-white w-full py-6 md:w-4/5 md:m-auto md:p-6 rounded-xl">
<p class="text-center text-base md:text-lg mx-0.5 my-2">Veuillez rentrer vos données dans les champs ci-dessous pour créer un compte :</p>

<form action='index.php?action=create-user' method='POST' class="flex flex-col items-start justify-between w-11/12 md:w-3/4 lg:w-1/2 m-auto md:shadow-lg md:rounded-xl md:p-4">
    <label class="my-2 w-full text-sm md:text-base md:w-5/6  flex justify-between pt-2">
        Votre pseudo : <input type='text' name='pseudo' class="border border-solid focus:border-blue-800 focus:outline-none" />
    </label>

    <label class="my-2 w-full text-sm md:text-base md:w-5/6  flex justify-between">
        Votre mot de passe : <input type='password' name='password' class="border border-solid focus:border-blue-800 focus:outline-none" />
    </label>

    <label class="my-2 w-full text-sm md:text-base md:w-5/6  flex justify-between">
        Confirmer votre mot de passe : <input type='password' name='validPass' class="border border-solid focus:border-blue-800 focus:outline-none" />
    </label>

    <label class="my-2 w-full text-sm md:text-base md:w-5/6  flex justify-between">
        Votre adresse email : <input type='email' name='email' class="border border-solid focus:border-blue-800 focus:outline-none" />
    </label>
    <input type='submit' name="inscription" value="S'incrire" class="self-center border border-solid border-blue-300 rounded-3xl py-2 px-5 bg-blue-300 my-2 cursor-pointer hover:bg-blue-400 text-sm md:text-base" />
</form>
</div>
<?php
$content = ob_get_clean();
require('view/template.php');
?>