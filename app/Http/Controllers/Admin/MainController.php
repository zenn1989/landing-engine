<?php

namespace App\Http\Controllers\Admin;


use App\Backcalls;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class MainController
 * @package App\Http\Controllers\Admin
 * @author https://github.com/ajaxorg/ace
 */
class MainController extends Controller
{
    const ITEM_PER_PAGE = 10;

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function index(Request $request): ?string
    {
        $page = (int)$request->query->get('page', 0);
        $offset = $page * static::ITEM_PER_PAGE;

        // get records from "callback me now"
        $records = Backcalls::orderBy('id', 'DESC')
            ->skip($offset)
            ->take(10)
            ->get();

        return view()->render('admin/index', [
            'records' => $records,
            'pagination' => [
                'page' => $page,
                'total' => Backcalls::count(),
                'step' => static::ITEM_PER_PAGE
            ]
        ]);
    }

    /**
     * Close back call request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function close(string $id)
    {
        $record = Backcalls::find($id);
        if ($record) {
            $record->status = 1;
            $record->updated_at = time();
            $record->save();
        }

        return redirect('/admin');
    }
}