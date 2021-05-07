$(buscar_datos());

function buscar_datos(consulta) {
    $.ajax({
            url: 'buscar.php',
            type: 'POST',
            dataType: 'html',
            data: { consulta: consulta },
        })
        .done(function(respuesta) {
            $("#datos").html(respuesta);
            //console.log(respuesta);
        })
        .fail(function() {
            console.log("error");
        })

}

$(document).on('keyup', '#codigo', function() {
    var valor = $(this).val();
    if (valor != "") {
        buscar_datos(valor);
    } else {
        buscar_datos();
    }
})

function alerta(nodo) {
    var _this = nodo;
    var fila = $(_this.parentNode.parentNode.parentNode);
    var array_fila = getRow(_this);
    var form = document.getElementById(array_fila[0].toString())
    form.target = '_self';
    //form.target = '_blank';
    form.submit(function(e) {
        e.preventDefault();
    });

    console.log(fila.id);

}

function getRow(objectPressed) {
    //Obteniendo la linea que se esta eliminando
    var a = objectPressed.parentNode.parentNode.parentNode;
    //console.log(a);
    //b=(fila).(obtener elementos de clase columna y traer la posicion 0).(obtener los elementos de tipo parrafo y traer la posicion0).(contenido en el nodo)
    var codigo = a.getElementsByTagName("td")[0].getElementsByTagName("input")[0].value;
    var usuario = a.getElementsByTagName("td")[1].getElementsByTagName("input")[0].value;
    var nombrepc = a.getElementsByTagName("td")[2].getElementsByTagName("input")[0].value;
    var oficina = a.getElementsByTagName("td")[3].getElementsByTagName("input")[0].value;
    var pm = a.getElementsByTagName("td")[4].getElementsByTagName("input")[0].value;
    var array_fila = [codigo, usuario, nombrepc, oficina, pm];
    return array_fila;
}