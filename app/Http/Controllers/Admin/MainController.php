<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use \Ffcms\Templex\Engine;

/**
 * Class MainController
 * @package App\Http\Controllers\Admin
 */
class MainController extends Controller
{

    /**
     * @param Engine $tpl
     * @return string
     * @throws \Throwable
     */
    public function index(): ?string
    {
        return $this->view->render('admin/index');
    }
}