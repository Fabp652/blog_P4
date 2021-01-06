<?php $title='profil' ?>

<?php ob_start() ?>
<h1 class="text-center">Profil</h1>
<p class="text-center">Votre pseudo : <?php echo $_SESSION['pseudo'] ?></p>
<p class="text-center">Votre adresse email : <?php echo $_SESSION['email'] ?></p>
<p class="text-center"><a href='index.php?action=change-password' class="border border-solid border-blue-500 rounded-2xl p-1 mt-2 bg-blue-500">Modifier votre mot de passe</a></p>
<?php 
    $content = ob_get_clean();
    require('view/template.php');
?>