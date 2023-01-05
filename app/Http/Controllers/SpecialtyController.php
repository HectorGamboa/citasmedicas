<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialty;

class SpecialtyController extends Controller
{

public function __construct(){
    $this->middleware("auth");
}

    public  function index(){
        $specialtie = Specialty::all();

        return view('specialties.index',compact('specialtie'));
        
    }

    public  function create(){
        return view('specialties.create');
        
    }

    public function store(Request $request){
        $rule=[
        'name'=>'required|min:3'

            ];

            $messages=[
                'name.required' => 'Es necesario ingresar un nombre',
                'name.min' => 'como minimo 3 letras'

            ];


                    $this-> validate($request,$rule,$messages);


                    //dd($request-> all()); impresion de  pantalla
                    $specialty= new Specialty();
                    $specialty -> name =$request -> input('name');
                    $specialty -> description =$request -> input('description');
                    $specialty-> save();
                    $notification='Se a gurdado correctamente el registro';
                    return redirect('/specialties')-> with(compact('notification'));

    }




    public function update(Request $request,Specialty $specialty){


        $rule=[
            'name'=>'required|min:3'

        ];

        $messages=[
            'name.required' => 'Es necesario ingresar un nombre',
            'name.min' => 'como minimo 3 letras'

        ];
                $this-> validate($request,$rule,$messages);
                //dd($request-> all()); impresion de  pantalla
                $specialty -> name =$request -> input('name');
                $specialty -> description =$request -> input('description');
                $specialty-> save(); // update

                return redirect('/specialties');

    }


    public function edit(Specialty $specialty){

        return view('specialties.edit',compact('specialty'));
    }




    public function destroy(Specialty $specialty){
        $name = $specialty->name;
        $specialty->delete();//eliminar  objeto
        $notification='La especialidad '.$name.' ha sido eliminad correctamente';
        return redirect('/specialties')-> with(compact('notification'));

    }


    }





