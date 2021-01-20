<?php $title = $post['title']; ?>

<?php ob_start() ?>
<div class="bg-banner flex mb-10 h-80">
    <div class="bg-white bg-opacity-25 w-full flex items-center justify-center">
        <div class="bg-blue-400 bg-opacity-80 w-5/6 md:w-2/3">
            <h1 class="text-center text-3xl md:text-4xl lg:text-7xl m-6">Billet simple pour l'Alaska</h1>
        </div>
    </div>
</div>

<div class="bg-white w-full py-6 md:w-4/5 md:m-auto md:p-6 rounded-xl">
    <div class='flex flex-col items-center border-2 border-solid border-blue-400 w-4/5 m-auto'>
        <h3 class="w-full text-center bg-gradient-to-t from-blue-400 to-blue-300 border-b-2 border-solid border-blue-400 py-2">
            <?php echo htmlspecialchars($post['title']); ?>
        </h3>
        <p class="text-center text-sm leading-6 md:text-base my-2 pb-2">
            <?php echo nl2br(htmlspecialchars($post['content'])); ?>
        </p>
        <p class='text-sm md:text-base lg:self-end lg:mr-2'>Publié le <?php echo $post['creation_date_fr']; ?></p>
    </div>

    <div class="flex flex-col items-center lg:items-start lg:ml-28 mt-2">
        <h2 class="text-xl">Commentaires</h2>

        <?php
        if(isset($_SESSION['pseudo'])){
        ?>
            <form action='index.php?action=create-comment&amp;id=<?=$post['id'] ?>' method="POST" class="flex flex-col items-center md:items-start justify-between h-48 w-4/5 lg:w-1/2 border border-solid border-blue-200 rounded-xl p-4 mb-8">
                <textarea name="comment" maxlength="140" class="border border-solid m-auto focus:border-blue-800 focus:outline-none w-full h-full"></textarea>
                <input type="submit" name="add-comment" value="Ajouter le commentaire" class="font-medium md:self-end border border-solid border-blue-300 rounded-3xl py-2 px-3 bg-blue-300 cursor-pointer hover:bg-blue-400 text-sm md:text-base mt-4" />
            </form>
        <?php
        }
        ?>

        <?php 
        while($comment = $comments->fetch()){
        ?>
            <div class='flex flex-col items-start border border-solid border-blue-200 w-4/5 h-40 lg:w-1/2 my-2 relative'>
                <p class="my-1.5 mx-2.5 border-b border-solid border-blue-200 text-sm md:text-base"><?=getAuthor($comment['user_id']); ?> le <?= $comment['comment_date_fr']; ?> :</p>
                <P class="my-1.5 mx-2.5 text-sm whitespace-normal break-all md:text-base"><?=nl2br(htmlspecialchars($comment['comment'])); ?></P>
                <?php
                if(isset($_SESSION['id']) && $_SESSION['id'] == $comment['user_id']){
                ?>
                    <div class="flex w-40 justify-around ml-2 absolute bottom-0">
                        <a href="index.php?action=change-comment&amp;post-id=<?=$post['id']?>&amp;comment-id=<?=$comment['user_id']?>&amp;user-id=<?=$comment['user_id']?>" class="hover:text-blue-800 text-sm md:text-base">Modifier</a>
                        <a href="index.php?action=clear-comment&amp;post-id=<?=$post['id']?>&amp;comment-id=<?=$comment['user_id']?>&amp;user-id=<?=$comment['user_id']?>" class="hover:text-blue-800 text-sm md:text-base">Supprimer</a>
                    </div>
                <?php
                }
                ?>
                <?php
                if(isset($comment['report']) && $comment['report'] == 0){
                ?>
                    <a href="index.php?action=report&amp;comment-id=<?=$comment['id'] ?>" class="font-medium self-end mr-2 hover:text-blue-500 absolute bottom-0 text-sm md:text-base">Signaler</a>
                <?php
                }
                ?>  
            </div>
        <?php
        }
        ?>
    </div>
</div>
    <?php

$comments->closeCursor();
$content = ob_get_clean();
require('view/template.php');