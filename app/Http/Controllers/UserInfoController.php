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

    public function __construct(){
        $this->userInfo = new UserInfoService();
        $this->user = new UserService();
    }

    /**
     * @desc 列表详情
     */
    public function index(Request $request){
        $name = $request->input("name");
        $depart_id = $request->input("depart_id",false);
        $pageno = $request->input('pageno',1);
        $pagenum = $request->input('pagenum',20);
        $res = $this->userInfo->getUserInfoByCond($name,$depart_id,$pageno,$pagenum);
        return $this->success($res);
    }


    /**
     * 添加用户信息
     */
    public function add(Request $request){
        // 验证规则
        $rules =  [
            'name' => 'required | string',    // 姓名
            'idcard' => 'required | string',  // 身份证
            'sex' => 'required | int',      // 性别
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
        $sex = $request->input("sex");
        $idcard = $request->input("idcard");
        $avtar = $request->input("avtar");
        $province = $request->input("province");
        $city = $request->input("city");
        $county = $request->input("county");
        $year = $request->input("year");
        $month = $request->input("month");
        $day = $request->input("day");
        $password = $request->input("password");
        $marriage = $request->input("marriage");
        $healthy = $request->input("healthy");
        $education = $request->input("education");
        $profession = $request->input("profession");
        $school = $request->input("school");
        $phone = $request->input("phone");
        $department = $request->input("deparment");
        $address = $request->input("address");
        $role_id = $request->input("role_id");
        $depart_id = $request->input("depart_id");
        $email = $request->input("email");
        $mobile = $request->input("mobile");
        $desc = $request->input("desc");
        $honor_photo = $request->input("honor_photo");
        $id = null;


        // 组合字段
        $brithday = "{$year}-{$month}-{$day}";
        $native_place = "{$province}-{$city}-{$county}";
        $res = $this->userInfo->addOrEdit($id,$name,$sex,$avtar,$brithday,$native_place,$idcard,$address,$marriage,$healthy,$education,$profession,$school,$phone,$depart_id,$role_id,$desc,$honor_photo);

        // 保存用户
        if($res !== false){
            $this->user->saveUserByinfo($email,$mobile,$password,$res);
        }

        return $this->success();
    }


    public function edit(Request $request){
        // 参数真多
        $name = $request->input("name");
        $sex = $request->input("sex");
        $idcard = $request->input("idcard");
        $avtar = $request->input("avtar");
        $province = $request->input("province");
        $city = $request->input("city");
        $county = $request->input("county");
        $year = $request->input("year");
        $month = $request->input("month");
        $day = $request->input("day");
        $password = $request->input("password");
        $marriage = $request->input("marriage");
        $healthy = $request->input("healthy");
        $education = $request->input("education");
        $profession = $request->input("profession");
        $school = $request->input("school");
        $phone = $request->input("phone");
        $department = $request->input("deparment");
        $address = $request->input("address");
        $role_id = $request->input("role_id");
        $depart_id = $request->input("depart_id");
        $email = $request->input("email");
        $mobile = $request->input("mobile");
        $desc = $request->input("desc");
        $honor_photo = $request->input("honor_photo");
        $id = $request->input("id");


        // 组合字段
        $brithday = "{$year}-{$month}-{$day}";
        $native_place = "{$province}-{$city}-{$county}";
        $res = $this->userInfo->addOrEdit($id,$name,$sex,$avtar,$brithday,$native_place,$idcard,$address,$marriage,$healthy,$education,$profession,$school,$phone,$depart_id,$role_id,$desc,$honor_photo);


    }

    public function del(){



    }
}
