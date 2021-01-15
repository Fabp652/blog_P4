<?php $title='Modification du commentaire'?>
<?php ob_start() ?>

<h1 class="text-center text-3xl pt-20 mb-2">Modification de votre commentaire</h1>

<div class="bg-white w-full py-6 md:w-4/5 m-auto md:p-6 rounded-xl">
<form action='index.php?action=new-comment&amp;post-id=<?=$_GET['post-id']?>&amp;comment-id=<?=$_GET['comment-id']?>' method='POST' class="flex flex-col items-start justify-around w-11/12 md:w-3/4 lg:w-1/2 m-auto md:shadow-lg md:rounded-xl md:p-4" >
    <textarea name='comment' maxlength="140" class="border border-solid p-2 m-auto focus:border-blue-800 focus:outline-none w-full h-full"></textarea>
    <input type="submit" name="update-comment" value="Modifier le commentaire" class="font-medium self-center border border-solid border-blue-300 rounded-3xl py-2 px-3 bg-blue-300 cursor-pointer hover:bg-blue-400 text-sm md:text-base mt-4" />
</form>
</div>
<?php 
    $content = ob_get_clean();
    require('view/template.php');
?>