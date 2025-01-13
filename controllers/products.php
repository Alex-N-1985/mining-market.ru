<?php 
    include_once ("models\images.php");
    include_once ("models\categories.php");
    include_once ("models\products.php");
    include_once ("models\clients.php");

    class products {
        
        public function index(){
            global $rout;
            $cats = _categories::getCategoriesFromDBbyType("Products");
            $prods = _products::getProductsFromDB();            
            $content = file_get_contents("views/products/index.php");
            eval("?>".$content);
        }
        
        public function details($id){
            global $rout;            
            $prod = _products::getProductsFromDBbyID($id);            
            $content = file_get_contents("views/products/details.php");
            eval("?>".$content);
        }

    }

?>