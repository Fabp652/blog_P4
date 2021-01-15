<?php ob_start() ?>
<script src="https://cdn.tiny.cloud/1/zxsmm3d6tivwqxa3dwy565rzmyj5q4th6hyc2yqqqlhfld59/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
  selector: 'textarea',
  width : '90%',
  height : 500
});
</script>
<?php $script = ob_get_clean();?>
<?php $title = 'Nouveau chapitre'?>
<?php ob_start()?>
<h1 class="text-center text-3xl pt-20 mb-2">Créer un nouveau Chapitre</h1>
<div class="bg-white w-full py-6 md:w-4/5 m-auto md:p-6 rounded-xl">
<form action="index.php?action=create-post&amp;user-id=<?=$_GET['user-id']?>" method="POST" class="flex flex-col items-center justify-between w-full">
    <label class="my-2">
        Titre : <input type="text" name="title" class="border border-solid focus:border-blue-800 focus:outline-none" />
    </label>
    <textarea name="content" class="my-2"></textarea>
    <input type="submit" name="add-post" value="Publier" class="font-medium border border-solid border-blue-300 rounded-3xl py-2 px-3 bg-blue-300 my-2 cursor-pointer hover:bg-blue-400 text-sm md:text-base" />
</form>
</div>
<?php
$content = ob_get_clean();
require('view/template.php');