var app = angular.module("doctor", []);



app.controller("doctor", function ($scope, $http) {
    $scope.doctors = [];
    $scope.doctor_editar = [];
    $scope.specialty=[];
    $scope.specialties=[];
    $scope.createForm = {};
    

//obtenemos el listado de doctores
    $http({
        url: '/doctors/getmedicos',
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
    }).then(
        function successCallback(response) {
           
            $scope.doctors = response.data.doctors;
            $scope.specialties=response.data.specialties;
           //console.log($scope.doctors);
            
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



//Crear  modal doctor
$scope.create= function(){
    
        $http({
            url: 'doctors/create',
            method: 'GET',
            data: {
                formulario_crear: 'doctors'
        },
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        }
        }).then(
         
            function successCallback(response) {
                $('#createForm').trigger('reset');
                $("#specialties").selectpicker("refresh");
                //console.log(response);
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

//Guardar nuevo doctor
$scope.store = function () {
    //console.log($scope.createForm);
  
    //return;
    $http({
        url: '/doctors',
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        data: $scope.createForm
    }).then(
         
        function successCallback(response) {
        console.log(response);
         $scope.doctors = [...$scope.doctors, response.data.user];
         $('#createForm').trigger('reset');
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
                  response.data.message,
                  'error'
                    
                );
            
        }
    );
}


//Editar doctor
$scope.edit = function (doctor) {
   // console.log('doctor: ', doctor);
   $("#selectId").selectpicker("refresh");   
    //console.log('editForm: ', $scope.editForm.id);
    $http({
        url: 'doctors/'+doctor.id+"/edit",
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        
        }
        

    }).then(
        function successCallback(response) {
            
        $scope.doctor_editar=response.data.doctor;
         $scope.specialties2=$scope.doctor_editar.specialties;
            let seleccion=[];
            for (var[key,value] of Object.entries($scope.specialties2)){
                seleccion.push(value.id);
            }
          
            $('#selectId').selectpicker('val', seleccion);
           
         
            
           
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


$scope.update = function(){
    // console.log($scope.doctor_editar);
    $scope.doctor_editar.specialties = $('#selectId').val();
    // console.log($scope.doctor_editar);
    $http({
        url: 'doctors/update/',
        method: 'PUT',
        data: $scope.doctor_editar,
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
    }).then(
        function successCallback(response) {
            console.log(response);
             $scope.doctors=$scope.doctors.map(dato => (dato.id == response.data.dato.id) ? dato = response.data.dato : dato);
             $('#editarModal').modal('hide');
            swal(
                'Mensaje del Sistema',
              'Guradado correctamente',
              'success'
                
            );
        },
        function errorCallback(response) {
            console.log(response);
       {
                swal(
                    'Mensaje del Sistema',
                    response.data.message,
                    response.data.status
                );
            }
        }
    );
}

$scope.delete = function (eleccion) {
    $scope.id=eleccion.id;
    
    $http({
        url: `doctors/${$scope.id}`,
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
    }).then(
        function successCallback(response) {
            console.log(response); 
            $scope.doctors = $scope.doctors.filter(dato => dato.id !== response.data.dato.id);
            $('#eliminarModal').modal('hide');
            swal(
                'Mensaje del Sistema',
                response.data.message,
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