<?php

function calculate($a, $b, $op) {
    switch ($op) {
        case '+': return $a + $b;
        case '-': return $a - $b;
        case '*': return $a * $b;
        case '/': return $b != 0 ? $a / $b : "Ошибка: деление на ноль";
        default: return "Неизвестная операция";
    }
}

function mathOperation($arg1, $arg2, $operation) {
    return calculate($arg1, $arg2, match ($operation) {
        'add' => '+',
        'subtract' => '-',
        'multiply' => '*',
        'divide' => '/',
        default => '?'
    });
}

function printRegions($regions) {
    foreach ($regions as $region => $cities) {
        echo $region . ': ' . implode(', ', $cities) . PHP_EOL;
    }
}

function transliterate($string) {
    global $cyrToLat;
    $result = '';
    $chars = mb_str_split($string);
    foreach ($chars as $char) {
        $lower = mb_strtolower($char);
        $result .= $cyrToLat[$lower] ?? $char;
    }
    return $result;
}

function power($val, $pow) {
    if ($pow === 0) return 1;
    return $val * power($val, $pow - 1);
}

function getTimeWithDeclension() {
    $h = (int)date('H');
    $m = (int)date('i');

    $hours = match (true) {
        ($h % 10 == 1 && $h != 11) => "$h час",
        ($h % 10 >= 2 && $h % 10 <= 4 && ($h < 10 || $h > 20)) => "$h часа",
        default => "$h часов"
    };

    $minutes = match (true) {
        ($m % 10 == 1 && $m != 11) => "$m минута",
        ($m % 10 >= 2 && $m % 10 <= 4 && ($m < 10 || $m > 20)) => "$m минуты",
        default => "$m минут"
    };

    return "$hours $minutes";
}
