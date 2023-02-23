

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
                        <label for="name">Nombre de la especialidad</label>
                        <input type="text" name='name' class='form-control' ng-model="createForm.name" placeholder="Escribe el nombre de la especialidad">
                      </div>
                      
                      <div class="form-group">
                        <label for="description">Descripción</label>
                        <input type="text" id="description"  name='description' ng-model="createForm.description"class='form-control'  placeholder="Descripcion de la especialidad" required>
                      </div>
                      
                      

                      
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>