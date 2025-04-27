<?php

namespace HW_Les5\Application;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Application
{
    private Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../templates');
        $this->twig = new Environment($loader);
    }

    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if (str_starts_with($uri, '/user/save')) {
            $controller = new \HW_Les5\Controllers\UserController();
            $controller->save();
        } elseif ($uri === '/' || $uri === '/index.php') {
            $this->renderMainPage();
        } else {
            $this->renderError();
        }
    }

    private function renderMainPage()
    {
        echo $this->twig->render('layout.twig', [
            'title' => 'Главная страница'
        ]);
    }

    private function renderError()
    {
        http_response_code(404);
        echo $this->twig->render('error.twig', [
            'title' => 'Ошибка 404'
        ]);
    }
}
