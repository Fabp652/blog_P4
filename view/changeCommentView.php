<?php $title='Modification du commentaire'?>
<?php ob_start() ?>

<h1>Modfication de votre commentaire</h1>

<form action='index.php?action=new-comment&amp;post-id=<?=$_GET['post-id']?>&amp;comment-id=<?=$_GET['comment-id']?>' method='POST' >
    <textarea name='comment'></textarea>
    <input type="submit" name="modifier" />
</form>
<?php 
    $content = ob_get_clean();
    require('view/template.php');
?>