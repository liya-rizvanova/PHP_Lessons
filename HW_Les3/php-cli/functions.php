<?php

function validateUserData($name, $date) {
    if (empty(trim($name))) {
        return "Ошибка: имя не может быть пустым.";
    }

    $d = DateTime::createFromFormat('d-m-Y', $date);
    if (!($d && $d->format('d-m-Y') === $date)) {
        return "Ошибка: некорректная дата. Ожидаемый формат: дд-мм-гггг.";
    }

    return true;
}

function addUser($filePath, $name, $date) {
    $validationResult = validateUserData($name, $date);
    if ($validationResult !== true) {
        return $validationResult;
    }

    $line = "$name,$date\n";
    file_put_contents($filePath, $line, FILE_APPEND);
    return "Пользователь успешно добавлен.";
}

function findBirthdayToday($filePath) {
    if (!file_exists($filePath)) {
        return "Файл не найден.";
    }

    $today = date('d-m');
    $lines = file($filePath, FILE_IGNORE_NEW_LINES);

    $found = [];
    foreach ($lines as $line) {
        list($name, $date) = explode(',', $line);
        $dateParts = explode('-', $date);
        if (count($dateParts) >= 2) {
            $birthDayMonth = $dateParts[0] . '-' . $dateParts[1];
            if ($birthDayMonth === $today) {
                $found[] = $name;
            }
        }
    }

    if (empty($found)) {
        return "Сегодня нет дней рождения.";
    }

    return "Сегодня день рождения у: " . implode(', ', $found);
}

function deleteUser($filePath, $search) {
    if (!file_exists($filePath)) {
        return "Файл не найден.";
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES);
    $newLines = [];
    $deleted = false;

    foreach ($lines as $line) {
        if (stripos($line, $search) === false) {
            $newLines[] = $line;
        } else {
            $deleted = true;
        }
    }

    if ($deleted) {
        file_put_contents($filePath, implode("\n", $newLines) . "\n");
        return "Запись успешно удалена.";
    } else {
        return "Запись не найдена.";
    }
}
