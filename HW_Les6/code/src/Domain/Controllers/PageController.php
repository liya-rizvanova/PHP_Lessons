<?php

namespace HW_Les6\Domain\Controllers;

use HW_Les6\Application\Render;

class PageController
{

    public function actionIndex()
    {
        $render = new Render();

        return $render->renderPage('page-index.tpl', ['title' => 'Главная страница']);
    }
}
