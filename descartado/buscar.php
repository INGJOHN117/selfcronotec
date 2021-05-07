<?php 

include 'conexion.php';
$salida = "";
$query = "SELECT distinct
a.codigoActivo, a.nombrepc, c.cedula, d.nombre, d.proceso, max(c.fechaEntrega) as fecha
from
hojadevida a, historialdemantenimiento b, historialdeusuarios c, usuarios d
where
a.estado = 'activo'  and a.codigoActivo = b.codigoActivo and a.codigoActivo = c.codigoActivo and c.cedula=d.cedula
GROUP BY
a.codigoActivo
order by
a.codigoActivo asc";

if(isset($_POST['consulta'])){
  $query = "SELECT distinct
  a.codigoActivo, a.nombrepc, c.cedula, d.nombre, d.proceso, max(c.fechaEntrega) as fecha
  from
  hojadevida a, historialdemantenimiento b, historialdeusuarios c, usuarios d
  where
  a.estado = 'activo'  and a.codigoActivo = b.codigoActivo and a.codigoActivo = c.codigoActivo and c.cedula=d.cedula and a.codigoActivo LIKE '%".$_POST['consulta']."%'
  GROUP BY
  a.codigoActivo
  order by
  a.codigoActivo asc";
}

$resultado = mysqli_query($con,$query);

if(mysqli_num_rows($resultado) > 0){
    while($fila = $resultado->fetch_assoc()){
      $salida .= "
            <tr>
            <form  id='".$fila['codigoActivo']."' class='' action='updateRegistro.php' method='post'>
              <td>
                <input class='text-input-center' type='text' name='idCodigoActivo' id='idCodigoActivo' value='".$fila['codigoActivo']."' readonly>
                </input>
              </td>
              <td>
                <input class='text-input-center' type='text' name='usr-responsable' id='usr-responsable' value='".$fila['nombre']."' readonly></input>
              </td>

              <td>
                <input class='text-input-center' type='text' name='nombrepc' id='nombrepc' value='".$fila['nombrepc']."' readonly></input>
              </td>

              <td>
                <input class='text-input-center' type='text' name='ubicacion' id='ubicacion' value='".$fila['proceso']."' readonly></input>
              </td>

              <td>
                <input class='text-input-center' type='text' name='fecha' id='fecha' value='".$fila['fechaEntrega']."' readonly></input>
              </td>

              <td>
                <div class='h'>
                  <button type='submit' class='accept' onClick='alerta(this)'><i class='iconAccept fas fa-check-double'></i></button>
                </div>
              </td>
              <td>                                                                     
              <div class='h'>
                <button type='button' class='accept' onClick='eliminar(this)'><i style='color:red;' class='iconAccept far fa-trash-alt'></i></button>
              </div>
              </td>
              </form>
            </tr>
            ";
            }

}else{
  echo "no hay coincidencias";
}

echo $salida;

 ?>