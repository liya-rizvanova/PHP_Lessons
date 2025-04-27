<?php

require_once 'src/AbstractBook.php';
require_once 'src/DigitalBook.php';
require_once 'src/PaperBook.php';

// Массив для хранения добавленных книг
$books = [];

// Загружаем книги из файла books.json
$jsonFile = __DIR__ . '/books.json';
if (file_exists($jsonFile)) {
    $jsonData = file_get_contents($jsonFile);
    $bookList = json_decode($jsonData, true);

    if (is_array($bookList)) {
        foreach ($bookList as $bookData) {
            if ($bookData['type'] === 'digital') {
                $books[] = new DigitalBook($bookData['title'], $bookData['author'], $bookData['downloadLink']);
            } elseif ($bookData['type'] === 'paper') {
                $books[] = new PaperBook($bookData['title'], $bookData['author'], $bookData['libraryAddress']);
            }
        }
    }
}

while (true) {
    echo "\nВыберите действие:\n";
    echo "1. Добавить цифровую книгу\n";
    echo "2. Добавить бумажную книгу\n";
    echo "3. Прочитать книгу\n";
    echo "4. Показать статистику прочтений\n";
    echo "5. Получить ссылку/адрес получения книги\n";
    echo "0. Выход\n";
    echo "Ваш выбор: ";

    $choice = trim(fgets(STDIN));

    switch ($choice) {
        case '1':
            echo "Введите название книги: ";
            $title = trim(fgets(STDIN));
            echo "Введите автора книги: ";
            $author = trim(fgets(STDIN));
            echo "Введите ссылку для скачивания: ";
            $link = trim(fgets(STDIN));
            $books[] = new DigitalBook($title, $author, $link);
            echo "Цифровая книга добавлена.\n";
            break;

        case '2':
            echo "Введите название книги: ";
            $title = trim(fgets(STDIN));
            echo "Введите автора книги: ";
            $author = trim(fgets(STDIN));
            echo "Введите адрес библиотеки: ";
            $address = trim(fgets(STDIN));
            $books[] = new PaperBook($title, $author, $address);
            echo "Бумажная книга добавлена.\n";
            break;

        case '3':
            if (empty($books)) {
                echo "Нет добавленных книг.\n";
                break;
            }
            foreach ($books as $index => $book) {
                echo "{$index}: {$book->read()}\n";
            }
            break;

        case '4':
            echo AbstractBook::getReadStatistics() . "\n";
            break;

        case '5':
            if (empty($books)) {
                echo "Нет добавленных книг.\n";
                break;
            }
            foreach ($books as $index => $book) {
                echo "{$index}: {$book->getOnHands()}\n";
            }
            break;

        case '0':
            echo "Выход из программы.\n";
            exit;

        default:
            echo "Некорректный выбор. Попробуйте снова.\n";
    }
}

// docker run --rm -it -v ${pwd}/php-cli/:/cli php:8.2-cli php /cli/start.php