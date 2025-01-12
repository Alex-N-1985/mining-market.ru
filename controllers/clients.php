<?php 

    include_once ("models\clients.php");

    class clients {

        public function index(){
            global $rout;            
            $clts = _clients::getClientsFromDBbyType("manufacturer");              
            $content = file_get_contents("views/clients/index.php");
            eval("?>".$content);
        }

        public function type($tName){
            $clts = _clients::getClientsFromDBbyType($tName);              
            $content = file_get_contents("views/clients/index.php");
            eval("?>".$content);
        }

    }

?>