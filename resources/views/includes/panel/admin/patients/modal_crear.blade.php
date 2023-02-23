
@section('styles')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endsection

<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarModalLabel">Crear @yield('page-title')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form id="createForm" ng-submit="store()" class="was-validated">
                    <div class="form-group">
                        <label for="name">Nombre del paciente</label>
                        <input type="text" name='name' class='form-control' ng-model="createForm.name" placeholder="Escribe el nombre del paciente">
                      </div>
                      
                      <div class="form-group">
                        <label for="phone">Telefono</label>
                        <input type="text" id="phone"  name='phone' ng-model="createForm.phone"class='form-control'  placeholder="Telefono del  paciente" required>
                      </div>

                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email"  name='email' ng-model="createForm.email"class='form-control'  placeholder="Email del  paciente" required>
                      </div>

                      

                      <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address"  name='address' ng-model="createForm.address"class='form-control'  placeholder="Direccion del  paciente" required>
                      </div>
                      

                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" id="password"  name='password' ng-model="createForm.password" class='form-control'  placeholder="Password" required>
                      </div>


                     
                      <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                    </div>
                   
                    </div> 

                    
                    
                </form>
            </div>
        </div>
    </div>
  </div>

  @section('scripts')

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection
