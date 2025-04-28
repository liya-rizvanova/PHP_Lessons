<?php

require_once __DIR__ . '/../vendor/autoload.php';

use HW_Les6\Application\Application;
use HW_Les6\Application\Render;

try{
    $app = new Application();
    echo $app->run();
}
catch(Exception $e){
    echo Render::renderExceptionPage($e);
}
