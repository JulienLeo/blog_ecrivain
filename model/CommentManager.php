<?php

    namespace blog_ecrivain\Model;

    require_once 'model\Manager.php';

    class CommentManager extends Manager {

        public function getComments($chapterId) {
            $db = $this->dbConnect();

            $comments = $db->prepare('SELECT id, author_comment, comment, DATE_FORMAT (date_comment, "%d-%m-%y") AS date_comment_fr FROM comments WHERE id_chapter = ? ORDER BY date_comment DESC');
            $comments->execute(array($chapterId));

            return $comments;
        }


        public function postComment($chapterId, $author_comment, $comment) {
            $db = $this->dbConnect();

            $comments = $db->prepare('INSERT INTO comments(id_chapter, author_comment, comment, date_comment) VALUES (?, ?, ?, NOW())');
            $affectedLines = $comments->execute(array($chapterId, $author_comment, $comment));

            return $affectedLines;
        }

        public function alertComment($chapterId, $commentId) {
            
        }
    }