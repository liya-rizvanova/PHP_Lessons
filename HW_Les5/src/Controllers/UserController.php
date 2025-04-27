<?php

namespace HW_Les5\Controllers;

use HW_Les5\Storage\UserStorage;

class UserController
{
    public function save()
    {
        $name = $_GET['name'] ?? '';
        $birthday = $_GET['birthday'] ?? '';

        if ($name && $birthday) {
            $storage = new UserStorage();
            $storage->save($name, $birthday);
            echo "Пользователь сохранен: $name ($birthday)";
        } else {
            echo "Не переданы параметры!";
        }
    }
}
