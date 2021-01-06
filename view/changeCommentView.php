<?php $title='Modification du commentaire'?>
<?php ob_start() ?>

<h1 class="text-center">Modfication de votre commentaire</h1>

<form action='index.php?action=new-comment&amp;post-id=<?=$_GET['post-id']?>&amp;comment-id=<?=$_GET['comment-id']?>' method='POST' class="flex flex-col items-start justify-between h-48 w-1/3 m-auto shadow-lg rounded-xl p-4" >
    <textarea name='comment' class="border border-solid"></textarea>
    <input type="submit" name="modifier" class="self-center border border-solid border-blue-500 rounded-2xl p-1 bg-blue-500" />
</form>
<?php 
    $content = ob_get_clean();
    require('view/template.php');
?>