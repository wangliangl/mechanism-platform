<?php

namespace App\Services;

use App\Models\UserInfoModel;

class UserInfoService extends BaseService
{

    public function getUserInfoByCond($name,$depart_id,$pageno,$pagenum){
        $data = [];

        $offset = ($pageno - 1) * $pagenum;
        $obj = new UserInfoModel();
        if($name != false){
            $obj->where('name', 'like', '%name%');
        }

        if($depart_id != false){
            $obj->where('depart_id',$depart_id);
        }

        $count = $obj->count();
        $res = $obj->skip($offset)
            ->take($pagenum)
            ->get()->toArray();

        $data['list'] = [];
        $data['total'] = $count;

        if(!empty($res)){
            foreach($res as $v){
                $tmp['avtar'] = $v['avtar'];
                $tmp['id'] = $v['id'];
                $tmp['address'] = $v['address'];
                $tmp['depart_id'] = $v['depart_id'];
                $tmp['role_id'] = $v['role_id'];
                $tmp['sex'] = $v['sex'];
                $tmp['age'] = 10000;
                $tmp['phone'] = $v['phone'];
                array_push($data['list'],$tmp);
            }
        }
        return $data;



    }
    /**
     * @desc 添加或者修改
     */
    public function addUserByUserInfo($name,$sex,$avtar,$brithday,$native_place,$idcard,$address,$marriage,$healthy,$education,$profession,$school,$phone,$depart_id,$role_id,$desc,$honor_photo,$userid)
    {
        $model = new UserInfoModel();
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
        $model->honor_photo = $honor_photo;
        $model->userid = $userid;
        if($model->save()){
            return true;
        }
        return false;
    }

    /**
     * @desc 添加或者修改
     */
    public function edit($id,$name,$sex,$avtar,$brithday,$native_place,$idcard,$address,$marriage,$healthy,$education,$profession,$school,$phone,$depart_id,$role_id,$desc,$honor_photo)
    {
        $model = UserInfoModel::where('id',$id)->find(1);
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
        $model->honor_photo = $honor_photo;
        if($model->save()){
            return true;
        }
        return false;
    }

    /**
     * 删除用户
     * 分为逻辑删除和屋里删除
     */
    public function del($id,$type= 1){
        $res = UserInfoModel::where('id',$id)->delete();
        if($res)
            return true;
        return false;
    }

    /**
     *@desc 获取用户详情
     */
    public function detail($id)
    {
        $model = UserInfoModel::where('id',$id)->first()->toArray();
        return $model;
    }

}
