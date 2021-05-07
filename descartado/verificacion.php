<?php
$user = $_POST['user'];
$pswd = $_POST['password'];
session_start();
echo $user;

if(strcmp('Admin', $user) == 0 && strcmp('123', $pswd) == 0 ){
  $_SESSION['user'] = $user;
  $_SESSION['pswd'] = $pswd;
  header('Location: index.php',true);
}else {
  $_SESSION['user'] = "";
  $_SESSION['pswd'] = "";
  $_SESSION['error'] = true;
  session_destroy();
  //header('Location: denied.php',true);
  echo'<script type="text/javascript">
  alert("USUARIO O CONTRASEÑA INCORRECTOS");
  window.location.href="denied.php";
  </script>';
}



/*
session_start();
   
  // Obtengo los datos cargados en el formulario de login.
  $email = $_POST['email'];
  $password = $_POST['password'];
   
  // Datos para conectar a la base de datos.
  $nombreServidor = "localhost";
  $nombreUsuario = "root";
  $passwordBaseDeDatos = "";
  $nombreBaseDeDatos = "prueba";
  
  // Crear conexión con la base de datos.
  $conn = new mysqli($nombreServidor, $nombreUsuario, $passwordBaseDeDatos, $nombreBaseDeDatos);
   
  // Validar la conexión de base de datos.
  if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);
  }
   
  // Consulta segura para evitar inyecciones SQL.
  $sql = sprintf("SELECT * FROM usuarios WHERE email='%s' AND password = %s", mysql_real_escape_string($email), mysql_real_escape_string($password));
  $resultado = $conn->query($sql);
   
  // Verificando si el usuario existe en la base de datos.
  if($resultado){
    // Guardo en la sesión el email del usuario.
    $_SESSION['email'] = $email;
     
    // Redirecciono al usuario a la página principal del sitio.
    header("HTTP/1.1 302 Moved Temporarily"); 
    header("Location: principal.php"); 
  }else{
    echo 'El email o password es incorrecto, <a href="index.html">vuelva a intenarlo</a>.<br/>';
  }
*/
 ?>
