<?php
    ob_start();
    include_once ("controllers/routing.php");
    include_once("controllers/functions.php");
    $rout = new routing();
    $rout->printPage();
?>