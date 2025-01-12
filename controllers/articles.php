<?php

    include_once ("models\articles.php");
    include_once ("models\images.php");

    class articles {

        public function index(){
            global $rout;
            $arts = _articles::getArticlesFromDB();
            $content = file_get_contents("views/articles/index.php");
            eval("?>".$content);
        }

        public function article($id){
            global $rout;
            $art = _articles::getArticlesFromDBbyID($id);
            $content = file_get_contents("views/articles/article.php");
            eval("?>".$content);
        }

    }

?>