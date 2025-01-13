<?php 

include_once("database.php");

class _orders {

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

    public static function getOrdersFromDB(){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "SELECT * FROM orders";
        $result = self::$dbConn->executeQuery($query);
        $arr = array();
        $item = null;
        if ($result){
            while ($row = $result->fetch()){
                $item = new _orders(
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

    public static function getOrdersFromDBbyID($id){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "SELECT * FROM orders WHERE ID={$id}";
        $result = self::$dbConn->executeQuery($query);
        if ($result){
            if ($row = $result->fetch()){
                $item = new _orders(
                    $row["ID"],
                    $row["order"],
                    $row["product"],
                    $row["quantity"]                      
                );
            }
        }
        return $item;
    }

    public static function addOrderToDB($ord){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "INSERT INTO orders (ID, client, order_date, decription) VALUES ({$ord->ID}, {$ord->client}, NOW(), '{$ord->decription}')";
        $result = self::$dbConn->executeQuery($query);
        if ($result)
            return true;
        else
            return false;
    }

    public static function updateOrderInDB($ord){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "UPDATE orders SET client={$ord->client}, order_date='{$ord->order_date}', decription='{$ord->decription}' WHERE ID={$ord->ID}";
        $result = self::$dbConn->executeQuery($query);
        if ($result)
            return true;
        else
            return false;
    }

    public static function deleteOrderInDB($id){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "DELETE FROM orders WHERE ID={$id}";
        $result = self::$dbConn->executeQuery($query);
        if ($result)
            return true;
        else
            return false;
    }

}

?>