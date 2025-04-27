<?php

require_once 'AbstractBook.php';

class PaperBook extends AbstractBook {
    private $libraryAddress;

    public function __construct($title, $author, $libraryAddress) {
        parent::__construct($title, $author);
        $this->libraryAddress = $libraryAddress;
    }

    public function getOnHands() {
        return "Заберите книгу в библиотеке по адресу: {$this->libraryAddress}";
    }
}
