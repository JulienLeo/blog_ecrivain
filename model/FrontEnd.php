<?php

    namespace AAA\Model;

    function dbConnect() { // connexion à MySQL
        $db = new \PDO('mysql:host=localhost;dbname=blog_ecrivain', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $db;
    }