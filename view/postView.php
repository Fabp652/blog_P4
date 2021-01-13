<?php $title = $post['title']; ?>

<?php ob_start() ?>
<h1 class="text-center text-white text-7xl pt-20 m-6">Billet simple pour l'Alaska</h1>

<div class="bg-white w-4/5 m-auto p-10 rounded-t-xl">
    <div class='flex flex-col items-center border-2 border-solid border-blue-400 w-4/5 m-auto'>
        <h3 class="w-full text-center bg-gradient-to-t from-blue-400 to-blue-300 border-b-2 border-solid border-blue-400 py-2">
            <?php echo htmlspecialchars($post['title']); ?>
        </h3>
        <p class="text-center my-2 pb-2">
            <?php echo nl2br(htmlspecialchars($post['content'])); ?>
        </p>
        <p class='self-end mr-2'>Publié le <?php echo $post['creation_date_fr']; ?></p>
    </div>

    <div class="ml-28 mt-2">
        <h2 class="text-xl">Commentaires</h2>

        <?php
        if(isset($_SESSION['pseudo'])){
        ?>
            <form action='index.php?action=create-comment&amp;id=<?=$post['id'] ?>' method="POST" class="flex flex-col items-start justify-between h-48 w-1/2 border border-solid border-blue-200 rounded-xl p-4 mb-8">
                <textarea name="comment" rows="3" cols="50" maxlength="140" class="border border-solid p-2 m-auto focus:border-blue-800 focus:outline-none"></textarea>
                <input type="submit" name="add-comment" value="Ajouter le commentaire" class="font-medium self-end border border-solid border-blue-300 rounded-3xl py-2 px-3 bg-blue-300 cursor-pointer hover:bg-blue-400" />
            </form>
        <?php
        }
        ?>

        <?php 
        while($comment = $comments->fetch()){
        ?>
            <div class='flex flex-col items-start border border-solid border-blue-200 w-1/2 my-2 relative'>
                <p class="my-1.5 mx-2.5 border-b border-solid border-blue-200"><?=getAuthor($comment['user_id']); ?> le <?= $comment['comment_date_fr']; ?> :</p>
                <P class="my-1.5 mx-2.5"><?=nl2br(htmlspecialchars($comment['comment'])); ?></P>
                <?php
                if(isset($_SESSION['id']) && $_SESSION['id'] == $comment['user_id']){
                ?>
                    <div class="flex w-40 justify-around ml-2 absolute bottom-0">
                        <a href="index.php?action=change-comment&amp;post-id=<?=$post['id']?>&amp;comment-id=<?=$comment['id']?>" class="hover:text-blue-800">Modifier</a>
                        <a href="index.php?action=clear-comment&amp;post-id=<?=$post['id']?>&amp;comment-id=<?=$comment['id']?>" class="hover:text-blue-800">Supprimer</a>
                    </div>
                <?php
                }
                ?>
                <?php
                if(isset($comment['report']) && $comment['report'] == 0){
                ?>
                    <a href="index.php?action=report&amp;comment-id=<?=$comment['id'] ?>" class="font-medium self-end mr-2 hover:text-blue-500">Signaler</a>
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