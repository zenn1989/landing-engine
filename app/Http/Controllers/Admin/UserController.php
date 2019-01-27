<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\FormUserUpdate;
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

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector|string
     * @throws \Throwable
     */
    public function userUpdateShow(Request $request, $id = null)
    {
        $record = User::findOrNew($id);

        $updated = (bool)$request->query->get('updated', false);
        $model = new FormUserUpdate($record);

        return view()->render('admin/user_update', [
            'model' => $model,
            'updated' => $updated
        ]);
    }

    /**
     * @param Request $request
     * @param null $id
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function userUpdateSend(Request $request, $id = null)
    {
        /** @var User $record */
        $record = User::findOrNew($id);

        $model = new FormUserUpdate($record);

        $email = (string)$request->input($model->getFormName() . '.email');
        $name = (string)$request->input($model->getFormName() . '.name');
        $pwd = (string)$request->input($model->getFormName() . '.password');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($name) < 1) {
            return redirect('/admin/users');
        }

        $record->email = $email;
        $record->name = $name;
        if ($pwd && strlen($pwd) > 1) {
            $record->password = password_hash($pwd, PASSWORD_DEFAULT);
        }
        $record->save();


        return redirect('/admin/user/update/' . $record->id . '?updated=true');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector|string
     * @throws \Throwable
     */
    public function userDeleteShow($id)
    {
        $record = User::find($id);
        if (!$record) {
            return redirect('/admin/users');
        }

        return view()->render('admin/user_delete', [
            'record' => $record
        ]);
    }

    public function userDeleteSend(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect('/admin/users');
        }

        if ((bool)$request->input('submit', false)) {
            $user->delete();
        }

        return redirect('/admin/users');
    }
}