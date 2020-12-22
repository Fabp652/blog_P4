<?php $title = 'Modfication du billet';?>
<?php ob_start();?>
<h1>Modification du billet</h1>
<form action="index.php?action=update-post&amp;id=<?=$_GET['id']?>" method="POST">
    <label>
        <input type="text" name="title" />
    </label>
    <textarea name="content"></textarea>
    <input type="submit" name="Modifier" />
</form>
<?php 
    $content = ob_get_clean();
    require('view/template.php');
?>