<?php

require_once 'AbstractBook.php';

class DigitalBook extends AbstractBook {
    private $downloadLink;

    public function __construct($title, $author, $downloadLink) {
        parent::__construct($title, $author);
        $this->downloadLink = $downloadLink;
    }

    public function getOnHands() {
        return "Ссылка для скачивания: {$this->downloadLink}";
    }
}
