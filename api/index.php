<?php

    include_once "./controllers/routing.php";

    $rout = new routing();
    echo $rout->processedRequest();
?>