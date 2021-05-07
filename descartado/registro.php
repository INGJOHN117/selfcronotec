<?php
session_start();
if(true){
if(isset($_POST['uno'])){
  $_SESSION['registroMantenimiento'] = true;
  $codigoActivo = $_POST['uno'];
  include 'conexion.php';
  $hv = mysqli_query($con,"SELECT distinct * FROM  hojadevida where codigoActivo = '$codigoActivo'");
  $in = mysqli_query($con,"SELECT distinct * FROM  inventario where codigoActivo = '$codigoActivo'");

  $hu = mysqli_query($con,"SELECT  a.nombre, a.proceso, b.fechaEntrega, a.firma FROM usuarios a, historialdeusuarios b WHERE b.codigoActivo = '$codigoActivo' AND a.cedula = b.cedula");
  
  $hm = mysqli_query($con,"SELECT distinct * FROM  historialmantenimiento where codigoActivo = '$codigoActivo'");
  $hv1 = mysqli_fetch_assoc($hv);
  $in1 = mysqli_fetch_assoc($in);
  $hu1 = mysqli_fetch_assoc($hu);
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Registro Mantenimiento</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/5658e61838.js"></script>
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
        <h1 class="title-edit">REGISTRO DE MANTENIMIENTO </h1>
        <form class="registro-hv" action="fileRegistro.php" method="post">
            <div>
                <p>
                    <label for="nombre-pc">Nombre pc</label>
                </p>
                <p>
                    <input type="text" name="nombrepc" id="nombrepc" value="<?php  echo $hv1["nombrepc"];?>" readonly>
                </p>
            </div>
            <br>
            <h2>1. DATOS DEL EQUIPO</h2>
            <div class="inline-container">
                <p class="">
                    <label for="marca">Marca</label>
                </p>
                <p class="">
                    <input type="text" name="marca" id="marca" value="<?php  echo $in1["marca"]; ?>" readonly>
                </p>
                <p class="">
                    <label for="proveedor">Proveedor</label>
                </p>
                <p class="">
                    <input type="text" name="proveedor" id="proveedor" value="<?php  echo $in1["proveedor"]; ?>"
                        readonly>
                </p>
                <p class="">
                    <label for="modelo">Modelo</label>
                </p>
                <p class="">
                    <input type="text" name="modelo" id="modelo" value="<?php  echo $in1["modelo"]; ?>" readonly>
                </p>
            </div>
            <h2>2. CONFIGURACIÓN DE HARDWARE</h2>
            <div class="inline-container">
                <div class="inline-item">
                    <p>
                        <label class="p_label" for="codigoActivo">Código Activo</label>
                        <input type="text" name="codigoActivo" id="codigoActivo"
                            value="<?php  echo $hv1["codigoActivo"]; ?>" readonly>
                    </p>
                    <p>
                        <label for="modeloCPU">Modelo CPU</label>
                        <input type="text" name="modeloCPU" id="modeloCPU" value="<?php  echo $hv1["modeloCPU"]; ?>"
                            readonly>
                    </p>
                    <p>
                        <label for="serialCPU">Serial CPU</label>
                        <input type="text" name="serialCPU" id="serialCPU" value="<?php  echo $hv1["serialCPU"]; ?>"
                            readonly>
                    </p>
                    <p>
                        <label for="procesador">Procesador</label>
                        <input type="text" name="procesador" id="procesador" value="<?php  echo $hv1["procesador"]; ?>"
                            readonly>
                    </p>
                    <p>
                        <label for="velocidad">Velocidad CPU</label>
                        <input type="text" name="velocidad" id="velocidad"
                            value="<?php  echo $hv1["velocidadProcesador"]; ?>" readonly>
                    </p>
                    <p>
                        <label for="ram">Memoria RAM</label>
                        <input type="text" name="ram" id="ram" value="<?php  echo $hv1["ram"]; ?>" readonly>
                    </p>
                    <p>
                        <label for="marcaDD">Marca DD</label>
                        <input type="text" name="marcaDD" id="marcaDD" value="<?php  echo $hv1["marcaDD"]; ?>" readonly>
                    </p>
                    <p>
                        <label for="capacidad">Capacidad DD</label>
                        <input type="text" name="capacidad" id="capacidad" value="<?php  echo $hv1["capacidadDD"]; ?>"
                            readonly>
                    </p>

                </div>
                <div class="inline-item">
                    <p>
                        <label for="tecnologia">Tecnologia DD</label>
                        <input type="text" name="tecnologia" id="tecnologia"
                            value="<?php  echo $hv1["tecnologiaDD"]; ?>" readonly>
                    </p>
                    <p>
                        <label for="monitor">Marca y/o modelo Monitor</label>
                        <input type="text" name="monitor" id="monitor" value="<?php  echo $hv1["mmMonitor"]; ?>"
                            readonly>
                    </p>
                    <p>
                        <label for="serialmonitor">Serial Monitor / Cod Activo</label>
                        <input type="text" name="serialmonitor" id="serialmonitor"
                            value="<?php  echo $hv1["scMonitor"]; ?>" readonly>
                    </p>
                    <p>
                        <label for="teclado">Marca y/o modelo Teclado</label>
                        <input type="text" name="teclado" id="teclado" value="<?php  echo $hv1["mmTeclado"]; ?>"
                            readonly>
                    </p>
                    <p>
                        <label for="serialteclado">Serial Teclado</label>
                        <input type="text" name="serialteclado" id="serialteclado"
                            value="<?php  echo $hv1["scTeclado"]; ?>" readonly>
                    </p>
                    <p>
                        <label for="mouse">Marca y/o modelo Mouse</label>
                        <input type="text" name="mouse" id="mouse" value="<?php  echo $hv1["mmMouse"]; ?>" readonly>
                    </p readonly>
                    <p>
                        <label for="serialmouse">Serial Mouse</label>
                        <input type="text" name="serialmouse" id="serialmouse"
                            value="<?php  echo $hv1["scMouse"]; ?>" readonly>
                    </p>
                    <p>
                        <label for="otro">Otro</label>
                        <input type="text" name="otro" id="otro" value="<?php  echo $hv1["otro"]; ?>" readonly>
                    </p>
                </div>
            </div>
            <h2>3. CONFIGURACIÓN DE RED</h2>
            <div class="">
                <table>
                    <tr>
                        <th><label for="nombreequipo">Nombre del Equipo</label></th>
                        <th><label for="red">En red</label></th>
                        <th><label for="ip">Dirección IP</label></th>
                        <th><label for="mac">Dirección MAC</label></th>
                        <th><label for="velocidadtarjeta">Velocidad</label></th>
                        <th><label for="marcatarjeta">Marca</label></th>
                    </tr>
                    <tr>
                        <td>
                            <input class="text-input text-input-center" type="text" name="nombreequipo"
                                id="nombreequipo" value="<?php  echo $hv1["nombrepc"]; ?>" placeholder="Nombre Equipo"
                                readonly></input>
                        </td>
                        <td>
                            <input class="text-input text-input-center" type="text" name="red" id="red"
                                value="<?php  echo $hv1["enRed"]; ?>" placeholder="SI/NO" readonly></input>
                        </td>
                        <td>
                            <input class="text-input text-input-center" type="text" name="ip" id="ip"
                                value="<?php  echo $hv1["ip"]; ?>" placeholder="IP" readonly></input>
                        </td>
                        <td>
                            <input class="text-input text-input-center" type="text" name="mac" id="mac"
                                value="<?php  echo $hv1["mac"]; ?>" placeholder="MAC" readonly></input>
                        </td>
                        <td>
                            <input class="text-input text-input-center" type="text" name="velocidadtarjeta"
                                id="velocidadtarjeta" value="<?php  echo $hv1["velocidadTR"]; ?>" placeholder="Marca"
                                readonly></input>
                        </td>
                        <td><input class="text-input text-input-center" type="text" name="marcatarjeta"
                                id="marcatarjeta" value="<?php  echo $hv1["marcaTR"]; ?>"
                                placeholder="Velocidad" readonly></input></td>
                    </tr>
                </table>
            </div>
            <h2>4. SISTEMA OPERATIVO INSTALADO</h2>
            <div class="">
                <p>
                    <label for="so">Descripción</label>
                    <input type="text" name="so" id="so" value="<?php  echo $hv1["so"];?>"
                        placeholder="Sistema Operativo" readonly>
                </p>
            </div>
            <h2>5. MANTENIMIENTO</h2>
            <div class="">
                <div class="">
                    <p>
                        <label for="fecha-realizacion">Fecha Realización</label>
                        <input required type="date" name="fecharealizacion" id="fecharealizacion" value="">
                    </p>
                    <label for="realizo">Realizó</label>
                    <input required type="text" name="realizo" id="realizo" placeholder="Nombre Profesional de Apoyo"
                        value="">
                    <p>
                        <label for="observaciones">Observaciones</label>
                        <textarea required name="observaciones" id="observaciones" rows="8" cols="80"></textarea>
                    </p>
                </div>
                <div class="">
                    <p>
                        <label for="responsable">Responsable</label>
                        <input required type="text" name="usrresponsable" id="usrresponsable" value=""
                            placeholder="Nombre Responsable">
                    </p>
                    <div id="dv" style="border:none" width="100%">
                        <canvas required id="canvas" style="border:solid black 2px;"></canvas>
                    </div>
                    <button id="clear-firm" type="button" name="button" class="boton_personalizado">Borrar
                        firma</button>
                    <button id="send-firm" type="button" name="button" style="display: none">Enviar Firma</button>
                    <textarea required id="data-url" name="data-url" width="100%" style="display: none">
              </textarea>
                    <img id="img-firm" width="100%" src="" height="auto" alt="">
                </div>
            </div>
            <h2>6. UBICACIÓN ACTUAL</h2>
            <div class="">
                <table class="egt">
                    <tr>
                        <th><label for="usrresponsable"> Usuario Responsable</label></th>
                        <th><label for="ubicacion"> Ubicación dentro de la empresa</label></th>
                        <th><label for="fecha"> Fecha</label></th>
                        <th><label for="firma"> Firma Responsable</label></th>
                    </tr>
                    <tr>
                        <td>
                            <input class="text-input-center" type="text" name="usrresponsable" id="usrresponsable"
                                value="<?php echo $hu1["nombre"]; ?>" readonly></input>
                        </td>
                        <td>
                            <input class="text-input-center" type="text" name="ubicacion" id="ubicacion"
                                value="<?php echo $hu1["proceso"];?>" readonly></input>
                        </td>
                        <td class="padding-bottom-edit">
                            <input class="text-input-center" type="date" name="fecha" id="fecha"
                                value="<?php echo $hu1["fechaEntrega"];?>" readonly></input>
                        </td>
                        <td>
                            <img height="30px" src="<?php echo $hu1["firma"];?>">
                        </td>
                    </tr>
                </table>
            </div>
            <h2><label for="recomendaciones">7. RECOMENDACIONES Y/O OBSERVACIONES</label></h2>
            <div class="">
                <p>
                    <textarea name="recomendaciones" name="recomendaciones" id="recomendaciones" rows="8" cols="80"
                        readonly><?php  echo $hv1["recomendaciones"];?></textarea>
                </p>
            </div>
            <div class="button-container">
                <button type="submit" class="boton_personalizado" name="button">GUARDAR</button>
            </div>
            <br>
            <br>
            <br>
            <br>
        </form>
    </section>
    <script src="firm.js" type="text/javascript"></script>
</body>

</html>
<?php
    }else {
    /*==========================================================================*/
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Registro Nuevo Equipo</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/5658e61838.js"></script>
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
        <h1 class="title-edit">REGISTRO NUEVO EQUIPO </h1>
        <form class="registro-hv" action="fileRegistro.php" method="post">
            <div>
                <p>
                    <label for="nombre-pc">Nombre pc</label>
                </p>
                <p>
                    <input type="text" name="nombrepc" id="nombrepc" value="">
                </p>
            </div>
            <br>
            <h2>1. DATOS DEL EQUIPO</h2>
            <div class="inline-container">
                <p class="">
                    <label for="marca">Marca</label>
                </p>
                <p class="">
                    <input required type="text" name="marca" id="marca" value="">
                </p>
                <p class="">
                    <label for="proveedor">Proveedor</label>
                </p>
                <p class="">
                    <input type="text" name="proveedor" id="proveedor" value="">
                </p>
                <p class="">
                    <label for="modelo">Modelo</label>
                </p>
                <p class="">
                    <input required type="text" name="modelo" id="modelo" value="">
                </p>
            </div>
            <h2>2. CONFIGURACIÓN DE HARDWARE</h2>
            <div class="inline-container">
                <div class="inline-item">
                    <p>
                        <label class="p_label" for="codigoActivo">Código Activo</label>
                        <input required type="text" name="codigoActivo" id="codigoActivo" value="">
                    </p>
                    <p>
                        <label for="modeloCPU">Modelo CPU</label>
                        <input required type="text" name="modeloCPU" id="modeloCPU" value="">
                    </p>
                    <p>
                        <label for="serialCPU">Serial CPU</label>
                        <input required type="text" name="serialCPU" id="serialCPU" value="">
                    </p>
                    <p>
                        <label for="procesador">Procesador</label>
                        <input type="text" name="procesador" id="procesador" value="">
                    </p>
                    <p>
                        <label for="velocidad">Velocidad CPU</label>
                        <input type="text" name="velocidad" id="velocidad" value="">
                    </p>
                    <p>
                        <label for="ram">Memoria RAM</label>
                        <input type="text" name="ram" id="ram" value="">
                    </p>
                    <p>
                        <label for="marcaDD">Marca DD</label>
                        <input type="text" name="marcaDD" id="marcaDD" value="">
                    </p>
                    <p>
                        <label for="capacidad">Capacidad DD</label>
                        <input type="text" name="capacidad" id="capacidad" value="">
                    </p>

                </div>
                <div class="inline-item">
                    <p>
                        <label for="tecnologia">Tecnologia DD</label>
                        <input type="text" name="tecnologia" id="tecnologia" value="">
                    </p>
                    <p>
                        <label for="monitor">Marca y/o modelo Monitor</label>
                        <input required type="text" name="monitor" id="monitor" value="">
                    </p>
                    <p>
                        <label for="serialmonitor">Serial Monitor / Cod Activo</label>
                        <input required type="text" name="serialmonitor" id="serialmonitor" value="">
                    </p>
                    <p>
                        <label for="teclado">Marca y/o modelo Teclado</label>
                        <input type="text" name="teclado" id="teclado" value="">
                    </p>
                    <p>
                        <label for="serialteclado">Serial Teclado</label>
                        <input type="text" name="serialteclado" id="serialteclado" value="">
                    </p>
                    <p>
                        <label for="mouse">Marca y/o modelo Mouse</label>
                        <input type="text" name="mouse" id="mouse" value="">
                    </p>
                    <p>
                        <label for="serialmouse">Serial Mouse</label>
                        <input type="text" name="serialmouse" id="serialmouse" value="">
                    </p>
                    <p>
                        <label for="otro">Otro</label>
                        <input type="text" name="otro" id="otro" value="">
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
                        <!--<td><input required class="text-input required-center" type="text" name="nombreequipo" id="nombreequipo"value="" placeholder="Nombre Equipo"></input required></td>-->
                        <td>
                            <input class="text-input-center" type="text" name="red" id="red" value=""
                                placeholder="SI/NO"></input>
                        </td>
                        <td>
                            <input class="text-input-center" type="text" name="ip" id="ip" value=""
                                placeholder="IP"></input>
                        </td>
                        <td>
                            <input class="text-input-center" type="text" name="mac" id="mac" value=""
                                placeholder="MAC"></input>
                        </td>
                        <td>
                            <input class="text-input-center" type="text" name="velocidadtarjeta" id="velocidadtarjeta"
                                value="" placeholder="Velocidad Tarjeta"></input>
                        </td>
                        <td>
                            <input class="text-input-center" type="text" name="marcatarjeta" id="marcatarjeta" value=""
                                placeholder="Marca Tarjata"></input>
                        </td>
                    </tr>
                </table>
            </div>
            <h2>4. SISTEMA OPERATIVO INSTALADO</h2>
            <div class="">
                <p>
                    <label for="so">Descripción</label>
                    <input type="text" name="so" id="so" value="" placeholder="Sistema Operativo">
                </p>
            </div>
            <!--
          <h2>5. MANTENIMIENTO</h2>
          <div class="">
            <div class="">
              <p>
                <label for="fecha-realizacion">Fecha Realización</label>
                <input required type="date" name="fecharealizacion" id="fecharealizacion" name="fechaMantenimiento" value="">
              </p>
                <label for="realizo">Realizó</label>
                <input required type="text" name="realizo" id="realizo" placeholder="Nombre Profesional de Apoyo"name="nombreProfesionalApoyo" value="">
              <p>
                <label for="observaciones">Observaciones</label>
                <textarea name="observaciones" id="observaciones" rows="8" cols="80"></textarea>
              </p>
            </div>
            <div class="">
              <p>
                <label for="responsable">Responsable</label>
                <input required type="text" name="responsable" id="responsable" name="nombreResponsableDeMantenimiento" value="" placeholder="Nombre Responsable">
              </p>
              <p>
                <label for="responsable"> Firma Responsable</label>
                <input required type="text" name="firmaResponsable" id="firmaResponsable" value="" placeholder="Firma Responsable">
              </p>
            </div>
          </div>
        -->
            <h2>5. UBICACIÓN ACTUAL</h2>
            <div class="">
                <table class="egt">
                    <tr>
                        <th><label for="usrresponsable"> Usuario Responsable</label></th>
                        <th><label for="ubicacion"> Ubicación dentro de la empresa</label></th>
                        <th><label for="fecha"> Fecha</label></th>
                        <th><label for="entrega">Entrega</label></th>
                    </tr>
                    <tr>
                        <td>
                            <input class="text-input-center" type="text" name="usrresponsable" id="usrresponsable"
                                placeholder="Nombre Usuario"></input>
                        </td>
                        <td>
                            <input class="text-input-center" type="text" name="ubicacion" id="ubicacion"
                                placeholder="Oficina a Cargo"></input>
                        </td>
                        <td class="padding-bottom-edit">
                            <input class="text-input-center" type="date" name="fecha" id="fecha"></input>
                        </td>
                        <td>
                            <input class="text-input-center" type="text" name="realizo" id="realizo"
                                placeholder="Nombre"></input>
                        </td>
                    </tr>
                </table>
                <div id="dv" style="border:none" width="100%">
                    <label for="canvas">Firma Usr Responsable</label>
                    <canvas id="canvas" style="border:solid black 2px;"></canvas>
                </div>
                <button id="clear-firm" type="button" name="button" class="boton_personalizado">Borrar firma</button>
                <button id="send-firm" type="button" name="button" style="display: none">Enviar Firma</button>
                <textarea id="data-url" name="data-url" width="100%" style="display: none">
    				</textarea>
                <img id="img-firm" width="100%" src="" alt="">
            </div>

            <h2><label for="recomendaciones">6. RECOMENDACIONES Y/O OBSERVACIONES</label></h2>
            <div class="">
                <p>
                    <textarea name="recomendaciones" name="recomendaciones" id="recomendaciones" rows="8"
                        cols="80"></textarea>
                </p>
            </div>
            <input style="display: none" type="text" id="nuevo" name="nuevo" value="nuevo">
            <div class="button-container">
                <button id="" type="submit" class="boton_personalizado" name="button">GUARDAR</button </div>
                <br>
                <br>
                <br>
                <br>
        </form>
    </section>
    <script src="firm.js" type="text/javascript"></script>
</body>

</html>
<?php
}
}else{
  header("location: denied.php");
} ?>