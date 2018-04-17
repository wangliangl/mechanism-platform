<?php
/**
 * User: zc
 * Date: 2018/4/15
 * Time: 下午1:55
 */

namespace App\Http\Controllers;

use App\Services\DepartmentService;
use Illuminate\Http\Request;
use Validator;

class DepartmentController extends BaseController{
    private $department = null;

    public function __construct(){
        $this->department = new DepartmentService();

    }

    /**
     * 按照分页获取部门列表
     */
    public function index(Request $request){
        $name = $request->input("name",false);
        $pageno = $request->input('pageno',1);
        $pagenum = $request->input('pagenum',20);
        $res = $this->department->getDepartmentByCond($name, $pageno, $pagenum);
        return $this->success($res);
    }


    /**
     * 添加部门
     */
    public function add(Request $request){
        $name = $request->input("name");
        $desc = $request->input("desc");

        $rules =  [
            'name' => 'required | string',
            'desc' => 'required | string'
        ];
        $messages = [
            'name.required' => '拉裤兜子里',
            'desc.required' => '王二麻子'
        ];
       $validator = Validator::make($request->input(), $rules, $messages);
       // var_dump($validator->errors()->all());
        return $this->success();
    }


    public function edit(){



    }

    public function del(){



    }
}
