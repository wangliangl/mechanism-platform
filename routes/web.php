<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () use ($router){
    return phpinfo();
});

/*----------------------- 用户相关 ---------------------------*/
$router->group(['prefix' => 'user'], function () use ($router) {
    $router->get('getCaptcha', 'UserController@getCaptcha');
    $router->post('register', 'UserController@register');
});