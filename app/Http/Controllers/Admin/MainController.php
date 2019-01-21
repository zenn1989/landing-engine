<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

/**
 * Class MainController
 * @package App\Http\Controllers\Admin
 * @author https://github.com/ajaxorg/ace
 */
class MainController extends Controller
{

    /**
     * @return string
     * @throws \Throwable
     */
    public function index(): ?string
    {
        return view()->render('admin/index');
    }
}