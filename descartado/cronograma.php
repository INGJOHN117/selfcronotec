<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>MENU</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/5658e61838.js"></script>
</head>

<body>
    <div style="float:right">
        <label style="font-size: 20px; margin-right: 10px"><?php echo $_SESSION['user'];?></label>
        <a href="denied.php">
            <i style="font-size: 40px; margin-right: 20px" class="iconAccept fas fa-power-off"></i>
        </a>
    </div>
    <header>
        <div id="menu">
            <nav>
                <ul>
                    <img src="img/small.png">
                    <a href="index.php"><strong>CRONOGRAMA</strong></a>
                    <a href="registro.php"><strong> NUEVO EQUIPO</strong></a>
                    <a href="hojasDeVida.php"><strong>HOJAS DE VIDA</strong></a>
                    <a href="inactivos.php"><strong>INACTIVOS</strong></a>
                </ul>
            </nav>
        </div>
    </header>
    <section id="cronograma">
        <h1 class="title-edit">CALENDARIO DE MANTENIMIENTO</h1>
        <div class="grid">
            <table class="egt">
                <tr>
                    <th><label for="idCodigoActivo">NOMBRE PC</label></th>
                    <th><label for="usr-responsable">OFICINA/DEPENDENCIA</label></th>
                    <th><label for="nombrepc">PROXIMO MANTENIMIENTO</label></th>
                </tr>
                <br>
                <?php
          /*aqui inicia php*/
          include 'conexion.php';
          $resultado = mysqli_query($con,"SELECT DISTINCT
          a.codigoActivo,
          a.nombrepc,
          (SELECT DISTINCT
                  g.proceso
              FROM
                  usuarios g,  historialdeusuarios l
              WHERE
                  a.codigoActivo = l.codigoActivo AND l.cedula = g.cedula
              ORDER BY l.fechaEntrega DESC
              LIMIT 1) AS proceso,
          (SELECT DISTINCT
                  u.nombre
              FROM
                  usuarios u, historialdeusuarios h
              WHERE
                  a.codigoActivo = h.codigoActivo AND h.cedula = u.cedula
              ORDER BY h.fechaEntrega DESC
              LIMIT 1) AS nombreResponsable,
          (SELECT 
                  MAX(e.fecha)
              FROM
                  historialdemantenimiento e
              WHERE
                  e.codigoActivo = a.codigoActivo) AS fecha
      FROM
          hojadevida a
      WHERE
          a.estado = 'activo'
      GROUP BY a.codigoActivo , fecha
      ORDER BY fecha ASC;");
          $fecha_actual = date("Y-m-d");
          while($consulta = mysqli_fetch_array($resultado))
          {
            ?>
                <form class="" action="registro.php" method="post">
                    <tr>
                        <td>
                            <input type="hidden" name="uno" id="uno" value="<?php echo $consulta['codigoActivo'];?>">
                            <input class="text-input-center" style="border-bottom:none;
                <?php if(date('Y-m-d', strtotime($consulta['fecha'].'+ 3 month')) >= $fecha_actual){
                  echo 'background:rgb(157, 247, 112);';
                  }elseif(date('Y-m-d', strtotime($consulta['fecha'].'+ 4 month')) <= $fecha_actual)
                  {echo 'background:rgb(247, 157, 61);';
                  }else{
                    echo 'background:rgb(247, 255, 126);';
                  }?>
                 height:50px;" type="text" name="dos" id="dos" value="<?php echo $consulta['nombrepc'];?>"
                                readonly="readonly"></input>
                        </td>
                        <!--rojo 255, 211, 211
            verde 217, 255, 211 
            amarillo 247, 255, 126 -->
                        <td>
                            <input class="text-input-center" style="border-bottom:none;
              <?php if(date('Y-m-d', strtotime($consulta['fecha'].'+ 3 month')) >= $fecha_actual){
                echo 'background:rgb(157, 247, 112);';
                }elseif(date('Y-m-d', strtotime($consulta['fecha'].'+ 4 month')) <= $fecha_actual)
                {echo 'background:rgb(247, 157, 61);';
                }else{
                  echo 'background:rgb(247, 255, 126);';
                }?>
                height:50px;" type="text" name="tres" id="tres"
                                value="<?php echo $consulta['proceso'];?>" readonly="readonly"></input>
                        </td>
                        <td>
                            <input class="text-input-center" style="border-bottom:none;
              <?php if(date('Y-m-d', strtotime($consulta['fecha'].'+ 3 month')) >= $fecha_actual){
                echo 'background:rgb(157, 247, 112);';
                }elseif(date('Y-m-d', strtotime($consulta['fecha'].'+ 4 month')) <= $fecha_actual)
                {echo 'background:rgb(247, 157, 61);';
                }else{
                  echo 'background:rgb(247, 255, 126);';
                }?>
              height:50px;" type="text" name="cinco" id="cinco"
                                value="<?php echo $consulta['fecha']." =>  ".date('Y-m-d', strtotime($consulta['fecha'].'+ 4 month'));?>"
                                readonly="readonly"></input>
                        </td>
                        <td>
                            <div>
                                <button type="submit" class="accept"><i
                                        class="iconAccept fas fa-check-double"></i></button>
                            </div>
                        </td>
                    </tr>
                </form>
                <?php
          }
          ?>
            </table>
        </div>
    </section>
    <br><br><br><br>
</body>

</html>
<?php
 ?>