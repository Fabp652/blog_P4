<?php $title='Modification du commentaire'?>
<?php ob_start() ?>

<h1 class="text-center text-white text-4xl pt-20 mb-2">Modfication de votre commentaire</h1>

<div class="bg-white w-4/5 m-auto p-10 rounded-t-xl">
<form action='index.php?action=new-comment&amp;post-id=<?=$_GET['post-id']?>&amp;comment-id=<?=$_GET['comment-id']?>' method='POST' class="flex flex-col items-start justify-between h-48 w-1/2 m-auto shadow-lg rounded-xl p-4" >
    <textarea name='comment' rows="3" cols="50" maxlength="140" class="border border-solid p-2 m-auto focus:border-blue-800 focus:outline-none"></textarea>
    <input type="submit" name="update-comment" value="Modifier le commentaire" class="font-medium self-center border border-solid border-blue-300 rounded-3xl py-2 px-3 bg-blue-300 cursor-pointer hover:bg-blue-400" />
</form>
</div>
<?php 
    $content = ob_get_clean();
    require('view/template.php');
?>