@extends('layouts.panel')
@section('page-title', 'Especialidades')
@section('ngApp', 'specialty')

@section('ngController', 'specialty')

@section('content')
    <div class="row mt-5" ng-cloak>
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Especilidades</h3>
            </div>
            <div class="col text-right">
            
            <button class="btn btn-sm btn-success float-right" ng-click="create()">Nueva Especialidad</button>
            
      
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
                <th scope="col">Descripcion</th>
                <th scope="col">Opciones</th> 
                
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="dato in datos track by $index">
                {{-- <td>@{{ dato.index }}</td> --}}
                <td>@{{ dato.name }}</td>
                <td>@{{ dato.description }}</td>
                <td><div><button  class="btn btn-sm  btn-primary"  ng-click="edit(dato)">Editar</button>
                  <button  class="btn btn-sm  btn-danger"  ng-click="delete(dato)">Eliminar</button></div></td>
               
              </tr>
          
            </tbody>
          </table>
          </div>
      </div>
    </div>
</div>


<!-- Modales -->
@include('includes.panel.admin.specialty.modal_crear_especialidad')
@include('includes.panel.admin.specialty.modal_edit_especialidad')
@include('includes.panel.admin.specialty.modal_delete_especialidad')






@endsection

@section('ngFile')
<script src="{{ asset('js/specialty.js') }}"></script>
@endsection


