<?php
/**
 * User: zc
 * Date: 2018/4/15
 * Time: 下午1:55
 */

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
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

        // 验证规则
        $rules =  [
            'name' => 'required | string',
            'desc' => 'required | string'
        ];
        // 提示信息
        $messages = [
            'name.required' => '部门名称不能为空!',
            'desc.required' => '描述信息不能为空!'
        ];
        $this->validate($request,$rules,$messages);

        $name = $request->input("name");
        $desc = $request->input("desc");
        // 验证部门是否存在
        $cond = [["name","=",$name]];
        $isHave = $this->department->isHaveByCond($cond);
        if(!$isHave){
            throw new ApiException("部门已经存在", 3001);
        }

        // 判断是否添加成功
        $res = $this->department->addDepartment($name, $desc);
        if(!$res) {
            throw new ApiException("添加失败", 3000);
        }
        return $this->success();
    }


    /**
     * @desc 修改部门信息
     */
    public function edit(Request $request){
        $name = $request->input("name");
        $id = $request->input("id");
        $desc = $request->input("desc");

        // 验证规则
        $rules =  [
            'name' => 'required | string',
            'desc' => 'required | string',
            'id' => 'required | int'
        ];
        // 提示信息
        $messages = [
            'id.required' => 'id不能为空!',
            'name.required' => '部门名称不能为空!',
            'desc.required' => '描述信息不能为空!'
        ];
        $this->validate($request,$rules,$messages);

        // 验证部门是否存在
        $cond = [["id","=",$id]];
        $isHave = $this->department->isHaveByCond($cond);
        if($isHave){
            throw new ApiException("部门信息不存在!", 3001);
        }

        // 判断是否添加成功
        $res = $this->department->editDeparmentInfo($id, $name, $desc);
        if(!$res) {
            throw new ApiException("添加失败!", 3002);
        }
        return $this->success();


    }

    /**
     * @desc 删除部门
     */
    public function del(Request $request){
        $id = $request->input("id");
        // 验证规则
        $rules =  [
            'id' => 'required | int'
        ];
        // 提示信息
        $messages = [
            'id.required' => 'id不能为空!',
        ];
        $this->validate($request,$rules,$messages);
        $res = $this->department->delDepartment($id);

        if(!$res) {
            throw new ApiException("删除失败!", 3003);
        }
        return $this->success();
    }
}
