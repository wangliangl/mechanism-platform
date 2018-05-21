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
    $router->get('add', 'UserInfoController@add');
    $router->get('edit', 'UserInfoController@edit');
    $router->get('del', 'UserinfoController@delete');
});

/*********************** 部门相关 *************************/
$router->group(['prefix' => 'department'], function () use ($router) {
    $router->get('index', 'DepartmentController@index');
    $router->get('add', 'DepartmentController@add');
    $router->get('edit', 'DepartmentController@edit');
    $router->get('del', 'DepartmentController@del');
});

/*********************** 考勤管理 *************************/
$router->group(['prefix' => 'attendance'], function () use ($router) {
    $router->post('addAttendance', 'AttendanceController@updateAttendance');    //添加or更新考勤
    $router->get('getAttendance', 'AttendanceController@getAttendance');    //获取考勤列表
    $router->get('edit', 'DepartmentController@edit');
    $router->get('del', 'DepartmentController@del');
});





