<?php
    include_once ("database.php");

    class _images{
        public $ID;
        public $name;
        public $uri;
        public $extension;
        public $date_pub;
        public $published;
        public $canDelete;

        public static $dbConn;

        public function __construct($id = 0, $name = "", $uri = "", $extension = "", $date_pub = null, $published = 0, $canDelete = 1){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $this->ID = $id;
            $this->name = $name;
            $this->uri = $uri;
            $this->extension = $extension;
            $this->date_pub = $date_pub;
            $this->published = $published;
            $this->canDelete = $canDelete;
        }

        public function __destruct()
        {
            unset($this->ID);
            unset($this->name);
            unset($this->uri);
            unset($this->extension);
            unset($this->date_pub);
            unset($this->published);
            unset($this->canDelete);
        }

        public static function getImagesFromDB(){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM images";
            $result = self::$dbConn->executeQuery($query);
            $img = null;
            $arr = array();
            if ($result){
                while ($row = $result->fetch()){
                    $img = new _images(
                        $row["ID"],
                        $row["name"],
                        $row["uri"],
                        $row["extension"],
                        $row["date_pub"],
                        $row["published"],
                        $row["canDelete"]
                    );
                    $arr[] = $img;
                }
            }
            if (count($arr) > 0){
                return $arr;
            } else {
                return NULL;
            }
        }

        public static function getImagesFromDBbyID($id){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM images WHERE ID = {$id}";
            $result = self::$dbConn->executeQuery($query);
            $img = null;
            if ($result){
                if ($row = $result->fetch()){
                    $img = new _images(
                        $row["ID"],
                        $row["name"],
                        $row["uri"],
                        $row["extension"],
                        $row["date_pub"],
                        $row["published"],
                        $row["canDelete"]
                    );
                }
            }
            return $img;
        }

        public static function getImagesFromDBbyPublisher($publisher){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM images WHERE published = {$publisher} ORDER BY ID ASC";
            $result = self::$dbConn->executeQuery($query);
            $img = null;
            $arr = array();
            if ($result){
                while ($row = $result->fetch()){
                    $img = new _images(
                        $row["ID"],
                        $row["name"],
                        $row["uri"],
                        $row["extension"],
                        $row["date_pub"],
                        $row["published"],
                        $row["canDelete"]
                    );
                    $arr[] = $img;
                }
            }
            if (count($arr) > 0){
                return $arr;
            } else {
                return NULL;
            }
        }

        public static function getImageByUrlAndExt($uri, $ext){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM images WHERE uri = '{$uri}' AND extension = '{$ext}'";
            $result = self::$dbConn->executeQuery($query);
            $img = null;
            if ($result){
                if ($row = $result->fetch()){
                    $img = new _images(
                        $row["ID"],
                        $row["name"],
                        $row["uri"],
                        $row["extension"],
                        $row["date_pub"],
                        $row["published"],
                        $row["canDelete"]
                    );
                }
            }
            return $img;
        }

        public static function addImageToDB($img){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "INSERT INTO images (ID, name, uri, extension, date_pub, published, canDelete) VALUES (null, '{$img->name}', '{$img->uri}', '{$img->extension}', NOW(), {$img->published}, {$img->canDelete})";
            $result = self::$dbConn->executeQuery($query);
            if ($result)
                return true;
            else
                return false;
        }

        public static function updateImageInDB($img){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "UPDATE images SET name = '{$img->name}', uri = '{$img->uri}', extension = '{$img->extension}', date_pub = '{$img->date_pub}', published = {$img->published}, canDelete = {$img->canDelete} WHERE ID = {$img->ID}";
            $result = self::$dbConn->executeQuery($query);
            if ($result)
                return true;
            else
                return false;
        }

        public static function deleteImageFromDB($id){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "DELETE FROM images WHERE ID = {$id}";
            $result = self::$dbConn->executeQuery($query);
            if ($result)
                return true;
            else
                return false;
        }
    }
?>