<?php

include_once("database.php");

class _products{
    
    public $ID;
    public $name;
    public $category;
    public $seller;
    public $photo;
    public $price;
    public $available;
    public $description;
    public $user_added;

    public static $dbConn;

    public function __construct($ID, $name, $category, $seller, $photo, $price, $available, $description, $user_added){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $this->ID = $ID;
        $this->name = $name;
        $this->category = $category;
        $this->seller = $seller;
        $this->photo = $photo;
        $this->price = $price;
        $this->available = $available;
        $this->description = $description;
        $this->user_added = $user_added;
    }
    
    public function __destruct(){
        unset($this->ID);
        unset($this->name);
        unset($this->category);
        unset($this->seller);
        unset($this->photo);
        unset($this->price);
        unset($this->available);
        unset($this->description);
        unset($this->user_added);
    }

    public static function getProductsFromDB(){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "SELECT * FROM products";
        $result = self::$dbConn->executeQuery($query);
        $arr = array();
        $item = null;
        if ($result){
            while ($row = $result->fetch()){
                $item = new _products(
                    $row["ID"],
                    $row["name"],
                    $row["category"],
                    $row["seller"],
                    $row["photo"],
                    $row["price"],
                    $row['available'],                    
                    $row["decription"],
                    $row['user_added']                        
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

    public static function getProductsFromDBbyID($id){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "SELECT * FROM products WHERE ID={$id}";
        $result = self::$dbConn->executeQuery($query);        
        $item = null;
        if ($result){
            if ($row = $result->fetch()){
                $item = new _products(
                    $row["ID"],
                    $row["name"],
                    $row["category"],
                    $row["seller"],
                    $row["photo"],
                    $row["price"],
                    $row['available'],                    
                    $row["decription"],
                    $row['user_added']                        
                );                
            }
        }
        return $item;
    }

    public static function getProductsFromDBbyCategory($cat){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "SELECT * FROM products WHERE category = {$cat}";
        $result = self::$dbConn->executeQuery($query);
        $arr = array();
        $item = null;
        if ($result){
            while ($row = $result->fetch()){
                $item = new _products(
                    $row["ID"],
                    $row["name"],
                    $row["category"],
                    $row["seller"],
                    $row["photo"],
                    $row["price"],
                    $row['available'],                    
                    $row["decription"],
                    $row['user_added']                        
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

    public static function addProductToDB($prod){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "INSERT INTO products (ID, name, category, seller, photo, price, available, decription, user_added) VALUES 
        (NULL, '{$prod->name}', {$prod->category}, {$prod->seller}, {$prod->photo}, {$prod->price}, {$prod->available}, 
        '{$prod->decription}', {$prod->user_added})";            
        $result = self::$dbConn->executeQuery($query);
        if ($result)
            return true;
        else
            return false;
    }

    public static function updateProductInDB($prod){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "UPDATE products SET name='{$prod->name}', category={$prod->category}, seller={$prod->seller}, photo={$prod->photo}, 
        price={$prod->price}, available={$prod->available}, user_added={$prod->user_added} WHERE ID={$prod->ID}";
        $result = self::$dbConn->executeQuery($query);
        if ($result)
            return true;
        else
            return false;
    }

    public static function deleteProductInDB($id){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "DELETE FROM products WHERE ID = {$id}";
        $result = self::$dbConn->executeQuery($query);
        if ($result)
            return true;
        else
            return false;
    }
}

?>