
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
                        <label for="name">Nombre del doctor</label>
                        <input type="text" name='name' class='form-control' ng-model="createForm.name" placeholder="Escribe el nombre del doctor">
                      </div>
                      
                      <div class="form-group">
                        <label for="phone">Telefono</label>
                        <input type="text" id="phone"  name='phone' ng-model="createForm.phone"class='form-control'  placeholder="Email del doctor" required>
                      </div>

                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email"  name='email' ng-model="createForm.email"class='form-control'  placeholder="Email del doctor" required>
                      </div>

                      <div class="form-group">
                        <label for="cedula">Cedula</label>
                        <input type="text" id="cedula"  name='cedula' ng-model="createForm.cedula"class='form-control'  placeholder="Cedula del doctor" required>
                      </div>

                      <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address"  name='address' ng-model="createForm.address"class='form-control'  placeholder="Direccion del doctor" required>
                      </div>
                      

                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" id="password"  name='password' ng-model="createForm.password" class='form-control'  placeholder="Password" required>
                      </div>


                     <div class="form-group" >
                        <label for="specialties">Especialidades</label>
                        <select required ng-change="camposTabla()" class="form-control selectpicker" ng-options="specialty.id as specialty.name for specialty in specialties" name="specialties[]" ng-model="createForm.specialties" id="specialties" multiple 
                        data-style='btn-outline-success'title='Seleccione una o mas especialidades'>
                    
                        </select>

                   
                    </div> 


                    
                  


                  
                
                      

               


                      
                    
                        


                      <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
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
