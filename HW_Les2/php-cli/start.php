<?php
date_default_timezone_set('Europe/Moscow');

require_once 'functions.php';
require_once 'data.php';

// Пример вызовов
echo "1. Арифметика (через switch):\n";
echo mathOperation(10, 5, 'add') . PHP_EOL;
echo mathOperation(10, 2, 'divide') . PHP_EOL;

echo "\n2. Города по областям:\n";
printRegions($regions);

echo "\n3. Транслитерация:\n";
echo transliterate("привет мир") . PHP_EOL;

echo "\n4. Возведение в степень:\n";
echo power(2, 5) . PHP_EOL;

echo "\n5. Текущее время:\n";
echo getTimeWithDeclension() . PHP_EOL;


// docker run --rm -v ${pwd}/php-cli/:/cli php:8.2-cli php /cli/start.php