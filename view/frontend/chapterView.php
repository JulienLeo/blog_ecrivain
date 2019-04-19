<?php ob_start(); ?>

<h1>Billet Simple Pour L'Alaska</h1>
<h2>par Jean Forteroche</h2>
<p><a href="index.php"><em>Retour à la liste des billets</em></a></p>

<div class="chapterDiv">
    <p><h2><?= $chapter['id'] ?></h2></p>
    <p><h3><u><?= htmlspecialchars($chapter['title']); ?></u></h3></p>
    <p><?= nl2br(htmlspecialchars($chapter['content'])); ?></p>
</div>

<div class="commentsDiv">
    <h2>Commentaires<h2>

<?php 
    while ($comment = $comments->fetch()) { 
?>
        <p><strong><?= htmlspecialchars($comment(['author_comment'])); ?></strong> le <?= $comment(['date_comment_fr']); ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])); ?></p>

                                            <p><a href=".........">Signaler</a></p>
<?php
    }
?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>