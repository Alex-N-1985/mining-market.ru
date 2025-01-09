<?php 

    include_once ("models/statpages.php");

    class main {

        public function index(){
            global $rout;
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
    }

?>