<?php

/** @var \Laravel\Lumen\Routing\Router $router */
if (env('APP_ONEPAGE')) {
    $router->get('/', function () use ($router) {
        return view()->render('front/single/index');
    });
} else {
    try {
        $pages = \Illuminate\Support\Facades\DB::select('SELECT * FROM pages');
        foreach ($pages as $page) {
            $router->get($page->route, function () use ($router, $page) {
                return view()->render($page->tpl, $page);
            });
        }
    } catch (\Exception $e) {}
}

$router->get('/lol/test', function() use ($router){
    return ['hey' => 'test'];
});


// work around /admin/ query namespace in app\Http\Controller\Admin namespace
$router->group(['namespace' => 'Admin', 'prefix' => 'admin'], function($app) use ($router) {
    /** @var \Laravel\Lumen\Routing\Router $app */
    $app->get('/', ['uses' => 'MainController@index']);
    $app->get('/index', ['uses' => 'MainController@index']);

    $app->get('/lol/test/kek/', function(){
        return ['test'];
    });
});