<?php $title = 'Espace d\'administration'; ?>

<?php ob_start();?>
<h1 class="text-center text-white text-4xl pt-20 mb-6">Espace d'administration</h1>
<div class="bg-white w-4/5 m-auto p-10 rounded-t-xl">
<h3 class="text-center text-lg mt-2 mb-4">Commentaire(s) signalé(s) :</h3>
<?php
while($report = $reportComments->fetch()){
?>
    <div class="flex flex-col items-start border border-solid border-blue-200 w-2/5 m-auto my-4">
        <p class="my-2 ml-2 border-b border-solid border-blue-200"><?=getAuthor($report['user_id']) ?> le <?= $report['comment_date_fr']; ?> :</p>
        <p class="my-2 ml-2"><?=$report['comment'] ?></p>
        <a href="index.php?action=admin-clear-comment&amp;comment-id=<?=$report['id']?>" class="font-medium self-end mr-2 hover:text-blue-800">Supprimer</a>
    </div>
<?php
}
?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>