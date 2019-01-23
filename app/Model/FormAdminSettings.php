<?php

namespace App\Model;


use Ffcms\Templex\Helper\Html\Form\Model;

/**
 * Class FormAdminSettings
 * @package App\Model
 */
class FormAdminSettings extends Model
{
    public $appEnv;
    public $appDebug;
    public $appUrl;
    public $appTemplate;
    public $appOnepage;

    public $appCatchaPublic;
    public $appCatchaPrivate;

    public $seoOpTitle;
    public $seoOpDesc;
    public $seoOpKeywords;

    /**
     * FormAdminSettings constructor.
     */
    public function __construct()
    {
        $this->appEnv = env('APP_ENV');
        $this->appDebug = env('APP_DEBUG');
        $this->appUrl = env('APP_URL');
        $this->appUrl = env('APP_URL');
        $this->appTemplate = env('APP_TEMPLATE');
        $this->appOnepage = env('APP_ONEPAGE');

        $this->appCatchaPublic = env('APP_RECATCHA_PUBLIC');
        $this->appCatchaPrivate = env('APP_RECATCHA_SECRET');

        $this->seoOpTitle = env('SEO_OP_TITLE');
        $this->seoOpDesc = env('SEO_OP_DESC');
        $this->seoOpKeywords = env('SEO_OP_KEYWORDS');
        parent::__construct();
    }

    /**
     * Form attribute labels
     * @return array
     */
    public function labels(): array
    {
        return [
            'appEnv' => 'Среда',
            'appDebug' => 'Отладка',
            'appUrl' => 'Базовый URL',
            'appTemplate' => 'Шаблон',
            'appOnepage' => 'Одностраничный режим',
            'appCatchaPublic' => 'reCaptcha public key',
            'appCatchaPrivate' => 'reCaptcha secret key',
            'seoOpTitle' => 'Meta title',
            'seoOpDesc' => 'Meta description',
            'seoOpKeywords' => 'Meta keywords'
        ];
    }
}