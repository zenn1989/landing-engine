<?php

namespace App\Http\Controllers\Front;


use App\Backcalls;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ReCaptcha\ReCaptcha;
use Illuminate\Support\Facades\Mail;

/**
 * Class BackcallController
 * @package App\Http\Controllers\Front
 */
class BackcallController extends Controller
{
    /**
     * Add new backcall request
     * @param Request $request
     * @return array
     */
    public function send(Request $request)
    {
        $captchaValue = (string)$request->input('captcha', false);
        $name = htmlentities((string)$request->input('name', ''));
        $phone = htmlentities((string)$request->input('phone', ''));

        if (strlen($phone) > 20 || strlen($phone) < 9 || !preg_match('/^[\+0-9\-\(\)\s]*$/', $phone)) {
            return [
                'status' => 0,
                'msg' => 'Номер телефона указан неверно'
            ];
        }

        if (strlen($name) < 3 || strlen($name) > 100) {
            return [
                'status' => 0,
                'msg' => 'Имя указано не верно'
            ];
        }

        $captcha = new ReCaptcha(env('APP_RECATCHA_SECRET'));
        $resp = $captcha->verify($captchaValue);

        if (!$resp->isSuccess()) {
            return [
                'status' => 0,
                'msg' => 'Проверка капчей не пройдена!'
            ];
        }

        $query = new Backcalls();
        $query->name = $name;
        $query->phone = $phone;
        $query->created_at = time();
        $query->save();

        $message = 'Новый запрос обратной связи от: ' . $query->phone . ' (' . $query->name . ')';

        // send notify email
        Mail::raw($message, function($m) {
            $m->from(env('MAIL_FROM_ADDRESS'))
                ->to(env('MAIL_BACKCALLS_NOTIFY_EMAIL'))
                ->subject('Новый запрос звонка');
        });

        return [
            'status' => 1,
            'msg' => 'Ваша заявка принята! В ближайшее время с вами свяжутся.' . $phone
        ];
    }
}