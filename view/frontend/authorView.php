<?php ob_start(); ?>

<head>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>

<div class="authorBio borderedText">
    <h2><strong>Jean Forteroche</strong></h2>
    <p class="textContent">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dicta officiis cupiditate nulla nostrum asperiores corporis ex a illum quidem architecto labore error, rerum deleniti repellendus maiores voluptatum sint! Aliquid, sed. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil maiores quisquam omnis, repudiandae rerum natus at possimus veritatis quae totam harum voluptatem porro error  impedit exercitationem velit inventore tempore? Quis.
    </p>
</div>

<div class="authorAmazon">
    <a href="https://www.amazon.com/s?k=jean+forteroche&ref=nb_sb_noss">Jean Forteroche sur Amazon</a>
</div>

<?php $content = ob_get_clean(); // récupération du contenu généré après ob_start ?>

<?php require 'template.php'; ?>