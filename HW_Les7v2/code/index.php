<?php


require_once('./vendor/autoload.php');

use HW_Les7v2\Application\Application;

try{
    $app = new Application();

    $result = $app->runApp();

    echo $result;
}
catch(Exception $e){
    echo $e->getMessage();
}

