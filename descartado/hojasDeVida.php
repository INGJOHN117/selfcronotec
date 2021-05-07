<?php
session_start();
if(true){
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>HV</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <div style="float:right">
        <label style="font-size: 20px; margin-right: 10px"><?php echo $_SESSION['user'];?></label>
        <a href="login.php">
            <i style="font-size: 40px; margin-right: 20px" class="iconAccept fas fa-power-off"></i>
        </a>
    </div>
    <header>
        <section id="menu">
            <nav>
                <ul>
                    <img src="img/small.png" alt="">
                    <a href="index.php"><strong>CRONOGRAMA</strong></a>
                    <a href="registro.php"><strong>NUEVO EQUIPO</strong></a>
                    <a href="hojasDeVida.php"><strong>HOJAS DE VIDA</strong></a>
                    <a href="inactivos.php"><strong>INACTIVOS</strong></a>
                </ul>
            </nav>
        </section>
    </header>
    <section id="cuerpo">
        <h1 class="title-edit">INVENTARIO</h1>
        <div>

            <!--<label for="">Mostrar Información por:</label>
        <select class="select-edit">
          <option value="value1">Nombre USR</option>
          <option value="value2" selected>Proximo mantenimiento</option>
          <option value="value3">Oficina</option>
        </select>
      -->
            <h3 style="text-align: center;">Busqueda por Codigo: </h3>
            <input type="text" style="text-align: center" name="codigo" id="codigo" value="">
        </div>
        <br>
        <br>
        <br>
        <div>
            <table class="egt">
                <tr>
                    <th><label for="idCodigoActivo">Codigo Activo</label></th>
                    <th><label for="usr-responsable">Nombre Usuario</label></th>
                    <th><label for="nombrepc">Nombre-PC</label></th>
                    <th><label for="ubicacion">Oficina</label></th>
                    <th><label for="fecha">Proximo mantenimiento</label></th>
                    <th><label for="firma"></label></th>
                </tr>
                <div id="datos">

                </div>
            </table>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="buscar.js" type="text/javascript"></script>
    <script type="text/javascript">
    function eliminar(object) {
        a = confirm("esta seguro? Va a eliminar un registro.");
        if (a) {
            var _this = object;
            var fila = _this.parentNode.parentNode.parentNode;
            var array_fila = getRowSelected(_this);

            var form = document.getElementById(array_fila[0]);
            console.log(form);

            var datos = new FormData();
            datos.append('codigoActivo', array_fila[0]);
            datos.append('nombrepc', array_fila[2]);
            datos.append('eliminar', 'eliminar');
            fetch('fileRegistro.php', {
                    method: 'POST',
                    body: datos
                })
                .then(fila.remove())
            //console.log(array_fila[0]+" - "+array_fila[1]+" - "+array_fila[2]+" - "+array_fila[3]+" - "+array_fila[4]);
        } else {
            alert("Se cancelo la eliminacion");
            window.location.replace('hojasDeVida.php');
        }
    }

    function enviar(object) {
        var _this = object;
        var fila = _this.parentNode.parentNode.parentNode;
        var array_fila = getRowSelected(_this);
        var form = document.getElementById(array_fila[0]);
        console.log(form);
        form.submit();
    }


    function getRowSelected(objectPressed) {
        //Obteniendo la linea que se esta eliminando
        var a = objectPressed.parentNode.parentNode.parentNode;
        console.log(a);
        //b=(fila).(obtener elementos de clase columna y traer la posicion 0).(obtener los elementos de tipo parrafo y traer la posicion0).(contenido en el nodo)
        var codigo = a.getElementsByTagName("td")[0].getElementsByTagName("input")[0].value;
        var usuario = a.getElementsByTagName("td")[1].getElementsByTagName("input")[0].value;
        var nombrepc = a.getElementsByTagName("td")[2].getElementsByTagName("input")[0].value;
        var oficina = a.getElementsByTagName("td")[3].getElementsByTagName("input")[0].value;
        var pm = a.getElementsByTagName("td")[4].getElementsByTagName("input")[0].value;
        var array_fila = [codigo, usuario, nombrepc, oficina, pm];
        return array_fila;
    }
    </script>
    <script src="https://kit.fontawesome.com/5658e61838.js"></script>
</body>

</html>
<?php
}else{
  header("location: denied.php");
} ?>