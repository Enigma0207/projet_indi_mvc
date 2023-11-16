<?php

class Database {
     public static function dbConnect(){
        $db = null;
        try {
            $db = new PDO ("mysql:host=localhost;dbname=projet_individuel", "root", "");
        } catch (PDOException $e) {
            $db = $e->getMessage();
        }

        return $db;
     }


}