<?php

abstract class AbstractBook {
    protected $title;
    protected $author;
    protected static $readCount = 0;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    abstract public function getOnHands();

    public function read() {
        self::$readCount++;
        return "Вы читаете '{$this->title}'.";
    }

    public static function getReadStatistics() {
        return "Книги были прочитаны " . self::$readCount . " раз(а).";
    }
}
