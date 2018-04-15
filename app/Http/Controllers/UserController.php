<?php
/**
 * User: wangliangliang
 * Date: 2018/4/15
 * Time: 下午1:55
 */

namespace App\Http\Controllers;


use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UserController extends BaseController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getCaptcha(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required | unique:user,mobile|integer | min: 11'
        ]);

        return $this->userService->getCaptchaByMobile($request->all());
    }

    public function register(Request $request)
    {

        $this->validate($request, [
            'mobile'   => 'required | unique:user,mobile|integer | min: 11',
            'code'     => 'required | integer | min: 4',
            'nickname' => 'required | string',
            'password' => 'required | string'
        ]);

        return $this->userService->register($request->all()) ? $this->success() : $this->failed('注册失败');
    }
}
