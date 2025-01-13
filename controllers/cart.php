<?php

include_once ("models\images.php");
include_once ("models\categories.php");
include_once ("models\products.php");
include_once ("models\clients.php");
include_once ("models\orders.php");
include_once ("models\products_orders.php");

class cart {

    public function index(){
        global $rout;
        if (functions::isUserLogIn()) {            
            $clt = _clients::getClientsFromDBbyLogin(_Users::getCurrentUser()->ID);
            $ords = _orders::getOrdersFromDBbyClient($clt->ID);
            $ord = null;
            foreach ($ords as $oItem){
                if ($oItem->status == 0){
                    $ord = $oItem;
                    break;
                }
            }
            $poArr = _products_orders::getProdOrdersFromDBbyOrder($ord->ID);
            $content = file_get_contents("views/cart/index.php");
            eval("?>".$content);
        } else {
            header("Location:{$rout->start}/main/unauthaccess");
        }
    }

    public function deleteitem($id){
        global $rout;
        if (functions::isUserLogIn()){
            _products_orders::deleteProdOrdersInDB($id);
            header("Location:{$rout->start}/cart/index");
        } else {
            header("Location:{$rout->start}/main/unauthaccess");
        }
    }
}

?>