<?php 
    include_once ("models\images.php");
    include_once ("models\categories.php");
    include_once ("models\products.php");
    include_once ("models\clients.php");
    include_once ("models\orders.php");
    include_once ("models\products_orders.php");

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
            $clt = _clients::getClientsFromDBbyLogin(_Users::getCurrentUser()->ID);            
            if (isset($_POST["quantity"]) && (int)$_POST["quantity"] > 0){                
                $ords = _orders::getOrdersFromDBbyClient($clt->ID);
                $ord = null;
                if ($ords == null){
                    $ord = new _orders(null, $clt->ID, null, "", 0);
                    $res = _orders::addOrdersToDB($ord);                    
                } else {
                    $count = 0;
                    foreach ($ords as $item){
                        if ($item->status == 0){
                            $ord = $item;
                            break;
                        } else {
                            $count++;
                        }                        
                    }
                    if ($count >= count($ords)){
                        $ord = new _orders(null, $clt->ID, null, "", 0);
                        $res = _orders::addOrdersToDB($ord);                        
                    }
                }
                $poItem = new _products_orders(null, $ord->ID, (int)($prod->ID), (int)$_POST["quantity"]);
                $res = _products_orders::addProdOrdersToDB($poItem);
                header("Location:{$rout->start}/cart/index");
            }            
            $content = file_get_contents("views/products/details.php");
            eval("?>".$content);
        }

        public function category($id){
            global $rout;
            $cats = _categories::getCategoriesFromDBbyType("Products");
            $prods = _products::getProductsFromDBbyCategory($id);            
            $content = file_get_contents("views/products/index.php");
            eval("?>".$content);
        }

    }

?>