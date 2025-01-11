<?php
    include_once ("database.php");

    class _categories {
        public $ID;
        public $name;
        public $uri;
        public $cat_type;
        public $img_title;

        public static $dbConn;

        public function __construct($ID = 0, $name = "", $uri = "", $cat_type = "", $img_title = 0){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $this->ID = $ID;
            $this->name = $name;
            $this->uri = $uri;
            $this->cat_type = $cat_type;
            $this->img_title = $img_title;
        }

        public function __destruct()
        {
            unset($this->ID);
            unset($this->name);
            unset($this->uri);
            unset($this->catType);
            unset($this->img_title);
        }

        public  static function getCategoriesFromDB(){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM categories";
            $result = self::$dbConn->executeQuery($query);
            $arr = array();
            $cat = NULL;
            if ($result){
                while ($row = $result->fetch()){
                    $cat = new _categories($row["ID"], $row["name"], $row["uri"], $row["cat_type"], $row["img_title"]);
                    $arr[] = $cat;
                }
            }
            if (count($arr) > 0){
                return $arr;
            } else {
                return NULL;
            }
        }

        public  static function getCategoriesFromDBbyID($id){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM categories WHERE ID = {$id}";
            $result = self::$dbConn->executeQuery($query);
            $cat = NULL;
            if ($result){
                if ($row = $result->fetch()){
                    $cat = new _categories($row["ID"], $row["name"], $row["uri"], $row["cat_type"], $row["img_title"]);
                }
            }
            return $cat;
        }

        public  static function getCategoriesFromDBbyName($name){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM categories WHERE name = '{$name}'";
            $result = self::$dbConn->executeQuery($query);
            $cat = NULL;
            if ($result){
                if ($row = $result->fetch()){
                    $cat = new _categories($row["ID"], $row["name"], $row["uri"], $row["cat_type"], $row["img_title"]);
                }
            }
            return $cat;
        }

        public static function getCategoriesFromDBbyType($cat_type){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM categories WHERE catType = '{$cat_type}'";
            $result = self::$dbConn->executeQuery($query);
            $arr = array();
            $cat = NULL;
            if ($result){
                while ($row = $result->fetch()){
                    $cat = new _categories($row["ID"], $row["name"], $row["uri"], $row["cat_type"], $row["img_title"]);
                    $arr[] = $cat;
                }
            }
            if (count($arr) > 0){
                return $arr;
            } else {
                return NULL;
            }
        }

        public static function isCategoryInDB($name){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM categories WHERE name = '{$name}'";
            $result = self::$dbConn->executeQuery($query);
            $arr = array();
            $cat = NULL;
            if ($result){
                while ($row = $result->fetch()){
                    $cat = new _categories($row["ID"], $row["name"], $row["uri"], $row["cat_type"], $row["img_title"]);
                    $arr[] = $cat;
                }
            }
            return count($arr);
        }

        public static function addCategoryInDB($cat){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "INSERT INTO categories (ID, name, uri, cat_type, img_title) VALUES (NULL, '{$cat->name}', '{$cat->uri}', '$cat->cat_type', {$cat->img_title})";
            $result = self::$dbConn->executeQuery($query);
            if ($result)
                return true;
            else
                return false;
        }

        public static function updateCategoryDataInDB($cat){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "UPDATE categories SET name = '{$cat->name}', uri = '{$cat->uri}', cat_type = '{$cat->cat_type}', img_title = {$cat->img_title} WHERE ID = {$cat->ID}";
            $result = self::$dbConn->executeQuery($query);
            if ($result)
                return true;
            else
                return false;
        }

        public static function deleteCategoryFromDB($id){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "DELETE FROM categories WHERE ID = {$id}";
            $result = self::$dbConn->executeQuery($query);
            if ($result)
                return true;
            else
                return false;
        }
    }
?>