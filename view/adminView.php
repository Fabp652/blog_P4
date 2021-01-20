<?php $title = 'Espace d\'administration'; ?>

<?php ob_start();?>
<h1 class="text-center text-3xl mb-6">Espace d'administration</h1>
<div class="bg-white w-full py-6 md:w-4/5 md:m-auto md:p-6 rounded-xl flex flex-col justify-around items-center">
<a href="index.php?action=new-post&amp;user-id=<?=$_SESSION['id']?>" class='font-medium border border-solid border-blue-300 rounded-3xl py-2 px-3 mt-2 bg-blue-300 hover:bg-blue-400 text-sm my-6 md:text-base transform transition duration-500 ease-in-out hover:scale-110'>Créer un billet</a>
<h3 class="text-lg mt-2 mb-4">Commentaire(s) signalé(s) :</h3>
<?php
while($report = $reportComments->fetch()){
?>
    <div class="flex flex-col items-start border border-solid border-blue-200 w-4/5 h-40 lg:w-1/2 my-2 relative mx-auto">
        <p class="my-2 ml-2 border-b border-solid border-blue-200"><?=getAuthor($report['user_id']) ?> le <?= $report['comment_date_fr']; ?> :</p>
        <p class="my-1.5 mx-2.5 text-sm whitespace-normal break-all md:text-base"><?=$report['comment'] ?></p>
        <a href="index.php?action=admin-clear-comment&amp;comment-id=<?=$report['id']?>" class="font-medium self-end mr-2 hover:text-blue-800 text-sm md:text-base absolute bottom-0">Supprimer</a>
    </div>
<?php
}
?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>