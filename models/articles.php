<?php
    include_once ("database.php");

    class _articles{
        public $ID;
        public $name;
        public $content;
        public $preview;
        public $author;
        public $published;
        public $date_pub;
        public $img_title;

        public static $dbConn;

        public function __construct($ID, $name, $content, $preview, $author, $published, $date_pub, $img_title = 0){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $this->ID = $ID;
            $this->name = $name;
            $this->content = $content;
            $this->preview = $preview;
            $this->author = $author;
            $this->published = $published;
            $this->date_pub = $date_pub;
            $this->img_title = $img_title;
        }

        public function __destruct(){
            unset($this->ID);
            unset($this->name);
            unset($this->content);
            unset($this->preview);
            unset($this->author);
            unset($this->published);
            unset($this->date_pub);
            unset($this->img_title);
        }

        public static function getArticlesFromDB(){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM articles";
            $result = self::$dbConn->executeQuery($query);
            $arr = array();
            $ad = null;
            if ($result){
                while ($row = $result->fetch()){
                    $ad = new _articles(
                        $row["ID"],
                        $row["name"],
                        $row["content"],
                        $row["preview"],
                        $row["author"],
                        $row['published'],
                        $row["date_pub"],
                        $row["img_title"]
                    );
                    $arr[] = $ad;
                }
            }
            if (count($arr) > 0){
                return $arr;
            } else {
                return NULL;
            }
        }

        public static function getArticlesFromDBbyID($id){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM articles WHERE ID = {$id}";
            $result = self::$dbConn->executeQuery($query);
            $ad = null;
            if ($result){
                if ($row = $result->fetch()){
                    $ad = new _articles(
                        $row["ID"],
                        $row["name"],
                        $row["content"],
                        $row["preview"],
                        $row["author"],
                        $row['published'],
                        $row["date_pub"],
                        $row["img_title"]
                    );
                }
            }
            return $ad;
        }

        public static function searchDataAtAds($data){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM articles WHERE name LIKE '%{$data}%' OR content LIKE '%{$data}%'";
            $result = self::$dbConn->executeQuery($query);
            $arr = array();
            $ad = null;
            if ($result){
                while ($row = $result->fetch()){
                    $ad = new _articles(
                        $row["ID"],
                        $row["name"],
                        $row["content"],
                        $row["preview"],
                        $row["author"],
                        $row['published'],
                        $row["date_pub"],
                        $row["img_title"]
                    );
                    $arr[] = $ad;
                }
            }
            if (count($arr) > 0){
                return $arr;
            } else {
                return NULL;
            }
        }

        public static function addArticleToDB($art){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "INSERT INTO articles (ID, name, content, preview, author, published, date_pub, img_title) VALUES (NULL, '{$art->name}', '{$art->content}', '{$art->preview}', '{$art->author}', {$art->published}, NOW(), {$art->img_title})";
            $result = self::$dbConn->executeQuery($query);
            if ($result)
                return true;
            else
                return false;
        }

        public static function updateArticleInDB($art){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "UPDATE articles SET name = '{$art->name}', content = '{$art->content}', preview = '{$art->preview}', author = '{$art->author}', published = {$art->published}, date_pub = '{$art->date_pub}', img_title = {$art->img_title} WHERE ID = {$art->ID}";            
            $result = self::$dbConn->executeQuery($query);
            if ($result)
                return true;
            else
                return false;
        }

        public static function deleteArticleFromDB($id){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "DELETE FROM articles WHERE ID = {$id}";
            $result = self::$dbConn->executeQuery($query);
            if ($result)
                return true;
            else
                return false;
        }
    }
?>