<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<div class="bg-alaska">
    <h1 class="text-center text-white text-7xl pt-20 m-6">Billet simple pour l'Alaska</h1>
    <p class="text-center text-white text-lg mt-2 mb-4">Bienvenue sur mon blog ! Vous trouverez ci-dessous les derniers chapitres publié : </p>
</div>

<div class="bg-white w-4/5 m-auto p-10 rounded-t-xl">
    <?php
    while ($blog = $posts->fetch()){
    ?>

    <div class='flex flex-col items-center border-2 border-solid border-blue-400 w-4/5 m-auto relative'>
        <h3 class="w-full text-center bg-gradient-to-t from-blue-400 to-blue-300 border-b-2 border-solid border-blue-400 py-2">
            <?=htmlspecialchars($blog['title']); ?>
        </h3>
        <p class="text-center my-2 pb-2 border-b-2 border-blue-400">
            <?=nl2br(htmlspecialchars($blog['content'])); ?>
        </p>
        <a href="index.php?action=post&amp;id=<?= $blog['id'] ?>" class="font-medium border border-solid border-blue-300 rounded-2xl p-1 mt-2 bg-blue-300 transform transition duration-500 ease-in-out hover:scale-110 hover:bg-blue-400">Commentaires</a>
        <?php 
        if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == '1'){        
        ?> 
            <div class="self-start flex justify-around w-40 absolute bottom-0 ml-2">
                <a href="index.php?action=change-post&amp;id=<?= $blog['id']?>" class="font-medium hover:text-blue-500">Modifier</a>
                <a href="index.php?action=delete-post&amp;id=<?= $blog['id']?>" class="font-medium hover:text-blue-500">Supprimer</a>
            </div>
        <?php
        }
        ?>
        <p class='self-end mr-2'>Publié le <?= $blog['creation_date_fr']; ?></p>
    </div>
    <?php
    }
    ?>
</div>
<?php
$posts->closeCursor();

$content = ob_get_clean();

require('view/template.php');
?>