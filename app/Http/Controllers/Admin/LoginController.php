<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

/**
 * Class LoginController. Admin auth controller
 * @package App\Http\Controllers\Admin
 */
class LoginController extends Controller
{
    /**
     * Show admin login page
     * @param Request $request
     * @return string|null
     * @throws \Throwable
     */
    public function loginForm(Request $request): ?string
    {
        if ($request->session()->get('id', null)) {
            return redirect('/admin');
        }

        return view()->render('admin/login');
    }

    /**
     * Process admin post form login
     * @param Request $request
     * @return mixed
     */
    public function doLogin(Request $request)
    {
        $login = $request->post('email', null);
        $pwd = $request->post('password', null);

        if (!$login || !$pwd || !is_string($login) || !is_string($pwd) || strlen($login) < 2 || strlen($pwd) < 5) {
            return redirect()->route('login');
        }

        // try to find user in db
        $query = User::where('email', $login)
            ->where('is_admin', true)
            ->first();

        // check if user found and password compare
        if (!$query || !password_verify($pwd, $query->password)) {
            return redirect()->route('login');
        }

        // if all is "ok" lets work ;)
        $request->session()->put('id', $query->id);
        return redirect('/admin');
    }
}