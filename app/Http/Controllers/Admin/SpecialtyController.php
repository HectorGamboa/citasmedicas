<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Specialty;
use  App\Http\Controllers\Controller;

class SpecialtyController extends Controller
{

public function __construct(){
    $this->middleware("auth");
}

public function validation($request){

    $rule=[
        'name'=>'required|min:3'

    ];

    $messages=[
        'name.required' => 'Es necesario ingresar un nombre',
        'name.min' => 'como minimo 3 letras'

    ];
            $this-> validate($request,$rule,$messages);

}

public function index()
{
    return view('specialties.index');
}

public  function getschedule(){

        $specialties = Specialty::all();
      
            if(is_object( $specialties)){
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'specialty' => $specialties,
                ];
            } else {
                $data = [
                    'code' => 400,
                    'status' => 'error',
                    'message' => 'Ocurrió un error al realizar la búsqueda de especialidades.',
                ];
            }
       
            return response()->json($data, $data['code']);
}







public  function create(Request $request){
            $data = [
                'code' => 200,
                'status' => 'success'
            ];
            return response()->json($data, $data['code']);
}

    

public function store(Request $request){
        $this->validation($request);


                    //dd($request-> all()); impresion de  pantalla
                    $specialty= new Specialty();
                    $specialty -> name =$request -> input('name');
                    $specialty -> description =$request -> input('description');
                    $specialty-> save();
                    $notification='Se a gurdado correctamente el registro';

                    if(is_object($specialty)) {
                        $data = [
                            'code' => 200,
                            'status' => 'success',
                            'message' => $notification,
                            'specialty' => $specialty,
                        ];
                    }
                    else {
                        $data = [
                            'code' => 400,
                            'status' => 'error',
                            'message' => 'Ocurrió un error al realizar la búsqueda de especialidades.',
                        ];
                    }

                    return response()->json($data, $data['code']);


}

    






    public function update(Request $request){
        
  
        $this->validation($request);

     
                //dd($request-> all()); impresion de  pantalla
                
                $specialty = Specialty::findOrFail($request->id);
                
                
                $specialty -> name =$request -> input('name');
                $specialty -> description =$request -> input('description');
                $specialty-> save(); // update
             

                if(is_object($specialty)){
                    $data = [
                        'code' => 200,
                        'status' => 'success',
                        'dato' => $specialty,
                    ];
                } else {
                    $data = [
                        'code' => 400,
                        'status' => 'error',
                        'message' => 'Ocurrió un error al realizar la búsqueda de especialidades.',
                    ];
                }
           
                return response()->json($data, $data['code']);
    }

    


    public function edit(Request $request){

        $data = [
            'code' => 200,
            'status' => 'success'
        ];
        return response()->json($data, $data['code']);
    }


    public function destroy(Specialty $specialty){
     
        $name = $specialty->name;
        $specialty->delete();//eliminar  objeto



        if(is_object($specialty)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'dato' => $specialty,
            ];
        } else {
            $data = [
                'code' => 400,
                'status' => 'error',
                'message' => 'Ocurrió un error al realizar la búsqueda de especialidades.',
            ];
        }
   
        return response()->json($data, $data['code']);

    }



    public function getCamposTabla(Request $request){
        $id=$request;
    
        $specialties = Specialty::findOrFail($id)->First();
  
        if(is_object( $specialties)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'specialty' => $specialties,
            ];
        } else {
            $data = [
                'code' => 400,
                'status' => 'error',
                'message' => 'Ocurrió un error al realizar la búsqueda de especialidades.',
            ];
        }
   
        return response()->json($data, $data['code']);

    }



    }

 




