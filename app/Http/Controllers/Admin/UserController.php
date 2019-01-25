<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    const ITEM_PER_PAGE = 10;

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function userList(Request $request)
    {
        $page = (int)$request->query->get('page', 0);
        $offset = $page * static::ITEM_PER_PAGE;

        $records = User::orderBy('id', 'DESC')
            ->take(static::ITEM_PER_PAGE)
            ->skip($offset)
            ->get();

        return view()->render('admin/user_list', [
            'records' => $records,
            'pagination' => [
                'page' => $page,
                'total' => User::count(),
                'step' => static::ITEM_PER_PAGE
            ]
        ]);
    }
}