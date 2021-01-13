<?php $title = 'inscription' ?>

<?php ob_start() ?>
<h1 class="text-center text-white text-4xl pt-20 mb-2">Inscription</h1>
<div class="bg-white w-4/5 m-auto p-10 rounded-t-xl">
<p class="text-center text-lg my-2">Veuillez rentrer vos données dans les champs ci-dessous pour créer un compte :</p>

<form action='index.php?action=create-user' method='POST' class="flex flex-col items-start justify-between h-72 w-1/2 m-auto shadow-lg rounded-xl p-4">
    <label class="my-2 w-4/5 flex justify-between pt-2">
        Votre pseudo : <input type='text' name='pseudo' class="border border-solid focus:border-blue-800 focus:outline-none" />
    </label>

    <label class="my-2 w-4/5 flex justify-between">
        Votre mot de passe : <input type='password' name='password' class="border border-solid focus:border-blue-800 focus:outline-none" />
    </label>

    <label class="my-2 w-4/5 flex justify-between">
        Confirmer votre mot de passe : <input type='password' name='validPass' class="border border-solid focus:border-blue-800 focus:outline-none" />
    </label>

    <label class="my-2 w-4/5 flex justify-between">
        Votre adresse email : <input type='email' name='email' class="border border-solid focus:border-blue-800 focus:outline-none" />
    </label>
    <input type='submit' name="inscription" value="S'incrire" class="self-center border border-solid border-blue-300 rounded-3xl py-2 px-5 bg-blue-300 my-2 cursor-pointer hover:bg-blue-400" />
</form>
</div>
<?php
$content = ob_get_clean();
require('view/template.php');
?>