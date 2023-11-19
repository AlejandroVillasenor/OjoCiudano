function sleep(ms){
    return new Promise(resolve => setTimeout(resolve, ms));
}

function imputados(event){
    // Evitar que el formulario se envíe
    event.preventDefault();
    nombre = $('#nombre').val();
    alias = $('#alias').val();
    sexo = $('input:radio[name=sexo]:checked').val();
    desc_imputado = $('#desc_imputado').val();
    desc_hechos = $('#desc_hechos').val();
    municipio_hechos = $('#municipio').val();
    estado_hechos = $('#estado').val();
    fecha_hechos = $('#fecha').val();
    hora_hechos = $('#hora').val();
    //Respuesta del captcha
    const captcha = grecaptcha.getResponse();
    $.ajax({
        url: 'includes/formularioimputados.php',
        type: 'post',
        datatype: 'text',
        data: {
            nombre: nombre,
            alias: alias,
            sexo: sexo,
            desc_imputado: desc_imputado,
            desc_hechos: desc_hechos ,
            municipio: municipio_hechos,
            estado: estado_hechos,
            fecha: fecha_hechos,
            hora: hora_hechos,
            captcha: captcha
        },
        success: async function(res){
            if(res==3){
                Swal.fire({
                    icon: 'error',
                    title: '¡Captcha no verificado!',
                    text: 'Por favor, verifica que no eres un robot'
                })
            }
            else if(res == 1){
                Swal.fire({
                    icon: 'success',
                    title: '¡Denuncia creada exitosamente!',
                    showConfirmButton: false,
                    time: 3000
                })
                //Espera 3 segundos y redirecciona a la pagina de denuncia
                await sleep(3050);
                window.location.href = "denuncia.php";
            }
            else if(res == 2){
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'No se ha podido registrar el imputado'
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
        error: function(){
            alert('*Error - Archivo no encontrado...');
        }
    });
}

function lugares(event){
    // Evitar que el formulario se envíe
    event.preventDefault();
    calle = $('#calle').val();
    numero_int = $('#numero_int').val();
    numero_ext = $('#numero_ext').val();
    caracteristicas = $('#caracteristicas').val();
    estado_lugar = $('#estado_lugar').val();
    municipio_lugar = $('#municipio_lugar').val();
    desc_hechos = $('#desc_hechos2').val();
    fecha_hechos = $('#fecha_hechos').val();
    hora_hechos = $('#hora_hechos').val();
    //Respuesta del captcha-lugar
    const captcha2 = grecaptcha.getResponse();
    
    $.ajax({
        url: 'includes/formulariolugares.php',
        type: 'post',
        datatype: 'text',
        data: {
            calle: calle,
            interior: numero_int,
            exterior: numero_ext,
            desc_domicilio: caracteristicas,
            estado: estado_lugar,
            municipio: municipio_lugar,
            desc_hechos: desc_hechos,
            fecha: fecha_hechos,
            hora: hora_hechos,
            captcha: captcha2
        },
        success: async function(res){
            if(res==3){
                Swal.fire({
                    icon: 'error',
                    title: '¡Captcha no verificado!',
                    text: 'Por favor, verifica que no eres un robot'
                })
            }
            else if(res == 1){
                Swal.fire({
                    icon: 'success',
                    title: '¡Denuncia creada exitosamente!',
                    showConfirmButton: false,
                    time: 3000
                })
                //Espera 3 segundos y redirecciona a la pagina de denuncia
                await sleep(3050);
                window.location.href = "denuncia.php";
            }
            else if(res == 2){
                Swal.fire({
                    icon: 'error',
                    title: '¡Error!',
                    text: 'No se ha podido registrar el lugar'
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
        error: function(){
            alert('*Error - Archivo no encontrado...');
        }
    });
}


