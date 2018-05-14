<?php

namespace App\Services;

use App\Models\AttendanceModel;

class AttendanceService extends BaseService
{

    public function addAttendance(array $attendance): bool
    {
        $result = AttendanceModel::addAttendance($attendance);
        return ($result instanceof AttendanceModel) ? true :false;
    }
}
