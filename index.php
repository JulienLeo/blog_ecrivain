<?php
    // enregistrement de l'autoload

    //require 'autoload.php';
    require 'controller/frontend.php';
    //require_once 'vendor/Autoload.php';
    /*function autoLoad($classname) {
        require 'model/' . $classname . '.php';
    }
    
    spl_autoload_register('autoLoad');*/

    session_start();
    
    if (isset($_GET['deconnexion'])) {
        session_destroy();
        header('Location : .');
        exit();
    }

    $db = new PDO('mysql:host=localhost;dbname=blog_ecrivain', 'root', ''); // instance de PDO
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // alerte si la requête échoue
    //$manager = new ChapterManager($db);

    try {
        
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'listChapters') { // retour sur la page d'accueil 
                listChapters(); // appel de la fonction 
            }

            elseif ($_GET['action'] == 'post') { // clic et accès à un chapitre
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    chapter(); // appel de la fonction
                }
                else {
                    throw new Exception('Erreur : aucun identifiant chapitre envoyé');
                }
            }

            elseif($_GET['action'] == 'addComment') { // ajout d'un commentaire
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    }
                    else {
                        throw new Exception('Erreur : tous les champs ne sont pas remplis');
                    }
                }
                else {
                    throw new Exception('Erreur : aucun identifiant de chapitre envoyé');
                }
            }

            elseif ($_GET['action'] == 'getComments') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {

                }
            }

            elseif (isset($_GET['action'])) { // aller sur la page contact
                if ($_GET['action'] == 'contact') {
                    contact();
                }
            }
        }

        else {
            listChapters(); // fonction liste des chapitres sur la page d'accueil
        }
    }

    catch(Exception $e) {
        $errorMessage = $e->getMessage();
        require('view/errorView.php');
    }