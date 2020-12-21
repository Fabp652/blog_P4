<?php $title = 'Nouveau chapitre'?>
<?php ob_start()?>
<h1>Créer un nouveau Chapitre</h1>
<form action="index.php?action=create-post&amp;user-id=<?=$_GET['user-id']?>" method="POST">
    <label>
        <input type="text" name="title" />
    </label>
    <textarea name="content"></textarea>
    <input type="submit" name="Publier" />
</form>
<?php
$content = ob_get_clean();
require('view/template.php');