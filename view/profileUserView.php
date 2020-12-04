<?php $title='profil' ?>

<?php ob_start() ?>
<h1>Profil</h1>
<p>Votre pseudo : <?php echo $_SESSION['pseudo'] ?></p>
<p>Votre adresse email : <?php echo $_SESSION['email'] ?></p>
<?php 
    $content = ob_get_clean();
    require('view/template.php');
?>