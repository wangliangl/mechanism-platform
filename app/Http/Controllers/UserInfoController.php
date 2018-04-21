<?php
/**
 * User: zc
 * Date: 2018/4/21
 * Time: 下午1:55
 */

namespace App\Http\Controllers;

use App\Services\UserInfoService;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserInfoController extends BaseController{

    private $userInfo;
    private $user;

    public function index(){
        $this->userInfo = new UserInfoService;
        $this->user = new UserInfoService;


    }


    /**
     * 添加用户信息
     */
    public function add(Request $request){
        // 验证规则
        $rules =  [
            'name' => 'required | string',    // 姓名
            'idcard' => 'required | string',  // 身份证
            'sex' => 'required | string',      // 性别
            'avtar' =>  'string',              // 头像
            'province' => 'required | string', // 省
            'city' => 'required | string',     // 市
            'county' => 'required | string',   // 县/区
            'year' => 'required | string',     // 年
            'month' => 'required | string',    // 月
            'day' => 'required | string',      // 日
            'password' => 'required | string', // 密码
            'marriage' => 'required | string', // 婚姻状况
            'healthy' => 'required | string',  // 健康状况
            'education' => 'required | string',// 学历
            'specialty' => 'required | string',// 专业
            'school' => 'required | string',   // 毕业院校
            'phone' => 'required | string',    // 联系方式
            'department' => 'required | string',// 联系方式
            'role' => 'required | string',     // 联系方式
            'email' => 'required | string',    // 邮箱
            'mobile' => 'required | string',   // 手机
            'desc' => 'required | string',     // 员工简介
            'photo' => 'required | string',    // 员工荣誉照片
        ];

        // 参数真多
        $name = $request->input("name");
        $idcard = $request->input("idcard");
        $avtar = $request->input("avtar");
        $province = $request->input("province");
        $city = $request->input("city");
        $county = $request->input("county");
        $year = $request->input("year");
        $montn = $request->input("month");
        $day = $request->input("day");
        $password = $request->input("password");
        $marriage = $request->input("marriage");
        $healthy = $request->input("healthy");
        $education = $request->input("education");
        $specialty = $request->input("specialty");
        $school = $request->input("school");
        $phone = $request->input("phone");
        $department = $request->input("deparment");
        $role = $request->input("role");
        $email = $request->input("email");
        $mobile = $request->input("dmobile");
        $desc = $request->input("desc");
        $photo = $request->input("photo");

        $this->userInfo->add();

    }


    public function edit(){



    }

    public function del(){



    }
}
