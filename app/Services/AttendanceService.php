<?php

namespace App\Services;

use App\Models\AttendanceModel;

class AttendanceService extends BaseService
{

    public function addAttendance(array $attendance): bool
    {
        return AttendanceModel::addAttendance($attendance);
    }
}
