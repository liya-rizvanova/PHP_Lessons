<?php

namespace HW_Les7\Infrastructure;

use HW_Les7\Application\Application;
use \PDO;

class Storage {

    private PDO $connection;

    public function __construct() {
        $this->connection = new PDO(
            Application::$config->get()['database']['DSN'],
            Application::$config->get()['database']['USER'],
            Application::$config->get()['database']['PASSWORD'],
            array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            )
        );


    }

    public function get(): PDO{
        return $this->connection;
    }
}