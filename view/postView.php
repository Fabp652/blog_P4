<?php $title = $post['title']; ?>

<?php ob_start() ?>
<h1>Billet simple pour l'Alaska</h1>

<div class='chapter'>
    <h3>
        <?php echo htmlspecialchars($post['title']); ?>
    </h3>
    <p>
        <?php echo nl2br(htmlspecialchars($post['content'])); ?>
    </p>
    <p class='date_post'>Publié le <?php echo $post['creation_date_fr']; ?></p>
</div>

<h2>Commentaires</h2>

<?php 
while($comment = $comments->fetch()){
?>
<div class='comments'>
<p><?php echo htmlspecialchars($comment['author']); ?> le <?php echo $comment['comment_date_fr']; ?> :</p>
<P><?php echo nl2br(htmlspecialchars($comment['comment'])); ?></P>
</div>
<?php
}

$comments->closeCursor();
$content = ob_get_clean();
require('view/template.php');