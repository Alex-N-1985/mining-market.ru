<?php

    include_once ("models\images.php");
    include_once ("models\categories.php");    

    class categories {

        public function index(){
            global $rout;            
            $cats = _categories::getCategoriesFromDBbyType("Products");
            $content = file_get_contents("views/categories/index.php");
            eval("?>".$content);
        }

    }

?>