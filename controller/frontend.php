<?php

    require_once 'model/ChapterManager.php';
    require_once 'model/CommentManager.php';

    // PAGE ACCUEIL

    function listChapters() {
        $chapterManager = new blog_ecrivain\model\ChapterManager(); // création d'un objet qui récupèrera les données d'un chapitre
        $chapters = $chapterManager->getChapters(); // appel de la fonction créant la liste des chapitres
    
        require 'view/frontend/listChaptersView.php';
    }

    function romanNumbered($data) { // conversion de l'id en chiffres romains
        $data = intval($data);
        $romanResult = '';

        $lookup = array('M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1);
        
        foreach($lookup as $roman => $value) {
            $matches = intval($data / $value);
            $romanResult .= str_repeat($roman, $matches);
            $data = $data % $value;
        }
        
        return $romanResult;
    }

    function substrWords($data, $maxchar, $end='...') { // fonction pour limiter le nombre de mots apparaissant sur la page d'accueil
        if (strlen($data) > $maxchar || $data == '') {
            $words = preg_split('/\s/', $data);
            $output = '';
            $i = 0;
            while (1) {
                $length = strlen($output) + strlen($words[$i]);
                if ($length > $maxchar) {
                    break;
                } else {
                    $output .= " " . $words[$i];
                    ++$i;
                }
            }
            $output .= $end;
        } else {
            $output = $data;
        }
        return $output;
    }



    // PAGE CHAPITRE
    function chapter() {
        $chapterManager = new blog_ecrivain\model\ChapterManager(); // création d'un objet qui récupèrera les données d'un chapitre
        $commentManager = new blog_ecrivain\model\CommentManager(); // création d'un objet qui récupèrera les données des commentaires
        
        $chapter = $chapterManager->getChapter($_GET['id']); // appel de la fonction qui sélectionne le chapitre selon son id
        $comments = $commentManager->getComments($_GET['id']); // appel de la fonction qui sélectionne les commentaires selon l'id du chapitre
    
        require 'view/frontend/chapterView.php';
    }

    function addComment($chapterId, $author_comment, $comment) {
        $commentManager = new blog_ecrivain\model\CommentManager();
        
        $affectedLines = $commentManager->postComment($chapterId, $author_comment, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire');
        } else {
            header('Location: index.php?action=post&id=' . $chapterId);
        }
    }

    function alertComment() {

    }


    // NAVIGATION
    function contact($data) {
        header('Location : view/frontend/contactView.php');
        return 'view/frontend/contactView.php';
    }

    function auteur() {
        return 'view/frontend/contactView.php';
    }

    function chapList() {
        return 'view/frontend/contactView.php';
    }