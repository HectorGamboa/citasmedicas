<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorDay;
use App\Providers\ScheduleService;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Carbon;
use App\Interfaces\ScheduleServiceInterface;
class ScheduleController extends Controller
{
    public  function hours( Request $request, ScheduleServiceInterface $scheduleService){

$rules=[
    'date'=> 'required|date_format:"Y-m-d"',
    'doctor_id'=> 'required|exists:users,id'
];

$this->validate($request,$rules);

        $date=$request->input('date');
        $doctorId=$request->input('doctor_id');
        return $scheduleService->getAvailableIntervals($date,$doctorId);


    }


}