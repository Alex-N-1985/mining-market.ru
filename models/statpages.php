<?php
    include_once ("database.php");

    class _statpages{
        public $ID;
        public $name;
        public $content;

        public static $dbConn;

        public function __construct($ID = 0, $name = "", $content = ""){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $this->ID = $ID;
            $this->name = $name;
            $this->content = $content;
        }

        public function __destruct(){
            unset($this->ID);
            unset($this->name);
            unset($this->content);
        }

        public  static function getStatPagesFromDB(){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM statpages";
            $result = self::$dbConn->executeQuery($query);
            $arr = array();
            $sPage = NULL;
            if ($result){
                while ($row = $result->fetch()){
                    $sPage = new _statpages($row["ID"], $row["name"], $row["content"]);
                    $arr[] = $sPage;
                }
            }
            if (count($arr) > 0){
                return $arr;
            } else {
                return NULL;
            }
        }

        public static function getStatPagesFromDBbyID($id){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM statpages WHERE ID = {$id}";
            $result = self::$dbConn->executeQuery($query);
            $sPage = NULL;
            if ($result){
                if ($row = $result->fetch()){
                    $sPage = new _statpages($row["ID"], $row["name"], $row["content"]);
                }
            }
            return $sPage;
        }

        public static function addStatPagesToDB($sPage){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "INSERT INTO statpages (ID, name, content) VALUES (NULL, '{$sPage->ID}', '$sPage->content')";
            $result = self::$dbConn->executeQuery($query);
            if ($result)
                return true;
            else
                return false;
        }

        public static function updateStatPagesInDB($sPages){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "UPDATE statpages SET name = '{$sPages->name}', content = '{$sPages->content}' WHERE ID = {$sPages->ID}";
            $result = self::$dbConn->executeQuery($query);
            if ($result)
                return true;
            else
                return false;
        }

        public static function deleteStatPagesInDB($id){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "DELETE FROM statpages WHERE ID = {$id}";
            $result = self::$dbConn->executeQuery($query);
            if ($result)
                return true;
            else
                return false;
        }
    }
?>