function sleep(ms){
    return new Promise(resolve => setTimeout(resolve, ms));
}

var tabla = "";
var categoria = "";
function setCategoria() {
    categoria = $('input:radio[name=categoria]:checked').val();
    if (categoria === 'dest_amapola' || categoria === 'dest_marihuana') {
        tabla = 'destruccion';
        if (categoria === 'dest_amapola') {
            categoria = 'Amapola';
        } else {
            categoria = 'Marihuana';
        }
    } else {
        tabla = 'aseguramiento';
    }
}

async function consulta(event){
    event.preventDefault();
    anio = $('#anio').val();
    mes = $('#mes').val();
    /* Validamos que esten seleccionados*/
    if(categoria == ""){
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: 'Selecciona una categoría'
        })
    }else{
        Swal.fire({
            icon: 'success',
            title: '¡Consulta exitosa!',
            showConfirmButton: false,
            time: 3000
        })
        await sleep(3050);
        window.location.href = "resultados.php?tabla=" + tabla + "&categoria=" + categoria + "&anio=" + anio + "&mes=" + mes;
    }
}
