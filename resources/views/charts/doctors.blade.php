@extends('layouts.panel')

@section('content')
    <div class="row mt-5">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Reporte:  Medicos mas activos</h3>
            </div>
          </div>
        </div>

        <div class="card-body">
        <div id="container">

        </div>
          </div>
        </div>
  
         
         

    </div>
    
</div>
@endsection
@section('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<script src="{{asset("js/charts/doctors.js")}}">

</script>
@endsection

