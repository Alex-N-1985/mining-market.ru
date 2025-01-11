<?php
    include_once("database.php");

    class _cats_images {

        public $ID;
        public $category;
        public $image;

        public static $dbConn;

        public function __construct($ID = 0, $image = 0, $category = 0){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $this->ID = $ID;
            $this->image = $image;
            $this->category = $category;            
        }

        public function __destruct(){
            unset($this->ID);
            unset($this->image);
            unset($this->category);            
        }

        public static function getImagesCatsFromDB(){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM cats_images";
            $result = self::$dbConn->executeQuery($query);
            $imc = null;
            $arr = array();
            if ($result){
                while ($row = $result->fetch()){
                    $imc = new _cats_images($row["ID"], $row["image"], $row["category"]);
                    $arr[] = $imc;
                }
            }
            if (count($arr) > 0){
                return $arr;
            } else {
                return null;
            }
        }

        public static function getImageCatFromDBbyID($id){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM cats_images WHERE ID = {$id}";
            $result = self::$dbConn->executeQuery($query);
            $imc = null;
            if ($result){
                if ($row = $result->fetch()){
                    $imc = new _cats_images($row["ID"], $row["image"], $row["category"]);
                }
            }
            return $imc;
        }

        public static function getImageFromDBbyCat($category){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM cats_images WHERE category = {$category}";
            $result = self::$dbConn->executeQuery($query);
            $imc = null;
            $arr = array();
            if ($result){
                while ($row = $result->fetch()){
                    $imc = new _cats_images($row["ID"], $row["image"], $row["category"]);
                    $arr[] = $imc;
                }
            }
            if (count($arr) > 0){
                return $arr;
            } else {
                return null;
            }
        }

        public static function getImageCatsFromDBbyImageAndCatID($image, $category){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM cats_images WHERE image = {$image} AND category = {$category}";
            $result = self::$dbConn->executeQuery($query);
            $imc = null;
            if ($result){
                if ($row = $result->fetch()){
                    $imc = new _cats_images((int)$row["ID"], (int)$row["image"], (int)$row["category"]);
                }
            }
            return $imc;
        }

        public static function addImageCatsToDB($imc){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "INSERT INTO cats_images (ID, image, category) VALUES (null, {$imc->image}, {$imc->category})";            
            $result = self::$dbConn->executeQuery($query);
            if ($result)
                return true;
            else
                return false;
        }

        public static function updateImageCatInDB($imc){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "UPDATE cats_images SET image = {$imc->image}, category = {$imc->category} WHERE ID = {$imc->ID}";
            $result = self::$dbConn->executeQuery($query);
            if ($result)
                return true;
            else
                return false;
        }

        public static function deleteImageCatFromDB($id){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "DELETE FROM cats_images WHERE ID = {$id}";
            $result = self::$dbConn->executeQuery($query);
            if ($result)
                return true;
            else
                return false;
        }

    }

?>