<?php
/**
 * User: wangliangliang
 * Date: 2018/4/15
 * Time: 下午5:29
 */

namespace App\Enum;


class Code
{
    const VFCODE = [
        'host' => 'http://smsapi.api51.cn',
        'route' => '/code',
        'headers' => [
            'Authorization:APPCODE' => 'c43a7bbd0eed4ef6a088fafb683aa302'
        ]
    ];
}