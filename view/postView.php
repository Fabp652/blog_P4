<?php $title = $post['title']; ?>

<?php ob_start() ?>
<h1>Billet simple pour l'Alaska</h1>

<div class='chapter'>
    <h3>
        <?php htmlspecialchars($post['title']); ?>
        le <?php $post['creation_date_fr']; ?>
    </h3>
    <p>
        <?php nl2br(htmlspecialchars($post['content'])); ?>
        <a href="index.php?action=post&amp;id=<?php $post['id']; ?>">Commentaires</a>
    </p>
</div>

<h2>Commentaires</h2>

<?php 
while($comment = $comments->fetch()){
?>

<p><?php htmlspecialchars($comment['author']); ?> le <?php $comment['comment_date_fr']; ?></p>
<P><?php nl2br(htmlspecialchars($comment['comment'])); ?></P>

<?php
}

$comments->closeCursor();
$content = ob_get_clean();
require('template.php');