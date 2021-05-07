<?php
$restaurar = $_POST['restaurar'];
$eliminar = $_POST['eliminar'];
$nuevo = $_POST['nuevo'];
$nombrepc = $_POST['nombrepc'];
$marca =$_POST['marca'];
$proveedor =$_POST['proveedor'];
$modelo =$_POST['modelo'];
$codigoActivo =$_POST['codigoActivo'];
$modeloCPU =$_POST['modeloCPU'];
$serialCPU =$_POST['serialCPU'];
$procesador =$_POST['procesador'];
$velocidad =$_POST['velocidad'];
$ram =$_POST['ram'];
$marcaDD =$_POST['marcaDD'];
$capacidad =$_POST['capacidad'];
$tecnologia =$_POST['tecnologia'];
$monitor =$_POST['monitor'];
$serialmonitor =$_POST['serialmonitor'];
$teclado =$_POST['teclado'];
$serialteclado =$_POST['serialteclado'];
$mouse =$_POST['mouse'];
$serialmouse =$_POST['serialmouse'];
$otro =$_POST['otro'];
$nombreequipo =$_POST['nombreequipo'];
$red =$_POST['red'];
$ip =$_POST['ip'];
$mac =$_POST['mac'];
$velocidadtarjeta =$_POST['velocidadtarjeta'];
$marcatarjeta =$_POST['marcatarjeta'];
$so =$_POST['so'];
//$fecharealizacion =$_POST['fecharealizacion'];
$realizo =$_POST['realizo'];
$observaciones =$_POST['observaciones'];
//$responsable =$_POST['responsable'];
//$firmaResponsable = $_POST['firmaResponsable'];
$usrresponsable =$_POST['usrresponsable'];
$ubicacion =$_POST['ubicacion'];
$fecha = $_POST['fecha'];
$firma = $_POST['data-url'];
$recomendaciones =$_POST['recomendaciones'];

include 'conexion.php';
//VER SI EXISTE EL ACTIVO QUE DESEAMOS REGISTRAR
$consulta="select nombrepc from hojadevida where  nombrepc='$nombrepc'";
$result = mysqli_query($con,$consulta);
//NUEVO REGISTRO
if(mysqli_num_rows($result)==0){
  $insert2=" INSERT INTO `hojadevida` (`idCodigoActivo`,
     `EstadoActivoInactivo`, `Marca`, `Proveedor`, `modelo`, `ModeloCPU`,
     `SerialCPU`, `Procesador`, `VelocidadProcesador`, `RAM`, `MarcaDiscoDuro`,
     `CapacidadDD`, `Tecnologia`, `MarcaModeloMonitor`,
     `SerialMonitorCodigoActivo`, `MarcaModeloTeclado`,
     `SerialTecladoCodigoActivo`, `MarcaModeloMause`, `SerialMauseCodigoActivo`,
     `otro`, `enRed`, `direccionIP`, `direccionMAC`, `velocidad`,
     `marcaTarjetaDeRed`, `so`,`nombrepc`,`recomendaciones`)
     VALUES ('$codigoActivo','activo','$marca',
    '$proveedor','$modelo','$modeloCPU','$serialCPU','$procesador',
    '$velocidad','$ram','$marcaDD','$capacidad','$tecnologia',
    '$monitor','$serialmonitor','$teclado','$serialteclado','$mouse',
    '$serialmouse','$otro','$red','$ip','$mac',
    '$velocidadtarjeta','$marcatarjeta','$so','$nombrepc','$recomendaciones')";
  mysqli_query($con,$insert2);

  $insert1 ="INSERT INTO `inventario` (`codigo`, `marca`, `modelo`,
     `color`, `serie`, `observaciones`, `estado`) VALUES ('$codigoActivo','$marca','$modelo','color','serie','observaciones','activo')";
  //echo "insert 1 /n";
   mysqli_query($con,$insert1);

  $insert2 ="INSERT INTO `historialusuarios` (`activoAsociado`, `nombreResponsable`, `UbicacionDentroEmpresa`, `Fecha`,
    `FirmaResponsable`) VALUES ('$nombrepc', '$usrresponsable', '$ubicacion', '$fecha', '$firma')";
  mysqli_query($con,$insert2);
  //echo "insert 1 /n";

  $ONE = "El profesional de apoyo: ".$realizo." realiza entrega del equipo en la fecha ".$fecha;
  $insert3 ="INSERT INTO `historialmantenimiento` (`activoAsociado`, `realizo`, `observaciones`, `firmaResponsable`,
    `nombreResponsable`,`fecha`) VALUES ('$nombrepc', '$realizo', '$ONE', '$firma', '$usrresponsable','$fecha')";
  mysqli_query($con,$insert3);
  header('location: index.php');

}else if(mysqli_num_rows($result)>0){

  if(strcmp($eliminar, 'eliminar') == 0){
    //cambia el estado de un equipo de activo a inactivo
    $insert3 ="UPDATE hojadevida SET EstadoActivoInactivo='inactivo' WHERE idCodigoActivo=$codigoActivo";
    mysqli_query($con,$insert3);
    echo json_encode('eliminacion exitosa');

  }else if(strcmp($nuevo, 'nuevo') == 0){
    echo'<script type="text/javascript">
  alert("EL EQUIPO QUE INTENTAS AGREGAR YA EXISTE");
  window.location.href="registro.php";
  </script>';

  }else{
    //REGISTRO DE MANTENIMIENTO
  $insert3 ="INSERT INTO `historialmantenimiento` (`activoAsociado`, `realizo`, `observaciones`, `firmaResponsable`,
    `nombreResponsable`,`fecha`) VALUES ($nombrepc, '$realizo', '$observaciones', '$firma', '$usrresponsable','$fecha')";
  mysqli_query($con,$insert3);

  echo'<script type="text/javascript">
  alert("REGISTRO EXITOSO");
  window.location.href="index.php";
  </script>';
  }
}

//CAMBIA EL ESTADO DE UN EQUIPO INACTIVO --> ACTIVO
if(strcmp($restaurar, 'restaurar') == 0){
      $insert3 ="UPDATE hojadevida SET EstadoActivoInactivo='activo' WHERE idCodigoActivo=$codigoActivo";
      $query_delete = mysqli_query($con,$insert3);
      echo json_encode('restauración exitosa');
    }else{
      echo json_encode('restauración fallida');
    }
  

?>
