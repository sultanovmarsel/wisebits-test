<?php

use Laravel\Lumen\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => 'users'], function (Router $router) {
    $router->get('/', 'UserController@index');
    $router->get('/{userId}', 'UserController@show');
    $router->post('/', 'UserController@store');
    $router->put('/', 'UserController@update');
    $router->delete('/', 'UserController@delete');
});


