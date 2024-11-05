<?php
    class routing {

        public $domain;
        public $start;
        public $class;
        public $action;
        public $dop_params;

        public function __construct($domain = "", $start = ""){
            if (strlen($domain) == 0){
                $this->domain = $_SERVER["HTTP_HOST"];
            }
            if (strlen($start) == 0){
                $this->start = "api";
            }
            $this->class = "";
            $this->action = "";
            $uri = $_SERVER["REQUEST_URI"];
            $adrparams = explode('?', $uri);
            $adrparams[0] = substr($adrparams[0], 1);
            $params = explode('/', $adrparams[0]);
            if (!empty($params[0]) && $params[0] == "api"){
                $this->start = $params[0];
            }
            if (!empty($params[1])){
                $this->class = $params[1];
            } else {
                $this->class = "errorPage";
            } 
            if (!empty($params[2])){
                $this->action = $params[2];
            } else {
                $this->action = "index";
            }
            if (!empty($params[3])){
                $this->dop_params = $params[3];
            }
        }
        
        public function processedRequest(){
            global $rout;
            $path = "./controllers/".$this->class.".php";
            include_once($path);
            $className = $this->class;
            $actionName = $this->action;
            $obj = new $className();
            if (!empty($this->dop_params)){
                $content = $obj->$actionName($this->dop_params);
            } else {
                $content = $obj->$actionName();
            }
            $data = array(
                "class" => $this->class,
                "action" => $this->action,
                "content" => $content
            );
            $output = json_encode($data);
            return $output;
        }

    }
?>