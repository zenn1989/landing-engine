<?php

namespace App\Model;


use App\User;
use Ffcms\Templex\Helper\Html\Form\Model;

class FormUserUpdate extends Model
{
    public $email;
    public $name;
    public $password;

    /** @var User */
    private $_record;

    public function __construct(User $record)
    {
        $this->_record = $record;
        $this->email = $record->email;
        $this->name = $record->name;
        parent::__construct();
    }

    /**
     * Form attribute labels
     * @return array
     */
    public function labels(): array
    {
        return [
            'email' => 'Почта',
            'name' => 'Имя',
            'password' => 'Пароль'
        ];
    }
}