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


//Funcion que permite eliminar registros
function eliminarImputado(idDenuncia, numFila){
    Swal.fire({
        title: '¿Desear eliminar el registro?',
        text: "Una vez eliminado no podras recuperarlo",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#01855b',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: "Borrar"
    }).then((result) => {
        if(result.isConfirmed){
            $.ajax({
                url: 'includes/eliminarImputados.php',
                type: 'post',
                datype: 'text',
                data: 'ID='+idDenuncia,
                success: function(res){
                    if(res == 1){
                        Swal.fire(
                            'Eliminado!',
                            'El registro se ha eliminado exitosamente...',
                            'successs'
                        )
                        $('#fila'+numFila).remove();
                    }
                    else{
                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text: "El registro no ha sido eliminado"
                        });
                    }
                },
                error: function(){
                    alert('*ERROR - Archivo no encontrado...');
                }
            })
        }
    })
}



