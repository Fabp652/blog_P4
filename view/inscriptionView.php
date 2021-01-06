<?php $title = 'inscription' ?>

<?php ob_start() ?>
<h1 class="text-center">inscription</h1>
<p class="text-center">Veuillez rentrer vos données dans les champs ci-dessous pour créer un compte :</p>

<form action='index.php?action=create-user' method='POST' class="flex flex-col items-start justify-between h-48 w-1/3 m-auto shadow-lg rounded-xl p-4">
    <label>
        Votre pseudo : <input type='text' name='pseudo' class="border border-solid" />
    </label>

    <label>
        Votre mot de passe : <input type='password' name='password' class="border border-solid" />
    </label>

    <label>
        Confirmer votre mot de passe : <input type='password' name='validPass' class="border border-solid" />
    </label>

    <label>
        Votre adresse email : <input type='email' name='email' class="border border-solid" />
    </label>
    <input type='submit' name="s'inscrire" class="self-center border border-solid border-blue-500 rounded-2xl p-1 bg-blue-500" />
</form>
<?php
$content = ob_get_clean();
require('view/template.php');
?>