var app = angular.module("patient", []);



app.controller("patient", function ($scope, $http) {
    $scope.patients = [];
    $scope.patients_editar = {};
    $scope.createForm = {};
    

//obtenemos el listado de doctores
    $http({
        url: 'patients/getPatients',
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
    }).then(
        function successCallback(response) {
          // console.log(response);
           $scope.patients=response.data.patients;
           
        },
        function errorCallback(response) {
            
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
        url: 'patients/create',
        method: 'GET',
    
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
    }
    }).then(
     
        function successCallback(response) {
            $('#createForm').trigger('reset');
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
    console.log($scope.createForm);
  
    //return;
    $http({
        url: 'patients',
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        data: $scope.createForm
    }).then(
         
        function successCallback(response) {
        console.log(response);
         $scope.patients = [...$scope.patients, response.data.user];
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
$scope.edit = function (patient) {
    //console.log('doctor: ', patient);
   
     //console.log('editForm: ', $scope.editForm.id);
     $http({
         url: 'patients/'+patient.id+"/edit",
         method: 'POST',
         headers: {
             'Content-Type': 'application/json',
             'Accept': 'application/json',
         
         }
         
 
     }).then(
         function successCallback(response) {
        // console.log(response);
         $scope.patient_editar=response.data.user;
        //  console.log($scope.patient_editar);

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
    console.log($scope.patient_editar);
  
    // console.log($scope.doctor_editar);
    $http({
        url: 'patients/update/',
        method: 'PUT',
        data: $scope.patient_editar,
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
    }).then(
        function successCallback(response) {
            console.log(response);
            $scope.patients=$scope.patients.map(user => (user.id == response.data.user.id) ? dato = response.data.user : user);
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
        url: `patients/${$scope.id}`,
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
    }).then(
        function successCallback(response) {
            console.log(response); 
            $scope.patients = $scope.patients.filter(user => user.id !== response.data.user.id);
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