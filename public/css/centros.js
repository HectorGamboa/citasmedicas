var app = angular.module("centros", ["angularUtils.directives.dirPagination"]);

app.controller("centros", function ($scope, $http) {
    $scope.currentPage = 1;
    $scope.pageSize = 11;
    $scope.centrosDB = JSON.parse(centrosDB.replace(/&quot;/g,'"'));
    
    $scope.centros = [];
    $scope.centros = $scope.centrosDB;

    $scope.actualizar = function () {
        activarLoading();
        $scope.datos_centros = $http({
            url: "centros/get-all",
            method: "GET",
            data: "",
        }).then(
            function successCallback(response) {
                desactivarLoading();
                let result = response.data;
                // console.log(result);
                $scope.centros = result.centros;

                if (result.estatus) {
                    swal(
                        titulos.mensaje_sistema,
                        centros.CENTROS_ACTUALIZADOS,
                        tiposDeMensaje.exito
                    );
                    //console.log(response);
                } else {
                    // console.log(response);
                    swal(
                        erroresSAP.ERROR_CONEXION_SAP.titulo,
                        erroresSAP.ERROR_CONEXION_SAP.mensaje,
                        erroresSAP.ERROR_CONEXION_SAP.tipo
                    );
                    // alert();
                }
            },
            function errorCallback(response) {
                desactivarLoading();
                console.log(response);
                swal(
                    centros.CENTROS,
                    response.data.message,
                    tiposDeMensaje.error
                );
            }
        );
    };

    $scope.modulos = function (id) {
        $('#modulo-'+id).trigger('submit');
    };
});

function getDatafromAdmonCentro(tipo_accion, nickusuario) {
    var centroUsuarioAdapter = new Object();
    centroUsuarioAdapter.tipo_accion = tipo_accion;
    centroUsuarioAdapter.nickUsuario = nickusuario;
    return JSON.stringify(centroUsuarioAdapter);
}
