<?php ob_start(); ?>
<head>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<div class="chapterDiv">
    <p><h2><?= romanNumbered($chapter['id']); ?></h2></p>
    <p><h3><u><?= htmlspecialchars($chapter['title']); ?></u></h3></p>
    <p><?= nl2br(htmlspecialchars($chapter['content'])); ?></p>
    <p><a href="#">Chapitre suivant &#8594;</a>
</div>

<div class="commentsDiv">
    <h3>Poster un commentaire</h3>

    <form action="index.php?action=addComment&amp;id=<?= $chapter['id'] ?>" method="post">
        <div>
            <label for="auteur">Auteur</label>
            <input type="text" id="author" name="auteur" />
        </div>
        
        <div>
            <label for="commentaire">Commentaire</label>
            <textarea name="commentaire" id="comment"></textarea>
        </div>

        <div>
            <input type="submit" value="Ajouter" />
        </div>
    </form>

<?php 
    while ($comment = $comments->fetch()) { 
?>
    
    <h3>Commentaires</h3>
    <div class="commentDiv">
        <p><strong><?= htmlspecialchars($comment['author_comment']); ?></strong> le <?= ($comment['date_comment_fr']); ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])); ?></p>

                                            <p><a href=".........">Signaler</a></p>
    </div>

<?php
    }
?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>