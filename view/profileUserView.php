<?php $title='profil' ?>

<?php ob_start() ?>
<h1 class="text-center text-white text-4xl pt-20 mb-6">Profil</h1>
<div class="bg-white w-4/5 m-auto p-10 rounded-t-xl">
<p class="text-center my-4">Votre pseudo : <?php echo $_SESSION['pseudo'] ?></p>
<p class="text-center my-4">Votre adresse email : <?php echo $_SESSION['email'] ?></p>
<p class="text-center my-6"><a href='index.php?action=change-password' class="font-medium border border-solid border-blue-300 rounded-3xl py-2 px-3 mt-2 bg-blue-300">Modifier votre mot de passe</a></p>
</div>
<?php 
    $content = ob_get_clean();
    require('view/template.php');
?>