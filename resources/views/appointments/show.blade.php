@extends('layouts.panel')

@section('content')
  
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">cita #{{$appointment->id}}</h3>
            </div>
            
          </div>
        </div>

        <div class="card-body">
            <ul>
                <li>
                    <strong>Fecha:</strong> {{$appointment ->scheduled_date}}
                </li>

                <li>
                    <strong>Hora:</strong> {{$appointment ->scheduled_time}}
                </li>

                @if ($role=="patient"  ||  $role="admin")
                <li>
                    <strong>Doctor:</strong> {{$appointment ->doctor->name}}
                </li>
                @endif

                @if ($role=="doctor" || $role="admin")
                <li>
                    <strong>Paciente:</strong> {{$appointment ->patient->name}}
                </li>
                @endif
                <li>
                    <strong>Especialidad:</strong> {{$appointment ->specialty->name}}
                </li>
                <li>
              <strong>Estado:</strong>
              @if ($appointment ->status=="Cancelada")
              <span class="badge badge-danger">Cancelada</span>
             
                    
                @else
                    
                    <span class="badge badge-success">{{$appointment ->status}}</span>
              @endif
                </li>
            
            </ul>


            @if ($appointment->status== 'Cancelada')
                
<div class="alert alert-warning">
                <p>Acerca de la cancelacion</p>
      <ul>
    @if ($appointment->cancellation)
                <li> 
                    <strong>Motivo de la cancelacion:</strong>
                    {{$appointment->cancellation->justification}}
                </li>
                <li> 
                    <strong>Fecha de la cancelacion:</strong>
                    {{$appointment->cancellation->created_at}}
                </li>
                <li> 
                    <strong>Quien hizo la cancelacion?</strong>
                    @if (auth()->id() == $appointment->cancellation->cancelled_by_id)
                    TÚ
                    @else
                    {{$appointment->cancellation->cancelled_by->name}}
                    @endif
                   
                </li>
    @else 
    
    <p>NO HAY DATOS EXTRA POR MOSTRAR ya que fue cancelada antes de su confirmacion </p>

            </ul>
            @endif
</div>
@endif
            <a href="{{url('/appointments')}}" class="btn btn-default">Volver</a>
        
          </div>

       

        

      
      </div>

   
    
</div>
@endsection

