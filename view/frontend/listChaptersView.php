<?php ob_start(); ?>

<h1>Billet Simple Pour l'Alaska</h1>
<h2>par Jean Forteroche</h2>

<?php
    while ($data = $chapters->fetch()) {
?>
        <div class="listChapters">
            <p><h3><u><?= romanNumbered($data['id']); ?></u></h3></p>
            <p><h3><u><?= htmlspecialchars($data['title']); ?></u></h3></p>
            <p><?= nl2br(htmlspecialchars(substrWords($data['content'], 500))); ?></p>
            <p><em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite... </a></em></p>
            <p><em>Ajouté le <?= $data['addition_date_fr']; ?></em></p>
        </div>
<?php
    }
        $chapters->closeCursor();
?>

<?php $content = ob_get_clean(); // récupération du contenu généré après ob_start ?>

<?php require 'template.php'; ?>