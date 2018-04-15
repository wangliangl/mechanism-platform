<?php

namespace App\Services;

use App\Models\DepartmentModel;

class DepartmentService extends BaseService
{
    public function getDepartmentByCond($name, $pageno, $pagenum){
        $data = [];

        $offset = ($pageno - 1) * $pagenum;
        $obj = new DepartmentModel();
            if($name != false){
                $obj->where('name', 'like', '%T%');
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

}
