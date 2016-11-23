<?php
if(session_start() == true){
	session_destroy();
}
error_reporting(E_ALL ^ E_NOTICE);
session_start();
require_once '../Model/ProyectoDB.php';
require_once '../Model/Usuario.php';
?>
<!DOCTYPE html>
<html lang="es">

  <head>
    <title>Panel de Control</title>
    <link rel="stylesheet" type="text/css" href="../View//css/cssproyect.css">
    <meta charset = "utf-8">
  </head>

  <body>
    <?php
    $conexion = ProyectoDB::connectDB();
    $username = $_POST['username'];
    $password = $_POST['password'];
//echo $username."<br>".$password."<br>";

    $consulta = $conexion->query("SELECT id FROM Usuario WHERE id=\"$username\"");
    $consultaPass = $conexion->query("SELECT password FROM Usuario WHERE password=\"$password\" and id=\"$username\"");
    $consultaTipo = $conexion->query("SELECT tipousuario FROM Usuario WHERE password=\"$password\" and id=\"$username\"");
    $con = $consultaTipo->fetchObject();

//echo $consulta->rowCount();
//echo $consultaPass->rowCount();
//echo $consultaTipo->rowCount();
    if (($consulta->rowCount() > 0) && ($consultaPass->rowCount() > 0)) {

      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;
      $_SESSION['start'] = time();
      $_SESSION['expire'] = $_SESSION['start'] + (50 * 60);
      $_SESSION['administrador'] = false;

      echo "Entrando";
      if ($con->tipousuario == 'admin') {
        //echo "eres admin";
        $_SESSION['administrador'] = true;
        header("Refresh: 3; url=../View/panelAdmin.php");
      } else {
        //echo "no eres admin";
        header("Refresh:3; url=../View/panel-control.php");
      }
      //echo "<br><br><a href=panel-control.php>Panel de Control</a>";
    } else {
      echo "Username o Password estan incorrectos.";

      echo "<br><a href='../View/index.php'>Volver a Intentarlo</a>";
    }

    ?>
  </body>
</html>