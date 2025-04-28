<?php

namespace HW_Les7v2\Domain\Controllers;

use HW_Les7v2\Application\Render;

class PageController
{

    public function actionIndex()
    {
        $render = new Render();

        return $render->renderPage('page-index.tpl', ['title' => 'Главная страница']);
    }
}
