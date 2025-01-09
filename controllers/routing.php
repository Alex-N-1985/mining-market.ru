<?php
    
    class routing{

        public $domain;
        public $start;
        public $class;
        public $action;
        public $dop_params;
        public function __construct()
        {
            $this->domain = $_SERVER["HTTP_HOST"];
            $this->start = "";
            $this->class = "";
            $url = $_SERVER["REQUEST_URI"];
            $url = substr($url, strlen($this->start));
            $adrParams = explode('?', $url);
            $adrParams[0] = substr($adrParams[0], 1);
            $params = explode('/', $adrParams[0]);
            if (!empty($params[0])){
                $this->class = $params[0];
            } else {
                $this->class = "main";
            }
            if (!empty($params[1])){
                $this->action = $params[1];
            } else {
                $this->action = "index";
            }
            if (!empty($params[2])){
                $this->dop_params = $params[2];
            }
        }

        public function printPage(){
            global $rout;
            $path = "controllers/".$this->class.".php";
            include_once($path);
            $classname = $this->class;
            $actionname = $this->action;
            $obj = new $this->class();
            include_once("views/page.php");
        }
    }
?>