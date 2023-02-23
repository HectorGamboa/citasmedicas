var app = angular.module("specialty", []);



app.controller("specialty", function ($scope, $http) {
    //console.log('hola mundo desde specialty.js');
    $scope.datos = [];
    $scope.campos_formulario = [];
    $scope.respuesta
    $scope.editForm = {};
    $scope.especialidad = {};//objeto


//obtener  datos  de la base de datos 
    $http({
        url: '/specialties/getschedule',
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
    }).then(
        function successCallback(response) {
            
           // console.log('index', response);
            $scope.datos = response.data.specialty;
            //console.log(response.data);
            
        },
        function errorCallback(response) {
            console.log(response);
            if (response.status === 422) {
                let mensaje = '';
                for (let i in response.data.errors) {
                    mensaje += response.data.errors[i] + '\n';
                }
                swal('Mensaje del Sistema', mensaje, 'error');
            } else {
                swal(
                    'Mensaje del Sistema',
                    response.data.message,
                    response.data.status
                );
            }
        }
    );




//crear una nueva especialidad
    $scope.create = function () {
        $http({
            url: '/specialties/create',
            method: 'get',
            data: {
                formulario_crear: 'especialidades'
            },
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
        }).then(
             
            function successCallback(response) {
                
                console.log(response);
                $('#agregarModal').modal('show');
            },
            function errorCallback(response) {
                console.log(response);
                
          swal(
                        'Mensaje del Sistema',
                      'Error',
                      'error'
                        
                    );
                
            }
        );
    }

    
    $scope.store = function () {
        //console.log($scope.createForm);
        //return;
        $http({
            url: '/specialties',
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            data: $scope.createForm
        }).
    
        
        then(
             
            function successCallback(response) {
                console.log(response);
                $scope.datos = [...$scope.datos, response.data.specialty];
                $scope.createForm = {}; 
                //$('#createForm').trigger('reset');
                $('#agregarModal').modal('hide');
                swal(
                    'Mensaje del Sistema',
                  'Guradado correctamente',
                  'success'
                    
                );
            },
            function errorCallback(response) {
                console.log(response);
                
          swal(
                        'Mensaje del Sistema',
                      'Error',
                      'error'
                        
                    );
                
            }
        );
    }


    //editar especialidades
    
    $scope.edit = function (campos_formulario) {
       // console.log(campos_formulario);
        $scope.editForm = campos_formulario;
        $scope.pedirCamposTabla($scope.editForm.id);
        $http({
            url: ('/specialties/edit'),
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
               
            },

          
        }).then(
            function successCallback(response) {
              
                $('#editarModal').modal('show');
            },
            function errorCallback(response) {
                //console.log(response);
                swal(
                    'Mensaje del Sistema',
                    response.data.message,
                    response.data.status
                );
            }
        );
    }

//pedir campos para edith
$scope.pedirCamposTabla = function (id) {
  
        $http({
            url: '/specialties/get-campos-tabla',
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            data: {
                'id': id
            }
        }).then(
            function successCallback(response) {
               //s console.log(response);
                $scope.valor = response.data.specialty;
            },
            function errorCallback(response) {
                console.log(response);
                swal(
                    'Mensaje del Sistema',
                    response.data.message,
                    tiposDeMensaje.error
                );
            }
        );
    }


    //actualizar campos de la pagina
    $scope.update = function () {
        //console.log("toy llegando");
        //datos=$scope.valor;
    

        $http({
            url: '/specialties/update',
            method: 'PUT',
            data: $scope.valor,
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            
        }).then(
            function successCallback(response) {
                console.log(response);
                $scope.datos=$scope.datos.map(dato => (dato.id == response.data.dato.id) ? dato = response.data.dato : dato);
                $('#editarModal').modal('hide');
                swal(
                    'Mensaje del Sistema',
                    'Cambios guardados correctamente',
                    'success'
                );
       
            },
            function errorCallback(response) {
                console.log(response);
                swal(
                    'Mensaje del Sistema',
                    'Error al caputar datos',
                    'error'
                );
            }
        );
  
    }


    

// eliminar 





$scope.delete = function (eleccion) {
    $scope.id=eleccion.id;
    
    $http({
        url: `/specialties/${$scope.id}`,
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
    }).then(
        function successCallback(response) {
            console.log(response); 
            $scope.datos = $scope.datos.filter(dato => dato.id !== response.data.dato.id);
            $('#eliminarModal').modal('hide');
            swal(
                'Mensaje del Sistema',
                'Se elimino correctamente',
                'success'
            );
        },
        function errorCallback(response) {
            console.log(response);
            swal(
                'Mensaje del Sistema',
                'Error al eliminar datos',
                'error'
            );
        }
    );
    
}










    




});



