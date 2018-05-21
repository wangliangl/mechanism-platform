<?php

namespace App\Http\Controllers;

use App\Services\AttendanceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AttendanceController extends BaseController
{

    private $attendance;

    public function __construct(AttendanceService $attendanceService)
    {
        $this->attendance = $attendanceService;
    }

    public function getAttendance(Request $request)
    {

    }

    /**
     * ex:
     * on_work:2018-05-13 09:10:00
     * off_work:2018-5-14 18:00:00
     * userid_list:4,5,6
     * id option
     *
     * @param Request $request
     * @return $this
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateAttendance(Request $request)
    {
        $rules = [
            'on_work'     => 'string | date | required',
            'off_work'    => 'string | date | required',
            'userid_list' => 'string | required',
            'id'          => 'int'
        ];
        $messages = [
            'on_work.required'     => '上班时间不能为空!',
            'on_work.date_format'  => '上班时间格式错误 Y-m-d H:i:s!',
            'off_work.date_format' => '下班时间格式错误 Y-m-d H:i:s!',
            'off_work.required'    => '下班时间不能为空!',
            'userid_list'          => '用户id列表不能为空'
        ];
        $this->validate($request, $rules, $messages);
        $result = $this->attendance->addAttendance($request->all());
        return $result == true ? $this->success() : $this->failed('添加或更新失败!');
    }

}
