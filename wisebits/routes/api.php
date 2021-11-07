<?php

use Laravel\Lumen\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => 'users'], function (Router $router) {
    $router->get('/', 'UserController@index');
    $router->get('/{userId:[0-9]+}', 'UserController@show');
    $router->post('/', 'UserController@store');
    $router->put('/{userId:[0-9]+}', 'UserController@update');
    $router->delete('/{userId:[0-9]+}', 'UserController@delete');
});


