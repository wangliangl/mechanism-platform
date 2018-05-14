<?php
namespace App\Models;

class AttendanceModel extends BaseModel{

    protected $table = 'attendance';
    public $timestamps = false;


    public static function addAttendance(array &$attendance): bool
    {
        $attendance['create_time'] = date('Y-m-d H:i:s');
        return  self::updateOrCreate($attendance);
    }
}
