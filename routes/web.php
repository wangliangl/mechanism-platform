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

/*********************** 用户信息相关 *************************/
$router->group(['prefix' => 'userinfo'], function () use ($router) {
    $router->get('index', 'UserInfoController@index');
    $router->post('add', 'UserInfoController@add');
    $router->post('edit', 'UserInfoController@edit');
    $router->post('del', 'UserinfoController@delete');
});

$router->group(['prefix' => 'department'], function () use ($router) {
    $router->get('index', 'DepartmentController@index');
    $router->post('add', 'DepartmentController@add');
    $router->post('edit', 'DepartmentController@edit');
    $router->post('del', 'DepartmentController@delete');
});



