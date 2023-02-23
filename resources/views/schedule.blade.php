@extends('layouts.panel')

<!-- Se da valor al title -->
@section('title', 'Gestionar Horario') 

@section('ngApp', 'schedule')

@section('ngController', 'schedule')

@section('content')

<form action="{{ url('/schedule') }}" method="POST">
    @csrf
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">@yield('title')</h3>
            </div>
            <div class="col text-right">
                {{-- el lugar de un A esto será un boton submit para enviar el formulario --}}
                <button type="submit" class="btn btn-sm btn-success">Guardar cambios</button>
                {{-- <a href="{{ url('doctors/create') }}" >Guardar Cambios</a> --}}
            </div>
            </div>
        </div>
    
        <div class="card-body">
           
          

        </div>
    
        <div class="card-body">
    
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">DIA</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">MAÑANA</th>
                    <th scope="col">TARDE</th>
                    </tr>
                </thead>
                <tbody>
                  
                    <tr>
                    <th scope="row"> </th>
                    <th scope="row">
                      <label class="custom-toggle">
                      <input type="checkbox" name='active[]' value=""
                     
                    
                          <span class="custom-toggle-slider rounded-circle"></span>
                      </label>
                    </th>
                    <th scope="row">

                        <select class="form-control-sm" name="mornning_start[]" id="">
                         
                                
                            <option value="5:00AM">
                                    5:00AM
                                </option>
                                
                          
                        </select>   
                        
                        
    
                        <select class="form-control-sm" name="mornning_end[]" id="">
                         

                                <option value="12:00" 
                                @if ($i.':00 AM' == $workDay->moning_end) selected
                                    @endif>{{$i}}:00 AM</option>


                                <option value="{{($i<10 ? '0': '').$i}}:30 "
                                @if ($i.':30 AM' == $workDay->moning_end) selected
                                    @endif>{{$i}}:30 AM</option>

                            @endfor
                        </select>        





                    </th>
                    <th scope="row">
                        <select class="form-control-sm" name="afternoon_start[]" id="">
                            @for ($i = 1; $i < 11; $i++)

                                <option value="{{$i+12}}:00"
                                @if ($i.':00 PM' == $workDay->afternoon_start )selected
                                @endif
                                >{{$i}}:00 PM</option>


                                <option value="{{$i+12}}:30"
                                @if ($i.':30 PM' == $workDay->afternoon_start) selected
                                 @endif
                                >{{$i}}:30 PM</option>
                            @endfor


                        </select>        
                        <select class="form-control-sm" name="afternoon_end[]" id="">
                            @for ($i = 1; $i < 11; $i++)

                                <option value="{{$i+12}}:00"
                                @if ($i.':00 PM' == $workDay->afternoon_end) selected
                                    @endif
                                >
                                {{$i}}:00 PM</option>

                                <option value="{{$i+12}}:30"
                                @if ($i.':30 PM' == $workDay->afternoon_end) selected
                                @endif
                                >{{$i}}:30 PM</option>
                            @endfor
                        </select>        
                    </th>
                    <th>
                    </tr>                
                    @endforeach
                    {{-- @endfor --}}
                    
                </tbody>
                </table>
        </div>
    </div>
</form>


@section('ngFile')
<script src="{{ asset('js/schedule.js') }}"></script>
@endsection

@endsection
