<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<div class="bg-banner flex mb-10 h-80">
    <div class="bg-white bg-opacity-25 w-full flex items-center justify-center">
        <div class="bg-blue-400 bg-opacity-80 w-5/6 md:w-2/3">
            <h1 class="text-center text-3xl md:text-4xl lg:text-7xl m-6">Billet simple pour l'Alaska</h1>
            <p class="text-center md:text-lg mt-2 mb-4">Bienvenue sur mon blog ! Vous trouverez ci-dessous les derniers chapitres publié : </p>
        </div>
    </div>
</div>

<div class="bg-white w-full py-6 md:w-4/5 md:p-6 m-auto rounded-xl relative">
    <?php
    while ($blog = $posts->fetch()){
    ?>

    <div class='flex flex-col items-center border-2 border-solid border-blue-400 w-5/6 md:w-4/5 mx-auto relative'>
        <h3 class="w-full text-center bg-gradient-to-t from-blue-400 to-blue-300 border-b-2 border-solid border-blue-400 py-2">
            <?=htmlspecialchars($blog['title']); ?>
        </h3>
        <p class="text-center text-sm leading-6 md:text-base my-2 pb-2 border-b-2 border-blue-400">
            <?=nl2br(htmlspecialchars($blog['content'])); ?>
        </p>
        <a href="index.php?action=post&amp;id=<?= $blog['id'] ?>" class="font-medium border border-solid border-blue-300 rounded-2xl p-1 my-2 bg-blue-300 transform transition duration-500 ease-in-out hover:scale-110 hover:bg-blue-400 text-sm md:text-base">Commentaires</a>
        <p class='text-sm md:text-base lg:self-end lg:mr-2'>Publié le <?= $blog['creation_date_fr']; ?></p>
    </div>
    <?php 
    if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == '1'){        
    ?>
        <div class="flex justify-start w-5/6 md:w-4/5 mx-auto">
            <a href="index.php?action=change-post&amp;id=<?= $blog['id']?>" class="font-medium hover:text-blue-500 px-1 border-r-2 border-b-2 border-l-2 border-solid border-blue-400 text-sm md:text-base">Modifier</a>
            <a href="index.php?action=delete-post&amp;id=<?= $blog['id']?>" class="font-medium hover:text-blue-500 px-1.5 border-r-2 border-b-2 border-solid border-blue-400 text-sm md:text-base">Supprimer</a>
        </div>
    <?php
    }
    ?>
    <?php
    }
    ?>
</div>
<?php
$posts->closeCursor();

$content = ob_get_clean();

require('view/template.php');
?>