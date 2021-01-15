<?php $title='profil' ?>

<?php ob_start() ?>
<h1 class="text-center text-3xl mb-6">Profil</h1>
<div class="bg-white w-full md:w-4/5 m-auto p-10 rounded-xl flex flex-col items-center">
<p class="my-4 text-sm md:text-base">Votre pseudo : <?php echo $_SESSION['pseudo'] ?></p>
<p class="my-4 text-sm md:text-base">Votre adresse email : <?php echo $_SESSION['email'] ?></p>
<a href='index.php?action=change-password' class="font-medium border border-solid border-blue-300 rounded-3xl py-2 px-3 mt-2 bg-blue-300 text-sm my-6 md:text-base">Modifier votre mot de passe</a>
</div>
<?php 
    $content = ob_get_clean();
    require('view/template.php');
?>