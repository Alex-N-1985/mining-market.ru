<?php 

    class database {

        private $host;
        private $username;
        private $password;
        private $dbName;
        private $charset;

        public $conn;

        public function __construct($configFileName = "config.json"){
            $config = $this->loadConfigData($configFileName);
            $this->host = $config["host"];
            $this->username = $config["username"];
            $this->password = $config["password"];
            $this->dbName = $config["dbName"];
            $this->charset = $config["charset"];
        }

        public function connectToDB(){
            try {
                $dsn = "mysql:dbname=$this->dbName;host=$this->host;charset=$this->charset";
                $opt = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,];
                $this->conn = new PDO($dsn, $this->username, $this->password);
            } catch (PDOException $e){
                echo $e->getMessage();
            }
        }

        public function executeQuery($query, $data = NULL){
			if ($data != NULL){
                $check = $this->conn->prepare($query);
                $check->execute($data);
            } else {
                $check = $this->conn->query($query);                
            }            
            return $check;
        }

        private function loadConfigData($configFileName){
            $result = file_get_contents($configFileName);
            return json_decode($result, true);
        }

    }
?>