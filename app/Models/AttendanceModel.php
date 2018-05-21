<?php
namespace App\Models;

class AttendanceModel extends BaseModel{

    protected $table = 'attendance';
    public $timestamps = false;
    protected $guarded = [];


    public static function addAttendance(array $attendance)
    {
        $attendance['create_time'] = date('Y-m-d H:i:s');
        $id = $attendance['id'] ?? null;
        return empty($id) ? self::updateOrCreate($attendance) : self::updateOrCreate(['id' => $id], $attendance);
    }
}
