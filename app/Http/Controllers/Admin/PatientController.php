<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use App\Providers\AppServiceProvider;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patients.index');

    
    }

    
    public  function getPatients(){
      
        $patients  = User::patient()->get();

        if(is_object( $patients)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'patients' => $patients,
               
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















    public function create()
    {
       
        $data = [
            'code' => 200,
            'status' => 'success'
        ];
        return response()->json($data, $data['code']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules =[
            'name'=> 'required|min:3',
            'email'=>'required|email',
            'address'=>'nullable|min:5',
            'phone'=>'nullable|min:7',
        ];

        $this->validate($request, $rules);
     //   dd("gola");
        $patient=User::create(
        $request->only('name','email','address','phone') + [
            'role'=>'paciente',
            'password'=>bcrypt($request->input('password')),
        ]
        );
       
        
        $notification="El pasiente se a registrado correctamente";

        if(is_object($patient)) {
            $data = [
                'code' => 200,
                'status' => 'success',
                'message' => $notification,
                'user' => $patient,
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $patient = User::where("id",$id)->First();
      
        if(is_object( $patient)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'user' => $patient,

            ];
        } else {
            $data = [
                'code' => 400,
                'status' => 'error',
                'message' => 'Ocurrió un error al realizar la búsqueda doctor.',
            ];
        }
   
        return response()->json($data, $data['code']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

      
         $id=$request ->id;
       

        $rules=[
            'name'=> 'required|min:3',
            'email'=>'required|email',
            'cedula'=>'nullable|digits:8',
            'address'=>'nullable|min:5',
            'phone'=>'nullable|min:7',
        ];

        $this->validate($request, $rules);

        $patient =  User::patient()->findOrFail($id);

        $password= $request->input('password');

        $data= $request->only('name','email','address','phone');
        //dd($password);
        if ($password){
            $data['password']=bcrypt($password);
        }
       

        $patient->fill($data);//Actualizar datos del objeto php
        $patient->save();//actualizar en la base de datos

        $notification="Se ha actualizado la informacion del pasiente correctamente";
                                                                                                                                                                         
        if(is_object($patient)) {
            $data = [
                'code' => 200,
                'status' => 'success',
                'message' => $notification,
                'user' => $patient,
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $patient =  User::patient()->findOrFail($id);
        $name = $patient->name;

        $patient->delete();
        $notification="El medico $name ha sido eliminado";


        if(is_object( $patient)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'user' => $patient,
                'message' => $notification,

            ];
        } else {
            $dato = [
                'code' => 400,
                'status' => 'error',
                'message' => 'Ocurrió un error al realizar la búsqueda doctor.',
            ];
        }
   
        return response()->json($data, $data['code']);
    }
}
