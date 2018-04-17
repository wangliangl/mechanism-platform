<?php
/**
 * User: wangliangliang
 * Date: 2018/4/15
 * Time: 下午7:23
 */

if (! function_exists("getUserCode"))
{
    function getUserCode (int $mobile)
    {
        return \Illuminate\Support\Facades\Redis::get("user_code:".$mobile);
    }
}

if (! function_exists("setUserCode"))
{
    function setUserCode (int $mobile, int $code)
    {
        return \Illuminate\Support\Facades\Redis::setex("user_code:".$mobile, 600, $code);
    }
}
