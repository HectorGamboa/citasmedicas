<!-- Modal Editar -->
<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar @yield('page-title')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateFormPatient" ng-submit="update()" class="was-validated">
                    <div class="form-group">
                        <label for="name">Nombre del paciente </label>
                        <input type="text" name='name' class='form-control' ng-model="patient_editar.name"  required>
                      </div>

                
                      <div class="form-group">
                        <label for="phone">Telefono</label>
                        <input type="text" id="phone"  name='phone' ng-model="patient_editar.phone"class='form-control'  placeholder="Email del paciente" required>
                      </div>

                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email"  name='email' ng-model="patient_editar.email"class='form-control'  placeholder="Email del paciente" required>
                      </div>

                 
                      <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address"  name='address' ng-model="patient_editar.address"class='form-control'  placeholder="Direccion del paciente" required>
                      </div>
                      

                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" id="password"  name='password' ng-model="patient_editar.password" class='form-control'  placeholder="Password" >
                      </div>


                    

                  

                      
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>