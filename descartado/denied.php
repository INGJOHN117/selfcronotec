<?php
session_start();
//echo session_id();
//echo session_name();
//if(isset($_SESSION['error'])){
//}
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MENU</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="https://kit.fontawesome.com/5658e61838.js"></script>
  </head>
  <body>
    <section style="margin-top:150;">
      <form class="" action="login.php" method="post">
        <input type="text" style="border-bottom: none; width: 300; margin:auto; display: block; text-align:center; margin-top:20px" value="SO SORRY, ACCESS DENIED"></input>
        <img style="margin: auto; display: block; height:150px; width:150px;" src="img/denied.png" alt="">
        <button style="margin:auto; display: block; margin-top:30px" type="submit" style="background:rgb(162, 162, 162); font-size: 30px; width:40px; height:30px;" name="button">RETURN</button>
      </form>
    </section>
  </body>
</html>
