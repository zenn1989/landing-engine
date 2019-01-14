<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return view()->render('front/one_page', [
        'config' => config('seo')
    ]);
});

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