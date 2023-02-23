@extends('layouts.panel')

@section('content')
  
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Mis citas</h3>
            </div>
            
          </div>
        </div>

        <div class="card-body">
          @if (session('notification'))
          <div class="alert alert-success" role="alert">
            <strong>{{session('notification')}}</strong> 
          </div>
       
  
          @endif
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

            <li class="nav-item" >

              <a class="nav-link active"  data-toggle="pill" href="#confirmed-appointments" role="tab" aria-selected="true">Mis proximas citas</a>

            </li>

            <li class="nav-item" >

              <a class="nav-link false"  data-toggle="pill" href="#pending-appointments" role="tab" aria-selected="false">Citas por confirmar</a>

            </li>

            <li class="nav-item" >

              <a class="nav-link false"  data-toggle="pill" href="#old-appointments" role="tab" aria-selected="false">Historial de citas atendidas</a>

            </li>


            

          </ul>


          <div class="tab-content" id="pills-tabContent">


            <div class="tab-pane fade show active" id="confirmed-appointments" role="tabpanel">@include('appointments.tables.confirmed')</div>

            <div class="tab-pane fade " id="pending-appointments" role="tabpanel" >@include('appointments.tables.pending')</div>

            <div class="tab-pane fade " id="old-appointments" role="tabpanel" >@include('appointments.tables.old')</div>

          </div>
        
          </div>

       

        

      
      </div>

   
    
</div>
@endsection

