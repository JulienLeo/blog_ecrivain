<?php
    namespace AAA\Model;

    require_once 'model/Manager.php';

    class ChapterManager extends Manager {
        
        public function getChapters() { // récupération de tous les derniers chapitres

            $db = $this->dbConnect();
            
            $req = $db->query('SELECT id, title, content, addition_date FROM chapters ORDER BY id DESC');
        
            return $req;
        }

        public function getChapter($chapterId) { // récupération d'un chapitre précis en fonction de son id
            $db = $this->dbConnect();
    
            $req = $db->prepare('SELECT id, title, content, addition_date FROM chapters WHERE id = ?');
            $req->execute(array($chapterId));
            $chapter = $req->fetch();
    
            return $chapter;
        }
    }