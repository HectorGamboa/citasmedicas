


@extends('layouts.panel')

@section('content')
    <div class="row mt-5">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Nueva Cita</h3>
            </div>
            <div class="col text-right">
              <a href="{{url('/patients')}}" class="btn btn-sm btn-default">cancelar - regresar</a>
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
      <form action="{{url('/appointments')}}" method="POST">
@csrf

<div  class="form-group">
  
  @if (session('notification'))
          <div class="alert alert-success" role="alert">
            <strong>{{session('notification')}}</strong> 
          </div>
        </div>
  
          @endif

<label for="description">Description</label>
<input name="description" id="description" value="{{old('description')}}"type="text"class="form-control"
placeholder="Describe brevemente la consulta" required> 
</div>



<div class="form-group">

<div class=" form-row">
<div class = "form-group col-md-6">
  <label for="specialty_id">Especialidad</label>
  <select name="specialty_id" id="specialty" class="form-control" required>
 <option value="">Selecciona una especialidad</option>
 
    @foreach($specialties as $specialty)
  <option value="{{$specialty->id}}"@if(old('specialty_id')==$specialty->id) selected @endif>{{$specialty->name}}</option>
  @endforeach
</select>
</div>

<div class = "form-group col-md-6">
  <label for="email">Medicos</label>
  <select name="doctor_id" id="doctor" class="form-control" required>
    @foreach($doctors as $doctor)
    <option value="{{$doctor->id}}"@if(old('doctor_id')==$doctor->id) selected @endif>{{$doctor->name}}</option>
    @endforeach
  </select>
</div>

</div>







  
</div>

<div class="form-group">
    <label for="date">Fecha</label>
    <div class="input-group input-group-alternative">
      <div class="input-group-prepend">
          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
      </div>
      <input
       class="form-control datepicker" placeholder="Selecciona Fecha" 
       type="text" value="{{old('scheduled_date',date('Y-m-d'))}}"
       name="scheduled_date"
       id='date'
      data-date-format="yyyy-mm-dd"
      data-date-start-date="{{date('Y-m-d')}}"
      data-date-end-date="+30d"
      >
  </div>
  </div>


  <div class="form-group">
    <label for="address">Hora de atencion</label>
  
    <div id="hours"> 
      @if($intervals)

      @foreach($intervals['morning'] as $key=> $interval)
      <div class="custom-control custom-radio mb-3">
        <input name="scheduled_time" value ="{{$interval['start']}}" class="custom-control-input"
         id="intervalMorning{{$key}}" type="radio"  required>
        <label class="custom-control-label" for="intervalMorning{{$key}}">[{{$interval['start']}}-{{$interval['end']}}] </label>
        </div>
      @endforeach
 
      @foreach($intervals['afternoon'] as $interval)

      <div class="custom-control custom-radio mb-3">
        <input name="scheduled_time" value ="{{$interval['start']}}" class="custom-control-input"
         id="intervalAfternoon{{$key}}" type="radio"  required>
        <label class="custom-control-label" for="intervalAfternoon{{$key}}">[{{$interval['start']}}-{{$interval['end']}}] </label>
        </div>
      @endforeach
      
     @else
       <div class="alert alert-info" role="alert">
      Selecciona un medico y  una horario, para ver sus horarios disponibles
        </div>
        @endif
      </div>
  </div>

  <div class="form-group">
    <label for="type">Tipo de consulta</label>
    <div class="custom-control custom-radio mb-3">
      <input name="type" class="custom-control-input" id="type1" checked type="radio"
      @if(old('type','Consulta')=='Consulta' ) checked @endif value="Consulta">
      <label class="custom-control-label" for="type1">Consulta</label>
    </div>
  </div>

  
  <div class="form-group">
 
    <div class="custom-control custom-radio mb-3">
      <input name="type" class="custom-control-input" id="type2"  type="radio"
      @if(old('type')=='Examen' ) checked @endif value="Examen">
      <label class="custom-control-label" for="type2">Examen</label>
    </div>
  </div>

  
  <div class="form-group">
   
    <div class="custom-control custom-radio mb-3">
      <input name="type" class="custom-control-input" id="type3"  type="radio"
      @if(old('type')=='Operacion' ) checked @endif value="Operacion">
      <label class="custom-control-label" for="type3">Operacion</label>
    </div>
  </div>



<button type="submit" class="btn btn-sm btn-primary" >Guardar</button>
      </form>
        </div>
        </div>

        
      </div>

      
        </div>
        
@endsection

@section('scripts')

<script src="{{asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<script src="{{asset('/js/appointments/create.js')}}">
</script>


@endsection

