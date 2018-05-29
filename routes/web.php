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
    $router->get('getCaptcha', 'UserController@getCaptcha');   // 不jb知道
    $router->get('list', 'UserController@index');              // 获取用户列表
    $router->post('register', 'UserController@register');      // 用户注册
});

/*********************** 用户信息相关 *************************/
$router->group(['prefix' => 'userinfo'], function () use ($router) {
    $router->get('add_by_register', 'UserInfoController@add_by_register');    // 注册添加
    $router->get('add_by_admin', 'UserInfoController@add_by_admin');          // 后台添加
    $router->get('edit', 'UserInfoController@edit');                          // 更新信息
    $router->get('del', 'UserInfoController@del');                            // 删除用户
    $router->get('detail', 'UserInfoController@detail');                      // 根据用户id获取详情
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





