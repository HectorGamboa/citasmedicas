<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\User;
use  App\Http\Controllers\Controller;
use App\Models\Specialty;
use Facade\FlareClient\Http\Response;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        return view('doctors.index'); //
    }




    public function getmedicos(){

        $doctors  = User::doctor()->with("specialties")->get();
        $specialties = Specialty::all();

        if(is_object( $doctors)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'doctors' => $doctors,
                'specialties'=>$specialties
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












    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            'cedula'=>'nullable|digits:8',
            'address'=>'nullable|min:5',
            'phone'=>'nullable|min:7',
        ];

        $this->validate($request, $rules);


        $user=User::create(
            $request->only('name','email','cedula','address','phone') + [
                'role'=>'doctor',
                'password'=>bcrypt($request->input('password')),
            ]
            );
           //relacion con specialidades
        $user->specialties()->attach($request->input('specialties'));
    
    
       
        $notification="El medico se a registrado correctamente";
       //relacion con specialidades


        if(is_object($user)) {
            $data = [
                'code' => 200,
                'status' => 'success',
                'message' => $notification,
                'user' => $user,
            ];
        }
        else {
            $data = [
                'code' => 400,
                'status' => 'error',
                'message' => 'Ocurrió un error en la creacion de doctores',
                
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
       
        $doctor = User::where("id",$id)->with("specialties")->First();
      
        if(is_object( $doctor)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'doctor' => $doctor,

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
         $id = $request->id;
                  $rules =[
            'name'=> 'required|min:3',
            'email'=>'required|email',
            'cedula'=>'nullable|digits:8',
            'address'=>'nullable|min:5',
            'phone'=>'nullable|min:7',
        ];

        $this->validate($request, $rules);

     
        $doctor =  User::doctor()->findOrFail($id);

        $password= $request->input('password');

        $data= $request->only('name','email','cedula','address','phone');
        //dd($password);
        if ($password){
            $data['password']=bcrypt($password);
        }
       

        $doctor->fill($data);//Actualizar datos del objeto php
        $doctor->save();//actualizar en la base de datos
        $doctor->specialties()->sync($request->input('specialties'));
        $notification="Se ha actualizado la informacion del medico correctamente";


    

        if(is_object($doctor)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'message' => $notification,
                'dato' => $doctor,
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













    public function destroy($id)
    {
        $doctor =  User::doctor()->findOrFail($id);
        $name = $doctor->name;

        $doctor->delete();
        $notification="El medico $name ha sido eliminado";


        if(is_object( $doctor)){
            $data = [
                'code' => 200,
                'status' => 'success',
                'dato' => $doctor,
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
