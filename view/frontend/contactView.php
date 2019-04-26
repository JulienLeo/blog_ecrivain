<?php ob_start(); ?>

<head>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>

<div class="contactForm">
    <form action="post">
        <h2 id="contactTitle">Contact</h2></br>
        <input type="text" name="name" placeholder="Votre nom"></br>
        <input type="email" name="email" placeholder="Votre email"></br>
        <input type="text" name="subject" placeholder="Objet"></br>
        <textarea name="message" id="message" rows="8"></textarea></br>
        <input type="submit" name="send" id ="send" value="Envoyer">
    </form>
</div>

<?php $content = ob_get_clean(); // récupération du contenu généré après ob_start ?>

<?php require 'template.php'; ?>