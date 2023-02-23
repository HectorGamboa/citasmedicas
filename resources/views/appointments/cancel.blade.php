@extends('layouts.panel')

@section('content')
  
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Cancelar citas</h3>
            </div>
            
          </div>
        </div>

        <div class="card-body">
          @if (session('notification'))
          <div class="alert alert-success" role="alert">
            <strong>{{session('notification')}}</strong> 
          </div>
       
  
          @endif


@if( $role == 'patient')
 <p> Estas a punto de cancelar tu cita con el medico {{$appointment->doctor->name}} ( especialidad {{$appointment->specialty->name}}) para el dia {{$appointment->scheduled_date}}</p>
@elseif( $role == 'doctor')
 <p> Estas a punto de cancelar tu cita con el paciente {{$appointment->patient->name}} ( especialidad {{$appointment->specialty->name}}) para el dia {{$appointment->scheduled_date}}(hora{{$appointment->scheduled_time_12}})</p>
@else
<p> Estas a punto de cancelar la cita del paciente {{$appointment->patient->name}} con el doctor {{$appointment->doctor->name}} ( especialidad {{$appointment->specialty->name}}) para el dia {{$appointment->scheduled_date}}(hora{{$appointment->scheduled_time_12}})</p>

@endif
<form method="POSt" action="{{url('/appointments/'.$appointment->id.'/cancel')}}">
    @csrf

<div class="form-group">
    <label for="justification">Por favor cuentanos el motivo de la cancelacion</label>
<textarea required id="justification"action="justification"  name="justification" id ="" rows="3"class="form-control"></textarea>

</div>

<button class="btn btn-danger" type="submit">Cancelar cita</button>
<a href="{{url('/appointments')}}" class="btn btn-primary">Volver al listado de citas sin cancelar</a>
</form>


        
          </div>

       

        

      
      </div>

   
    
</div>
@endsection

