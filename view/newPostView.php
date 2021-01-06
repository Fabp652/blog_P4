<?php ob_start() ?>
<script src="https://cdn.tiny.cloud/1/zxsmm3d6tivwqxa3dwy565rzmyj5q4th6hyc2yqqqlhfld59/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
  selector: 'form'
});
</script>
<?php $script = ob_get_clean();?>
<?php $title = 'Nouveau chapitre'?>
<?php ob_start()?>
<h1 class="text-center">Créer un nouveau Chapitre</h1>
<form action="index.php?action=create-post&amp;user-id=<?=$_GET['user-id']?>" method="POST" class="flex flex-col items-start justify-between h-48 w-1/3 m-auto shadow-lg rounded-xl p-4">
    <label>
        <input type="text" name="title" />
    </label>
    <textarea name="content"></textarea>
    <input type="submit" name="Publier" class="self-center border border-solid border-blue-500 rounded-2xl p-1 bg-blue-500" />
</form>
<?php
$content = ob_get_clean();
require('view/template.php');