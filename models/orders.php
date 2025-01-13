<?php

include_once("database.php");

class _orders {

    public $ID;
    public $client;
    public $order_date;
    public $decription;
    public $status;

    public static $dbConn;

    public function __construct($ID, $client, $order_date, $decription, $status)
    {
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $this->ID = $ID;
        $this->client = $client;
        $this->order_date = $order_date ;
        $this->decription = $decription;
        $this->status = $status;
    }

    public function __destruct()
    {
        unlink($this->ID);
        unlink($this->client);
        unlink($this->order_date);
        unlink($this->decription);
        unlink($this->status);
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
                    $row["client"],
                    $row["order_date"],
                    $row["decription"],
                    $row["status"]
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
                    $row["client"],
                    $row["order_date"],
                    $row["decription"],
                    $row["status"]                    
                );
            }
        }
        return $item;
    }

    public static function getOrdersFromDBbyClient($clt){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "SELECT * FROM orders WHERE client={$clt}";
        $result = self::$dbConn->executeQuery($query);
        $arr = array();
        $item = null;
        if ($result){
            while ($row = $result->fetch()){
                $item = new _orders(
                    $row["ID"],
                    $row["client"],
                    $row["order_date"],
                    $row["decription"],
                    $row["status"]
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

    public static function addOrdersToDB($ord){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "INSERT INTO orders (ID, client, order_date, decription, status) VALUES 
        (NULL, {$ord->client}, NOW(), '{$ord->decription}', {$ord->status})";
        $result = self::$dbConn->executeQuery($query);
        if ($result)
            return true;
        else
            return false;
    }

    public static function updateOrdersInDB($ord){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "UPDATE orders SET client={$ord->client}, order_date='{$ord->order_date}',
        decription='{$ord->decription}', status={$ord->status} WHERE ID={$ord->ID}";
        $result = self::$dbConn->executeQuery($query);
        if ($result)
            return true;
        else
            return false;
    }

    public static function deleteOrdersInDB($id){
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