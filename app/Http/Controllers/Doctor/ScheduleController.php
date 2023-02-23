<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Worday;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    private $days = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];


    public function edit()
    {

        $workDays = WorDay::where('user_id', auth()->id())->get();

        if (count($workDays) > 0) {


            $workDays->map(function ($workDay) {
                $workDay->moning_start = (new Carbon($workDay->moning_start))->format('g:i A');
                $workDay->moning_end = (new Carbon($workDay->moning_end))->format('g:i A');
                $workDay->afternoon_start = (new Carbon($workDay->afternoon_start))->format('g:i A');
                $workDay->afternoon_end = (new Carbon($workDay->afternoon_end))->format('g:i A');
                return $workDay;
            });
        } else {
            $workDay = collect();
            for ($i = 0; $i < 7; ++$i) {
                $workDays->push(new WorDay());
            }
        }







        //dd($workDays->toArray());

        $days = $this->days;

        return view('schedule', compact('days', 'workDays'));
    }
    //

    public function store(Request $request)
    {
        /**
         * Se recibe el Request en una variable, todas son arrays de 7
         * elementos excepto $status porque no todos los dias estan
         * activos
         */
        $active = $request->input('active') ?: []; //si el status no existe genera un array vacio 
        $mornning_start = $request->input('mornning_start');
        $mornning_end = $request->input('mornning_end');
        $afternoon_start = $request->input('afternoon_start');
        $afternoon_end = $request->input('afternoon_end');

        /**
         * El metodo updateOrCreate realiza una busqueda del dia y el userid relacionados
         * y si no esta escrito lo crea, si ya esta lo actualiza.
         * 
         * Luego encerramos todo en un ciclo for, para que el indice recorra los 7 dias
         */
        $errors = [];

        for ($i = 0; $i < 7; $i++) {
            if ($mornning_start[$i] > $mornning_end[$i]) {
                $errors[] = "Las horas del turno mañana son inconsistentes para el dia " . $this->days[$i] . "";
            }


            if ($afternoon_start[$i] > $afternoon_end[$i]) {

                $errors[] = "Las horas del turno tarde son inconsistentes para el dia" . $this->days[$i] . "";
            }



            WorDay::updateOrCreate(
                [
                    'day' => $i,
                    'user_id'  => auth()->id(),

                ],
                [
                    'active' => in_array($i, $active),
                    'moning_start' => $mornning_start[$i],
                    'moning_end' => $mornning_end[$i],

                    'afternoon_start' => $afternoon_start[$i],
                    'afternoon_end' => $afternoon_end[$i],
                ]
            );
        }

        if (count($errors) > 0) {
            return back()->with(compact('errors'));
        }


        $notification = "Los cambios se han guardado correctamente";

        return back()->with(compact('notification'));
    }
}
