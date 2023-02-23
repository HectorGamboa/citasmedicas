var app = angular.module("schedule", []);



app.controller("schedule", function ($scope, $http) {
    console.log("hola mundo");

//obtenemos el listado de doctores
    $http({
        url: 'schedule',
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
    }).then(
        function successCallback(response) {
          console.log(response);
         
      
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













});