<?php

include_once "database.php";

class _Users {
    
    public $ID;
    public $login;
    public $password;
    public $email;
    public $avatar;
    public $date_reg;
    public $date_log;
    public $hash;
    public $secure_level;
    
    public static $dbConn;
    
    public function __construct($id = 0, $login = "", $password = "", $email = "", $avatar = 0, $date_reg = null, $date_log = null, $hash = "", $secure_level = 1)
    {
        if (!isset(self::$dbConn)){
            self::$dbConn = new  database();
            self::$dbConn->connectToDB();
        }
        $this->ID = $id;
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->avatar = $avatar;
        $this->date_reg = $date_reg;
        $this->date_log = $date_log;
        $this->hash = $hash;
        $this->secure_level = $secure_level;
    }
    
    public function __destruct(){
        unset($this->id);
        unset($this->login);
        unset($this->password);
        unset($this->email);
        unset($this->avatar);
        unset($this->date_reg);
        unset($this->date_log);
        unset($this->hash);
        unset($this->secure_level);
    }

    public static function getUsersFromDB(){
        if (!isset(self::$dbConn)){
            self::$dbConn = new  database();
            self::$dbConn->connectToDB();
        }
        $query = "SELECT * FROM users";
        $result = self::$dbConn->executeQuery($query);
        $arr = array();
        $usr = NULL;
        while ($row = $result->fetch()){
            $usr = new _users(
                $row["ID"],
                $row["login"],
                $row["password"],
                $row["email"],
                $row["avatar"],
                $row["date_reg"],
                $row["date_log"],
                $row["hash"],
                $row["secure_level"]
            );
            $arr[] = $usr;
        }
        if (count($arr) > 0){
            return $arr;
        } else {
            return NULL;
        }
    }

    public static function getUserFromDBbyID($id){
        if (!isset(self::$dbConn)){
            self::$dbConn = new  database();
            self::$dbConn->connectToDB();
        }
        $query = "SELECT * FROM users WHERE ID = ?";
        $result = self::$dbConn->executeQuery($query, array($id));
        $usr = NULL;
        if ($result){
            if ($row = $result->fetch()){
                $usr = new _users(
                    $row["ID"],
                    $row["login"],
                    $row["password"],
                    $row["email"],
                    $row["avatar"],
                    $row["date_reg"],
                    $row["date_log"],
                    $row["hash"],
                    $row["secure_level"]
                );
            }
        }
        return $usr;
    }

    public static function getUserFromDBbyLogin($login){
        if (!isset(self::$dbConn)){
            self::$dbConn = new  database();
            self::$dbConn->connectToDB();
        }
        $query = "SELECT * FROM users WHERE login = ?";
        $result = self::$dbConn->executeQuery($query, array($login));
        $usr = NULL;
        if ($result){
            if ($row = $result->fetch()){
                $usr = new _users(
                    $row["ID"],
                    $row["login"],
                    $row["password"],
                    $row["email"],
                    $row["avatar"],
                    $row["date_reg"],
                    $row["date_log"],
                    $row["hash"],
                    $row["secure_level"]
                );
            }
        }
        return $usr;
    }

    public static function getUserFromDBbyHash($hash){
        if (!isset(self::$dbConn)){
            self::$dbConn = new  database();
            self::$dbConn->connectToDB();
        }
        $query = "SELECT * FROM users WHERE hash = ?";
        $result = self::$dbConn->executeQuery($query, array($hash));
        $usr = NULL;
        if ($result){
            if ($row = $result->fetch()){
                $usr = new _users(
                    $row["ID"],
                    $row["login"],
                    $row["password"],
                    $row["email"],
                    $row["avatar"],
                    $row["date_reg"],
                    $row["date_log"],
                    $row["hash"],
                    $row["secure_level"]
                );
            }
        }
        return $usr;
    }

    public static function getCurrentUser(){
        if (isset($_COOKIE["hash"])&&isset($_COOKIE["user"])){
            if (!isset(self::$dbConn)){
                self::$dbConn = new database();
                self::$dbConn->connectToDB();
            }
            $usr = $_COOKIE['user'];
            $hash = $_COOKIE['hash'];
            $query = "SELECT * FROM users WHERE login= '{$usr}' AND hash = '{$hash}'";
            $result = self::$dbConn->executeQuery($query);
            if ($result){
                if ($row = $result->fetch()){
                    $user = new _users(
                        $row["ID"],
                        $row["login"],
                        $row["password"],
                        $row["email"],
                        $row["avatar"],
                        $row["date_reg"],
                        $row["date_log"],
                        $row["hash"],
                        $row["secure_level"]
                    );
                    return $user;
                }
            }
        } else
            return null;
    }

    public static function isUserRegister($login){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "SELECT * FROM users WHERE login='{$login}'";
        $result = self::$dbConn->executeQuery($query);
        if ($row = $result->fetch()){
            return true;
        } else {
            return false;
        }
    }

    public static function updateUserLoginDataInDB($hash, $login){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }        
        $query = "UPDATE users SET hash = '{$hash}', date_login = NOW() WHERE login = '{$login}'";
        var_dump($query);
        $result = self::$dbConn->executeQuery($query);
        if ($result)
            return true;
        else
            return false;
    }

    public static function addNewUser($user){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }        
        $query = "INSERT INTO users (ID, login, password, email, avatar, date_reg, date_login, hash, secure_level) VALUES (NULL, '{$user->login}', '{$user->password}', '{$user->email}', {$user->avatar},  NOW(), NOW(), '', 2)";        
        $result = self::$dbConn->executeQuery($query);
        if ($result)
            return true;
        else
            return false;
    }

    public static function updateUserDataInDB($user){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "UPDATE users SET login='{$user->login}', password='{$user->password}', email='{$user->email}', avatar = {$user->avatar}, date_reg='{$user->date_reg}', date_log='{$user->date_log}', hash='{$user->hash}', secure_level={$user->secure_level} WHERE ID={$user->ID}";
        $result = self::$dbConn->executeQuery($query);
        if ($result)
            return true;
        else
            return false;
    }

    public static function deleteUserData($ID){
        if (!isset(self::$dbConn)){
            self::$dbConn = new database();
            self::$dbConn->connectToDB();
        }
        $query = "DELETE FROM users WHERE ID = {$ID}";
        $result = self::$dbConn->executeQuery($query);
        if ($result)
            return true;
        else
            return false;
    }

}
?>