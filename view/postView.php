<?php $title = $post['title']; ?>

<?php ob_start() ?>
<h1 class="text-center">Billet simple pour l'Alaska</h1>

<div class='flex flex-col items-center border-2 border-solid border-blue-500'>
    <h3 class="w-full text-center bg-blue-300 border-b-2 border-solid border-blue-500 py-2">
        <?php echo htmlspecialchars($post['title']); ?>
    </h3>
    <p>
        <?php echo nl2br(htmlspecialchars($post['content'])); ?>
    </p>
    <p class='self-end'>Publié le <?php echo $post['creation_date_fr']; ?></p>
</div>

<h2>Commentaires</h2>

<?php
if(isset($_SESSION['pseudo'])){
?>
<form action='index.php?action=create-comment&amp;id=<?=$post['id'] ?>' method="POST" class="flex flex-col items-start justify-between h-48 w-1/3 m-auto shadow-lg rounded-xl p-4">
    <textarea name="comment" class="border border-solid"></textarea>
    <input type="submit" name="Ajouter un commentaire" class="self-center border border-solid border-blue-500 rounded-2xl p-1 bg-blue-500" />
</form>
<?php
}
?>

<?php 
while($comment = $comments->fetch()){
?>
<div class='flex flex-col items-start'>
<p class="my-1.5 mx-2.5"><?=getAuthor($comment['user_id']); ?> le <?= $comment['comment_date_fr']; ?> :</p>
<P class="my-1.5 mx-2.5"><?=nl2br(htmlspecialchars($comment['comment'])); ?></P>
<?php
if(isset($comment['report']) && $comment['report'] == 0){
?>
<a href="index.php?action=report&amp;comment-id=<?=$comment['id'] ?>">Signaler</a>
<?php
}
?>
<?php
if(isset($_SESSION['id']) && $_SESSION['id'] == $comment['user_id']){
?>
<a href="index.php?action=change-comment&amp;post-id=<?=$post['id']?>&amp;comment-id=<?=$comment['id']?>">Modifier</a>
<a href="index.php?action=clear-comment&amp;post-id=<?=$post['id']?>&amp;comment-id=<?=$comment['id']?>">Supprimer</a>
<?php
}
?>
</div>
<?php
}

$comments->closeCursor();
$content = ob_get_clean();
require('view/template.php');