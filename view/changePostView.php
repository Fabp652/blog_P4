<?php $title = 'Modfication du billet';?>
<?php ob_start();?>
<h1 class="text-center">Modification du billet</h1>
<form action="index.php?action=update-post&amp;id=<?=$_GET['id']?>" method="POST" class="flex flex-col items-start justify-between h-48 w-1/3 m-auto shadow-lg rounded-xl p-4">
    <label>
        <input type="text" name="title" />
    </label>
    <textarea name="content"></textarea>
    <input type="submit" name="Modifier" class="self-center border border-solid border-blue-500 rounded-2xl p-1 bg-blue-500" />
</form>
<?php 
    $content = ob_get_clean();
    require('view/template.php');
?>