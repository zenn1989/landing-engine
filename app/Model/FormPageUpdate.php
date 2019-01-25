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
        $this->seoTitle = $page->seo_title;
        $this->seoDesc = $page->seo_description;
        $this->seoKeywords = $page->seo_keywords;

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

    /**
     * Get template path
     * @return array
     */
    public function getTemplates()
    {
        $result = [];
        $tplDir = base_path('resources/views/' . env('APP_TEMPLATE'));

        foreach (glob($tplDir . '/front/multiple/' . '*.php') as $file) {
            $result[] = substr($file, strlen($tplDir)+1, -4);
        }


        return $result;
    }
}