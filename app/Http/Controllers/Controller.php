<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class Controller. Native controller instance
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    /** @var \Ffcms\Templex\Engine */
    protected $view;

    /**
     * Controller constructor. Add view methods
     */
    public function __construct()
    {
        $this->view = view();
    }
}
