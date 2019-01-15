<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        // session demo
        app('session')->put('name', 'test name');
        $t = app('session')->get('name');
        return view()->render('admin/login');
    }

    /**
     * @return string|null
     * @throws \Throwable
     */
    public function login(): ?string
    {
        return view()->render('admin/login');
    }
}