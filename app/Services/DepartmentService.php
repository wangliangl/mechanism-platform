<?php

namespace App\Services;

use App\Models\DepartmentModel;

class DepartmentService extends BaseService
{
    /**
     * @desc 按条件查找
     */
    public function getDepartmentByCond($name, $pageno, $pagenum){
        $data = [];

        $offset = ($pageno - 1) * $pagenum;
        $obj = new DepartmentModel();
            if($name != false){
                $obj->where('name', 'like', '%name%');
            }

        $res = $obj->skip($offset)
            ->take($pagenum)
            ->get()->toArray();

        if(!empty($res)){
            foreach($res as $v){
                $data[$v['id']] = $v['name'];
            }
        }
        return $data;
    }

    /**
     * @desc 添加部门信息
     */
    public function addDepartment($name, $desc ){
        $department = new DepartmentModel();
        $department->name = $name;
        $department->desc = $desc;
        $department->create_time = date("Y-m-d H:i:s");
        $res = $department->save();
        if(!$res){
            return false;
        }
        return true;
    }

    /**
     * @desc 判断部门是否存在
     */
    public function isHaveByCond($cond){
        $res = DepartmentModel::where($cond)->value('name');
        if(!empty($res)){
            return false;
        }
        return true;
    }

    /**
     * @desc 修改部门信息
     */
    public function editDeparmentInfo($id, $name, $desc){
        $deparment = DepartmentModel::where('id',$id)->find(1);
        $deparment->name = $name;
        $deparment->desc = $desc;
        $res =$deparment->save();
        if(!$res) {
            return false;
        }
        return true;
    }

    /***
     *@desc 删除部门信息
     */
    public function delDepartment($id){
        $res = DepartmentModel::where("id",$id)->delete();
        if(!$res){
            return false;
        }
        return true;
    }
}
