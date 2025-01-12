<?php 

    include_once ("models/statpages.php");
    include_once ("models\images.php");
    include_once ("models\categories.php");   

    class main {

        public function index(){
            global $rout;
            $cats = _categories::getCategoriesFromDBbyType("Products");            
            $spage = _statpages::getStatPagesFromDBbyID(1);
            $content = file_get_contents("views/main/index.php");
            eval("?>".$content);
        }

        public function aboutus(){
            global $rout;
            $spage = _statpages::getStatPagesFromDBbyID(2);
            $content = file_get_contents("views/main/statpages.php");
            eval("?>".$content);
        }

        public function contactus(){
            global $rout;
            $spage = _statpages::getStatPagesFromDBbyID(3);
            $content = file_get_contents("views/main/statpages.php");
            eval("?>".$content);
        }    

        public function delivery_n_payment(){
            global $rout;
            $spage = _statpages::getStatPagesFromDBbyID(4);
            $content = file_get_contents("views/main/statpages.php");
            eval("?>".$content);
        }

        public function error404(){
            global $rout;
            $content = file_get_contents("views/main/error404.php");
            eval("?>".$content);
        }

        public function userbaned(){
            global $rout;
            $content = file_get_contents("views/main/userbaned.php");
            eval("?>".$content);
        }

        public function unauthaccess(){
            global $rout;
            $content = file_get_contents("views/main/unauthaccess.php");
            eval("?>".$content);
        }
    }

?>