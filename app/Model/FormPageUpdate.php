<?php

namespace App\Model;


use App\Page;
use Ffcms\Templex\Helper\Html\Form\Model;

/**
 * Class FormPageUpdate
 * @package App\Model
 */
class FormPageUpdate extends Model
{
    public $route;
    public $text;
    public $tpl;

    public $seoTitle;
    public $seoDesc;
    public $seoKeywords;

    private $_record;

    /**
     * FormPageUpdate constructor.
     * @param Page $page
     */
    public function __construct(Page $page)
    {
        $this->_record = $page;

        $this->route = $page->route;
        $this->text = $page->text;

        parent::__construct();
    }

    /**
     * Form attribute labels
     * @return array
     */
    public function labels(): array
    {
        return [
            'route' => 'Маршрут',
            'tpl' => 'Шаблон',
            'seoTitle' => 'Meta заголовок',
            'seoDesc' => 'Meta описание',
            'seoKeywords' => 'Meta ключ.слова'
        ];
    }
}