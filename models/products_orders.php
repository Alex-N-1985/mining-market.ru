<?php 

include_once("database.php");

class _products_orders {

    public $ID;
    public $order;
    public $product;
    public $quantity;

    public static $dbConn;

    public function __construct($ID, $order, $product, $quantity){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $this->ID = $ID;
        $this->order = $order;
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function __destruct(){
        unset($this->ID);
        unset($this->order);
        unset($this->product);
        unset($this->quantity);
    }

    public static function getProdOrdersFromDB(){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "SELECT * FROM products_orders";
        $result = self::$dbConn->executeQuery($query);
        $arr = array();
        $item = null;
        if ($result){
            while ($row = $result->fetch()){
                $item = new _products_orders(
                    $row["ID"],
                    $row["order"],
                    $row["product"],
                    $row["quantity"]                      
                );
                $arr[] = $item;
            }
        }
        if (count($arr) > 0){
            return $arr;
        } else {
            return NULL;
        }
    }

    public static function getProdOrdersFromDBbyID($id){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "SELECT * FROM products_orders WHERE ID={$id}";
        $result = self::$dbConn->executeQuery($query);
        if ($result){
            if ($row = $result->fetch()){
                $item = new _products_orders(
                    $row["ID"],
                    $row["order"],
                    $row["product"],
                    $row["quantity"]                      
                );
            }
        }
        return $item;
    }

    public static function getProdOrdersFromDBbyOrder($ordID){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "SELECT * FROM products_orders WHERE `order`={$ordID}";
        $result = self::$dbConn->executeQuery($query);
        $arr = array();
        $item = null;
        if ($result){
            while ($row = $result->fetch()){
                $item = new _products_orders(
                    $row["ID"],
                    $row["order"],
                    $row["product"],
                    $row["quantity"]                      
                );
                $arr[] = $item;
            }
        }
        if (count($arr) > 0){
            return $arr;
        } else {
            return NULL;
        }
    }

    public static function addProdOrdersToDB($ord){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "INSERT INTO products_orders (ID, `order`, product, quantity) VALUES (NULL, {$ord->order}, {$ord->product}, {$ord->quantity})";
        var_dump($query); echo "<br>4<br>";
        $result = self::$dbConn->executeQuery($query);
        if ($result)
            return true;
        else
            return false;
    }

    public static function updateProdOrdersInDB($ord){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "UPDATE products_orders SET `order`={$ord->order}, product={$ord->product}, quantity={$ord->quantity} WHERE ID={$ord->ID}";
        $result = self::$dbConn->executeQuery($query);
        if ($result)
            return true;
        else
            return false;
    }

    public static function deleteProdOrdersInDB($id){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "DELETE FROM products_orders WHERE ID={$id}";
        $result = self::$dbConn->executeQuery($query);
        if ($result)
            return true;
        else
            return false;
    }

}

?>