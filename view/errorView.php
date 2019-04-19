<?php 
    $title = 'Message d\'erreur';
    ob_start();


    while ($errorMessage == true) {
?>
        <p><?= $e->getMessage(); ?></p>
<?php
    }


   // $content = ob_get_clean();
    require 'frontend/template.php';


    while ($_SESSION['error']) {
?>
        <p><?= $_SESSION['erro'] ?></p>
<?php
    }
?>