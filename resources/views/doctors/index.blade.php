@extends('layouts.panel')
@section('ngApp', 'doctor')

@section('ngController', 'doctor')

@section('content')

    <div ng-cloak  class="row mt-5">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Medicos</h3>
            </div>
            <div class="col text-right">
              <button class="btn btn-sm btn-success float-right" ng-click="create()">Nuevo Medico</button>
            </div>
          </div>
        </div>

        <div class="card-body">
       
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">DNI</th>
          
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
          
              <tr ng-repeat="doctor in doctors track by $index">
           
                  <td>@{{doctor.name}}</td>
                  <td> @{{doctor.email}}</td>
                  <td>@{{doctor.cedula}}</td>
                  
             
                  <td>
                    <div><button  class="btn btn-sm  btn-primary"  ng-click="edit(doctor)">Editar</button>
                      <button  class="btn btn-sm  btn-danger"  ng-click="delete(doctor)">Eliminar</button></div>
                  </td>
              
                
              </tr>

            </tbody> 
          </table>
          </div>
      </div>
    </div>
    
</div>



@include('includes.panel.admin.doctors.modal_crear')
@include('includes.panel.admin.doctors.modal_edit')
@include('includes.panel.admin.doctors.modal_delete')



@endsection



@section('ngFile')
<script src="{{ asset('js/doctor.js') }}"></script>
@endsection



