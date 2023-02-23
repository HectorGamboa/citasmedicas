<?php
namespace App\Interfaces;
use Illuminate\Support\Carbon;

interface ScheduleServiceInterface {
    public function getAvailableIntervals($date,$doctorId);
    public function isAvailableInterval($date,$doctorId,Carbon $start);

}