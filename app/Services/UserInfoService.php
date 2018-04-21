<?php

namespace App\Services;

use App\Models\UserInfoModel;
use App\Services\BaseService;

class UserInfoService extends baseservice
{

    /**
     * @desc 添加或者修改
     */
    public function addOrEdit($id,$name,$sex,$avtar,$brithday,$native_place,$idcard,$address,$marriage,$healthy,$education,$profession,$school,$phone,$depart_id,$role_id,$desc,$honor_photo)
    {
        if(empty($id)){
            $model = new UserInfoModel();
        }else{
            $model = UserInfoModel::where('id',$id)->find(1);
        }

        $model->name = $name;
        $model->sex = $sex;
        $model->avtar = $avtar;
        $model->birthday = $brithday;
        $model->native_place = $native_place;
        $model->idcard = $idcard;
        $model->address = $address;
        $model->marriage = $marriage;
        $model->healthy = $healthy;
        $model->education = $education;
        $model->profession = $profession;
        $model->school = $school;
        $model->phone = $phone;
        $model->depart_id= $depart_id;
        $model->role_id= $role_id;
        $model->desc= $desc;
        $model->honor_photo= $honor_photo;

        if($model->save()){
            return $model->id;
        }
        return $false;
    }

    /**
     * 删除用户
     * 分为逻辑删除和屋里删除
     */
    public function del($id,$type){
        $res = UserInfoModel::where('id',$id)->delete();
        if($res)
            return true;
        return false;
    }
}
