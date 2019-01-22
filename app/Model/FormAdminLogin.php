<?php

namespace App\Model;


use Ffcms\Templex\Helper\Html\Form\Model;

/**
 * Class FormAdminLogin
 * @package App\Model
 */
class FormAdminLogin extends Model
{
    public $email;
    public $password;

    /**
     * @return array
     */
    public function labels(): array
    {
        return [
            'email' => 'Почта'
        ];
    }

}