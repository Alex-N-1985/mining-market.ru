<?php 

    function loadConfigData($initfile){
        $result = file_get_contents($initfile);
        return json_decode($result);
    }

?>