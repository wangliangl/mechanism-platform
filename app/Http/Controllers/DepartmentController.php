<?php
/**
 * User: zc
 * Date: 2018/4/15
 * Time: 下午1:55
 */

namespace App\Http\Controllers;

use App\Services\DepartmentService;
use Illuminate\Http\Request;

class DepartmentController extends BaseController{
    private $department = null;

    public function __construct(){
        $this->department = new DepartmentService();

    }

    public function index(Request $request){
        $name = $request->input("name",false);
        $pageno = $request->input('pageno',1);
        $pagenum = $request->input('pagenum',20);
        $res = $this->department->getDepartmentByCond($name, $pageno, $pagenum);

        return $this->success($res);

    }


    public function add(){



    }


    public function edit(){



    }

    public function del(){



    }
}