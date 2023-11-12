window.onload = function Datos(){
    cargarImputados();
}

//Carga los datos de los imputados
function cargarImputados(){
    $.ajax({
        url: 'includes/mostrarImputados.php',
        type: 'post',
        success: function(res){
            $("#contenedorImputados").html(res);
        },
        error: function(){
            alert('*ERROR - Archivo no encontrado...');
        }
    });
}