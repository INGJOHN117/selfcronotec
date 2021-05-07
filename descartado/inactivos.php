<?php
session_start();
if(strcmp($_SESSION['user'], 'Admin') == 0 && strcmp($_SESSION['pswd'], '123') == 0 ){
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>INACTIVOS</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/5658e61838.js"></script>
    <script type="text/javascript">

      function eliminar(object){
        a = confirm("Vas a restaurar este equipo, estas seguro?")
        if(a){
          var _this = object;
          var fila = _this.parentNode.parentNode.parentNode;
          var array_fila=getRowSelected(_this);
          var datos = new FormData();
          datos.append('codigoActivo',array_fila[0]);
          datos.append('nombrepc',array_fila[2]);
          datos.append('restaurar','restaurar');
          fetch('fileRegistro.php',{
            method:'POST',
            body:datos
          })
          .then(fila.remove())
          //console.log(array_fila[0]+" - "+array_fila[1]+" - "+array_fila[2]+" - "+array_fila[3]+" - "+array_fila[4]);
        }else{
          alert("ok. el equipo no fue restaurado");
          window.location.replace('inactivos.php');
        }
      }

      function getRowSelected(objectPressed){
        //Obteniendo la linea que se esta eliminando
        console.log(objectPressed.value);
        var a=objectPressed.parentNode.parentNode.parentNode;
        //b=(fila).(obtener elementos de clase columna y traer la posicion 0).(obtener los elementos de tipo parrafo y traer la posicion0).(contenido en el nodo)
        var codigo= a.getElementsByTagName("td")[0].getElementsByTagName("input")[0].value;
        var usuario=a.getElementsByTagName("td")[1].getElementsByTagName("input")[0].value;
        var nombrepc=a.getElementsByTagName("td")[2].getElementsByTagName("input")[0].value;
        var oficina=a.getElementsByTagName("td")[3].getElementsByTagName("input")[0].value;
        var pm=a.getElementsByTagName("td")[4].getElementsByTagName("input")[0].value;
        var array_fila = [codigo,usuario,nombrepc,oficina,pm];
        return array_fila;
      }
    </script>
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
      <h1 class="title-edit">INVENTARIO DE INACTIVOS</h1>

      <div class="">
        <table class="egt">
          <tr>
            <th><label for="idCodigoActivo">Codigo Activo</label></th>
            <th><label for="usr-responsable">Nombre</label></th>
            <th><label for="nombrepc">Nombre-PC</label></th>
            <th><label for="ubicacion">Oficina</label></th>
            <th><label for="fecha">Proximo mantenimiento</label></th>
            <th><label for="firma"></label></th>
          </tr>
          <br>
          <?php
          /*aqui inicia php*/
          include 'conexion.php';
          $resultado = mysqli_query($con,"SELECT distinct
          a.idCodigoActivo, c.nombreResponsable, a.nombrepc, c.UbicacionDentroEmpresa, max(b.fecha) as fecha
          from
          hojadevida a, historialmantenimiento b, historialusuarios c
          where
          a.nombrepc = b.activoAsociado and a.nombrepc = c.activoAsociado and a.EstadoActivoInactivo = 'inactivo'
          GROUP BY
          a.nombrepc
          order by
          a.nombrepc asc;");
          while($consulta = mysqli_fetch_array($resultado))
          {
            //AQUI SE DEBEN MOSTRAR LOS DATOS DE LA CONSULTA
            ?>
          <form class="" action="updateRegistro.php" method="post">
          <tr>
            <td>
              <input onclick="function()" class="text-input-center" type="text" name="idCodigoActivo" id="idCodigoActivo" value="<?php echo $consulta['idCodigoActivo']?>" placeholder="<?php echo $consulta['idCodigoActivo']?> "readonly="readonly"></input>
            </td>

            <td>
              <input class="text-input-center" type="text" name="usr-responsable" id="usr-responsable" value="<?php echo $consulta['nombreResponsable'];?>" readonly="readonly"></input>
            </td>

            <td>
              <input class="text-input-center" type="text" name="nombrepc" id="nombrepc" value="<?php echo $consulta['nombrepc']?>" readonly="readonly"></input>
            </td>

            <td>
              <input class="text-input-center" type="text" name="ubicacion" id="ubicacion" value="<?php echo $consulta['UbicacionDentroEmpresa']?>" readonly="readonly" ></input>
            </td>

            <td>
              <input class="text-input-center" type="text" name="fecha" id="fecha" value="<?php echo $consulta['fecha']?>" readonly="readonly"></input>
            </td>

            <td>                                                                     
            <div class="h">
              <button type="button" class="accept" onClick="eliminar(this)"><i class="iconAccept fas fa-check-double"></i></button>
            </div>
            </td>
          </tr>

          </form>
          <?php
          }
          /*aqui finaliza php*/
          ?>
        </table>
      </div>
    </section>
  </body>
</html>
<?php
}else{
  header("location: denied.php");
} ?>
