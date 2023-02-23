<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\AppointmentController;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ChartController extends Controller
{
    public function appointments(){


          $monthlyCounts=  Appointment::select(DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(1) as count'))
            ->groupBy('month')->get()->toArray();

            $counts=array_fill(0,12,0);
             
            foreach($monthlyCounts as $monthlyCount){
                $index=$monthlyCount['month']-1;
                $counts[$index]=$monthlyCount['count'];
            }
       
        return view('charts.appointments', compact('counts'));
    }

    public function doctors (){
        return view('charts.doctors');
    }

    public function doctorsJson (){
  
        $doctor= User::doctor()
        ->select('name')
        ->withCount([
            'attendedAppointments',
            'cancelledAppointments'
        ])
        ->orderBy('attended_appointments_count','desc')
        ->take(3)
        ->get();

       















        $data=[];
        $data['categories']=$doctor->pluck('name');

        $series=[];
        $series1['name']="Citas- atendidas";
        $series1['data']=$doctor->pluck('attended_appointments_count');
        $series2["name"]="Citas canceladas";
        $series2['data']=$doctor->pluck('cancelled_appointments_count');
        $series[0]=$series1;
        $series[1]=$series2;

        $data['series']=$series;

        return $data;
    }
}
