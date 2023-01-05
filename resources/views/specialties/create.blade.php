@extends('layouts.panel')

@section('content')
    <div class="row mt-5">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Nueva especialidad</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/specialties')}}" class="btn btn-sm btn-default">cancelar - regresar</a>
            </div>

          </div>
        </div>
        <div class="card-body">
          @if($errors->any())

          <div class="alert alert-danger" role="alert">

          <ul>
            @foreach($errors->all() as $error)
<li>
{{$error}}
</li>
@endforeach
          </ul>
          </div>
          @endif
              <!-- Projects table -->
      <form action="{{url('/specialties')}}" method="POST">
@csrf
<div class="form-group">
  <label for="name">Nombre</label>
  <input type="text" name='name' class='form-control ' value="{{old('name')}}" >
</div>

<div class="form-group">
  <label for="name">Descripcion</label>
  <input type="text" name='description' class='form-control' value="{{old('name')}}">
</div>
<button type="submit" class="btn btn-sm btn-primary" >Guardar</button>
      </form>
        </div>
        </div>

        
      </div>

      
        </div>
        
@endsection

