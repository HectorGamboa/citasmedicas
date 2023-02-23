@extends('layouts.panel')
@section('ngApp', 'patient')

@section('ngController', 'patient')

@section('content')
    <div class="row mt-5"  ng-cloak>
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Pacientes</h3>
            </div>
            <div class="col text-right">
              <button ng-click="create()" class="btn btn-sm btn-success">Nuevo Paciente</button>
            </div>
          </div>
        </div>

         

        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr >
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>

              <tr ng-repeat="patient in patients track by $index" >
                <th scope="col">@{{patient.name}}</th>
                <th scope="col">@{{patient.email}}</th>
                <th scope="col">@{{patient.phone}}</th>
                <td>
                  <div><button  class="btn btn-sm  btn-primary"  ng-click="edit(patient)">Editar</button>
                    <button  class="btn btn-sm  btn-danger"  ng-click="delete(patient)">Eliminar</button></div>
                </td>
              </tr>
          
            </tbody>
          </table>

         
    
        
        </div>
      </div>
     
    </div>
    
</div>
@endsection


@include('includes.panel.admin.patients.modal_crear')
@include('includes.panel.admin.patients.modal_edit')
@include('includes.panel.admin.patients.modal_delete')

@section('ngFile')
<script src="{{ asset('js/patient.js') }}"></script>
@endsection
