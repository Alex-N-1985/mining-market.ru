<?php

    include_once("database.php");

    class _clients {

        public $ID;
        public $name;
        public $adress;
        public $phone;
        public $client_type;
        public $login;

        public static $dbConn;

        public function __construct($ID, $name, $adress, $phone, $client_type, $login){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $this->ID = $ID;
            $this->name = $name;
            $this->adress = $adress;
            $this->phone = $phone;
            $this->client_type = $client_type;
            $this->login = $login;
        }

        public function __destruct(){
            unset($this->ID);
            unset($this->name);
            unset($this->adress);
            unset($this->phone);
            unset($this->client_type);
            unset($this->login);
        }

        public static function getClientsFromDB(){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM Clients";
            $result = self::$dbConn->executeQuery($query);
            $arr = array();
            $item = null;
            if ($result){
                while ($row = $result->fetch()){
                    $item = new _clients(
                        $row["ID"],
                        $row["name"],
                        $row["adress"],
                        $row["phone"],
                        $row["client_type"],
                        $row['login']                        
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

        public static function getClientFromDBbyID($id){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM Clients WHERE ID = {$id}";
            $result = self::$dbConn->executeQuery($query);            
            $item = null;
            if ($result){
                if ($row = $result->fetch()){
                    $item = new _clients(
                        $row["ID"],
                        $row["name"],
                        $row["adress"],
                        $row["phone"],
                        $row["client_type"],
                        $row['login']                        
                    );                    
                }
            }
            return $item;            
        }

        public static function getClientsFromDBbyType($clientType){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM Clients WHERE client_type = '{$clientType}'";            
            $result = self::$dbConn->executeQuery($query);
            $arr = array();
            $item = null;
            if ($result){
                while ($row = $result->fetch()){
                    $item = new _clients(
                        $row["ID"],
                        $row["name"],
                        $row["adress"],
                        $row["phone"],
                        $row["client_type"],
                        $row['login']                        
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

        public static function getClientsFromDBbyLogin($loginID){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "SELECT * FROM Clients WHERE login = '{$loginID}'";            
            $result = self::$dbConn->executeQuery($query);
            $item = null;
            if ($result){
                if ($row = $result->fetch()){
                    $item = new _clients(
                        $row["ID"],
                        $row["name"],
                        $row["adress"],
                        $row["phone"],
                        $row["client_type"],
                        $row['login']                        
                    );                    
                }
            }
            return $item;
        }

        public static function addClientToDB($clt){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "INSERT INTO Clients (ID, name, adress, phone, client_type, login) VALUES (NULL, '{$clt->name}', '{$clt->adress}', '{$clt->phone}', '{$clt->client_type}', $clt->login)";            
            $result = self::$dbConn->executeQuery($query);
            if ($result)
                return true;
            else
                return false;
        }

        public static function updateClientInDB($clt){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "UPDATE Clients SET name='{$clt->name}', adress='{$clt->adress}', phone='{$clt->phone}', client_type='{$clt->client_type}', login={$clt->login} WHERE ID={$clt->ID}";
            $result = self::$dbConn->executeQuery($query);
            if ($result)
                return true;
            else
                return false;
        }

        public static function deleteClientInDB($id){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $query = "DELETE FROM Clients WHERE ID = {$id}";
            $result = self::$dbConn->executeQuery($query);
            if ($result)
                return true;
            else
                return false;
        }

    }
?>