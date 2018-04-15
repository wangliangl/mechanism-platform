<?php

namespace App\Services;


use App\Enum\Code;
use App\Exceptions\ApiException;
use GuzzleHttp\Client;

class UserService extends BaseService
{

    public function getCaptchaByMobile(array $input): bool
    {
        $mobile = $input['mobile'];
        return $this->getCaptcha($mobile);

    }

    private function getCaptcha(int $mobile)
    {
        $code = rand(100000, 999999);
        $params = [
            'mobile' => (string)$mobile,
            'param'  => 'code:' . $code,
            'tpl_id' => 'TP1711063'
        ];
        $client = new Client(['headers' => Code::VFCODE['headers']]);
        $request = $client->request('post',
            Code::VFCODE['host'] . Code::VFCODE['route'] . '?' . http_build_query($params));
        $request = json_decode($request->getBody()->getContents(), true);
        if ($request['return_code'] == '00000') {
            setUserCode($mobile, $code);
            return true;
        }
        return false;
    }

    public function register(array $input): bool
    {

        $mobile = $input['mobile'];
        $code = $input['code'];
        $nickname = $input['nickname'];
        $password = $input['password'];

        if (!preg_match("/^1[34578]\d{9}$/", $mobile)) {
            throw new ApiException("Illegal mobile phone number", 20100);
        }

        if ($code != getUserCode($mobile)) {
            throw new ApiException("Captcha error", 20101);
        }

        //todo 插入表

    }
}
