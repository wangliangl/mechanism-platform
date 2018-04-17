<?php 
namespace App\Models;

class UserModel extends BaseModel{

    protected $table = 'user';
    public $timestamps = false;

    public static function saveUser(int $mobile, string $nickname, string $password): bool
    {
        return self::save([
            'mobile' => $mobile,
            'nickname' => $nickname,
            'password' => encrypt($password),
            'create_time' => date('Y-m-d H:i:s', time()),
        ]);
    }

}
