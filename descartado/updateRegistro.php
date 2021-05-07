<?php
session_start();
//$nombrepc = $_POST['nombrepc'];
$nombrepc = '0224-05126';
include 'conexion.php';
$hv = mysqli_query($con,"SELECT distinct * FROM  hojadevida where codigoActivo = '$nombrepc'");
$hu = mysqli_query($con,"SELECT distinct * FROM  historialdeusuarios where codigoActivo = '$nombrepc'");
$hm = mysqli_query($con,"SELECT distinct * FROM  historialdemantenimiento where codigoActivo = '$nombrepc'");
$hv1 = mysqli_fetch_assoc($hv);
if(true){
//$codigoActivo ='1990';
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>VIEW/UPDATE</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="https://kit.fontawesome.com/5658e61838.js"></script>
  </head>
  <body>
    <header>
      <section id="menu">
        <nav>
          <ul>
            <img src="img/small.png" alt="">
            <a href="index.php"><strong>CRONOGRAMA</strong></a>
            <a href="registro.php"><strong>REGISTRO</strong></a>
            <a href="hojasDeVida.php"><strong>HOJAS DE VIDA</strong></a>
            <a href="inactivos.php"><strong>INACTIVOS</strong></a>
          </ul>
        </nav>
      </section>
    </header>
    <section id="cuerpo">
      <h1 class="title-edit">HOJA DE VIDA ACTIVO <?php  echo $hv1["codigoActivo"] ?></h1>
      <form  id="myform" class="registro-hv" action="prinfPdf.php" method="post">
        <div>
          <p>
            <label for="nombre-pc">Nombre pc</label>
          </p>
          <p>
            <input type="text" name="nombrepc"  id="nombrepc" value="<?php  echo $hv1["nombrepc"]; ?>">
          </p>
        </div>
        <br>
        <h2>1. DATOS DEL EQUIPO</h2>
        <div class="inline-container">
          <p class="">
            <label for="marca">Marca</label>
          </p>
          <p class="">
            <input required type="text" name="marca" id="marca" value="<?php  echo $hv1["marca"]; ?>">
          </p>
          <p class="">
            <label for="proveedor">Proveedor</label>
          </p>
          <p class="">
            <input type="text" name="proveedor" id="proveedor" value="<?php  echo $hv1["proveedor"]; ?>">
          </p>
          <p class="">
            <label for="modelo">Modelo</label>
          </p>
          <p class="">
            <input required type="text" name="modelo" id="modelo" value="<?php  echo $hv1["modelo"]; ?>">
          </p>
        </div>
        <h2>2. CONFIGURACIÓN DE HARDWARE</h2>
        <div class="inline-container">
          <div class="inline-item">
            <p>
              <label  class="p_label" for="codigoActivo">Código Activo</label>
              <input required type="text" name="codigoActivo" id="codigoActivo" value="<?php  echo $hv1["codigoActivo"]; ?>">
            </p>
            <p>
              <label for="modeloCPU">Modelo CPU</label>
              <input  require type="text" name="modeloCPU"  id="modeloCPU"value="<?php  echo $hv1["modeloCPU"]; ?>">
            </p>
            <p>
              <label for="serialCPU">Serial CPU</label>
              <input required type="text" name="serialCPU" id="serialCPU" value="<?php  echo $hv1["serialCPU"]; ?>">
            </p>
            <p>
              <label for="procesador">Procesador</label>
              <input type="text" name="procesador" id="procesador" value="<?php  echo $hv1["procesador"]; ?>">
            </p>
            <p>
              <label for="velocidad">Velocidad</label>
              <input type="text" name="velocidad" id="velocidad" value="<?php  echo $hv1["velocidadProcesador"]; ?>">
            </p>
            <p>
              <label for="ram">Memoria RAM</label>
              <input type="text" name="ram" id="ram"value="<?php  echo $hv1["ram"]; ?>">
            </p>
            <p>
              <label for="marcaDD">Marca DD</label>
              <input type="text" name="marcaDD" id="marcaDD" value="<?php  echo $hv1["marcaDD"]; ?>">
            </p>
            <p>
              <label for="capacidad">Capacidad DD</label>
              <input type="text" name="capacidad" id="capacidad" value="<?php  echo $hv1["capacidadDD"]; ?>">
            </p>

          </div>
          <div class="inline-item">
            <p>
              <label for="tecnologia">Tecnologia DD</label>
              <input type="text" name="tecnologia" id="tecnologia" value="<?php  echo $hv1["tecnologiaDD"]; ?>">
            </p>
            <p>
              <label for="monitor">Marca y/o modelo Monitor</label>
              <input required type="text" name="monitor" id="monitor" value="<?php  echo $hv1["mmMonitor"]; ?>">
            </p>
            <p>
              <label for="serialmonitor">Serial Monitor / Cod Activo</label>
              <input required type="text" name="serialmonitor" id="serialmonitor" value="<?php  echo $hv1["scMonitor"]; ?>">
            </p>
            <p>
              <label for="teclado">Marca y/o modelo Teclado</label>
              <input type="text" name="teclado" id="teclado" value="<?php  echo $hv1["mmTeclado"]; ?>">
            </p>
            <p>
              <label for="serialteclado">Serial Teclado</label>
              <input type="text" name="serialteclado" id="serialteclado" value="<?php  echo $hv1["scTeclado"]; ?>">
            </p>
            <p>
              <label for="mouse">Marca y/o modelo Mouse</label>
              <input type="text" name="mouse" id="mouse" value="<?php  echo $hv1["mmMouse"]; ?>">
            </p>
            <p>
              <label for="serialmouse">Serial Mouse</label>
              <input type="text" name="serialmouse" id="serialmouse" value="<?php  echo $hv1["scMouse"]; ?>">
            </p>
            <p>
              <label for="otro">Otro</label>
              <input type="text" name="otro" id="otro" value="<?php  echo $hv1["otro"]; ?>">
            </p>
          </div>
        </div>
        <h2>3. CONFIGURACIÓN DE RED</h2>
        <div class="">
          <table>
            <tr>
              <!--<th><label for="nombreequipo">Nombre del Equipo</label></th>-->
              <th><label for="red">En red</label></th>
              <th><label for="ip">Dirección IP</label></th>
              <th><label for="mac">Dirección MAC</label></th>
              <th><label for="velocidadtarjeta">Velocidad</label></th>
              <th><label for="marcatarjeta">Marca</label></th>
            </tr>
            <tr>
              <!--
              <td>
                <input class="text-input-center" type="text" name="nombreequipo" id="nombreequipo"value="<?php  echo $hv1["nombrepc"]; ?>" placeholder="Nombre Equipo" readonly></input>
              </td>-->

              <td>
                <input class="text-input-center" type="text" name="red" id="red" value="<?php  echo $hv1["enRed"]; ?>"placeholder="SI/NO"></input>
              </td>
              <td>
                <input class="text-input-center" type="text" name="ip" id="ip" value="<?php echo $hv1["ip"]; ?>"placeholder="IP"></input>
              </td>
              <td>
                <input class="text-input-center" type="text" name="mac" id="mac" value="<?php  echo $hv1["mac"]; ?>"placeholder="MAC"></input>
              </td>
              <td>
                <input class="text-input-center" type="text" name="velocidadtarjeta" id="velocidadtarjeta" value="<?php  echo $hv1["velocidadTR"]; ?>"placeholder="Marca"></input>
              </td>
              <td>
                <input class="text-input-center" type="text" name="marcatarjeta" id="marcatarjeta" value="<?php  echo $hv1["marcaTR"]; ?>"placeholder="Velocidad">
                </input>
              </td>
            </tr>
          </table>
        </div>
        <h2>4. SISTEMA OPERATIVO INSTALADO</h2>
        <div class="">
          <p>
            <label for="so">Descripción</label>
            <input type="text" name="so" id="so" value="<?php  echo $hv1["so"];?>" placeholder="Sistema Operativo">
          </p>
        </div>
        <h2>5.  HISTORIAL MANTENIMIENTO</h2>
        <?php
        while ($hm1 = mysqli_fetch_assoc($hm)) {
        ?>
        <div class="">
          <table class="egt">
            <tr>
              <th><label for="fecha-realizacion">Fecha Realización</label></th>
              <th><label for="realizo">Realizó</label></th>
              <th><label for="responsable">Usr Responsable</label></th>
              <th><label for="responsable">Firma</label></th>
            </tr>
            <br>
            <tr>
              <td class="padding-bottom-edit">
                <input type="date" name="fecharealizacion" id="fecharealizacion" name="fechaMantenimiento" value="<?php  echo $hm1["fecha"];?>" readonly>
              </td>

              <td>
                <input type="text" name="realizo" id="realizo" placeholder="Nombre Profesional de Apoyo"name="nombreProfesionalApoyo" value="<?php  echo $hm1["realizo"];?>" readonly>
              </td>

              <td>
                <input type="text" name="responsable" id="responsable" name="nombreResponsableDeMantenimiento" value="<?php  echo $hm1["realizo"];?>" placeholder="Nombre Responsable" readonly>
              </td>

              <td>
                <img id="firma" name="firma"  height="50" src="<?php  echo $hm1["realizo"];?>">
              </td>
            </tr>
            <tr>
              <td>
                <p>
                  <label for="observaciones">Observaciones</label>
                  <textarea name="observaciones" id="observaciones" rows="8" cols="80" placeholder=""readonly><?php  echo $hm1["observaciones"];?></textarea>
                </p>
              </td>
            </tr>
          </table>
        </div>
        
        <?php } ?>

        <h2>6. HISTORIAL USUARIOS</h2>
        <?php
        while ($hu1 = mysqli_fetch_assoc($hu)) {
        ?>
        <div class="">
          <table>
            <tr>
              <th><label for="usrresponsable"> Usuario Responsable</label></th>
              <th><label for="ubicacion"> Ubicación dentro de la empresa</label></th>
              <th><label for="fecha"> Fecha</label></th>
              <th><label for="firma"> Firma Responsable</label></th>
            </tr>
            <tr>
              <td>
                <input class="text-input-center" type="text" name="usrresponsable" id="usrresponsable" value="<?php echo $hu1["cedula"]; ?>" readonly></input>
              </td>
              <td>
                <input class="text-input-center" type="text" name="ubicacion" id="ubicacion" value="<?php echo $hu1["codigoActivo"];?>" readonly></input>
              </td>
              <td class="padding-bottom-edit">
                <input class="text-input-center" type="date" name="fecha" id="fecha" value="<?php echo $hu1["fechaEntrega"];?>" readonly></input>
              </td>
              <td>
                <img id="firma" name="firma"  height="50" src="<?php  echo $hu1["cedula"];?>">
              </td>
            </tr>
          </table>
        </div>
        <?php } ?>
        <h2>NUEVO USUARIO</h2>
        <div>
          <table>
            <tr>
              <th><label for="n_usrresponsable"> Usuario Responsable</label></th>
              <th><label for="n_ubicacion"> Ubicación dentro de la empresa</label></th>
              <th><label for="n_fecha"> Fecha</label></th>
            </tr>
            <tr>
              <td>
                <input class="text-input-center" type="text" name="n_usrresponsable" id="n_usrresponsable" placeholder="Nombre usuario"></input>
              </td>
              <td>
                <input class="text-input-center" type="text" name="n_ubicacion" id="n_ubicacion" placeholder="Ubicación"></input>
              </td>
              <td class="padding-bottom-edit">
                <input class="text-input-center" type="date" name="n_fecha" id="n_fecha"></input>
              </td>
            </tr>
          </table>
          <div  id="dv"  style="border:none" width="100%">
            <label for="canvas">Firma Usr Responsable</label>
            <canvas id="canvas" style="border:solid black 2px;"></canvas>
          </div>
          <button id="clear-firm" type="button" name="button" class="boton_personalizado">Borrar firma</button>
          <button id="send-firm" type="button" name="button" style="display: none">Enviar Firma</button>
          <textarea id="data-url" name="data-url" width="100%" style="display: none">
          </textarea>
          <img id="img-firm" width="100%" src="" alt="">
        </div>

        <h2><label for="recomendaciones">7. RECOMENDACIONES Y/O OBSERVACIONES</label></h2>
        <div class="">
          <p>
            <textarea name="recomendaciones" name="recomendaciones" id="recomendaciones" rows="8" cols="80"><?php echo $hv1["recomendaciones"];?></textarea>
          </p>
          <input style="display: none" type="text" id="salida" name="salida" value="save"><br>
        </div>

        
        <div class="button-container">
          <button type="button" class="boton_personalizado" id="pdf" name="pdf" value="pdf">GENERAR .pdf</button>
          <button type="submit" class="boton_personalizado" id="save" name="save" value="save">Guardar</button>
        </div>
      </form>
    </section>
    <script type="text/javascript">
      var form = document.getElementById('myform');
      form.onsubmit = function() {
          form.target = '_self';
      };
     
      var tipo = document.getElementById('salida');
      document.getElementById('pdf').onclick = function() {
          tipo.value = "pdf";
          form.target = '_blank';
          console.log(form);
          form.submit();
      }
    </script>
    <script src="firm.js" type="text/javascript"></script>
  </body>
</html>
<?php
}else{

  header("location: denied.php");
}

 ?>
