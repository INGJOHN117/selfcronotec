<?php
    //print_r($_POST);
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
	//$nombreequipo =$_POST['nombreequipo'];
	$red =$_POST['red'];
	$ip =$_POST['ip'];
	$mac =$_POST['mac'];
	$velocidadtarjeta =$_POST['velocidadtarjeta'];
	$marcatarjeta =$_POST['marcatarjeta'];
	$so =$_POST['so'];
	$fecharealizacion =$_POST['fecharealizacion'];
	$realizo =$_POST['realizo'];
	$observaciones =$_POST['observaciones'];
	$responsable =$_POST['responsable'];
	$usrresponsable =$_POST['usrresponsable'];
	$ubicacion =$_POST['ubicacion'];
	$fecha = $_POST['fecha'];
	$recomendaciones =$_POST['recomendaciones'];

	//nuevo usuario
	$n_usrresponsable = $_POST['n_usrresponsable'];
	$n_ubicacion = $_POST['n_ubicacion'];
	$n_fecha = $_POST['n_fecha'];
	$n_firma = $_POST['data-url'];

if($_POST['salida'] == 'pdf'){
	
	require_once ('vendor/autoload.php');
	include 'conexion.php';
	
	$update ="UPDATE hojadevida SET Marca='$marca',Proveedor='$proveedor',modelo= '$modelo',idCodigoActivo= '$codigoActivo',ModeloCPU= '$modeloCPU',SerialCPU= '$serialCPU',Procesador= '$procesador',VelocidadProcesador= '$velocidad',RAM= '$ram',MarcaDiscoDuro= '$marcaDD',CapacidadDD= '$capacidad',Tecnologia= '$tecnologia',MarcaModeloMonitor = '$monitor',SerialMonitorCodigoActivo= '$serialmonitor',MarcaModeloTeclado= '$teclado',SerialTecladoCodigoActivo= '$serialteclado',MarcaModeloMause= '$mouse',SerialMauseCodigoActivo= '$serialmouse',otro= '$otro',enRed= '$red',direccionIP= '$ip',direccionMAC= '$mac',velocidad= '$velocidadtarjeta',marcaTarjetaDeRed= '$marcatarjeta',so= '$so',recomendaciones= '$recomendaciones' WHERE nombrepc='$nombrepc'";
    $query_update = mysqli_query($con,$update);


	$hv = mysqli_query($con,"SELECT distinct * FROM  hojadevida where nombrepc = '$nombrepc'");
	$hu = mysqli_query($con,"SELECT distinct * FROM  historialusuarios where activoAsociado = '$nombrepc'");
	$hm = mysqli_query($con,"SELECT distinct * FROM  historialmantenimiento where activoAsociado = '$nombrepc'");
	$hv1 = mysqli_fetch_assoc($hv);

	$html = '<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<title>reporte</title>
		<style type="text/css">
			body {
			  font-family: Arial, sans-serif;
			  font-size: 11px;
			}
			.container{
				background-color: white;
	  			width:100%;
				margin-left : auto;
				margin-right : auto;
			}

			div.b1{border-left: 1px solid #000;}
			div.b2{border-right: 1px solid #000;}
			div.b3{border-top:1px solid #000;}
			div.b4{border-bottom: 1px solid #000;}

			div.cg{background: #D2D0D0;}
			div.tc{text-align: center;}

			div.w10{width: 10%;}
			div.w20{width: 20%;}
			div.w30{width: 30%;}
			div.w40{width: 40%;}
			div.w50{width: 50%;}
			div.w60{width: 60%;}
			div.w70{width: 70%;}
			div.w80{width: 80%;}
			div.w90{width: 90%;}
			div.w100{width: 100%;}

			div.h30{height: 23px;}
			div.h60{height: 46px;}

			div.left{float:left;}
			div.right{float:right;}


		</style>
	</head>
	<body>
		<main>
				<!--div contenedor con  margen responsive-->
			<div class="container">
				<!--div´s con grid independientes que albergan los elementos del reporte  -->
				<!--encabezado-->
				<div style="width: 100%">
					<div class="left w30">
						<div class="b1 b3 h60" width="100%">
							<img class="h30 " width="100%" src="img/1.png">
						</div>
						<div class="b1 b3 b4 w100 h30" style="padding-left:5px">Sistemas de Gestión Integral</div>
					</div>
					<div class="left" width="45%">
						<div class="b1 b3 left w100 h30" style="padding-left:5px">TRASNPORTADORES DE IPIALES S. A.</div>
						<div class="b1 b3 left w100 h30" style="padding-left:5px">HOJA DE VIDA DE EQUIPOS DE COMPUTO</div>
						<div class="b1 b3 b4 left w100 h30" style="padding-left:5px">Gestión de Sistemas</div>
					</div>
					<div class="left" width="25%">
						<div class="b1 b2 b3 left w100 h30" style="padding-left:5px">Código: GS-RS-MI-F003</div>
						<div class="b1 b2 b3 left w100 h30" style="padding-left:5px">Versión:002</div>
						<div class="b1 b2 b3 b4 left w100 h30" style="padding-left:5px">Vigencia: 15/12/2017</div>
					</div>
				</div>
				<br>
				<div style="width: 100%">
					<div class="b1 b2 cg tc h30 left" style="padding-top:2px" width="25%">Nombre PC</div>
					<div class="b2 b3 b4 tc h30" style="padding-top:2px; clear:right;" width="auto">'.$hv1["nombrepc"].'</div>
				</div>
				<br>
				<h2>1.DATOS DEL EQUIPO</h2>
				<div style="width: 100%">
					<div class="b1 tc b3 b4 cg h30 left" width="10%">Marca</div>
					<div class="b1 tc b3 b4 h30 left" width="20%">'.$hv1["Marca"].'</div>
					<div class="b1 tc b3 b4 cg h30 left" width="10%">Proveedor</div>
					<div class="b1 tc b3 b4 h30 left" width="28%">'.$hv1["Proveedor"].'</div>
					<div class="b1 tc b2 b3 b4 cg h30 left" width="10%">Modelo</div>
					<div class="b2 tc b3 b4 h30" style="clear:right;" width="auto">'.$hv1["modelo"].'</div>
				</div>
				<br>
				<H2>2. CONFIGURACIÓN DE HARDWARE</H2>
				<div style="width: 100%">
					<div class="b1 b3 b4 tc left" width="15%">
						<div class="h30 b4 cg tc">Codigo Activo</div>
						<div class="h30 b4 cg tc">Modelo CPU</div>
						<div class="h30 b4 cg tc">Serial CPU</div>
						<div class="h30 b4 cg tc">Procesador</div>
						<div class="h30 b4 cg tc">Mamoria RAM</div>
						<div class="h60 cg tc">Disco Duro</div>
					</div>
					<div class="b1 b3 b4 tc left" width="40%">
						<div class="h30 b4 tc">'.$hv1["idCodigoActivo"].'</div>
						<div class="h30 b4 tc">'.$hv1["ModeloCPU"].'</div>
						<div class="h30 b4 tc">'.$hv1["SerialCPU"].'</div>
						<div class="h30 b4 tc">
							<div class="tc b2 left w40" height="22px">'.$hv1["Procesador"].'</div>
							<div class="tc cg b2 left w30" height="22px">Velocidad</div>
							<div class="tc left" width="29%" height="22px">'.$hv1["VelocidadProcesador"].'</div>
						</div>
						<div class="h30 b4 tc">'.$hv1["RAM"].'</div>
						<div class="h30 b4">
							<div class="tc cg b2 left w40" height="22px">Marca</div>
							<div class="tc cg b2 left w30" height="22px">Capacidad</div>
							<div class="tc cg left" width="29%" height="22px">
								Tecnologia
							</div>
						</div>
						<div class="h30 tc">
							<div class="tc b2 left w40" height="22px">'.$hv1["MarcaDiscoDuro"].'</div>
							<div class="tc b2 left w30" height="22px">'.$hv1["CapacidadDD"].'</div>
							<div class="tc left" width="28%" height="23px">'.$hv1["Tecnologia"].'</div>
						</div>
					</div>
					<div class="b1 b3 b4 tc left" width="21%">
						<div class="h30 b4 cg tc">Marca y/o modelo Monitor</div>
						<div class="h30 b4 cg tc">Serial Monitor /Cod Activo</div>
						<div class="h30 b4 cg tc">Marca y/o modelo Teclado</div>
						<div class="h30 b4 cg tc">Serial Teclado</div>
						<div class="h30 b4 cg tc">Marca y/o modelo Mouse</div>
						<div class="h30 b4 cg tc">Serial Mouse</div>
						<div class="h30 cg tc">Otro</div>
					</div>

					<div class="b1 b2 b3 b4 tc right" width="auto">
						<div class="h30 b4 tc">'.$hv1["MarcaModeloMonitor"].'</div>
						<div style="font-size:8px" class="h30 b4 tc">'.$hv1["SerialMonitorCodigoActivo"].'</div>
						<div class="h30 b4 tc">'.$hv1["MarcaModeloTeclado"].'</div>
						<div class="h30 b4 tc">'.$hv1["SerialTecladoCodigoActivo"].'</div>
						<div class="h30 b4 tc">'.$hv1["MarcaModeloMause"].'</div>
						<div class="h30 b4 tc">'.$hv1["SerialMauseCodigoActivo"].'</div>
						<div class="h30 tc">'.$hv1["otro"].'</div>
					</div>
				</div>
				<br>
				<h2>3.CONFIGURACIÓN EN RED</h2>
				<div style="width: 100%">
					<div class="b1 cg tc b3 h30 left" width="20%">Nombre del Equipo</div>
					<div class="b1 cg tc b3 h30 left" width="8%">En red</div>
					<div class="b1 cg tc b3 h30 left" width="16%">Dirección IP</div>
					<div class="b1 cg tc b3 h30 left " width="22%">Dirección MAC</div>
					<div class="b1 cg tc b3 h30 left " width="16%">Marca</div>
					<div class="b1 cg tc b2 b3 h30 left " width="auto">Velocidad</div>
				</div>
				<div style="width: 100%">
					<div class="b1 tc b3 b4 h30 left " width="20%">'.$hv1["nombrepc"].'</div>
					<div class="b1 tc b3 b4 h30 left" width="8%">'.$hv1["enRed"].'</div>
					<div class="b1 tc b3 b4 h30 left" width="16%">'.$hv1["direccionIP"].'</div>
					<div class="b1 tc b3 b4 h30 left" width="22%">'.$hv1["direccionMAC"].'</div>
					<div class="b1 tc b3 b4 h30 left " width="16%">'.$hv1["marcaTarjetaDeRed"].'</div>
					<div class="b1 tc b2 b3 b4 h30 left " width="auto">'.$hv1["velocidad"].'</div>
				</div>
				<br>
				<h2>4. SISTEMA OPERATIVO INSTALADO</h2>
				<div style="width: 100%">
					<div class="b1 b2 b3 cg tc" style="grid-column-start: 1;	grid-column-end: 8;">Descripción</div>
					<div class="b1 b2 b3 b4 tc" style="grid-column-start: 1;	grid-column-end: 8;">'.$hv1["so"].'</div>
				</div>
				<br>
				<h2>5. MANTENIMIENTOS</h2>';
				$cuentam = 0;
				while ($hm1 = mysqli_fetch_assoc($hm)) {
				$html.='<div style="width: 100%">
					<div class="b1 b2 b3 cg tc">
						Mantenimiento
					</div>
					<div class="b1 b2 b3 left w70">
						<div>
							<div class="h30 tc cg b2 b4 left" width="25%">Fecha Realización</div>
							<div class="h30 tc b2 b4 left" width="25%">'.$hm1["fecha"].'</div>
							<div class="h30 tc cg b2 b4 left" width="25%">Realizo</div>
							<div class="h30 tc b4 left" width="auto">'.$hm1["realizo"].'</div>
						</div>
						<div class="b4 h30 tc cg w100">observaciones</div>
						<div class="w100" height="71px">'.$hm1["observaciones"].'</div>
					</div>
					<div class="b2 b3 b4" width="auto">
						<div class="h30 tc cg b4 w100">Responsable</div>
						<div class="tc b4 w100" height="70px"><img width="auto" height="68" src="'.$hm1["firmaResponsable"].'"></div>
						<div class=" h30 tc w100">'.$hm1["nombreResponsable"].'</div>
					</div>
				</div>
				<br>';
				$cuentam +=1;
				if($cuenta == 2){
					$html.='<br><br><br>';
				}	
				}
				$cuentau = 0;
				$html.='<h2>6. UBICACIÓN ACTUAL</h2>';
				while ($hu1 = mysqli_fetch_assoc($hu)) {
				$html.='<div style="width: 100%">
					<div class="tc cg b1 b3 b4 h30 left" width="25%">Usuario</div>
					<div class="tc cg b1 b3 b4 h30 left" width="25%">Ubicacion </div>
					<div class="tc cg b1 b3 b4 h30 left" width="25%">Fecha</div>
					<div class="tc cg b1 b3 b4 b2 h30 left" width="24%">Firma Responsable</div>
				</div>
				<div style="width: 100%">
					<div class="b1 b4 tc left h60" width="25%">'.$hu1["nombreResponsable"].'</div>
					<div class="b1 b4 tc left h60" width="25%">'.$hu1["UbicacionDentroEmpresa"].'</div>
					<div class="b1 b4 tc left h60" width="25%">'.$hu1["Fecha"].'</div>
					<div class="b1 b4 tc left h60 b2" width="24%"><img width="auto" height="40" src="'.$hu1["FirmaResponsable"].'"></div>
				</div>
				<br>';
				$cuentau +=1;
				if($cuentau == 2){
					$html.='<br><br><br>';
				}
				}
				$html.='<h2>7. RECOMENTACIONES Y/O OBSERVACIONES</h2>
				<div style="width: 100%">
					<div  class="b1 b2 b3 b4 h60 w100">
						<textArea  width="100%" height="70px">'.$hv1["recomendaciones"].'</textArea>
					</div>
				</div>
				<br>
				<br>
				<br>
				<br>
			</div>
		</main>
	</body>
	</html>';
	$mpdf = new \Mpdf\Mpdf();
	//$css = file_get_contents('pdf.css');
	//$mpdf->WriteHTML($css,1);
	$mpdf->WriteHTML($html);
	$mpdf->Output();
} else if($_POST['salida'] == 'save'){
	//guarda cambios
	include 'conexion.php';
	$update ="UPDATE hojadevida SET Marca='$marca',Proveedor='$proveedor',modelo= '$modelo',idCodigoActivo= '$codigoActivo',ModeloCPU= '$modeloCPU',SerialCPU= '$serialCPU',Procesador= '$procesador',VelocidadProcesador= '$velocidad',RAM= '$ram',MarcaDiscoDuro= '$marcaDD',CapacidadDD= '$capacidad',Tecnologia= '$tecnologia',MarcaModeloMonitor = '$monitor',SerialMonitorCodigoActivo= '$serialmonitor',MarcaModeloTeclado= '$teclado',SerialTecladoCodigoActivo= '$serialteclado',MarcaModeloMause= '$mouse',SerialMauseCodigoActivo= '$serialmouse',otro= '$otro',enRed= '$red',direccionIP= '$ip',direccionMAC= '$mac',velocidad= '$velocidadtarjeta',marcaTarjetaDeRed= '$marcatarjeta',so= '$so',recomendaciones= '$recomendaciones' WHERE nombrepc='$nombrepc'";
      $query_update = mysqli_query($con,$update);

      /*if(isset($_POST['n_usrresponsable'])){
      	$insert2 ="INSERT INTO `historialusuarios` (`activoAsociado`, `nombreResponsable`, `UbicacionDentroEmpresa`, `Fecha`,
    `FirmaResponsable`) VALUES ('$nombrepc', '$n_usrresponsable', '$n_ubicacion', '$n_fecha', '$n_firma')";
  mysqli_query($con,$insert2);
      }*/
      

      echo'<script type="text/javascript">
  alert("se guardo cambios exitosamente");
  window.location.href="hojasDeVida.php";
  </script>';

	/*


$update ="UPDATE hojadevida SET Marca='$marca',Proveedor='$proveedor',modelo= '$modelo',ModeloCPU= '$modeloCPU',SerialCPU= '$serialCPU',Procesador= '$procesador',VelocidadProcesador= '$velocidad',RAM= '$ram',MarcaDiscoDuro= '$marcaDD',CapacidadDD= '$capacidad',Tecnologia= '$tecnologia',MarcaModeloMonitor = '$monitor',SerialMonitorCodigoActivo= '$serialmonitor',MarcaModeloTeclado= '$teclado',SerialTecladoCodigoActivo= '$serialteclado',MarcaModeloMause= '$mouse',SerialMauseCodigoActivo= '$serialmouse',otro= '$otro',enRed= '$red',direccionIP= '$ip',direccionMAC= '$mac',velocidad= '$velocidadtarjeta',marcaTarjetaDeRed= '$marcatarjeta',so= '$so',recomendaciones= '$recomendaciones' WHERE nombrepc=$nombrepc";





	*/
}



?>
