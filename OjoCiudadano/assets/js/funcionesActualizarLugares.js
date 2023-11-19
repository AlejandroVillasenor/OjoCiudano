function sleep(ms){
    return new Promise(resolve => setTimeout(resolve, ms));
}

function actualizarLugar(event){
    // Evitar que el formulario se envíe
    event.preventDefault();
    var idDenuncia = $('#idDenuncia').val();
    var calle = $('#calle').val();
    var numero_int = $('#numero_int').val();
    var numero_ext = $('#numero_ext').val();
    var caracteristicas = $('#caracteristicas').val();
    var estado_lugar = $('#estado_lugar').val();
    var municipio_lugar = $('#municipio_lugar').val();
    var desc_hechos = $('#desc_hechos').val();
    var fecha_hechos = $('#fecha_hechos').val();
    var hora_hechos = $('#hora_hechos').val();
    $.ajax({
        url: 'includes/lugaresActualizar.php',
        type: 'post',
        dataType: 'text',
        data: {
            idDenuncia : idDenuncia,
            calle: calle,
            interior: numero_int,
            exterior: numero_ext,
            desc_domicilio: caracteristicas,
            estado: estado_lugar,
            municipio: municipio_lugar,
            desc_hechos: desc_hechos,
            fecha: fecha_hechos,
            hora: hora_hechos
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
                window.location.href = "lugares.php";
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
            else{
                alert("Si recibio los datos\n"+res);
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