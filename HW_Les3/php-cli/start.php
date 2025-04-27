<?php

date_default_timezone_set('Europe/Moscow'); // Установи свой часовой пояс!

require_once 'functions.php';

$filePath = __DIR__ . '/../data/users.txt';

while (true) {
    echo "\nВыберите действие:\n";
    echo "1. Добавить пользователя\n";
    echo "2. Найти у кого сегодня день рождения\n";
    echo "3. Удалить пользователя\n";
    echo "0. Выход\n";
    echo "Ваш выбор: ";

    $choice = trim(fgets(STDIN));

    switch ($choice) {
        case '1':
            echo "Введите имя: ";
            $name = trim(fgets(STDIN));
            echo "Введите дату рождения (дд-мм-гггг): ";
            $date = trim(fgets(STDIN));
            echo addUser($filePath, $name, $date) . "\n";
            break;
        case '2':
            echo findBirthdayToday($filePath) . "\n";
            break;
        case '3':
            echo "Введите имя или дату для удаления: ";
            $search = trim(fgets(STDIN));
            echo deleteUser($filePath, $search) . "\n";
            break;
        case '0':
            echo "Выход из программы.\n";
            exit;
        default:
            echo "Некорректный ввод. Попробуйте снова.\n";
    }
}

// docker run --rm -it -v ${pwd}/php-cli/:/cli php:8.2-cli php /cli/start.php
