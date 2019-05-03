<ul class="menu">
    <li><a href="index.php">Accueil</a></li>
    <li>
        <form action="post" method="post">
            <select name="chapterSelection" id="chapterSelection">
            <?php //while ($data = $chapters->fetch()) ?>
                <option value="">Chapitres</option>
                <!--<option value=""><!--<a href="index.php?action=post&amp;id=<?= $data['id'] ?>">--><?= htmlspecialchars($data['title']) ?><!--</a></option>-->
                <?php 
                ?>
            </select>
        </form>
    </li>
    <li><!--<a href="index.php?action=post&amp;id=<?= $data['author'] ?>">-->L'auteur<!--</a>--></li>
    <li><!--<a href="index.php?action=post&amp;id=<?= $data['contact'] ?>">-->Contact<!--</a>--></li>
</ul>