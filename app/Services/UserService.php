<?php

namespace App\Services;


use App\Enum\Code;
use App\Exceptions\ApiException;
use GuzzleHttp\Client;

class userservice extends BaseService
{

    public function getCaptchaByMobile(array $input): bool
    {
        $mobile = $input['mobile'];
        $this->buildParams($mobile);

    }

    private function buildParams(int $mobile)
    {
        $client = new Client(['base_uri' => Code::VFCODE['host']]);
        $params = [
            'code' => rand(100000, 999999),
            'mobile' => $mobile
        ];

        $a = $client->request('get', Code::VFCODE['route'], [
            'headers' => Code::VFCODE['headers']
        ], $params);
        dd($a);

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



    }
}
