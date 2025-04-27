<?php

namespace HW_Les5\Storage;

class UserStorage
{
    private string $file;

    public function __construct()
    {
        $this->file = __DIR__ . '/../../users.txt';
    }

    public function save(string $name, string $birthday): void
    {
        $line = "$name|$birthday" . PHP_EOL;
        file_put_contents($this->file, $line, FILE_APPEND);
    }
}
