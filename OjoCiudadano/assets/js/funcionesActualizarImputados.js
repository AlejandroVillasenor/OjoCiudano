function sleep(ms){
    return new Promise(resolve => setTimeout(resolve, ms));
}


function actualizarImputado(event){
    // Evitar que el formulario se envíe
    event.preventDefault();
    // Declarar las variables
    var idDenuncia = $('#idDenuncia').val();
    var nombre = $('#nombre').val();
    var alias = $('#alias').val();
    var sexo = $('input:radio[name=sexo]:checked').val();
    var desc_imputado = $('#desc_imputado').val();
    var desc_hechos = $('#desc_hechos').val();
    var municipio_hechos = $('#municipio').val();
    var estado_hechos = $('#estado').val();
    var fecha_hechos = $('#fecha').val();
    var hora_hechos = $('#hora').val();
    
    $.ajax({
        url: 'includes/imputadosActualizar.php',
        type: 'post',
        dataType: 'text',
        data: {
            idDenuncia : idDenuncia,
            nombre: nombre,
            alias: alias,
            sexo: sexo,
            desc_imputado: desc_imputado,
            desc_hechos: desc_hechos ,
            municipio: municipio_hechos,
            estado: estado_hechos,
            fecha: fecha_hechos,
            hora: hora_hechos,
        },
        success: async function(res){
            if(res == 1){
                Swal.fire({
                    icon: 'success',
                    title: '¡Denuncia actualizada exitosamente!',
                    showConfirmButton: false,
                    time: 3000
                })
                //Espera 3 segundos y redirecciona a la pagina de denuncia
                await sleep(3050);
                window.location.href = "imputados.php";
            }
            else if(res == 2){
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'No se ha podido actualizar el registro'
                })
            }
            else if(res == 4){
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'Datos ingresados no validos'
                })
            }
        },
        error: function(error){
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'Archivo no encontrado...'
            });
        }
    });
}