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
                <form id="updateForm" ng-submit="update()" class="was-validated">
                    <div class="form-group">
                        <label for="name">nombre del doctor </label>
                        <input type="text" name='name' class='form-control' ng-model="doctor_editar.name"  required>
                      </div>

                 

                      <div class="form-group">
                        <label for="phone">Telefono</label>
                        <input type="text" id="phone"  name='phone' ng-model="doctor_editar.phone"class='form-control'  placeholder="Email del doctor" required>
                      </div>

                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email"  name='email' ng-model="doctor_editar.email"class='form-control'  placeholder="Email del doctor" required>
                      </div>

                      <div class="form-group">
                        <label for="cedula">Cedula</label>
                        <input type="text" id="cedula"  name='cedula' ng-model="doctor_editar.cedula"class='form-control'  placeholder="Cedula del doctor" required>
                      </div>

                      <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address"  name='address' ng-model="doctor_editar.address"class='form-control'  placeholder="Direccion del doctor" required>
                      </div>
                      

                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" id="password"  name='password' ng-model="doctor_editar.password" class='form-control'  placeholder="Password" >
                      </div>


                    <select name="specialties[]" required id="selectId" class="form-control show-tick selectpicker" data-style="'btn-outline-success'"  title="Selecciona..." multiple data-actions-box="true"  data-size="6">
                      <option value="@{{specialty.id}}" data-subtext="@{{ specialty.name }}" ng-repeat="specialty in specialties">@{{ specialty.id }} - @{{specialty.name}}</option>
                  </select>

                  

                      
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>